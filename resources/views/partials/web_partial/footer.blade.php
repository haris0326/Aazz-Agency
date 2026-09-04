<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<footer class="relative bg-[#020617] text-slate-400 font-[Inter] overflow-hidden border-t border-slate-800/50">
    
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-600/5 rounded-full filter blur-[120px] -z-10 animate-pulse"></div>
    <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-emerald-600/5 rounded-full filter blur-[120px] -z-10 animate-pulse" style="animation-delay: 2s;"></div>

    <div class="max-w-7xl mx-auto px-6 pt-16 pb-12 border-b border-slate-800/60">
        <div class="flex flex-col lg:flex-row justify-between items-center gap-8">
            <div data-aos="fade-right">
                <h2 class="text-2xl md:text-3xl font-bold text-white mb-2">Ready to grow your business?</h2>
                <p class="text-slate-500">Subscribe to our newsletter for the latest tech updates.</p>
            </div>
            <div class="w-full lg:w-auto" data-aos="fade-left">
               <form id="subscribeForm" class="flex flex-col sm:flex-row gap-3">
                  <input type="email" required placeholder="Enter your email"
                      class="bg-slate-900 border border-slate-700 text-white px-6 py-3 rounded-xl focus:outline-none focus:border-emerald-500 transition-all min-w-[300px]">
                  <button type="submit"
                      class="bg-emerald-500 hover:bg-emerald-600 text-[#020617] font-bold px-8 py-3 rounded-xl transition-all hover:shadow-[0_0_20px_rgba(16,185,129,0.4)] active:scale-95">
                      Subscribe
                  </button>
              </form>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
            
            <div class="space-y-6" data-aos="fade-up">
                <img 
                    src="{{ $setting->footer_logo ? asset('storage/'.$setting->footer_logo) : asset('web_assets/images/web_logo/navbar_logo_1.png') }}" 
                    alt="{{ $setting->site_name ?? 'Aazz Agency' }}" 
                    class="h-12 w-auto brightness-0 invert opacity-90 hover:opacity-100 transition"
                >
                <p class="leading-relaxed text-sm md:text-base">
                    {{ $setting->footer_description ?? 'Empowering Digital Growth with Smart IT Solutions and innovative strategies. We build the future of digital experiences.' }}
                </p>
                <div class="space-y-2">
                    <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-emerald-500">Availability</span>
                    <p class="text-sm italic text-slate-500">
                        <i class="far fa-clock mr-2"></i>Mon–Sat: 09:00 AM – 06:00 PM
                    </p>
                </div>
            </div>

            <div class="lg:pl-8" data-aos="fade-up" data-aos-delay="100">
                <h3 class="text-white font-bold text-lg mb-8 relative">
                    Our Services
                    <span class="absolute -bottom-2 left-0 w-12 h-1 bg-gradient-to-r from-emerald-500 to-transparent rounded-full"></span>
                </h3>
                <ul class="space-y-4">
                    @forelse($servicesList->take(5) as $service)
                    <li>
                        <a href="{{ route('header_service.show', [$service->serviceCategory->cat_slug ?? '', $service->serviceSEO->meta_slug ?? '']) }}" 
                           class="group flex items-center hover:text-emerald-400 transition-all duration-300">
                            <i class="fas fa-chevron-right text-[10px] mr-3 text-emerald-500/50 group-hover:text-emerald-500 group-hover:translate-x-1 transition-all"></i>
                            {{ $service->title }}
                        </a>
                    </li>
                    @empty
                    <li class="text-slate-600 text-sm">No services listed</li>
                    @endforelse
                </ul>
            </div>

            <div data-aos="fade-up" data-aos-delay="200">
                <h3 class="text-white font-bold text-lg mb-8 relative">
                    Company
                    <span class="absolute -bottom-2 left-0 w-12 h-1 bg-gradient-to-r from-emerald-500 to-transparent rounded-full"></span>
                </h3>
                <ul class="space-y-4">
                    @forelse($webPages as $page)
                    <li>
                        <a href="{{ route('header_web_page.show', $page->slug) }}" 
                           class="group flex items-center hover:text-emerald-400 transition-all duration-300">
                            <i class="fas fa-link text-[10px] mr-3 text-emerald-500/50 group-hover:text-emerald-500 group-hover:rotate-45 transition-all"></i>
                            {{ $page->title }}
                        </a>
                    </li>
                    @empty
                    <li class="text-slate-600">No pages available</li>
                    @endforelse
                </ul>
            </div>

            <div data-aos="fade-up" data-aos-delay="300">
                <h3 class="text-white font-bold text-lg mb-8 relative">
                    Get In Touch
                    <span class="absolute -bottom-2 left-0 w-12 h-1 bg-gradient-to-r from-emerald-500 to-transparent rounded-full"></span>
                </h3>
                <div class="space-y-5 text-sm">
                    <div class="flex items-start space-x-4 group">
                        <div class="w-10 h-10 rounded-lg bg-slate-900 border border-slate-800 flex items-center justify-center shrink-0 group-hover:border-emerald-500/50 transition-colors">
                            <i class="fas fa-map-marked-alt text-emerald-500"></i>
                        </div>
                        <span class="text-slate-400 pt-2 group-hover:text-slate-200 transition">Lahore, Pakistan</span>
                    </div>
                    
                    <a href="tel:+923211441641" class="flex items-center space-x-4 group">
                        <div class="w-10 h-10 rounded-lg bg-slate-900 border border-slate-800 flex items-center justify-center shrink-0 group-hover:border-emerald-500/50 transition-colors">
                            <i class="fas fa-phone-volume text-emerald-500"></i>
                        </div>
                        <span class="text-slate-400 group-hover:text-slate-200 transition">+92 321 1441641</span>
                    </a>

                    <a href="mailto:aazz.agency.pk@gmail.com" class="flex items-center space-x-4 group">
                        <div class="w-10 h-10 rounded-lg bg-slate-900 border border-slate-800 flex items-center justify-center shrink-0 group-hover:border-emerald-500/50 transition-colors">
                            <i class="fas fa-envelope-open-text text-emerald-500"></i>
                        </div>
                        <span class="text-slate-400 group-hover:text-slate-200 transition break-all">aazz.agency.pk@gmail.com</span>
                    </a>
                </div>

                <div class="flex space-x-3 mt-10">
                    @php $socials = ['facebook', 'twitter', 'instagram', 'linkedin']; @endphp
                    @foreach($socials as $social)
                    <a href="#" class="w-10 h-10 rounded-xl bg-slate-900 border border-slate-800 flex items-center justify-center hover:bg-emerald-500 hover:text-[#020617] hover:-translate-y-2 transition-all duration-300">
                        <i class="fab fa-{{ $social }}"></i>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="mt-16 pt-8 border-t border-slate-800/60 flex flex-col md:flex-row justify-between items-center gap-6">
            <p class="text-sm text-slate-500">
                © {{ now()->year }} <span class="text-white font-semibold">Aazz Agency</span>. Crafted with <i class="fas fa-heart text-red-500 animate-pulse"></i> in Pakistan.
            </p>
            
            <div class="flex items-center space-x-8 text-sm">
                <a href="#" class="hover:text-emerald-400 transition-colors">Privacy Policy</a>
                <a href="#" class="hover:text-emerald-400 transition-colors">Terms of Service</a>
                <a href="#" class="hover:text-emerald-400 transition-colors">Cookies</a>
            </div>
        </div>
    </div>
</footer>

<script>
document.getElementById('subscribeForm').addEventListener('submit', function (e) {
    e.preventDefault(); // stop page reload

    alert('Thanks for subscribing! 🎉');

    this.reset(); // optional: clear email field
});
</script>