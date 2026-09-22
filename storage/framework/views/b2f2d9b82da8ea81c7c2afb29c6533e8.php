<!-- ============================= -->
<!-- Proposal / Contact Form -->
<!-- ============================= -->
<section id="proposal-form" class="py-20 bg-gradient-to-r from-blue-600 to-teal-400">
  <div class="container mx-auto px-4">
    <div class="text-center mb-10" data-aos="fade-up">
      <h2 class="text-3xl sm:text-4xl font-extrabold text-white mb-4">Get Your Free Proposal</h2>
      <p class="text-gray-200 max-w-xl mx-auto text-lg">Fill out the form below and our team will contact you with a tailored proposal for your business needs.</p>
    </div>

    <form id="proposalForm" action="<?php echo e(route('proposals.store')); ?>" method="POST"
          class="max-w-3xl mx-auto bg-white rounded-2xl shadow-lg p-8 space-y-6" data-aos="fade-up" novalidate>
      <?php echo csrf_field(); ?>

      
      <div style="position:absolute;left:-9999px;top:-9999px;height:0;width:0;overflow:hidden;" aria-hidden="true">
        <label for="hp_website">Leave this field empty</label>
        <input type="text" name="hp_website" id="hp_website" tabindex="-1" autocomplete="off">
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Full Name *</label>
          <input type="text" name="fullName" id="fullName" placeholder="John Doe" required
            class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-teal-400 outline-none text-sm">
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Company / Organization *</label>
          <input type="text" name="company" id="company" placeholder="Example Corp" required
            class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-teal-400 outline-none text-sm">
        </div>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Website (optional)</label>
        <input type="url" name="website" placeholder="https://example.com"
          class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-teal-400 outline-none text-sm">
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Email Address *</label>
          <input type="email" name="email" id="email" placeholder="your@email.com" required
            class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-teal-400 outline-none text-sm">
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number *</label>
          <div class="flex">
            <select name="countryCode" class="flex-shrink-0 px-2 py-1 rounded-l-lg border border-gray-300 focus:ring-2 focus:ring-teal-400 outline-none text-sm bg-white">
                <option value="+92" selected>+92 Pak</option>
                <option value="+1">+1 USA/Can</option>
                <option value="+7">+7 Rus/Kaz</option>
                <option value="+20">+20 Egy</option>
                <option value="+27">+27 SAf</option>
                <option value="+30">+30 Gre</option>
                <option value="+31">+31 Neth</option>
                <option value="+32">+32 Bel</option>
                <option value="+33">+33 Fr</option>
                <option value="+34">+34 Sp</option>
                <option value="+36">+36 Hun</option>
                <option value="+39">+39 It</option>
                <option value="+40">+40 Rom</option>
                <option value="+41">+41 Swi</option>
                <option value="+43">+43 Aus</option>
                <option value="+44">+44 UK</option>
                <option value="+45">+45 Den</option>
                <option value="+46">+46 Swe</option>
                <option value="+47">+47 Nor</option>
                <option value="+48">+48 Pol</option>
                <option value="+49">+49 Ger</option>
                <option value="+52">+52 Mex</option>
                <option value="+53">+53 Cub</option>
                <option value="+54">+54 Arg</option>
                <option value="+55">+55 Bra</option>
                <option value="+56">+56 Chi</option>
                <option value="+57">+57 Col</option>
                <option value="+58">+58 Ven</option>
                <option value="+60">+60 Mal</option>
                <option value="+61">+61 Aus</option>
                <option value="+62">+62 Indo</option>
                <option value="+63">+63 Phil</option>
                <option value="+64">+64 NZ</option>
                <option value="+65">+65 Sin</option>
                <option value="+66">+66 Tha</option>
                <option value="+81">+81 Jap</option>
                <option value="+82">+82 SKor</option>
                <option value="+84">+84 Viet</option>
                <option value="+86">+86 Chi</option>
                <option value="+90">+90 Tur</option>
                <option value="+91">+91 Ind</option>
                <option value="+93">+93 Af</option>
                <option value="+94">+94 SL</option>
                <option value="+95">+95 My</option>
                <option value="+98">+98 Ir</option>
            </select>
            <input type="tel" name="phone" id="phone" placeholder="1234567890" required
              class="w-full px-4 py-2 rounded-r-lg border border-gray-300 focus:ring-2 focus:ring-teal-400 outline-none text-sm">
          </div>
        </div>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Estimated Monthly Budget *</label>
        <select name="budget" id="budget" required
          class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-teal-400 outline-none text-sm bg-white">
          <option value="" disabled selected>Select Your Budget</option>
          <option value="under-1k">Under $1,000</option>
          <option value="1k-5k">$1,000 - $5,000</option>
          <option value="5k-10k">$5,000 - $10,000</option>
          <option value="10k-plus">$10,000+</option>
        </select>
      </div>

      <div class="text-center">
        <label class="block text-sm font-semibold text-gray-700 mb-4 ml-2 text-left sm:text-center">Select Services *</label>
        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 justify-center text-sm text-gray-800 max-w-3xl mx-auto">
          <label class="flex items-center space-x-2">
            <input type="checkbox" name="services[]" value="Web Dev" class="accent-blue-600 service-cb">
            <span>Web Dev</span>
          </label>
          <label class="flex items-center space-x-2">
            <input type="checkbox" name="services[]" value="Software Dev" class="accent-blue-600 service-cb">
            <span>Software Dev</span>
          </label>
          <label class="flex items-center space-x-2">
            <input type="checkbox" name="services[]" value="Mobile Apps" class="accent-blue-600 service-cb">
            <span>Mobile Apps</span>
          </label>
          <label class="flex items-center space-x-2">
            <input type="checkbox" name="services[]" value="UI/UX" class="accent-blue-600 service-cb">
            <span>UI/UX</span>
          </label>
          <label class="flex items-center space-x-2">
            <input type="checkbox" name="services[]" value="Marketing" class="accent-blue-600 service-cb">
            <span>Marketing</span>
          </label>
          <label class="flex items-center space-x-2">
            <input type="checkbox" name="services[]" value="SEO" class="accent-blue-600 service-cb">
            <span>SEO</span>
          </label>
          <label class="flex items-center space-x-2">
            <input type="checkbox" name="services[]" value="PPC" class="accent-blue-600 service-cb">
            <span>PPC</span>
          </label>
          <label class="flex items-center space-x-2">
            <input type="checkbox" name="services[]" value="SMM" class="accent-blue-600 service-cb">
            <span>SMM</span>
          </label>
          <label class="flex items-center space-x-2">
            <input type="checkbox" name="services[]" value="Ecom" class="accent-blue-600 service-cb">
            <span>E-com</span>
          </label>
          <label class="flex items-center space-x-2">
            <input type="checkbox" name="services[]" value="Cloud" class="accent-blue-600 service-cb">
            <span>Cloud</span>
          </label>
          <label class="flex items-center space-x-2">
            <input type="checkbox" name="services[]" value="IT Consult" class="accent-blue-600 service-cb">
            <span>IT Consult</span>
          </label>
          <label class="flex items-center space-x-2">
            <input type="checkbox" id="otherServiceCheckbox" name="services[]" value="Other" class="accent-blue-600 service-cb">
            <span>Other</span>
          </label>
        </div>
        <input type="text" id="otherServiceInput" name="otherService" maxlength="50"
          placeholder="Specify other service"
          class="mt-4 w-full sm:w-1/2 px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-teal-400 outline-none text-sm hidden mx-auto">
        <p id="servicesError" class="hidden text-red-500 text-xs font-semibold mt-3">Please select at least one service.</p>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Additional Comments</label>
        <textarea name="comments" rows="3" placeholder="Tell us more about your project or goals"
          class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-teal-400 outline-none text-sm"></textarea>
      </div>

      
      <div>
        <div class="g-recaptcha" data-sitekey="<?php echo e(config('services.recaptcha.site_key')); ?>" data-callback="onProposalCaptchaVerified" data-expired-callback="onProposalCaptchaExpired"></div>
        <p id="captchaError" class="hidden text-red-500 text-xs font-semibold mt-2">Please confirm you're not a robot.</p>
      </div>

      <div class="flex items-center">
        <input type="checkbox" name="agreement" id="agreement" value="1" required class="mr-2">
        <label for="agreement" class="text-sm text-gray-700 select-none">I agree to the terms and conditions.</label>
      </div>

      <button type="submit" id="proposalSubmitBtn"
        class="w-full py-3 bg-gradient-to-r from-blue-600 to-teal-400 text-white font-semibold rounded-lg shadow-md hover:opacity-90 transition disabled:opacity-60 disabled:cursor-not-allowed">
        Send My FREE PROPOSAL
      </button>
      <p class="text-center text-gray-600 text-sm">In a hurry? Call us at: <span class="font-semibold">+44 7308 649119</span></p>
    </form>
  </div>
</section>

<!-- Modal -->
<div id="formModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 hidden z-50">
  <div class="bg-white rounded-xl max-w-sm w-full p-6 text-center relative shadow-lg">
    <button id="closeModal" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 text-2xl font-bold">&times;</button>
    <div id="modalContent" class="flex flex-col items-center space-y-4">
      <div id="successIcon" class="relative hidden">
        <svg class="w-16 h-16 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
        </svg>
      </div>
      <div id="errorIcon" class="relative hidden">
        <svg class="w-16 h-16 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </div>
      <p id="modalMessage" class="text-lg font-semibold text-gray-800"></p>
    </div>
  </div>
</div><?php /**PATH D:\Laravel\Aazz-Agency\resources\views/service_form/form.blade.php ENDPATH**/ ?>