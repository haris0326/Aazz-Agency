@extends(config('web_assets.layouts.main'))

@section('title', 'Get Your Free Proposal')

@push('custom_css')
    <style>
        .proposal-section {
            background:
                radial-gradient(circle at 10% 10%, rgba(45, 212, 191, .18), transparent 32%),
                radial-gradient(circle at 90% 90%, rgba(59, 130, 246, .22), transparent 35%),
                linear-gradient(135deg, #07111f 0%, #101d35 55%, #0f766e 130%);
        }

        .proposal-glow {
            position: absolute;
            border-radius: 9999px;
            filter: blur(70px);
            pointer-events: none;
        }

        .proposal-panel {
            background: #0f172a;
            border: 1px solid rgba(148, 163, 184, .18);
            box-shadow: 0 30px 100px rgba(0, 0, 0, .35);
        }

        .proposal-input {
            width: 100%;
            min-width: 0;
            padding: 15px 16px;
            border-radius: 13px;
            color: #f8fafc;
            background: #182438;
            border: 1px solid #334155;
            outline: none;
            transition: border-color .2s, box-shadow .2s, background .2s;
        }

        .proposal-input::placeholder {
            color: #8493a8;
        }

        .proposal-input:focus {
            border-color: #2dd4bf;
            background: #1b2a40;
            box-shadow: 0 0 0 3px rgba(45, 212, 191, .12);
        }

        .proposal-input option {
            color: #f8fafc;
            background: #182438;
        }

        .proposal-label {
            display: block;
            color: #cbd5e1;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: .12em;
            text-transform: uppercase;
            margin-bottom: 9px;
        }

        .proposal-label .required {
            color: #5eead4;
        }

        .proposal-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #64748b;
            pointer-events: none;
            transition: color .2s;
        }

        .proposal-field:focus-within .proposal-icon {
            color: #5eead4;
        }

        .proposal-field.has-icon .proposal-input {
            padding-left: 43px;
        }

        .proposal-error {
            display: none;
            color: #fca5a5;
            font-size: 12px;
            font-weight: 600;
            margin-top: 7px;
        }

        .proposal-error.show {
            display: block;
        }

        .proposal-input.field-invalid {
            border-color: #f87171 !important;
            box-shadow: 0 0 0 3px rgba(248, 113, 113, .12) !important;
        }

        .proposal-submit {
            background: linear-gradient(100deg, #2563eb, #0d9488);
            box-shadow: 0 12px 30px rgba(13, 148, 136, .23);
            transition: transform .2s, box-shadow .2s, opacity .2s;
        }

        .proposal-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 16px 36px rgba(13, 148, 136, .32);
        }

        .proposal-submit:disabled {
            opacity: .65;
            cursor: not-allowed;
            transform: none;
        }

        .proposal-spinner {
            display: none;
            width: 18px;
            height: 18px;
            border: 2px solid rgba(255, 255, 255, .4);
            border-top-color: #fff;
            border-radius: 50%;
            animation: proposal-spin .7s linear infinite;
        }

        #submitBtn.is-loading .proposal-spinner {
            display: inline-block;
        }

        #submitBtn.is-loading .proposal-btn-text {
            display: none;
        }

        @keyframes proposal-spin {
            to {
                transform: rotate(360deg);
            }
        }

        .proposal-step {
            display: flex;
            align-items: flex-start;
            gap: 14px;
        }

        .proposal-step-icon {
            display: flex;
            flex-shrink: 0;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            border-radius: 12px;
            color: #5eead4;
            background: rgba(45, 212, 191, .1);
            border: 1px solid rgba(45, 212, 191, .2);
        }

        .proposal-honeypot {
            position: absolute !important;
            left: -9999px !important;
            top: -9999px !important;
            width: 1px !important;
            height: 1px !important;
            overflow: hidden !important;
        }

        @media (prefers-reduced-motion: reduce) {

            .proposal-submit,
            .proposal-input {
                transition: none;
            }

            .proposal-spinner {
                animation-duration: 1.5s;
            }
        }
    </style>
@endpush

