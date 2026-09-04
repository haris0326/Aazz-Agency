<?php

namespace App\Http\Controllers\service_form_controller;

use App\Http\Controllers\Controller;
use App\Models\Proposals;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\ServiceInquiryNotification;

class ServiceFormController extends Controller
{
    public function showForm()
    {
        return view('service_form.main_quote_form');
    }

    public function store(Request $request)
    {
        try {

            /* =========================
            | 1️⃣ VALIDATION
            ==========================*/
            $validator = Validator::make($request->all(), [
                'fullName'      => 'required|string|max:255',
                'company'       => 'required|string|max:255',
                'website'       => 'nullable|url|max:255',
                'email'         => 'required|email|max:255',
                'country_code'  => 'required|string|max:10',
                'phone'         => 'required|string|max:20',
                'budget'        => 'required|string',
                'services'      => 'required|array|min:1',
                'other_service' => 'nullable|string|max:50',
                'comments'      => 'nullable|string|max:1000',
                'agreement'     => 'required|boolean',
            ]);

            if ($validator->fails()) {
                Log::warning('Proposal Validation Failed', [
                    'errors'  => $validator->errors()->toArray(),
                    'payload' => $request->except(['agreement'])
                ]);

                return response()->json([
                    'status'  => 'error',
                    'message' => $validator->errors()->first()
                ], 422);
            }

            /* =========================
            | 2️⃣ DATABASE SAVE
            ==========================*/
            try {
                $proposal = Proposals::create([
                    'full_name'     => $request->fullName,
                    'company'       => $request->company,
                    'website'       => $request->website,
                    'email'         => $request->email,
                    'country_code'  => $request->country_code,
                    'phone'         => $request->phone,
                    'budget'        => $request->budget,
                    'services'      => $request->services,
                    'other_service' => $request->other_service,
                    'comments'      => $request->comments,
                    'agreement'     => true,
                ]);
            } catch (\Throwable $dbError) {
                Log::error('Proposal DB Save Failed', [
                    'message' => $dbError->getMessage(),
                    'line'    => $dbError->getLine(),
                    'file'    => $dbError->getFile(),
                    'trace'   => $dbError->getTraceAsString(),
                    'payload' => $request->all(),
                ]);

                return response()->json([
                    'status'  => 'error',
                    'message' => 'Database error occurred.'
                ], 500);
            }

            /* =========================
            | 3️⃣ MAIL SEND
            ==========================*/
            $proposal->page_url = url()->previous();
            $recipientEmail = env('SERVICE_NOTIFICATION_EMAIL', 'fallback@example.com');

            try {
                Mail::to($recipientEmail)->send(new ServiceInquiryNotification($proposal));
                Log::info('Service Inquiry Mail sent successfully to: ' . $recipientEmail);
            } catch (\Throwable $mailError) {
                Log::error('Proposal Mail Sending Failed', [
                    'proposal_id' => $proposal->id ?? null,
                    'message'     => $mailError->getMessage(),
                    'line'        => $mailError->getLine(),
                    'file'        => $mailError->getFile(),
                    'trace'       => $mailError->getTraceAsString(),
                ]);

                return response()->json([
                    'status'  => 'error',
                    'message' => 'Proposal saved but email failed: ' . $mailError->getMessage()
                ], 500);
            }

            /* =========================
            | 4️⃣ SUCCESS RESPONSE
            ==========================*/
            Log::info('Proposal Submitted Successfully', [
                'proposal_id' => $proposal->id,
                'email'       => $proposal->email
            ]);

            return response()->json([
                'status'  => 'success',
                'message' => 'Your proposal has been submitted successfully!'
            ]);

        } catch (\Throwable $e) {
            Log::critical('Unexpected Proposal Submission Error', [
                'message' => $e->getMessage(),
                'line'    => $e->getLine(),
                'file'    => $e->getFile(),
                'trace'   => $e->getTraceAsString(),
            ]);

            return response()->json([
                'status'  => 'error',
                'message' => 'Unexpected system error occurred.'
            ], 500);
        }
    }
}
