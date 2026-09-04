<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proposals;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\ServiceInquiryNotification;

class ProposalController extends Controller
{
    /**
     * Store a new proposal submitted via AJAX
     */
    public function store(Request $request)
    {
            // ---- 1. Honeypot check (silent drop, fake success so bot doesn't retry smarter) ----
        if ($request->filled('hp_website')) {
            Log::warning('Honeypot triggered on proposal form.', [
                'ip' => $request->ip(),
            ]);

            return response()->json(['status' => 'success', 'message' => 'Thank you!']);
        }

        // ---- 2. reCAPTCHA verification ----
        $request->validate([
            'g-recaptcha-response' => 'required',
        ], [
            'g-recaptcha-response.required' => 'Please confirm you are not a robot.',
        ]);

        $captchaResponse = \Illuminate\Support\Facades\Http::asForm()->post(
            'https://www.google.com/recaptcha/api/siteverify',
            [
                'secret'   => config('services.recaptcha.secret_key'),
                'response' => $request->input('g-recaptcha-response'),
                'remoteip' => $request->ip(),
            ]
        )->json();

        if (empty($captchaResponse['success'])) {
            Log::warning('reCAPTCHA verification failed on proposal form.', [
                'ip'       => $request->ip(),
                'response' => $captchaResponse,
            ]);

            return response()->json([
                'status'  => 'error',
                'message' => 'Human verification failed. Please try the checkbox again.',
            ], 422);
        }

        try {
            // 🔹 Dynamic validation rules
            $rules = [
                'fullName'       => 'required|string|max:255',
                'company'        => 'required|string|max:255',
                'website'        => 'nullable|url|max:255',
                'email'          => 'required|email|max:255',
                'countryCode'    => 'required|string|max:10',
                'phone'          => 'required|string|max:20',
                'budget'         => 'required|in:under-1k,1k-5k,5k-10k,10k-plus',
                'services'       => 'required|array|min:1',
                'services.*'     => 'string|max:50',
                'otherService'   => 'nullable|string|max:50',
                'comments'       => 'nullable|string|max:1000',
                'agreement'      => 'required|boolean',
            ];

            // 🔹 If "Other" service is selected, require 'otherService'
            $services = $request->input('services', []);
            if (in_array('Other', $services)) {
                $rules['otherService'] = 'required|string|max:50';
            }

            // 🔹 Custom messages (optional)
            $messages = [
                'fullName.required'    => 'Full Name is required.',
                'company.required'     => 'Company/Organization is required.',
                'email.required'       => 'Email address is required.',
                'email.email'          => 'Email must be valid.',
                'phone.required'       => 'Phone number is required.',
                'budget.required'      => 'Please select your budget.',
                'services.required'    => 'Please select at least one service.',
                'otherService.required'=> 'Please specify your custom service in "Other" field.',
                'agreement.required'   => 'You must agree to the terms.',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                Log::warning('Proposal validation failed', [
                    'request' => $request->all(),
                    'errors' => $validator->errors()->toArray()
                ]);

                return response()->json([
                    'status'  => 'error',
                    'message' => 'Validation failed. Please check the input fields.',
                    'errors'  => $validator->errors()
                ], 422);
            }

            // 🔹 Store proposal safely
           $proposal = Proposals::create([
                'full_name'     => $request->fullName,
                'company'       => $request->company,
                'website'       => $request->website,
                'email'         => $request->email,
                'country_code'  => $request->countryCode,
                'phone'         => $request->phone,
                'budget'        => $request->budget,
                'services'      => $request->services,
                'other_service' => $request->otherService,
                'comments'      => $request->comments,
                'agreement'     => $request->agreement,
            ]);

            $proposal->page_url = url()->previous();
            $proposal->save();

            try {
                $recipientEmail = env('SERVICE_NOTIFICATION_EMAIL', 'fallback@example.com');
                Mail::to($recipientEmail)->send(new ServiceInquiryNotification($proposal));
                Log::info('Service inquiry email sent successfully', ['proposal_id' => $proposal->id]);
            } catch (\Throwable $mailError) {
                Log::error('Proposal saved but email failed.', [
                    'proposal_id' => $proposal->id,
                    'message'     => $mailError->getMessage(),
                ]);
                // Note: intentionally not re-thrown — proposal save is the source of truth.
            }

            Log::info('Proposal submitted successfully', ['proposal_id' => $proposal->id]);

            return response()->json([
                'status'  => 'success',
                'message' => 'Your proposal has been submitted successfully!',
                'data'    => $proposal
            ], 200);

        } catch (\Exception $e) {
            // 🔹 Log full exception details for debugging
            Log::error('Proposal submission exception', [
                'message' => $e->getMessage(),
                'trace'   => $e->getTraceAsString(),
                'request' => $request->all()
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong. Please try again later.'
            ], 500);
        }
    }

    // 📌 INDEX – 3 STATUS DATA
    public function index()
    {
        return view('admin_panel.proposal.index', [
            'newLeads'   => Proposals::where('status', 'New Lead')->latest()->get(),
            'contacted' => Proposals::where('status', 'Contacted')->latest()->get(),
            'qualified' => Proposals::where('status', 'Qualified')->latest()->get(),
        ]);
    }

    // 🔁 LIVE STATUS UPDATE (AJAX)
    public function updateStatus(Request $request, Proposals $proposal)
    {
        $request->validate([
            'status' => 'required|in:New Lead,Contacted,Qualified'
        ]);

        $proposal->update([
            'status' => $request->status
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Status updated successfully'
        ]);
    }

    // 👁 FULL VIEW
    public function show(Proposals $proposal)
    {
        return view('admin_panel.proposal.full_quote', compact('proposal'));
    }
    
}