@section('content')
    <section id="proposal-form" class="proposal-section relative overflow-hidden py-16 sm:py-20 lg:py-24">

        <div class="proposal-glow w-64 h-64 bg-blue-500/20 top-0 left-0"></div>
        <div class="proposal-glow w-72 h-72 bg-teal-400/20 bottom-0 right-0"></div>

        <div class="container relative z-10 mx-auto px-4">

            {{-- Heading --}}
            <header class="text-center max-w-3xl mx-auto mb-12 lg:mb-16" data-aos="fade-up">

                <div class="inline-flex items-center gap-2 rounded-full
                            border border-teal-300/25 bg-teal-300/10
                            px-4 py-2 mb-6">
                    <span class="h-2 w-2 rounded-full bg-teal-300"></span>
                    <span class="text-teal-100 text-xs font-bold uppercase tracking-widest">
                        Available for New Projects
                    </span>
                </div>

                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black
                           tracking-tight text-white leading-tight mb-5">
                    Let's Build Your
                    <span class="block text-transparent bg-clip-text
                                 bg-gradient-to-r from-teal-300 via-cyan-300 to-blue-400">
                        Next Big Idea.
                    </span>
                </h1>

                <p class="text-base sm:text-lg text-slate-300 leading-relaxed max-w-2xl mx-auto">
                    Tell us a little about yourself and your project.
                    Our team will review your requirements and prepare a tailored proposal.
                </p>
            </header>

            {{-- Main panel --}}
            <div class="proposal-panel max-w-6xl mx-auto rounded-3xl
                        overflow-hidden lg:grid lg:grid-cols-12" data-aos="fade-up">

                {{-- Left information panel --}}
                <aside class="relative overflow-hidden bg-slate-950/60
                              p-7 sm:p-10 lg:p-10 lg:col-span-4 text-white">

                    <div class="absolute -top-16 -right-16 w-48 h-48
                                rounded-full bg-blue-500/10 blur-3xl"></div>

                    <div class="relative z-10">
                        <div class="w-14 h-14 rounded-2xl flex items-center
                                    justify-center mb-7
                                    bg-gradient-to-br from-blue-500 to-teal-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"
                                aria-hidden="true">
                                <path d="M12 20h9" />
                                <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L8 18l-4 1 1-4Z" />
                            </svg>
                        </div>

                        <h2 class="text-2xl sm:text-3xl font-extrabold mb-4">
                            Your project starts here.
                        </h2>

                        <p class="text-sm text-slate-400 leading-7 mb-9">
                            Share your details with us. We'll help you identify
                            the right solution for your business goals.
                        </p>

                        <div class="space-y-7">
                            <div class="proposal-step">
                                <div class="proposal-step-icon">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.8" aria-hidden="true">
                                        <circle cx="11" cy="11" r="7" />
                                        <path d="m20 20-4-4" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-sm mb-1">Understand your needs</h3>
                                    <p class="text-xs text-slate-400 leading-5">
                                        We review your inquiry and project objectives.
                                    </p>
                                </div>
                            </div>

                            <div class="proposal-step">
                                <div class="proposal-step-icon">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.8" aria-hidden="true">
                                        <path d="M12 3v18M3 12h18" />
                                        <circle cx="12" cy="12" r="9" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-sm mb-1">Explore the right solution</h3>
                                    <p class="text-xs text-slate-400 leading-5">
                                        We discuss an approach tailored to your requirements.
                                    </p>
                                </div>
                            </div>

                            <div class="proposal-step">
                                <div class="proposal-step-icon">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.8" aria-hidden="true">
                                        <path d="M4 4h16v16H4z" />
                                        <path d="m8 12 3 3 5-6" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-sm mb-1">Receive your proposal</h3>
                                    <p class="text-xs text-slate-400 leading-5">
                                        Get the next steps for moving your project forward.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="relative z-10 mt-10 pt-6 border-t border-slate-800">
                        <p class="text-xs text-slate-400 mb-2">Prefer to talk?</p>
                        <a href="tel:+447308649119" class="inline-flex items-center gap-2 text-teal-300
                                  hover:text-teal-200 font-bold text-sm">
                            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" aria-hidden="true">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2
                                         19.8 19.8 0 0 1-8.63-3.07
                                         19.5 19.5 0 0 1-6-6
                                         19.8 19.8 0 0 1-3.07-8.67
                                         A2 2 0 0 1 4.11 2h3
                                         a2 2 0 0 1 2 1.72
                                         c.12.96.36 1.9.7 2.8
                                         a2 2 0 0 1-.45 2.11L8.1 9.9
                                         a16 16 0 0 0 6 6l1.27-1.27
                                         a2 2 0 0 1 2.11-.45
                                         c.9.34 1.84.58 2.8.7
                                         a2 2 0 0 1 1.72 2.04Z" />
                            </svg>
                            +44 7308 649119
                        </a>
                    </div>
                </aside>

                {{-- Right form --}}
                <div class="p-6 sm:p-9 lg:p-11 lg:col-span-8">
                    <div class="mb-8">
                        <h2 class="text-2xl font-extrabold text-white mb-2">
                            Get Your Free Proposal
                        </h2>
                        <p class="text-sm text-slate-400">
                            Complete the fields below. Fields marked
                            <span class="text-teal-300">*</span> are required.
                        </p>
                    </div>

                    <form id="proposalForm" action="{{ route('proposals.store') }}" method="POST" novalidate
                        class="space-y-6">

                        @csrf

                        {{-- Honeypot --}}
                        <div class="proposal-honeypot" aria-hidden="true">
                            <label for="hp_website">Leave this field empty</label>
                            <input type="text" name="hp_website" id="hp_website" tabindex="-1" autocomplete="off">
                        </div>

                        {{-- Name + Location --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

                            <div class="proposal-field has-icon">
                                <label for="fullName" class="proposal-label">
                                    Full Name <span class="required">*</span>
                                </label>
                                <div class="relative">
                                    <svg class="proposal-icon" width="18" height="18" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                        <circle cx="12" cy="8" r="4" />
                                        <path d="M5 21v-2a7 7 0 0 1 14 0v2" />
                                    </svg>
                                    <input type="text" name="fullName" id="fullName" placeholder="John Doe"
                                        autocomplete="name" required class="proposal-input">
                                </div>
                                <p class="proposal-error">Please enter your full name.</p>
                            </div>

                            <div class="proposal-field has-icon">
                                <label for="location" class="proposal-label">
                                    Your Location
                                </label>
                                <div class="relative">
                                    <svg class="proposal-icon" width="18" height="18" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                        <path d="M20 10c0 5-8 12-8 12S4 15 4 10a8 8 0 1 1 16 0Z" />
                                        <circle cx="12" cy="10" r="2.5" />
                                    </svg>
                                    <input type="text" name="location" id="location" placeholder="City, Country"
                                        autocomplete="country-name" class="proposal-input">
                                </div>
                            </div>

                        </div>

                        {{-- Email + Website --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

                            <div class="proposal-field has-icon">
                                <label for="email" class="proposal-label">
                                    Email Address <span class="required">*</span>
                                </label>
                                <div class="relative">
                                    <svg class="proposal-icon" width="18" height="18" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                        <rect x="3" y="5" width="18" height="14" rx="2" />
                                        <path d="m3 7 9 6 9-6" />
                                    </svg>
                                    <input type="email" name="email" id="email" placeholder="john@example.com"
                                        autocomplete="email" required class="proposal-input">
                                </div>
                                <p class="proposal-error">Please enter a valid email address.</p>
                            </div>

                            <div class="proposal-field has-icon">
                                <label for="website" class="proposal-label">
                                    Website <span class="text-slate-500">(Optional)</span>
                                </label>
                                <div class="relative">
                                    <svg class="proposal-icon" width="18" height="18" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                        <circle cx="12" cy="12" r="10" />
                                        <path d="M2 12h20" />
                                        <path d="M12 2a15 15 0 0 1 0 20
                                                 15 15 0 0 1 0-20Z" />
                                    </svg>
                                    <input type="url" name="website" id="website" placeholder="https://example.com"
                                        autocomplete="url" class="proposal-input">
                                </div>
                                <p class="proposal-error">Please enter a valid website URL.</p>
                            </div>

                        </div>

                        {{-- Phone --}}
                        <div class="proposal-field">
                            <label for="phone" class="proposal-label">
                                Phone Number <span class="required">*</span>
                            </label>

                            <div class="grid grid-cols-[115px_minmax(0,1fr)] gap-3">
                                <select name="countryCode" id="countryCode" aria-label="Country calling code"
                                    class="proposal-input !px-3 text-sm font-semibold">
                                    <option value="+92" selected>PK +92</option>
                                    <option value="+1">US +1</option>
                                    <option value="+44">UK +44</option>
                                    <option value="+91">IN +91</option>
                                    <option value="+971">UAE +971</option>
                                    <option value="+61">AU +61</option>
                                    <option value="+49">DE +49</option>
                                    <option value="+966">SA +966</option>
                                </select>

                                <input type="tel" name="phone" id="phone" placeholder="3001234567"
                                    autocomplete="tel-national" inputmode="tel" required class="proposal-input">
                            </div>
                            <p class="proposal-error">Please enter your phone number.</p>
                        </div>

                        {{-- Extra Details --}}
                        <div class="proposal-field">
                            <label for="comments" class="proposal-label">
                                Extra Details
                                <span class="text-slate-500">(Optional)</span>
                            </label>
                            <textarea name="comments" id="comments" rows="4"
                                placeholder="Briefly describe your needs, project goals, or requirements..."
                                class="proposal-input resize-y"></textarea>
                        </div>

                        {{-- reCAPTCHA --}}
                        <div class="proposal-field">
                            <label class="proposal-label">Human Verification</label>
                            <div class="overflow-x-auto">
                                <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"
                                    data-callback="onProposalCaptchaVerified"
                                    data-expired-callback="onProposalCaptchaExpired">
                                </div>
                            </div>
                            <p class="proposal-error" id="captchaError">
                                Please confirm you're not a robot.
                            </p>
                        </div>

                        {{-- Submit --}}
                        <div class="pt-2">
                            <button type="submit" id="submitBtn" class="proposal-submit w-full rounded-xl py-4 px-6
                                           text-white font-extrabold text-sm sm:text-base
                                           flex items-center justify-center gap-3">

                                <span class="proposal-spinner" aria-hidden="true"></span>

                                <span class="proposal-btn-text flex items-center gap-3">
                                    Send My Inquiry
                                    <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" aria-hidden="true">
                                        <path d="M5 12h14M12 5l7 7-7 7" />
                                    </svg>
                                </span>
                            </button>

                            <p class="text-center text-xs text-slate-400 mt-4 leading-6">
                                Your information will be used to respond to your inquiry.
                                <br>
                                <span class="text-teal-300 font-semibold">
                                    We look forward to hearing about your project.
                                </span>
                            </p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>

    {{-- Status modal --}}
    <div id="formModal" role="dialog" aria-modal="true" aria-labelledby="modalTitle" class="fixed inset-0 bg-slate-950/80 backdrop-blur-md
                items-center justify-center p-4 hidden z-[100]">

        <div id="modalBox" class="bg-white rounded-3xl max-w-md w-full p-8 sm:p-10
                    text-center shadow-2xl">

            <div id="modalIcon" class="w-16 h-16 bg-teal-50 text-teal-600 rounded-2xl
                        flex items-center justify-center mx-auto mb-6">
                <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    aria-hidden="true">
                    <path d="m5 12 4 4L19 6" />
                </svg>
            </div>

            <h2 id="modalTitle" class="text-2xl font-extrabold text-slate-900 mb-3">
                Thank You!
            </h2>

            <p id="modalMessage" class="text-slate-600 leading-7 mb-7"></p>

            <button type="button" id="closeModal" class="w-full py-3.5 bg-slate-900 text-white
                           font-bold rounded-xl hover:bg-slate-800 transition">
                Close
            </button>
        </div>
    </div>
@endsection

@push('custom_js')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script>
        let proposalCaptchaVerified = false;

        function onProposalCaptchaVerified() {
            proposalCaptchaVerified = true;

            const error = document.getElementById('captchaError');
            if (error) error.classList.remove('show');
        }

        function onProposalCaptchaExpired() {
            proposalCaptchaVerified = false;
        }

        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('proposalForm');
            const submitBtn = document.getElementById('submitBtn');
            const modal = document.getElementById('formModal');
            const modalTitle = document.getElementById('modalTitle');
            const modalMessage = document.getElementById('modalMessage');
            const modalIcon = document.getElementById('modalIcon');
            const closeModal = document.getElementById('closeModal');

            if (!form || !submitBtn || !modal) return;

            function showModal(title, message, success) {
                modalTitle.textContent = title;
                modalMessage.textContent = message;

                modalIcon.className = success
                    ? 'w-16 h-16 bg-teal-50 text-teal-600 rounded-2xl flex items-center justify-center mx-auto mb-6'
                    : 'w-16 h-16 bg-red-50 text-red-600 rounded-2xl flex items-center justify-center mx-auto mb-6';

                modal.classList.remove('hidden');
                modal.classList.add('flex');
                closeModal.focus();
            }

            function hideModal() {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }

            closeModal.addEventListener('click', hideModal);

            modal.addEventListener('click', function (event) {
                if (event.target === modal) hideModal();
            });

            document.addEventListener('keydown', function (event) {
                if (event.key === 'Escape' && !modal.classList.contains('hidden')) {
                    hideModal();
                }
            });

            function setError(el, show) {
                const field = el.closest('.proposal-field');
                if (!field) return;

                el.classList.toggle('field-invalid', show);

                const error = field.querySelector('.proposal-error');
                if (error && el.id !== 'phone' && el.id !== 'countryCode') {
                    error.classList.toggle('show', show);
                } else if (error) {
                    error.classList.toggle('show', show);
                }
            }

            function validateForm() {
                let valid = true;
                let firstInvalid = null;

                ['fullName', 'email', 'website', 'phone'].forEach(function (id) {
                    const el = document.getElementById(id);

                    // Website is optional, but must be valid if supplied.
                    const fieldValid = el.checkValidity();

                    if (!fieldValid) {
                        valid = false;
                        firstInvalid ||= el;
                    }

                    setError(el, !fieldValid);
                });

                const captchaError = document.getElementById('captchaError');

                if (!proposalCaptchaVerified) {
                    valid = false;
                    captchaError.classList.add('show');
                    firstInvalid ||= captchaError;
                } else {
                    captchaError.classList.remove('show');
                }

                if (firstInvalid) {
                    firstInvalid.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });

                    if (typeof firstInvalid.focus === 'function') {
                        setTimeout(() => firstInvalid.focus({ preventScroll: true }), 250);
                    }
                }

                return valid;
            }

            form.querySelectorAll('input, textarea, select').forEach(function (el) {
                if (el.name === 'hp_website' || el.name === '_token') return;

                function clearError() {
                    if (el.checkValidity()) setError(el, false);
                }

                el.addEventListener('input', clearError);
                el.addEventListener('change', clearError);
            });

            function resetCaptcha() {
                proposalCaptchaVerified = false;

                if (window.grecaptcha && typeof grecaptcha.reset === 'function') {
                    grecaptcha.reset();
                }
            }

            form.addEventListener('submit', async function (event) {
                event.preventDefault();

                const honeypot = document.getElementById('hp_website');

                if (honeypot && honeypot.value.trim() !== '') {
                    // Silently discard automated spam submissions.
                    return;
                }

                if (!validateForm()) return;

                if (!window.grecaptcha ||
                    typeof grecaptcha.getResponse !== 'function' ||
                    !grecaptcha.getResponse()) {
                    proposalCaptchaVerified = false;
                    document.getElementById('captchaError').classList.add('show');
                    return;
                }

                submitBtn.disabled = true;
                submitBtn.classList.add('is-loading');

                try {
                    const formData = new FormData(form);

                    const response = await fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': form.querySelector('[name="_token"]').value,
                            'Accept': 'application/json'
                        },
                        body: formData
                    });

                    const contentType = response.headers.get('content-type') || '';

                    if (!contentType.includes('application/json')) {
                        throw new Error(
                            'The server returned an unexpected response. Please check the form endpoint and try again.'
                        );
                    }

                    const data = await response.json();

                    if (!response.ok || data.status !== 'success') {
                        showModal(
                            'Unable to Submit',
                            data.message || 'Please check your details and try again.',
                            false
                        );

                        resetCaptcha();
                        return;
                    }

                    showModal(
                        'Inquiry Sent Successfully!',
                        data.message || 'Thank you! We have received your inquiry and will get back to you.',
                        true
                    );

                    form.reset();
                    resetCaptcha();

                    form.querySelectorAll('.field-invalid').forEach(function (el) {
                        el.classList.remove('field-invalid');
                    });

                    form.querySelectorAll('.proposal-error').forEach(function (el) {
                        el.classList.remove('show');
                    });

                } catch (error) {
                    showModal(
                        'Connection Error',
                        error.message || 'Something went wrong. Please try again in a moment.',
                        false
                    );

                    resetCaptcha();
                } finally {
                    submitBtn.disabled = false;
                    submitBtn.classList.remove('is-loading');
                }
            });
        });
    </script>
@endpush