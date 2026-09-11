<section id="testimonials" class="py-24 lg:py-32 bg-[#fcfdfe] relative overflow-hidden">
    <div class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/4 w-96 h-96 bg-blue-50 rounded-full blur-3xl opacity-50"></div>
    <div class="absolute bottom-0 left-0 translate-y-1/2 -translate-x-1/4 w-72 h-72 bg-teal-50 rounded-full blur-3xl opacity-50"></div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-center">

            <div class="lg:col-span-5 space-y-8" data-aos="fade-right">
                <div>
                    <span class="inline-block px-4 py-1.5 mb-5 text-[11px] font-black tracking-[0.2em] uppercase bg-blue-600 text-white rounded-lg shadow-lg shadow-blue-200">
                        Success Stories
                    </span>
                    <h2 class="text-4xl md:text-6xl font-black text-slate-900 leading-[1.1] tracking-tighter">
                        What Our <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-teal-500">Partners</span> Say.
                    </h2>
                </div>
                
                <p class="text-slate-500 text-lg md:text-xl leading-relaxed max-w-md">
                    We don't just deliver services; we build legacies. Join 200+ companies scaling with AAZZ.
                </p>

                <div class="flex items-center gap-6 pt-4">
                    <div class="flex -space-x-3">
                        <?php $__currentLoopData = [1,2,3,4]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <img class="w-12 h-12 rounded-full border-4 border-white shadow-sm" src="https://i.pravatar.cc/150?u=a<?php echo e($i); ?>" alt="user">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div>
                        <div class="flex text-yellow-400 text-sm mb-1">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                        <p class="text-slate-900 font-black text-sm uppercase tracking-tighter">4.9/5 TrustScore</p>
                    </div>
                </div>

                <div class="hidden lg:flex items-center gap-4 mt-10">
                    <button id="prevTestimonial" class="w-14 h-14 rounded-2xl border border-slate-200 flex items-center justify-center text-slate-400 hover:bg-blue-600 hover:text-white hover:border-blue-600 transition-all duration-300 group">
                        <i class="fas fa-chevron-left group-hover:-translate-x-1 transition-transform"></i>
                    </button>
                    <button id="nextTestimonial" class="w-14 h-14 rounded-2xl border border-slate-200 flex items-center justify-center text-slate-400 hover:bg-blue-600 hover:text-white hover:border-blue-600 transition-all duration-300 group">
                        <i class="fas fa-chevron-right group-hover:translate-x-1 transition-transform"></i>
                    </button>
                </div>
            </div>

            <div class="lg:col-span-7 relative" data-aos="fade-left">
                <div class="absolute -top-10 -right-4 text-[12rem] text-slate-100 font-serif leading-none select-none z-0">“</div>

                <div class="relative overflow-hidden z-10 pb-10">
                    <div class="testimonial-track flex transition-transform duration-700 cubic-bezier(0.4, 0, 0.2, 1)">
                        <?php $__empty_1 = true; $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="testimonial-item min-w-full px-2">
                            <div class="bg-white border border-slate-100 rounded-[2.5rem] p-8 md:p-14 shadow-[0_20px_50px_rgba(0,0,0,0.03)] hover:shadow-[0_40px_80px_rgba(0,0,0,0.06)] transition-shadow duration-500">
                                <i class="fas fa-quote-left text-4xl text-blue-600/20 mb-8"></i>
                                
                                <p class="text-slate-700 text-xl md:text-2xl font-medium leading-[1.6] mb-10">
                                    "<?php echo e($review->review_text); ?>"
                                </p>

                                <div class="flex items-center gap-5 pt-8 border-t border-slate-50">
                                    <?php
                                        $image = $review->user_image 
                                            ? (filter_var($review->user_image, FILTER_VALIDATE_URL) ? $review->user_image : asset($review->user_image))
                                            : "https://ui-avatars.com/api/?name=".urlencode($review->user_name)."&background=0D8ABC&color=fff";
                                    ?>
                                    <img src="<?php echo e($image); ?>" alt="<?php echo e($review->user_name); ?>" class="w-16 h-16 rounded-2xl object-cover shadow-lg">
                                    <div>
                                        <h4 class="font-black text-slate-900 text-lg tracking-tight"><?php echo e($review->user_name); ?></h4>
                                        <p class="text-blue-600 font-bold text-xs uppercase tracking-[0.1em]">Verified Client</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="testimonial-item min-w-full px-2">
                            <div class="bg-white rounded-[2.5rem] p-14 shadow-sm border border-slate-100 text-center">
                                <p class="text-slate-400">Our success stories are loading...</p>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="flex lg:hidden justify-center gap-4 mt-6">
                    <button id="prevMob" class="p-4 bg-white shadow-md rounded-xl">‹</button>
                    <button id="nextMob" class="p-4 bg-white shadow-md rounded-xl">›</button>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->startPush('custom_js'); ?>
<script>
    const track = document.querySelector('.testimonial-track');
    const items = document.querySelectorAll('.testimonial-item');
    const nextBtn = document.querySelector('#nextTestimonial');
    const prevBtn = document.querySelector('#prevTestimonial');
    let index = 0;

    function updateSlider() {
        track.style.transform = `translateX(-${index * 100}%)`;
    }

    nextBtn.addEventListener('click', () => {
        index = (index + 1) % items.length;
        updateSlider();
    });

    prevBtn.addEventListener('click', () => {
        index = (index - 1 + items.length) % items.length;
        updateSlider();
    });

    // Auto-play (Optional)
    setInterval(() => {
        index = (index + 1) % items.length;
        updateSlider();
    }, 6000);
</script>
<?php $__env->stopPush(); ?><?php /**PATH D:\Laravel\Aazz-Agency\resources\views/show_reviews/reviews.blade.php ENDPATH**/ ?>