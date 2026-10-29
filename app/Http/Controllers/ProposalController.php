<?php

namespace App\Http\Controllers;

use App\Models\ServiceForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\ServiceInquiryNotification;

class ProposalController extends Controller
{
    /**
     * Store a new service inquiry submitted via AJAX.
     */
    public function store(Request $request)
    {
        // 1. Honeypot check
        if ($request->filled('hp_website')) {
            Log::warning('Service form honeypot triggered.', [
                'ip' => $request->ip(),
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Thank you!',
            ]);
        }

        // 2. Validate reCAPTCHA response
        $captchaValidator = Validator::make($request->all(), [
            'g-recaptcha-response' => 'required|string',
        ], [
            'g-recaptcha-response.required' =>
            'Please confirm you are not a robot.',
        ]);

        if ($captchaValidator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Please confirm you are not a robot.',
                'errors' => $captchaValidator->errors(),
            ], 422);
        }

        // 3. Verify reCAPTCHA with Google
        try {
            $captchaResponse = Http::asForm()
                ->timeout(10)
                ->post(
                    'https://www.google.com/recaptcha/api/siteverify',
                    [
                        'secret' => config('services.recaptcha.secret_key'),
                        'response' => $request->input(
                            'g-recaptcha-response'
                        ),
                        'remoteip' => $request->ip(),
                    ]
                );

            if (!$captchaResponse->successful()) {
                Log::warning(
                    'reCAPTCHA verification service failed.',
                    [
                        'ip' => $request->ip(),
                        'http_status' => $captchaResponse->status(),
                    ]
                );

                return response()->json([
                    'status' => 'error',
                    'message' =>
                    'Human verification is temporarily unavailable. Please try again.',
                ], 503);
            }

            $captchaData = $captchaResponse->json();

            if (empty($captchaData['success'])) {
                Log::warning(
                    'Service form reCAPTCHA verification failed.',
                    [
                        'ip' => $request->ip(),
                        'error_codes' =>
                        $captchaData['error-codes'] ?? [],
                    ]
                );

                return response()->json([
                    'status' => 'error',
                    'message' =>
                    'Human verification failed. Please try again.',
                ], 422);
            }
        } catch (\Throwable $e) {
            Log::error('reCAPTCHA request failed.', [
                'message' => $e->getMessage(),
                'ip' => $request->ip(),
            ]);

            return response()->json([
                'status' => 'error',
                'message' =>
                'Human verification is temporarily unavailable. Please try again.',
            ], 503);
        }

        // 4. Validate fields from the current Blade form
        $validator = Validator::make($request->all(), [
            'fullName' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'website' => 'nullable|url|max:255',
            'countryCode' =>
            'required|string|in:+92,+1,+44,+91,+971,+61,+49,+966',
            'phone' => 'required|string|max:30',
            'comments' => 'nullable|string|max:5000',
        ], [
            'fullName.required' => 'Full name is required.',
            'fullName.max' =>
            'Full name cannot exceed 255 characters.',

            'location.max' =>
            'Location cannot exceed 255 characters.',

            'email.required' => 'Email address is required.',
            'email.email' => 'Please enter a valid email address.',

            'website.url' =>
            'Please enter a valid website URL.',

            'countryCode.required' =>
            'Please select a country calling code.',
            'countryCode.in' =>
            'Please select a valid country calling code.',

            'phone.required' => 'Phone number is required.',
            'phone.max' =>
            'Phone number cannot exceed 30 characters.',

            'comments.max' =>
            'Extra details cannot exceed 5000 characters.',
        ]);

        if ($validator->fails()) {
            Log::warning('Service form validation failed.', [
                'ip' => $request->ip(),
                'errors' => $validator->errors()->toArray(),
            ]);

            return response()->json([
                'status' => 'error',
                'message' =>
                'Validation failed. Please check your details.',
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            $validated = $validator->validated();

            // 5. Save inquiry to the servicesform table
            $serviceForm = ServiceForm::create([
                'full_name' => $validated['fullName'],
                'location' => $validated['location'] ?? null,
                'email' => $validated['email'],
                'website' => $validated['website'] ?? null,
                'country_code' => $validated['countryCode'],
                'phone' => $validated['phone'],
                'comments' => $validated['comments'] ?? null,
                'page_url' => $request->headers->get('referer'),
            ]);

            // 6. Send notification email.
            // A mail failure must not undo the saved inquiry.
            try {
                $recipientEmail = config(
                    'services.notification.email',
                    env(
                        'SERVICE_NOTIFICATION_EMAIL',
                        'fallback@example.com'
                    )
                );

                if (
                    !is_string($recipientEmail) ||
                    !filter_var($recipientEmail, FILTER_VALIDATE_EMAIL)
                ) {
                    throw new \RuntimeException(
                        'The service notification email is invalid.'
                    );
                }

                Mail::to($recipientEmail)->send(
                    new ServiceInquiryNotification($serviceForm)
                );

                Log::info(
                    'Service inquiry notification email sent.',
                    [
                        'service_form_id' => $serviceForm->id,
                    ]
                );
            } catch (\Throwable $mailError) {
                Log::error(
                    'Service inquiry saved, but notification email failed.',
                    [
                        'service_form_id' => $serviceForm->id,
                        'message' => $mailError->getMessage(),
                    ]
                );
            }

            Log::info('Service inquiry submitted successfully.', [
                'service_form_id' => $serviceForm->id,
            ]);

            return response()->json([
                'status' => 'success',
                'message' =>
                'Your inquiry has been submitted successfully!',
                'data' => [
                    'id' => $serviceForm->id,
                ],
            ], 200);
        } catch (\Throwable $e) {
            Log::error('Service inquiry submission failed.', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'ip' => $request->ip(),
            ]);

            return response()->json([
                'status' => 'error',
                'message' =>
                'Something went wrong. Please try again later.',
            ], 500);
        }
    }

    /**
     * Display service inquiries grouped by status.
     */
    /**
     * Display service inquiries grouped by status.
     */
    public function index()
    {
        return view('admin_panel.proposal.index', [
            'newLeads' => ServiceForm::where('status', 'New Lead')
                ->latest()
                ->get(),

            'contacted' => ServiceForm::where('status', 'Contacted')
                ->latest()
                ->get(),

            'qualified' => ServiceForm::where('status', 'Qualified')
                ->latest()
                ->get(),
        ]);
    }

    /**
     * Update service inquiry status via AJAX.
     */
    /**
     * Update service inquiry status via AJAX.
     */
    public function updateStatus(Request $request, ServiceForm $proposal)
    {
        $validated = $request->validate([
            'status' => 'required|in:New Lead,Contacted,Qualified',
        ]);

        $proposal->update([
            'status' => $validated['status'],
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Status updated successfully.',
        ]);
    }

    /**
     * Display full service inquiry details.
     */
    public function show(ServiceForm $proposal)
    {
        return view('admin_panel.proposal.full_quote', compact('proposal'));
    }
}
