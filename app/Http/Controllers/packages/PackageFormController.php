<?php

namespace App\Http\Controllers\packages;

// use Barryvdh\DomPDF\PDF;
// use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade\Pdf; // Make sure to import the PDF facade
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\PkgModel\PackagesInquiries;
use Illuminate\Support\Facades\Mail;
use App\Mail\InformInquiryNotification;
use App\Models\PkgModel\Package;
use App\Models\PkgModel\PackagesCategory;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class PackageFormController extends Controller
{
   public function pkgFormSubmit(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:100'],
                'email' => ['required', 'email', 'max:150'],
                'phone_number' => ['required', 'string', 'max:20'],

                'pkg_category_id' => [
                    'required',
                    'integer',
                    'exists:packages_category,id',
                ],

                'pkg_id' => [
                    'required',
                    'integer',
                    'exists:packages,id',
                ],

                'location' => ['nullable', 'string', 'max:255'],

                'website' => [
                    'nullable',
                    'url',
                    'max:255',
                ],

                'description' => [
                    'nullable',
                    'string',
                    'max:500',
                ],
            ]);

            if ($validator->fails()) {

                return response()->json([
                    'status' => 'error',
                    'message' => 'Please check the submitted information.',
                    'errors' => $validator->errors(),
                ], 422);
            }

            /*
            |--------------------------------------------------------------------------
            | Verify Package Belongs To Selected Category
            |--------------------------------------------------------------------------
            */

            $package = \App\Models\PkgModel\Package::where('id', $request->pkg_id)
                ->where('pkg_category_id', $request->pkg_category_id)
                ->first();

            if (!$package) {

                return response()->json([
                    'status' => 'error',
                    'message' => 'The selected package is invalid.',
                ], 422);
            }

            /*
            |--------------------------------------------------------------------------
            | Create Inquiry
            |--------------------------------------------------------------------------
            */

            $inquiry = PackagesInquiries::create([
                'pkg_category_id' => $request->pkg_category_id,
                'pkg_id' => $request->pkg_id,

                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,

                'location' => $request->location,
                'website' => $request->website,
                'description' => $request->description,
            ]);

            /*
            |--------------------------------------------------------------------------
            | Send Notification Email
            |--------------------------------------------------------------------------
            */

            $recipientEmail = env(
                'SERVICE_NOTIFICATION_EMAIL',
                'digitalpartner56@gmail.com'
            );

            Mail::to($recipientEmail)
                ->send(new InformInquiryNotification($inquiry));

            return response()->json([
                'status' => 'success',
                'message' => 'Your inquiry has been submitted successfully!',
            ], 200);

        } catch (\Exception $e) {

            Log::error('Package Form Submission Error', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'request' => $request->except([
                    'password',
                    'password_confirmation',
                ]),
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong. Please try again later.',
            ], 500);
        }
    }



    public function showAllInquiries()
    {
        // Fetch all inquiries, ordered by created_at in descending order (newest first)
        $inquiries = PackagesInquiries::with(['category', 'package']) // Eager loading relationships
                                    ->orderBy('created_at', 'desc')
                                    ->get();

        // Pass inquiries to the view
        return view('admin_panel.packages.get_inquery.all_inquery', compact('inquiries'));
    }

    public function showInquiryDetails($id)
    {
        $inquiry = PackagesInquiries::with(['category', 'package'])->findOrFail($id);
        return view('admin_panel.packages.get_inquery.single_inquery', compact('inquiry'));
    }

    public function downloadPdf($id)
    {
        // Fetch the inquiry data
        $inquiry = PackagesInquiries::with(['package.benefits', 'category'])->findOrFail($id);

        // Load the view into the PDF
        $pdf = Pdf::loadView('admin_panel.packages.get_inquery.pkg_pdf_down', compact('inquiry'));

        // Return the generated PDF as a download
        return $pdf->download('inquiry_details_' . $inquiry->id . '.pdf');
    }


}
