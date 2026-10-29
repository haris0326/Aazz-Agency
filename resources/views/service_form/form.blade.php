<!-- Proposal / Contact Form -->
<section id="proposal-form" class="py-20 bg-gradient-to-r from-blue-600 to-teal-400">
  <div class="container mx-auto px-4">

    <div class="text-center mb-10" data-aos="fade-up">
      <h2 class="text-3xl sm:text-4xl font-extrabold text-white mb-4">
        Get Your Free Proposal
      </h2>
      <p class="text-gray-200 max-w-xl mx-auto text-lg">
        Share a few details about yourself and your project.
        We'll get back to you as soon as possible.
      </p>
    </div>

    <form
      id="proposalForm"
      action="{{ route('proposals.store') }}"
      method="POST"
      class="max-w-5xl mx-auto bg-[#0f172a] rounded-2xl shadow-xl p-5 sm:p-8 space-y-6"
      data-aos="fade-up"
      novalidate
    >
      @csrf

      <!-- Honeypot -->
      <div style="position:absolute;left:-9999px;top:-9999px;height:0;width:0;overflow:hidden;"
           aria-hidden="true">
        <label for="hp_website">Leave this field empty</label>
        <input type="text" name="hp_website" id="hp_website"
               tabindex="-1" autocomplete="off">
      </div>

      <!-- Name & Location -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <div>
          <label for="fullName"
                 class="block text-sm font-bold text-slate-400 mb-3">
            FULL NAME <span class="text-teal-400">*</span>
          </label>
          <input
            type="text"
            name="fullName"
            id="fullName"
            placeholder="John Doe"
            autocomplete="name"
            required
            class="w-full px-5 py-4 rounded-2xl border border-slate-700
                   bg-[#182133] text-white placeholder-slate-400
                   focus:border-teal-400 focus:ring-1 focus:ring-teal-400
                   outline-none transition"
          >
        </div>

        <div>
          <label for="location"
                 class="block text-sm font-bold text-slate-400 mb-3">
            YOUR LOCATION
          </label>
          <input
            type="text"
            name="location"
            id="location"
            placeholder="City, Country"
            autocomplete="country-name"
            class="w-full px-5 py-4 rounded-2xl border border-slate-700
                   bg-[#182133] text-white placeholder-slate-400
                   focus:border-teal-400 focus:ring-1 focus:ring-teal-400
                   outline-none transition"
          >
        </div>

        <!-- Email -->
        <div>
          <label for="email"
                 class="block text-sm font-bold text-slate-400 mb-3">
            EMAIL ADDRESS <span class="text-teal-400">*</span>
          </label>
          <input
            type="email"
            name="email"
            id="email"
            placeholder="john@example.com"
            autocomplete="email"
            required
            class="w-full px-5 py-4 rounded-2xl border border-slate-700
                   bg-[#182133] text-white placeholder-slate-400
                   focus:border-teal-400 focus:ring-1 focus:ring-teal-400
                   outline-none transition"
          >
        </div>

        <!-- Website -->
        <div>
          <label for="website"
                 class="block text-sm font-bold text-slate-400 mb-3">
            WEBSITE <span class="text-slate-500">(OPTIONAL)</span>
          </label>
          <input
            type="url"
            name="website"
            id="website"
            placeholder="https://example.com"
            autocomplete="url"
            class="w-full px-5 py-4 rounded-2xl border border-slate-700
                   bg-[#182133] text-white placeholder-slate-400
                   focus:border-teal-400 focus:ring-1 focus:ring-teal-400
                   outline-none transition"
          >
        </div>

        <!-- Phone -->
        <div>
          <label for="phone"
                 class="block text-sm font-bold text-slate-400 mb-3">
            PHONE NUMBER <span class="text-teal-400">*</span>
          </label>

          <div class="flex gap-2">
            <select
              name="countryCode"
              id="countryCode"
              aria-label="Country calling code"
              class="w-28 shrink-0 px-2 rounded-2xl border border-slate-700
                     bg-[#182133] text-white
                     focus:border-teal-400 outline-none"
            >
              <option value="+92" selected>+92 PK</option>
              <option value="+1">+1 USA</option>
              <option value="+44">+44 UK</option>
              <option value="+91">+91 IN</option>
              <option value="+971">+971 UAE</option>
              <option value="+61">+61 AU</option>
              <option value="+49">+49 DE</option>
              <option value="+966">+966 SA</option>
            </select>

            <input
              type="tel"
              name="phone"
              id="phone"
              placeholder="3001234567"
              autocomplete="tel-national"
              inputmode="tel"
              required
              class="w-full min-w-0 px-5 py-4 rounded-2xl border
                     border-slate-700 bg-[#182133] text-white
                     placeholder-slate-400 focus:border-teal-400
                     focus:ring-1 focus:ring-teal-400 outline-none transition"
            >
          </div>
        </div>

        <!-- Extra Details -->
        <div>
          <label for="comments"
                 class="block text-sm font-bold text-slate-400 mb-3">
            EXTRA DETAILS
          </label>
          <textarea
            name="comments"
            id="comments"
            rows="2"
            placeholder="Briefly describe your needs..."
            class="w-full px-5 py-4 rounded-2xl border border-slate-700
                   bg-[#182133] text-white placeholder-slate-400
                   focus:border-teal-400 focus:ring-1 focus:ring-teal-400
                   outline-none transition resize-y"
          ></textarea>
        </div>

      </div>

      <!-- Google reCAPTCHA -->
      <div class="pt-2">
        <div
          class="g-recaptcha"
          data-sitekey="{{ config('services.recaptcha.site_key') }}"
          data-callback="onProposalCaptchaVerified"
          data-expired-callback="onProposalCaptchaExpired">
        </div>

        <p id="captchaError"
          class="hidden text-red-500 text-sm font-semibold mt-2">
          Please confirm you're not a robot.
        </p>
      </div>

      <!-- Submit -->
      <div class="pt-2">
        <button
          type="submit"
          id="proposalSubmitBtn"
          class="w-full py-4 px-6 bg-gradient-to-r from-blue-600 to-teal-400
                 text-white font-bold rounded-xl shadow-lg
                 hover:opacity-90 active:scale-[0.99] transition
                 disabled:opacity-60 disabled:cursor-not-allowed"
        >
          Send My Inquiry
        </button>

        <p class="text-center text-slate-400 text-sm mt-4">
          Have questions?
          <a href="tel:+447308649119"
             class="text-teal-400 font-semibold hover:text-teal-300">
            Call us at +44 7308 649119
          </a>
        </p>
      </div>

    </form>
  </div>
</section>
