    @extends(config('web_assets.layouts.main'))

@section('title', $webPage->meta_title)
@section('description', strip_tags($webPage->description))

@section('content')

@push('custom_css')

<style>
    /* Neon Cursor Logic */
    @media (min-width: 1024px) {
        #custom-cursor {
            width: 25px; height: 25px;
            border: 2px solid #2dd4bf;
            border-radius: 50%;
            position: fixed;
            pointer-events: none;
            z-index: 9999;
            transition: transform 0.15s ease-out;
            box-shadow: 0 0 20px rgba(45, 212, 191, 0.6);
        }
    }
    /* Smooth Scroll and Text Glow */
    html { scroll-behavior: smooth; }
    .text-glow-premium { text-shadow: 0 0 40px rgba(59, 130, 246, 0.5); }
    
    /* Responsive Content Adjustments */
    @media (max-width: 768px) {
        .prose img { border-radius: 1.5rem !important; }
        .hero-title { font-size: 2.75rem !important; line-height: 1.1 !important; }
    }
</style>

@endpush

<div id="custom-cursor" class="hidden lg:block"></div>

<header class="relative min-h-[85vh] lg:min-h-[90vh] flex items-center overflow-hidden bg-[#020617] py-12 lg:py-20">
    <div class="absolute inset-0 z-0">
        <div class="absolute top-[-10%] left-[-5%] w-[300px] lg:w-[600px] h-[300px] lg:h-[600px] bg-blue-600/30 rounded-full blur-[80px] lg:blur-[120px] animate-pulse"></div>
        <div class="absolute bottom-[5%] right-[-5%] w-[250px] lg:w-[500px] h-[250px] lg:h-[500px] bg-teal-400/20 rounded-full blur-[80px] lg:blur-[100px]"></div>
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-10"></div>
    </div>

    <div class="container mx-auto px-5 lg:px-6 relative z-10">
        <div class="grid lg:grid-cols-2 gap-10 lg:gap-16 items-center">
            <div data-aos="fade-right" data-aos-duration="1000">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 lg:px-4 lg:py-2 rounded-full bg-white/5 border border-white/10 mb-6 backdrop-blur-md">
                    <span class="relative flex h-2 w-2 lg:h-3 lg:w-3">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-teal-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 lg:h-3 lg:w-3 bg-teal-500"></span>
                    </span>
                    <span class="text-[10px] lg:text-xs font-black uppercase tracking-[0.2em] text-slate-300">AAZZ Agency Premium</span>
                </div>

                <h1 class="hero-title text-5xl md:text-8xl font-black text-white mb-6 lg:mb-8 tracking-tighter text-glow-premium">
                    {{ $webPage->title }}<span class="text-teal-400">.</span>
                </h1>

                <div class="max-w-xl text-sm lg:text-xl text-slate-400 leading-relaxed mb-10 lg:mb-12 border-l-4 border-blue-500 pl-4 lg:pl-6">
                    {!! $webPage->description !!}
                </div>

                <div class="flex flex-col sm:flex-row gap-4 lg:gap-6">
                    <a href="#proposal-form" class="group px-8 py-4 lg:px-12 lg:py-6 bg-gradient-to-r from-blue-600 to-teal-400 text-white text-sm lg:text-base font-black rounded-2xl shadow-[0_20px_50px_rgba(8,112,184,0.3)] hover:scale-105 transition-all duration-500 flex items-center justify-center gap-3">
                        GET MY FREE PROPOSAL
                        <i class="fas fa-arrow-right group-hover:translate-x-2 transition-transform"></i>
                    </a>
                    <a href="#details" class="px-8 py-4 lg:px-12 lg:py-6 bg-slate-800/50 backdrop-blur-md border border-slate-700 text-white text-sm lg:text-base font-bold rounded-2xl hover:bg-slate-700 transition-all flex items-center justify-center">
                        SEE OUR WORK
                    </a>
                </div>
            </div>

            <div class="relative mt-8 lg:mt-0" data-aos="zoom-in" data-aos-delay="200">
                <div class="grid grid-cols-2 gap-4 lg:gap-6 relative z-10">
                    <div class="p-6 lg:p-10 bg-white/5 backdrop-blur-2xl border border-white/10 rounded-[2rem] lg:rounded-[3rem] hover:border-blue-500/50 transition-colors group">
                        <i class="fas fa-rocket text-2xl lg:text-4xl text-blue-500 mb-4 lg:mb-6 group-hover:animate-bounce"></i>
                        <div class="text-3xl lg:text-5xl font-black text-white mb-2">10X</div>
                        <div class="text-slate-500 text-[10px] lg:text-xs font-black uppercase tracking-widest">Growth Scale</div>
                    </div>
                    <div class="p-6 lg:p-10 bg-gradient-to-br from-blue-600/20 to-teal-400/20 backdrop-blur-2xl border border-white/10 rounded-[2rem] lg:rounded-[3rem] mt-6 lg:mt-12 group">
                        <i class="fas fa-shield-alt text-2xl lg:text-4xl text-teal-400 mb-4 lg:mb-6 group-hover:rotate-12 transition-transform"></i>
                        <div class="text-3xl lg:text-5xl font-black text-white mb-2">100%</div>
                        <div class="text-slate-500 text-[10px] lg:text-xs font-black uppercase tracking-widest">Secure Delivery</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<section id="details" class="py-16 lg:py-32 bg-[#f8fafc] relative overflow-hidden">
    <div class="container mx-auto px-5 lg:px-6">
        <div class="grid lg:grid-cols-12 gap-10 lg:gap-20">
            
            <aside class="lg:col-span-4" data-aos="fade-up">
                <div class="sticky top-24 space-y-6 lg:space-y-8">
                    <div class="p-8 lg:p-10 bg-white rounded-[2rem] lg:rounded-[3rem] shadow-xl border border-slate-100 relative overflow-hidden">
                        <h3 class="text-xl lg:text-3xl font-black text-slate-900 mb-6 lg:mb-8 tracking-tight">The AAZZ Edge</h3>
                        <ul class="space-y-4 lg:space-y-6">
                            @foreach([
                                ['icon' => 'fa-bolt', 'text' => 'Fastest Execution'],
                                ['icon' => 'fa-chart-pie', 'text' => 'Deep Analytics'],
                                ['icon' => 'fa-users', 'text' => 'Expert Mentors'],
                                ['icon' => 'fa-gem', 'text' => 'Premium Quality']
                            ] as $item)
                            <li class="flex items-center gap-4 lg:gap-5 text-sm lg:text-base text-slate-700 font-bold group">
                                <span class="flex-shrink-0 w-10 h-10 lg:w-12 lg:h-12 bg-slate-50 text-blue-600 rounded-xl lg:rounded-2xl flex items-center justify-center group-hover:bg-blue-600 group-hover:text-white transition-all">
                                    <i class="fas {{ $item['icon'] }}"></i>
                                </span>
                                {{ $item['text'] }}
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="bg-gradient-to-r from-blue-600 to-teal-500 p-1 rounded-[2rem] lg:rounded-[3rem]">
                        <div class="bg-white p-8 lg:p-10 rounded-[1.8rem] lg:rounded-[2.8rem] text-center">
                            <h4 class="font-black text-slate-900 mb-2">Need Help?</h4>
                            <a href="tel:+1234567" class="text-blue-600 font-black text-base lg:text-lg hover:underline decoration-teal-400">
                                Contact Experts
                            </a>
                        </div>
                    </div>
                </div>
            </aside>

            <div class="lg:col-span-8">
                <div class="bg-white p-6 lg:p-16 rounded-[2.5rem] lg:rounded-[4rem] shadow-sm border border-slate-100">
                    <article class="prose prose-sm lg:prose-2xl prose-slate max-w-none 
                        prose-headings:font-black prose-headings:tracking-tighter prose-headings:text-slate-900
                        prose-p:text-slate-600 prose-p:leading-relaxed" 
                        data-aos="fade-up">
                        {!! $webPage->content ?? $webPage->description !!}
                    </article>
                </div>
                
                <div class="mt-16 lg:mt-24">
                    <h3 class="text-2xl lg:text-4xl font-black text-slate-900 mb-10 lg:mb-16 text-center">How <span class="text-blue-600 underline decoration-teal-400 underline-offset-8">AAZZ</span> Delivers</h3>
                    <div class="grid md:grid-cols-3 gap-8 lg:gap-12">
                        @foreach([
                            ['i'=>1, 't'=>'Audit', 'c'=>'blue-600', 'd'=>'Finding hidden data opportunities.'],
                            ['i'=>2, 't'=>'Design', 'c'=>'teal-400', 'd'=>'Scalable growth blueprints.'],
                            ['i'=>3, 't'=>'Scale', 'c'=>'slate-900', 'd'=>'Execution and ROI optimization.']
                        ] as $step)
                        <div class="relative p-6 lg:p-8 bg-white rounded-3xl border border-slate-100 shadow-sm group">
                            <span class="absolute -top-4 left-6 w-10 h-10 bg-{{$step['c']}} text-white rounded-full flex items-center justify-center font-black shadow-lg">{{$step['i']}}</span>
                            <h4 class="text-lg lg:text-xl font-black text-slate-900 mb-2 mt-2">{{$step['t']}}</h4>
                            <p class="text-slate-500 text-xs lg:text-sm leading-relaxed">{{$step['d']}}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-16 lg:py-32 bg-white overflow-hidden">
    <div class="container mx-auto px-5 lg:px-6">
        <div class="relative bg-slate-950 rounded-[3rem] lg:rounded-[5rem] p-10 lg:p-32 text-center shadow-2xl">
            <div class="absolute -top-20 -left-20 w-64 lg:w-96 h-64 lg:h-96 bg-blue-600/20 rounded-full blur-[100px] animate-pulse"></div>
            
            <div class="relative z-10 max-w-4xl mx-auto">
                <i class="fas fa-crown text-teal-400 text-3xl lg:text-5xl mb-6"></i>
                <h2 class="text-3xl md:text-7xl font-black text-white mb-6 lg:mb-10 leading-tight">
                    Dominate with <span class="bg-gradient-to-r from-blue-400 to-teal-300 bg-clip-text text-transparent">AAZZ Agency.</span>
                </h2>
                
                <div class="flex flex-col items-center gap-8">
                    <a href="#proposal-form" class="w-full sm:w-auto px-10 py-5 lg:px-16 lg:py-8 bg-gradient-to-r from-blue-500 to-teal-400 text-white font-black rounded-2xl lg:rounded-[2rem] shadow-xl hover:scale-110 transition-all text-sm lg:text-xl uppercase tracking-widest">
                        Claim Your Call
                    </a>
                    <div class="flex items-center gap-4 lg:gap-6">
                        <div class="flex -space-x-3 lg:-space-x-4">
                            @foreach([1,2,3,4] as $i)
                            <img class="w-10 h-10 lg:w-12 lg:h-12 rounded-full border-2 lg:border-4 border-slate-900 shadow-lg" src="https://i.pravatar.cc/150?u={{$i}}">
                            @endforeach
                        </div>
                        <p class="text-slate-500 font-bold text-[10px] lg:text-sm uppercase tracking-wider underline decoration-teal-400">1,200+ CEOs</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection

@push('custom_js')

<script>
    const cursor = document.getElementById('custom-cursor');
    if(cursor) {
        document.addEventListener('mousemove', e => {
            cursor.style.left = e.clientX + 'px';
            cursor.style.top = e.clientY + 'px';
        });

        document.querySelectorAll('a, button, .group').forEach(link => {
            link.addEventListener('mouseenter', () => cursor.style.transform = 'scale(2)');
            link.addEventListener('mouseleave', () => cursor.style.transform = 'scale(1)');
        });
    }
</script>

@endpush