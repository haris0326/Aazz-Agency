@extends(config('web_assets.layouts.main'))

@section('title', 'Connect with Aazz Agency | Premium Digital Solutions')

@section('content')

@push('custom_css')
<style>
    /* Custom Mouse Cursor matching your theme */
    #custom-cursor { 
        width: 25px; height: 25px; border: 2px solid #2dd4bf; border-radius: 50%; 
        position: fixed; pointer-events: none; z-index: 9999; 
        transition: transform 0.15s ease-out, background 0.3s ease;
        mix-blend-mode: difference;
    }
    .cursor-hover { transform: scale(2.5); background: rgba(45, 212, 191, 0.2); border-color: transparent !important; }

    /* Animated Glow Backgrounds */
    .glow-blob {
        position: absolute;
        width: 500px; height: 500px;
        background: radial-gradient(circle, rgba(59, 130, 246, 0.15) 0%, transparent 70%);
        filter: blur(80px);
        z-index: 0;
        animation: float 10s infinite alternate;
    }

    @keyframes float {
        0% { transform: translate(0, 0); }
        100% { transform: translate(50px, 50px); }
    }

    /* Info Cards Styling */
    .contact-card {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(12px);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    .contact-card:hover {
        transform: translateY(-12px);
        border-color: rgba(45, 212, 191, 0.4);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        background: rgba(255, 255, 255, 0.05);
    }

    /* Social Icon Hover */
    .social-pill {
        transition: all 0.3s ease;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
    .social-pill:hover {
        background: #2dd4bf;
        color: #020617;
        transform: scale(1.05);
    }
</style>
@endpush

<div id="custom-cursor" class="hidden lg:block"></div>

{{-- Hero Section --}}
<section class="relative bg-[#020617] pt-40 pb-20 overflow-hidden">
    <div class="glow-blob top-[-10%] left-[-5%]"></div>
    <div class="glow-blob bottom-[-10%] right-[-5%] !bg-teal-400/10"></div>
    
    <div class="container mx-auto px-6 relative z-10 text-center">
        <span class="inline-block px-4 py-1.5 mb-6 text-xs font-black tracking-[0.3em] uppercase text-teal-400 bg-teal-400/10 rounded-full border border-teal-400/20" data-aos="fade-down">
            Get In Touch
        </span>
        <h1 class="text-5xl md:text-8xl font-black text-white mb-8 tracking-tighter leading-none" data-aos="fade-up">
            Let's Build Something <br> <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-teal-400">Legendary.</span>
        </h1>
        <p class="max-w-2xl mx-auto text-slate-400 text-lg md:text-xl leading-relaxed" data-aos="fade-up" data-aos-delay="100">
            No forms, no friction. Just direct access to our expert team. Whether it's a project inquiry or just a "Hello", we're here.
        </p>
    </div>
</section>

{{-- Main Information Section --}}
<section class="bg-[#020617] pb-32 relative">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <div class="contact-card p-10 rounded-[3rem] text-center group" data-aos="zoom-in" data-aos-delay="100">
                <div class="w-20 h-20 bg-blue-600/20 rounded-3xl flex items-center justify-center mx-auto mb-8 group-hover:rotate-[15deg] transition-transform">
                    <i class="fas fa-envelope-open-text text-3xl text-blue-400"></i>
                </div>
                <h3 class="text-white text-2xl font-bold mb-4">Email Us</h3>
                <p class="text-slate-500 mb-8 text-sm leading-relaxed">For project inquiries and collaborations.</p>
                <a href="mailto:aazz.agency.pk@gmail.com" class="text-xl font-black text-teal-400 hover:text-white transition-colors break-all">
                    aazz.agency.pk@gmail.com
                </a>
            </div>

            <div class="contact-card p-10 rounded-[3rem] text-center group border-teal-400/20 shadow-2xl shadow-teal-900/10" data-aos="zoom-in">
                <div class="w-20 h-20 bg-teal-400/20 rounded-3xl flex items-center justify-center mx-auto mb-8 group-hover:rotate-[-15deg] transition-transform">
                    <i class="fab fa-whatsapp text-4xl text-teal-400"></i>
                </div>
                <h3 class="text-white text-2xl font-bold mb-4">Direct Connect</h3>
                <p class="text-slate-500 mb-8 text-sm leading-relaxed">Quick support or strategy calls.</p>
                <a href="https://wa.me/923211441641" class="inline-block px-8 py-4 bg-teal-500 text-[#020617] font-black rounded-2xl hover:bg-white transition-all transform hover:scale-105 uppercase tracking-widest text-xs">
                    Start Conversation
                </a>
            </div>

            <div class="contact-card p-10 rounded-[3rem] text-center group" data-aos="zoom-in" data-aos-delay="200">
                <div class="w-20 h-20 bg-blue-600/20 rounded-3xl flex items-center justify-center mx-auto mb-8 group-hover:rotate-[15deg] transition-transform">
                    <i class="fas fa-map-marked-alt text-3xl text-blue-400"></i>
                </div>
                <h3 class="text-white text-2xl font-bold mb-4">Our Hub</h3>
                <p class="text-slate-500 mb-8 text-sm leading-relaxed">Operating from the heart of Pakistan.</p>
                <span class="text-xl font-black text-white">Lahore, Pakistan</span>
                <p class="text-teal-400 text-xs mt-2 uppercase tracking-widest font-bold">Global Service</p>
            </div>

        </div>
    </div>
</section>

{{-- Visual Experience Section (The "Impressive" Part) --}}
<section class="py-24 bg-white rounded-t-[5rem]">
    <div class="container mx-auto px-6">
        <div class="flex flex-col lg:flex-row items-center gap-16">
            <div class="w-full lg:w-1/2" data-aos="fade-right">
                <h2 class="text-4xl md:text-6xl font-black text-slate-900 mb-8 tracking-tight">Why Talk To Us?</h2>
                <div class="space-y-8">
                    <div class="flex gap-6">
                        <div class="shrink-0 w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-black">01</div>
                        <div>
                            <h4 class="text-xl font-bold text-slate-900 mb-2">Expert Strategy</h4>
                            <p class="text-slate-600 leading-relaxed">We don't just code; we architect business growth models tailored to your industry.</p>
                        </div>
                    </div>
                    <div class="flex gap-6">
                        <div class="shrink-0 w-12 h-12 rounded-full bg-teal-100 flex items-center justify-center text-teal-600 font-black">02</div>
                        <div>
                            <h4 class="text-xl font-bold text-slate-900 mb-2">Real-Time Updates</h4>
                            <p class="text-slate-600 leading-relaxed">Stay in the loop with our dedicated project managers via Slack or WhatsApp.</p>
                        </div>
                    </div>
                    <div class="flex gap-6">
                        <div class="shrink-0 w-12 h-12 rounded-full bg-purple-100 flex items-center justify-center text-purple-600 font-black">03</div>
                        <div>
                            <h4 class="text-xl font-bold text-slate-900 mb-2">Global Standards</h4>
                            <p class="text-slate-600 leading-relaxed">Delivering Silicon Valley quality with local passion and dedication.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="w-full lg:w-1/2 grid grid-cols-2 gap-6" data-aos="fade-left">
                <div class="p-10 bg-slate-50 rounded-[3rem] border border-slate-100">
                    <div class="text-5xl font-black text-blue-600 mb-2">99%</div>
                    <div class="text-slate-500 font-bold uppercase tracking-tighter text-xs">Client Satisfaction</div>
                </div>
                <div class="p-10 bg-[#020617] rounded-[3rem] border border-white/5">
                    <div class="text-5xl font-black text-teal-400 mb-2">24/7</div>
                    <div class="text-slate-400 font-bold uppercase tracking-tighter text-xs">Premium Support</div>
                </div>
                <div class="p-10 bg-[#020617] rounded-[3rem] border border-white/5">
                    <div class="text-5xl font-black text-white mb-2">150+</div>
                    <div class="text-slate-400 font-bold uppercase tracking-tighter text-xs">Projects Delivered</div>
                </div>
                <div class="p-10 bg-slate-50 rounded-[3rem] border border-slate-100">
                    <div class="text-5xl font-black text-slate-900 mb-2">5.0</div>
                    <div class="flex gap-1 text-orange-400 text-xs">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Social Footer Links --}}
