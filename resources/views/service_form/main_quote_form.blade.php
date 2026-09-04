@extends(config('web_assets.layouts.main'))

@section('title', 'Get Your Free Proposal')

@push('custom_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    .bg-animate {
        background: linear-gradient(-45deg, #0f172a, #1e293b, #0ea5e9, #2dd4bf);
        background-size: 400% 400%;
        animation: gradientBG 15s ease infinite;
    }
    @keyframes gradientBG {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
    .floating { animation: floating 3s ease-in-out infinite; }
    @keyframes floating {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }
    .glass-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    .service-checkbox:checked + .service-card {
        background: linear-gradient(135deg, #3b82f6 0%, #2dd4bf 100%);
        color: white;
        transform: scale(1.05);
        border-color: transparent;
    }
    .service-checkbox:checked + .service-card i { color: white; }
    .service-card { transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); }
    textarea::-webkit-scrollbar { width: 5px; }
    textarea::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }

    /* Validation states */
    .field-invalid { box-shadow: 0 0 0 2px #ef4444 !important; }
    .field-error-msg {
        display: none;
        color: #ef4444;
        font-size: 11px;
        font-weight: 700;
        margin-top: 6px;
    }
    .field-error-msg.show { display: block; }

    /* Honeypot — hidden from humans, catnip for bots that auto-fill every field */
    .hp-trap {
        position: absolute !important;
        left: -9999px !important;
        top: -9999px !important;
        height: 0 !important;
        width: 0 !important;
        overflow: hidden !important;
        opacity: 0 !important;
    }

    /* Submit button loading state */
    #submitBtn:disabled { opacity: 0.7; cursor: not-allowed; }
    .btn-spinner {
        display: none;
        width: 18px; height: 18px;
        border: 2.5px solid rgba(255,255,255,0.35);
        border-top-color: #fff;
        border-radius: 50%;
        animation: spin 0.7s linear infinite;
    }
    @keyframes spin { to { transform: rotate(360deg); } }
    #submitBtn.is-loading .btn-spinner { display: inline-block; }
    #submitBtn.is-loading .btn-label { display: none; }
</style>
@endpush

@section('content')
<section id="proposal-form" class="py-24 bg-animate relative overflow-hidden min-h-screen flex items-center">
    <div class="absolute top-20 left-10 w-32 h-32 bg-white/10 rounded-full blur-2xl floating"></div>
    <div class="absolute bottom-20 right-10 w-40 h-40 bg-teal-400/20 rounded-full blur-3xl floating" style="animation-delay: 1s;"></div>

    <div class="container mx-auto px-4 relative z-10">

        <div class="text-center mb-16" data-aos="zoom-in">
            <div class="inline-flex items-center gap-2 bg-white/10 border border-white/20 px-4 py-2 rounded-full mb-6 backdrop-blur-md">
                <span class="relative flex h-3 w-3">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-teal-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-teal-500"></span>
                </span>
                <span class="text-white text-xs font-bold uppercase tracking-widest">Available for New Projects</span>
            </div>
            <h2 class="text-5xl md:text-7xl font-black text-white mt-4 mb-6 tracking-tight">
                Let's Build Something <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-300 to-blue-300">Extraordinary.</span>
            </h2>
            <p class="text-blue-100/80 max-w-2xl mx-auto text-xl font-light">
                Ready to dominate your niche? Provide your details below and we'll craft a winning proposal for you.
            </p>
        </div>

        <div class="max-w-5xl mx-auto glass-card rounded-[2rem] shadow-2xl overflow-hidden md:flex" data-aos="fade-up">

            <div class="hidden md:flex md:w-2/5 bg-slate-900 p-12 flex-col justify-between relative overflow-hidden text-white">
                <div class="relative z-10">
                    <h3 class="text-3xl font-bold mb-8">What happens <br>next?</h3>
                    <div class="space-y-8">
                        <div class="flex gap-5">
                            <span class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-600/20 border border-blue-500 flex items-center justify-center font-bold text-blue-400">1</span>
                            <div>
                                <h4 class="font-bold">Expert Review</h4>
                                <p class="text-sm text-slate-400">Our analysts study your business model and requirements.</p>
                            </div>
                        </div>
                        <div class="flex gap-5">
                            <span class="flex-shrink-0 w-10 h-10 rounded-full bg-teal-600/20 border border-teal-500 flex items-center justify-center font-bold text-teal-400">2</span>
                            <div>
                                <h4 class="font-bold">Strategy Call</h4>
                                <p class="text-sm text-slate-400">We schedule a brief call to align on goals and KPIs.</p>
                            </div>
                        </div>
                        <div class="flex gap-5">
                            <span class="flex-shrink-0 w-10 h-10 rounded-full bg-purple-600/20 border border-purple-500 flex items-center justify-center font-bold text-purple-400">3</span>
                            <div>
                                <h4 class="font-bold">Custom Proposal</h4>
                                <p class="text-sm text-slate-400">You receive a detailed technical and financial roadmap.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative z-10 mt-12 pt-8 border-t border-slate-800">
                    <div class="flex items-center gap-4">
                        <img src="https://ui-avatars.com/api/?name=Team+Support&background=0ea5e9&color=fff" class="w-12 h-12 rounded-full border-2 border-blue-500" alt="Support">
                        <div>
                            <p class="text-sm font-bold">Dedicated Support</p>
                            <p class="text-xs text-slate-400">Always here to help you.</p>
                        </div>
                    </div>
                </div>

                <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-blue-600 rounded-full mix-blend-screen filter blur-[80px] opacity-20"></div>
            </div>

            <form
                id="proposalForm"
                method="POST"
                action="{{ route('proposals.store') }}"
                novalidate
                class="w-full md:w-3/5 p-8 md:p-14 space-y-8"
            >
                @csrf

                {{-- Honeypot: real users never see or fill this. If it arrives filled, it's a bot. --}}
                <div class="hp-trap" aria-hidden="true">
                    <label for="hp_website">Leave this field empty</label>
                    <input type="text" name="hp_website" id="hp_website" tabindex="-1" autocomplete="off">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="group">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-2 block group-focus-within:text-blue-500 transition-colors">Your Identity</label>
                        <div class="relative">
                            <i class="fas fa-signature absolute left-4 top-4 text-slate-300 group-focus-within:text-blue-500"></i>
                            <input type="text" name="fullName" id="fullName" placeholder="Full Name" required
                                class="w-full pl-12 pr-4 py-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-500/20 outline-none transition-all placeholder:text-slate-400 font-medium">
                        </div>
                        <p class="field-error-msg">Please enter your full name.</p>
                    </div>
                    <div class="group">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-2 block group-focus-within:text-blue-500 transition-colors">Business Name</label>
                        <div class="relative">
                            <i class="fas fa-briefcase absolute left-4 top-4 text-slate-300 group-focus-within:text-blue-500"></i>
                            <input type="text" name="company" id="company" placeholder="Company Name" required
                                class="w-full pl-12 pr-4 py-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-500/20 outline-none transition-all placeholder:text-slate-400 font-medium">
                        </div>
                        <p class="field-error-msg">Please enter your company name.</p>
                    </div>
                </div>

                <div class="group">
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-2 block group-focus-within:text-blue-500 transition-colors">
                        Website (optional)
                    </label>
                    <div class="relative">
                        <i class="fas fa-globe absolute left-4 top-4 text-slate-300 group-focus-within:text-blue-500"></i>
                        <input
                            type="url"
                            name="website"
                            id="website"
                            placeholder="https://yourwebsite.com"
                            class="w-full pl-12 pr-4 py-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-500/20 outline-none font-medium placeholder:text-slate-400"
                        >
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="group">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-2 block group-focus-within:text-blue-500 transition-colors">Official Email</label>
                        <div class="relative">
                            <i class="fas fa-envelope absolute left-4 top-4 text-slate-300 group-focus-within:text-blue-500"></i>
                            <input type="email" name="email" id="email" placeholder="email@company.com" required
                                class="w-full pl-12 pr-4 py-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-500/20 outline-none transition-all placeholder:text-slate-400 font-medium">
                        </div>
                        <p class="field-error-msg">Please enter a valid email address.</p>
                    </div>
                    <div class="group">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-2 block group-focus-within:text-blue-500 transition-colors">Contact Number</label>
                        <div class="flex bg-slate-50 rounded-2xl overflow-hidden focus-within:ring-2 focus-within:ring-blue-500/20 transition-all">
                            <select name="countryCode" class="bg-slate-100 px-3 py-4 outline-none text-xs font-bold text-slate-600 border-r border-white">
                                <option value="+1">US (+1)</option>
                                <option value="+1">CA (+1)</option>
                                <option value="+7">RU (+7)</option>
                                <option value="+20">EG (+20)</option>
                                <option value="+27">ZA (+27)</option>
                                <option value="+30">GR (+30)</option>
                                <option value="+31">NL (+31)</option>
                                <option value="+32">BE (+32)</option>
                                <option value="+33">FR (+33)</option>
                                <option value="+34">ES (+34)</option>
                                <option value="+36">HU (+36)</option>
                                <option value="+39">IT (+39)</option>
                                <option value="+40">RO (+40)</option>
                                <option value="+41">CH (+41)</option>
                                <option value="+43">AT (+43)</option>
                                <option value="+44">UK (+44)</option>
                                <option value="+45">DK (+45)</option>
                                <option value="+46">SE (+46)</option>
                                <option value="+47">NO (+47)</option>
                                <option value="+48">PL (+48)</option>
                                <option value="+49">DE (+49)</option>
                                <option value="+51">PE (+51)</option>
                                <option value="+52">MX (+52)</option>
                                <option value="+53">CU (+53)</option>
                                <option value="+54">AR (+54)</option>
                                <option value="+55">BR (+55)</option>
                                <option value="+56">CL (+56)</option>
                                <option value="+57">CO (+57)</option>
                                <option value="+58">VE (+58)</option>
                                <option value="+60">MY (+60)</option>
                                <option value="+61">AU (+61)</option>
                                <option value="+62">ID (+62)</option>
                                <option value="+63">PH (+63)</option>
                                <option value="+64">NZ (+64)</option>
                                <option value="+65">SG (+65)</option>
                                <option value="+66">TH (+66)</option>
                                <option value="+81">JP (+81)</option>
                                <option value="+82">KR (+82)</option>
                                <option value="+84">VN (+84)</option>
                                <option value="+86">CN (+86)</option>
                                <option value="+90">TR (+90)</option>
                                <option value="+91">IN (+91)</option>
                                <option value="+92" selected>PK (+92)</option>
                                <option value="+93">AF (+93)</option>
                                <option value="+94">LK (+94)</option>
                                <option value="+95">MM (+95)</option>
                                <option value="+98">IR (+98)</option>
                                <option value="+211">SS (+211)</option>
                                <option value="+212">MA (+212)</option>
                                <option value="+213">DZ (+213)</option>
                                <option value="+216">TN (+216)</option>
                                <option value="+218">LY (+218)</option>
                                <option value="+220">GM (+220)</option>
                                <option value="+221">SN (+221)</option>
                                <option value="+223">ML (+223)</option>
                                <option value="+224">GN (+224)</option>
                                <option value="+225">CI (+225)</option>
                                <option value="+226">BF (+226)</option>
                                <option value="+227">NE (+227)</option>
                                <option value="+228">TG (+228)</option>
                                <option value="+229">BJ (+229)</option>
                                <option value="+230">MU (+230)</option>
                                <option value="+231">LR (+231)</option>
                                <option value="+232">SL (+232)</option>
                                <option value="+233">GH (+233)</option>
                                <option value="+234">NG (+234)</option>
                                <option value="+235">TD (+235)</option>
                                <option value="+236">CF (+236)</option>
                                <option value="+237">CM (+237)</option>
                                <option value="+238">CV (+238)</option>
                                <option value="+239">ST (+239)</option>
                                <option value="+240">GQ (+240)</option>
                                <option value="+241">GA (+241)</option>
                                <option value="+242">CG (+242)</option>
                                <option value="+243">CD (+243)</option>
                                <option value="+244">AO (+244)</option>
                                <option value="+245">GW (+245)</option>
                                <option value="+246">IO (+246)</option>
                                <option value="+248">SC (+248)</option>
                                <option value="+249">SD (+249)</option>
                                <option value="+250">RW (+250)</option>
                                <option value="+251">ET (+251)</option>
                                <option value="+252">SO (+252)</option>
                                <option value="+253">DJ (+253)</option>
                                <option value="+254">KE (+254)</option>
                                <option value="+255">TZ (+255)</option>
                                <option value="+256">UG (+256)</option>
                                <option value="+257">BI (+257)</option>
                                <option value="+258">MZ (+258)</option>
                                <option value="+260">ZM (+260)</option>
                                <option value="+261">MG (+261)</option>
                                <option value="+263">ZW (+263)</option>
                                <option value="+264">NA (+264)</option>
                                <option value="+265">MW (+265)</option>
                                <option value="+266">LS (+266)</option>
                                <option value="+267">BW (+267)</option>
                                <option value="+268">SZ (+268)</option>
                                <option value="+269">KM (+269)</option>
                            </select>
                            <input type="tel" name="phone" id="phone" placeholder="Phone" required class="w-full px-4 py-4 bg-transparent outline-none font-medium">
                        </div>
                        <p class="field-error-msg">Please enter your phone number.</p>
                    </div>
                </div>

                <div>
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-4 block">
                        Select Required Capabilities
                    </label>

                    @php
                        $items = [
                            ['n' => 'Web Dev',        'i' => 'fa-laptop-code'],
                            ['n' => 'Software Dev',   'i' => 'fa-code'],
                            ['n' => 'Mobile Apps',    'i' => 'fa-mobile-alt'],
                            ['n' => 'UI/UX Design',   'i' => 'fa-palette'],
                            ['n' => 'Marketing',      'i' => 'fa-bullhorn'],
                            ['n' => 'SEO',            'i' => 'fa-chart-line'],
                            ['n' => 'PPC',            'i' => 'fa-ad'],
                            ['n' => 'SMM',            'i' => 'fa-hashtag'],
                            ['n' => 'E-Commerce',     'i' => 'fa-shopping-cart'],
                            ['n' => 'Cloud',          'i' => 'fa-cloud'],
                            ['n' => 'IT Consulting',  'i' => 'fa-user-tie'],
                            ['n' => 'Other',          'i' => 'fa-ellipsis-h'],
                        ];
                    @endphp

                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                        @foreach($items as $item)
                            <label class="cursor-pointer">
                                <input
                                    type="checkbox"
                                    name="services[]"
                                    value="{{ $item['n'] }}"
                                    class="hidden service-checkbox"
                                    @if($item['n'] === 'Other') id="otherServiceCheckbox" @endif
                                >
                                <div class="service-card p-4 rounded-2xl border-2 border-slate-100 flex flex-col items-center gap-2 hover:bg-slate-50">
                                    <i class="fas {{ $item['i'] }} text-slate-400 transition-colors"></i>
                                    <span class="text-[11px] font-black uppercase tracking-tighter">
                                        {{ $item['n'] }}
                                    </span>
                                </div>
                            </label>
                        @endforeach
                    </div>
                    <p class="field-error-msg" id="servicesError">Please select at least one capability.</p>

                    <div id="otherServiceWrapper" class="hidden mt-4">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-2 block">
                            Please Specify Other Service
                        </label>
                        <input
                            type="text"
                            name="otherService"
                            placeholder="Describe your requirement"
                            class="w-full px-6 py-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-500/20 outline-none font-medium placeholder:text-slate-400"
                        >
                    </div>
                </div>

                <div class="group">
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-2 block group-focus-within:text-blue-500">How much are you planning to invest?</label>
                    <select name="budget" id="budget" required
                        class="w-full px-6 py-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-500/20 outline-none appearance-none font-bold text-slate-700">
                        <option value="" disabled selected>Select Budget Range</option>
                        <option value="1k-5k">$1,000 - $5,000</option>
                        <option value="5k-10k">$5,000 - $10,000</option>
                        <option value="10k+">$10,000+</option>
                    </select>
                    <p class="field-error-msg">Please select a budget range.</p>
                </div>

                <div class="group">
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-2 block group-focus-within:text-blue-500">
                        Project Details / Message
                    </label>
                    <textarea
                        name="comments"
                        rows="4"
                        placeholder="Briefly describe your project requirements, goals, or expectations..."
                        class="w-full px-6 py-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-500/20 outline-none font-medium placeholder:text-slate-400 resize-none"
                    ></textarea>
                </div>

                {{-- Human verification --}}
                <div class="group">
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-3 block">
                        Human Verification
                    </label>
                    <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}" data-callback="onCaptchaVerified" data-expired-callback="onCaptchaExpired"></div>
                    <p class="field-error-msg" id="captchaError">Please confirm you're not a robot.</p>
                </div>

                <div class="flex items-start gap-3">
                    <input
                        type="checkbox"
                        name="agreement"
                        id="agreement"
                        value="1"
                        required
                        class="mt-1 accent-blue-600"
                    >
                    <p class="text-[11px] text-slate-500 font-medium leading-relaxed">
                        I agree to be contacted regarding my inquiry and accept the processing of my information.
                    </p>
                </div>
                <p class="field-error-msg" id="agreementError">Please accept to proceed.</p>

                <button type="submit" id="submitBtn"
                    class="relative w-full overflow-hidden group py-5 bg-slate-900 text-white font-black uppercase tracking-widest rounded-2xl shadow-2xl hover:bg-blue-600 transition-all duration-500 flex items-center justify-center gap-3">
                    <span class="btn-spinner"></span>
                    <span class="btn-label relative z-10 flex items-center justify-center gap-3">
                        Ignite My Growth <i class="fas fa-fire-alt animate-pulse text-orange-400"></i>
                    </span>
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-teal-500 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                </button>

                <p class="text-center text-[11px] text-slate-400 font-bold uppercase tracking-widest">
                    Response time: <span class="text-slate-900">&lt; 24 Hours</span>
                </p>

                <input type="hidden" name="form_type" value="proposal">
                <input type="hidden" name="page_url" value="{{ url()->current() }}">
            </form>
        </div>
    </div>
</section>

<div id="formModal" class="fixed inset-0 bg-slate-950/90 backdrop-blur-xl flex items-center justify-center p-4 hidden z-50">
    <div class="bg-white rounded-[3rem] max-w-md w-full p-10 text-center relative shadow-[0_0_50px_rgba(0,0,0,0.3)] scale-90 transition-transform duration-500" id="modalBox">
        <div class="w-24 h-24 bg-gradient-to-tr from-green-400 to-teal-500 rounded-full flex items-center justify-center mx-auto mb-8 shadow-lg shadow-green-200" id="modalIcon">
            <i class="fas fa-paper-plane text-white text-3xl animate-bounce"></i>
        </div>
        <h3 class="text-3xl font-black text-slate-900 mb-4 tracking-tight" id="modalTitle">System Launching!</h3>
        <p id="modalMessage" class="text-slate-500 mb-10 leading-relaxed font-medium"></p>
        <button id="closeModal" class="w-full py-4 bg-slate-900 text-white font-black uppercase tracking-widest rounded-2xl hover:shadow-xl transition-all">
            Understood
        </button>
    </div>
</div>
@endsection

@push('custom_js')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
    let captchaVerified = false;

    function onCaptchaVerified() { captchaVerified = true; }
    function onCaptchaExpired() { captchaVerified = false; }

    document.addEventListener("DOMContentLoaded", () => {
        const modal = document.getElementById("formModal");
        const modalBox = document.getElementById("modalBox");
        const closeModalBtn = document.getElementById("closeModal");

        const hideModal = () => {
            modalBox.classList.add("scale-90");
            setTimeout(() => modal.classList.add("hidden"), 300);
        };

        closeModalBtn.addEventListener("click", hideModal);
    });

    document.addEventListener("DOMContentLoaded", function () {
        const otherCheckbox = document.getElementById("otherServiceCheckbox");
        const otherWrapper  = document.getElementById("otherServiceWrapper");

        if (!otherCheckbox) return;

        otherCheckbox.addEventListener("change", function () {
            if (this.checked) {
                otherWrapper.classList.remove("hidden");
            } else {
                otherWrapper.classList.add("hidden");
                otherWrapper.querySelector("input").value = "";
            }
        });
    });

    document.addEventListener("DOMContentLoaded", function () {
        const form = document.getElementById("proposalForm");
        const submitBtn = document.getElementById("submitBtn");

        function markInvalid(el, show) {
            const wrapper = el.closest('.group') || el.closest('div');
            const msg = wrapper ? wrapper.querySelector('.field-error-msg') : null;
            if (show) {
                el.classList.add('field-invalid');
                if (msg) msg.classList.add('show');
            } else {
                el.classList.remove('field-invalid');
                if (msg) msg.classList.remove('show');
            }
        }

        function validateForm() {
            let valid = true;

            ['fullName', 'company', 'email', 'phone', 'budget'].forEach(function (id) {
                const el = document.getElementById(id);
                const ok = el.checkValidity();
                markInvalid(el, !ok);
                if (!ok) valid = false;
            });

            const servicesChecked = form.querySelectorAll('.service-checkbox:checked').length > 0;
            const servicesError = document.getElementById('servicesError');
            servicesError.classList.toggle('show', !servicesChecked);
            if (!servicesChecked) valid = false;

            const agreement = document.getElementById('agreement');
            const agreementOk = agreement.checked;
            document.getElementById('agreementError').classList.toggle('show', !agreementOk);
            if (!agreementOk) valid = false;

            const captchaError = document.getElementById('captchaError');
            captchaError.classList.toggle('show', !captchaVerified);
            if (!captchaVerified) valid = false;

            return valid;
        }

        // Clear a field's error state as soon as the user fixes it
        form.querySelectorAll('input, select, textarea').forEach(function (el) {
            el.addEventListener('input', function () {
                if (el.checkValidity && el.checkValidity()) markInvalid(el, false);
            });
            el.addEventListener('change', function () {
                if (el.checkValidity && el.checkValidity()) markInvalid(el, false);
            });
        });

        form.addEventListener("submit", function (e) {
            e.preventDefault();

            // Honeypot: if this hidden field got filled, silently drop the
            // submission — a real visitor can never see or type into it.
            const honeypot = document.getElementById('hp_website');
            if (honeypot && honeypot.value.trim() !== '') {
                console.warn('Spam submission blocked.');
                return;
            }

            if (!validateForm()) {
                const firstError = form.querySelector('.field-invalid, .field-error-msg.show');
                if (firstError) firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                return;
            }

            submitBtn.disabled = true;
            submitBtn.classList.add('is-loading');

            const formData = new FormData(form);
            formData.append('g-recaptcha-response', grecaptcha.getResponse());

            fetch(form.action, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value,
                    "Accept": "application/json",
                },
                body: formData
            })
            .then(res => res.json().then(data => ({ ok: res.ok, data })))
            .then(({ ok, data }) => {
                if (ok && data.status === "success") {
                    document.getElementById("modalMessage").innerText = data.message;
                    document.getElementById("formModal").classList.remove("hidden");
                    setTimeout(() => document.getElementById("modalBox").classList.remove("scale-90"), 50);
                    form.reset();
                    grecaptcha.reset();
                    captchaVerified = false;
                    document.getElementById('otherServiceWrapper').classList.add('hidden');
                } else {
                    const message = data.message || "Please check the highlighted fields and try again.";
                    document.getElementById("modalMessage").innerText = message;
                    document.getElementById("modalTitle").innerText = "Something Needs Attention";
                    document.getElementById("formModal").classList.remove("hidden");
                    setTimeout(() => document.getElementById("modalBox").classList.remove("scale-90"), 50);
                    grecaptcha.reset();
                    captchaVerified = false;
                }
            })
            .catch(() => {
                document.getElementById("modalMessage").innerText = "Something went wrong. Please try again in a moment.";
                document.getElementById("modalTitle").innerText = "Connection Error";
                document.getElementById("formModal").classList.remove("hidden");
                setTimeout(() => document.getElementById("modalBox").classList.remove("scale-90"), 50);
                grecaptcha.reset();
                captchaVerified = false;
            })
            .finally(() => {
                submitBtn.disabled = false;
                submitBtn.classList.remove('is-loading');
            });
        });
    });
</script>
@endpush