<section class="py-20 bg-[#020617] text-center overflow-hidden">
    <div class="container mx-auto px-6 relative">
        <h3 class="text-white font-bold mb-10 opacity-50 uppercase tracking-[0.5em] text-xs">Follow the Journey</h3>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="#" class="social-pill px-8 py-4 rounded-full text-white font-bold text-sm flex items-center gap-3">
                <i class="fab fa-linkedin-in text-teal-400"></i> LinkedIn
            </a>
            <a href="#" class="social-pill px-8 py-4 rounded-full text-white font-bold text-sm flex items-center gap-3">
                <i class="fab fa-instagram text-pink-500"></i> Instagram
            </a>
            <a href="#" class="social-pill px-8 py-4 rounded-full text-white font-bold text-sm flex items-center gap-3">
                <i class="fab fa-x-twitter text-blue-400"></i> Twitter
            </a>
            <a href="#" class="social-pill px-8 py-4 rounded-full text-white font-bold text-sm flex items-center gap-3">
                <i class="fab fa-facebook-f text-blue-600"></i> Facebook
            </a>
        </div>
    </div>
</section>

@endsection

@push('custom_js')
<script>
    // Custom Cursor Interaction
    const cursor = document.getElementById('custom-cursor');
    if (cursor) {
        document.addEventListener('mousemove', (e) => {
            requestAnimationFrame(() => {
                cursor.style.left = e.clientX + 'px';
                cursor.style.top = e.clientY + 'px';
            });
        });
        document.querySelectorAll('button, a, .contact-card, .social-pill').forEach(el => {
            el.addEventListener('mouseenter', () => cursor.classList.add('cursor-hover'));
            el.addEventListener('mouseleave', () => cursor.classList.remove('cursor-hover'));
        });
    }
</script>
@endpush