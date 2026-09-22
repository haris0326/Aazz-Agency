<?php $__env->startSection('title', ucfirst($category->name) . ' Packages' . 
    (!empty($city?->name) ? ' in ' . ucfirst($city->name) . ' | Aazz Agency' : '')
); ?>
<?php $__env->startSection('content'); ?>

<?php $__env->startPush('custom_css'); ?>
<style>
    /* Custom Mouse Cursor */
    #custom-cursor { 
        width: 25px; height: 25px; border: 2px solid #2dd4bf; border-radius: 50%; 
        position: fixed; pointer-events: none; z-index: 9999; 
        transition: transform 0.15s ease-out, background 0.3s ease;
        mix-blend-mode: difference;
    }
    .cursor-hover { transform: scale(2.5); background: rgba(45, 212, 191, 0.2); border-color: transparent !important; }

    /* Glass & Glow Effects */
    .pricing-card-glow { transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1); }
    .pricing-card-glow:hover { 
        box-shadow: 0 0 50px rgba(59, 130, 246, 0.2); 
        transform: translateY(-10px);
        border-color: rgba(45, 212, 191, 0.4);
    }
    
    /* Responsive Tabs */
    .tab-link.active-tab { background: #2563eb; color: white; box-shadow: 0 10px 20px rgba(37, 99, 235, 0.2); }
    
    /* FAQ Animation */
    .faq-answer { max-height: 0; overflow: hidden; transition: max-height 0.4s ease-out, padding 0.3s ease; }
    .faq-answer.open { max-height: 500px; padding-top: 1.5rem; }
    .rotate-icon { transform: rotate(45deg); color: #ef4444 !important; }

    /* Modal Conflict Fix */
    .modal-backdrop.show { backdrop-filter: blur(12px); background: rgba(2, 6, 23, 0.85); }
    .glass-input {
        background: rgba(255, 255, 255, 0.05) !important;
        border: 1px solid rgba(255, 255, 255, 0.1) !important;
        color: white !important;
    }

    /* City Slider & Hide Scrollbar */
    .hide-scrollbar::-webkit-scrollbar { display: none; }
    .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; scroll-behavior: smooth; }
    
    /* Slider dragging state */
    .city-slider-container { cursor: grab; user-select: none; }
    .city-slider-container:active { cursor: grabbing; }

    /* Optimized Modal Glassmorphism */
    .modal-blur-bg {
        backdrop-filter: blur(8px);
        background: rgba(2, 6, 23, 0.8);
    }

    .glass-input {
        background: rgba(255, 255, 255, 0.03) !important;
        border: 1px solid rgba(255, 255, 255, 0.1) !important;
        color: white !important;
        transition: all 0.3s ease;
    }

    .glass-input:focus {
        background: rgba(255, 255, 255, 0.07) !important;
        border-color: #2dd4bf !important; /* Teal-400 */
        box-shadow: 0 0 15px rgba(45, 212, 191, 0.1);
    }

    /* Make modal scrollable on small phones but small on desktop */
    .custom-modal-content {
        max-height: 90vh;
        overflow-y: auto;
    }

    /* Small custom scrollbar for the form */
    .custom-modal-content::-webkit-scrollbar { width: 4px; }
    .custom-modal-content::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.1); border-radius: 10px; }

    @media (max-width: 640px) {
        .glass-input { font-size: 16px !important; } /* Prevents iOS zoom on focus */
    }

    /* Compact Scroll Area Styling */
.compact-scroll-area {
    scrollbar-width: thin;
    scrollbar-color: rgba(45, 212, 191, 0.2) transparent;
}

/* Custom Typography for Content Inside */
.custom-render h1, .custom-render h2 {
    font-size: 1.25rem !important; /* Font size chota kar diya */
    margin-top: 1rem !important;
    color: #f8fafc !important;
    font-weight: 700 !important;
}

.custom-render p {
    font-size: 0.9rem !important; /* Standard small text */
    line-height: 1.6 !important;
    margin-bottom: 0.8rem !important;
    color: #94a3b8 !important;
}

.custom-render li {
    font-size: 0.85rem !important;
    margin-bottom: 0.4rem !important;
}

/* Chrome/Safari Scrollbar */
#style-scroll::-webkit-scrollbar {
    width: 3px;
}
#style-scroll::-webkit-scrollbar-thumb {
    background: rgba(45, 212, 191, 0.3);
    border-radius: 10px;
}

</style>
<?php $__env->stopPush(); ?>

<div id="custom-cursor" class="hidden lg:block"></div>


<header class="relative bg-[#020617] pt-32 pb-24 overflow-hidden">
    <div class="absolute inset-0">
        <div class="absolute top-[-10%] left-[-5%] w-[500px] h-[500px] bg-blue-600/20 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-0 right-[-5%] w-[400px] h-[400px] bg-teal-400/10 rounded-full blur-[100px]"></div>
    </div>
    
    <div class="container mx-auto px-6 relative z-10 text-center">
        <h1 class="text-4xl md:text-7xl font-black text-white mb-6 tracking-tighter leading-tight">
            <?php echo e(ucwords($category->name)); ?> <span class="text-teal-400">Plans</span>
           <?php if(!empty($city?->name)): ?>
                <div class="text-2xl md:text-4xl text-blue-500 mt-2 italic">
                    in <?php echo e(ucfirst($city->name)); ?>

                </div>
            <?php endif; ?>
        </h1>
        <p class="max-w-2xl mx-auto text-slate-400 text-lg md:text-xl leading-relaxed opacity-90">
            <?php echo e($category->description); ?>

        </p>
    </div>
</header>


<section class="bg-[#020617] pb-32">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="pricing-card-glow group relative p-8 lg:p-10 rounded-[2.5rem] bg-white/5 border border-white/10 flex flex-col justify-between">
                <?php if($loop->iteration == 2): ?>
                    <span class="absolute -top-4 left-1/2 -translate-x-1/2 bg-gradient-to-r from-blue-600 to-teal-400 text-white px-6 py-1.5 rounded-full text-[10px] font-black tracking-widest uppercase shadow-xl">Recommended</span>
                <?php endif; ?>

                <div>
                    <div class="mb-8">
                        <h5 class="text-teal-400 font-black tracking-widest uppercase text-xs mb-2"><?php echo e($package->level); ?></h5>
                        <div class="flex items-baseline gap-1">
                            <span class="text-5xl font-black text-white">$<?php echo e(number_format($package->price, 0)); ?></span>
                            <span class="text-slate-500 text-sm">/total</span>
                        </div>
                        <h3 class="text-slate-300 font-bold mt-2 text-xl"><?php echo e($package->name ?? ''); ?></h3>
                    </div>

                    <ul class="space-y-4 mb-10">
                        <?php $__currentLoopData = $package->benefits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $benefit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="flex items-start gap-3 text-slate-400 text-sm leading-tight">
                            <i class="fas fa-check-circle text-teal-500 mt-1"></i>
                            <span><?php echo e($benefit->benefit_description ?? ''); ?></span>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>

               <button
                    type="button"
                    class="get-started-btn w-full py-5 bg-white/10 group-hover:bg-gradient-to-r group-hover:from-blue-600 group-hover:to-teal-400 text-white font-black rounded-2xl transition-all duration-300 border border-white/10 uppercase tracking-widest text-xs"
                    data-category-id="<?php echo e($category->id); ?>"
                    data-package-id="<?php echo e($package->id); ?>"
                    data-package-name="<?php echo e($package->level); ?>"
                >
                    Select This Plan
                </button>

            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>


<section class="py-12 bg-[#020617]">
    <div class="container mx-auto px-6">
        <div class="bg-white/5 border border-white/10 rounded-[2rem] overflow-hidden">
            <div class="flex flex-wrap lg:flex-nowrap">
                
                <div class="w-full lg:w-1/3 p-8 lg:p-10 border-b lg:border-b-0 lg:border-r border-white/10 bg-white/[0.02]">
                    <div class="inline-block px-3 py-1 rounded-full bg-teal-400/10 text-teal-400 text-[10px] font-bold uppercase tracking-widest mb-4">
                        Information
                    </div>
                    <h2 class="text-2xl md:text-3xl font-black text-white tracking-tight leading-tight">
                        <?php echo e(isset($content) && isset($content->title) ? ucwords($content->title) : "Details"); ?>

                    </h2>
                    <p class="text-slate-500 text-sm mt-4 leading-relaxed">
                        Complete overview and professional guidelines regarding this package.
                    </p>
                </div>

                <div class="w-full lg:w-2/3 p-6 md:p-10">
                    <div class="agency-content-container relative">
                        <div class="compact-scroll-area pr-4 overflow-y-auto max-h-[300px] hide-scrollbar" id="style-scroll">
                            <div class="prose prose-sm prose-invert max-w-none text-slate-400 custom-render">
                                <?php echo isset($content) && isset($content->pkg_content) ? $content->pkg_content : "No content available."; ?>

                            </div>
                        </div>
                        
                        <div class="absolute bottom-0 left-0 right-0 h-12 bg-gradient-to-t from-[#020617]/80 to-transparent pointer-events-none"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="py-24 bg-slate-50">
    <div class="container mx-auto px-6">
        <div class="max-w-5xl mx-auto bg-white rounded-[2.5rem] p-6 md:p-16 shadow-2xl border border-slate-100">
            <h2 class="text-3xl md:text-5xl font-black text-slate-900 mb-12 text-center tracking-tight">Execution Strategy</h2>
            
            <?php if($tabs->isNotEmpty()): ?>
            <div class="flex overflow-x-auto hide-scrollbar md:flex-wrap md:justify-center gap-3 mb-12 pb-4 md:pb-0">
                <?php $__currentLoopData = $tabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $tabContent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <button onclick="openTab(event, 'tab-<?php echo e($index); ?>')" 
                        class="tab-link flex-shrink-0 <?php echo e($index == 0 ? 'active-tab' : 'bg-slate-100 text-slate-600'); ?> px-8 py-3.5 rounded-2xl font-bold transition-all text-sm md:text-base">
                    <?php echo e(ucwords($tabContent->tab_title ?? '')); ?>

                </button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="tab-content-container">
                <?php $__currentLoopData = $tabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $tabContent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div id="tab-<?php echo e($index); ?>" class="tab-pane <?php echo e($index == 0 ? '' : 'hidden'); ?> animate-fade-in">
                    <div class="prose prose-lg prose-slate max-w-none text-slate-600 leading-relaxed">
                        <?php echo $tabContent->tab_content; ?>

                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>


<section class="py-24 bg-white">
    <div class="container mx-auto px-6 max-w-4xl">
        <h2 class="text-4xl font-black text-center text-slate-900 mb-16">Frequently Asked Questions</h2>
        <div class="space-y-4">
            <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="group border border-slate-200 rounded-[2rem] overflow-hidden transition-all hover:border-blue-500/50">
                <button onclick="toggleFaq(<?php echo e($index); ?>)" class="w-full flex items-center justify-between p-6 md:p-8 text-left bg-white">
                    <span class="text-lg font-bold text-slate-800"><?php echo e(ucwords($faq->question)); ?></span>
                    <i id="icon-<?php echo e($index); ?>" class="fas fa-plus text-blue-600 transition-all duration-300"></i>
                </button>
                <div id="faq-<?php echo e($index); ?>" class="faq-answer px-6 md:px-8 bg-slate-50/50">
                    <p class="text-slate-600 pb-8 leading-relaxed"><?php echo e($faq->answer); ?></p>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>


    <?php if($cities->isNotEmpty()): ?>
    <section class="py-24 bg-[#020617] overflow-hidden">
        <div class="container mx-auto px-6">

            <h2 class="text-2xl font-black text-white mb-12 flex items-center gap-6">
                Explore More Cities
                <span class="h-px flex-1 bg-white/10"></span>
            </h2>

            <div id="city-slider"
                class="city-slider-container flex overflow-x-auto hide-scrollbar gap-4 pb-10">

                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cityItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <a href="<?php echo e(route('show_pkg', [
                        'pkg_cat' => $category->slug,
                        'city' => $cityItem->slug
                    ])); ?>"
                    class="whitespace-nowrap px-8 py-5
                            bg-white/5 border border-white/10
                            rounded-2xl text-slate-300
                            hover:text-white
                            hover:border-teal-400
                            hover:bg-teal-400/10
                            transition-all text-sm font-bold shadow-lg
                            <?php echo e(isset($city) && $city?->id === $cityItem->id
                                ? 'border-teal-400 text-teal-400 bg-teal-400/10'
                                : ''); ?>">

                        <i class="fas fa-map-marker-alt text-teal-400 mr-2"></i>

                        <?php echo e(ucfirst($cityItem->name)); ?>


                    </a>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </section>
    <?php endif; ?>



<div id="getStartedModal" class="fixed inset-0 z-[9999] hidden items-center justify-center modal-blur-bg px-4 py-6">
    <div class="relative w-full max-w-2xl bg-[#0f172a] border border-white/10 rounded-[1.5rem] shadow-2xl flex flex-col custom-modal-content">
        
        <div class="sticky top-0 z-20 p-5 border-b border-white/5 bg-[#0f172a]/95 backdrop-blur-md flex justify-between items-center">
            <div>
                <h5 class="text-xl font-bold text-white tracking-tight">Start Your Project</h5>
                <p class="text-xs text-slate-400 mt-1">
                    Selected: <span id="pkg-name-display" class="text-teal-400 font-semibold"></span>
                </p>
            </div>
            <button id="closeModalBtn" class="h-10 w-10 flex items-center justify-center rounded-full hover:bg-white/5 text-slate-400 hover:text-white transition-all">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>

        <div class="p-6 md:p-8">
            <div id="successMessage" class="hidden mb-6 p-4 bg-teal-500/10 border border-teal-500/30 rounded-xl text-teal-400 text-sm text-center">
                <i class="fas fa-check-circle mr-2"></i> Inquiry sent! We'll contact you shortly.
            </div>

            <form id="getStartedForm" class="space-y-5">
                <?php echo csrf_field(); ?>
                
                <input type="hidden" name="pkg_category_id" id="pkg_category_id">
                <input type="hidden" name="pkg_id" id="pkg_id">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-[10px] font-black uppercase text-slate-500 mb-1.5 ml-1">Full Name *</label>
                            <input type="text" name="name" placeholder="John Doe" required class="glass-input w-full px-4 py-3 rounded-xl text-sm outline-none">
                        </div>
                        <div>
                            <label class="block text-[10px] font-black uppercase text-slate-500 mb-1.5 ml-1">Email Address *</label>
                            <input type="email" name="email" placeholder="john@agency.com" required class="glass-input w-full px-4 py-3 rounded-xl text-sm outline-none">
                        </div>
                        <div>
                            <label class="block text-[10px] font-black uppercase text-slate-500 mb-1.5 ml-1">Phone Number *</label>
                            <input type="text" name="phone_number" placeholder="+1..." required class="glass-input w-full px-4 py-3 rounded-xl text-sm outline-none">
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-[10px] font-black uppercase text-slate-500 mb-1.5 ml-1">Your Location</label>
                            <input type="text" name="location" placeholder="City, Country" class="glass-input w-full px-4 py-3 rounded-xl text-sm outline-none">
                        </div>
                        <div>
                            <label class="block text-[10px] font-black uppercase text-slate-500 mb-1.5 ml-1">Website (Optional)</label>
                            <input type="url" name="website" placeholder="https://..." class="glass-input w-full px-4 py-3 rounded-xl text-sm outline-none">
                        </div>
                        <div>
                            <label class="block text-[10px] font-black uppercase text-slate-500 mb-1.5 ml-1">Extra Details</label>
                            <textarea name="description" rows="1" class="glass-input w-full px-4 py-3 rounded-xl text-sm outline-none resize-none" placeholder="Briefly describe your needs..."></textarea>
                        </div>
                    </div>
                </div>

                <div class="pt-4">
                    <button id="submitBtn" type="submit" class="w-full py-4 bg-gradient-to-r from-blue-600 to-teal-500 hover:from-blue-500 hover:to-teal-400 text-white font-bold rounded-xl flex justify-center items-center gap-3 transition-all shadow-lg shadow-blue-900/20 uppercase text-xs tracking-widest">
                        <span id="submitText">Submit Inquiry Now</span>
                        <span id="submitLoader" class="hidden w-4 h-4 border-2 border-white/30 border-t-white rounded-full animate-spin"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('custom_js'); ?>
<script>
    // 1. Mouse Cursor
    const cursor = document.getElementById('custom-cursor');
    if (cursor) {
        document.addEventListener('mousemove', (e) => {
            requestAnimationFrame(() => {
                cursor.style.left = e.clientX + 'px';
                cursor.style.top = e.clientY + 'px';
            });
        });
        document.querySelectorAll('button, a, .group, .pricing-card-glow').forEach(el => {
            el.addEventListener('mouseenter', () => cursor.classList.add('cursor-hover'));
            el.addEventListener('mouseleave', () => cursor.classList.remove('cursor-hover'));
        });
    }

    // 2. City Slider Drag Logic (Fixes Slider)
    const slider = document.querySelector('#city-slider');
    let isDown = false;
    let startX;
    let scrollLeft;

    if (slider) {
        slider.addEventListener('mousedown', (e) => {
            isDown = true;
            startX = e.pageX - slider.offsetLeft;
            scrollLeft = slider.scrollLeft;
        });
        slider.addEventListener('mouseleave', () => { isDown = false; });
        slider.addEventListener('mouseup', () => { isDown = false; });
        slider.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - slider.offsetLeft;
            const walk = (x - startX) * 2;
            slider.scrollLeft = scrollLeft - walk;
        });
    }

    // 3. Tab Logic
    function openTab(evt, tabName) {
        document.querySelectorAll('.tab-pane').forEach(tab => tab.classList.add('hidden'));
        document.querySelectorAll('.tab-link').forEach(btn => {
            btn.classList.remove('active-tab');
            btn.classList.add('bg-slate-100', 'text-slate-600');
        });
        document.getElementById(tabName).classList.remove('hidden');
        evt.currentTarget.classList.add('active-tab');
        evt.currentTarget.classList.remove('bg-slate-100', 'text-slate-600');
    }

    // 4. FAQ Logic
    function toggleFaq(index) {
        const answer = document.getElementById(`faq-${index}`);
        const icon = document.getElementById(`icon-${index}`);
        const isOpen = answer.classList.contains('open');
        document.querySelectorAll('.faq-answer').forEach(el => el.classList.remove('open'));
        document.querySelectorAll('.fas.fa-plus').forEach(el => el.classList.remove('rotate-icon'));
        if(!isOpen) {
            answer.classList.add('open');
            icon.classList.add('rotate-icon');
        }
    }

    // 5. Modal & AJAX (Professional Bootstrap 5 Workflow)
    $(document).ready(function () {

    const $modal = $("#getStartedModal");

    $(".get-started-btn").on("click", function () {

        const categoryId = $(this).attr("data-category-id");
        const packageId = $(this).attr("data-package-id");
        const packageName = $(this).attr("data-package-name");

        // Reset normal form fields first
        resetFormUI();

        // IMPORTANT:
        // Set IDs AFTER form.reset()
        $("#pkg_category_id").val(categoryId);
        $("#pkg_id").val(packageId);

        $("#pkg-name-display").text(packageName || "Selected Package");

        console.log("Inquiry Package Data:", {
            categoryId: categoryId,
            packageId: packageId,
            packageName: packageName
        });

        $modal.removeClass("hidden").addClass("flex");
        $("body").addClass("overflow-hidden");
    });


    // 2️⃣ Close Modal
    $("#closeModalBtn").on("click", closeModal);
    $modal.on("click", function (e) {
        if (e.target === this) closeModal(); // click outside modal content
    });

    function closeModal() {
        $modal.addClass("hidden").removeClass("flex");
        $("body").removeClass("overflow-hidden");
    }

   function resetFormUI() {

        const form = $("#getStartedForm")[0];

        if (form) {
            form.reset();
        }

        // Never let resetFormUI() destroy package identity
        $("#pkg_category_id").val("");
        $("#pkg_id").val("");

        $("#getStartedForm").show();

        $("#successMessage")
            .addClass("hidden")
            .removeClass(
                "bg-red-500/20 border-red-500/50 text-red-300 " +
                "bg-teal-500/20 border-teal-500/50 text-teal-300"
            );

        $("#submitBtn").prop("disabled", false);

        $("#submitText").text("Submit Inquiry Now");

        $("#submitLoader").addClass("hidden");
    }


    // 4️⃣ AJAX Form Submission
    $("#getStartedForm").on("submit", function (e) {
        e.preventDefault();

        const $btn = $("#submitBtn");
        if ($btn.prop("disabled")) return;

        $btn.prop("disabled", true);
        $("#submitText").text("Processing...");
        $("#submitLoader").removeClass("hidden");

        $.ajax({
            url: "<?php echo e(route('pkg.form.submit')); ?>",
            type: "POST",
            data: $(this).serialize(),
            success: function (response) {
                $("#getStartedForm").fadeOut(300, function () {
                    $("#successMessage").removeClass("hidden").hide().fadeIn();
                });

                setTimeout(closeModal, 2500); // auto close modal after success
            },
            error: function (xhr) {
                let errorMsg = "Something went wrong!";
                if(xhr.responseJSON && xhr.responseJSON.message){
                    errorMsg = xhr.responseJSON.message;
                }
                $("#successMessage")
                    .removeClass("hidden bg-teal-500/20 border-teal-500/50 text-teal-300")
                    .addClass("bg-red-500/20 border-red-500/50 text-red-300")
                    .html('<i class="fas fa-times-circle mr-2"></i> ' + errorMsg)
                    .hide().fadeIn();

                $btn.prop("disabled", false);
                $("#submitText").text("Submit Inquiry Now");
                $("#submitLoader").addClass("hidden");
            }
        });
    });

});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make(config('web_assets.layouts.main'), array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Laravel\Aazz-Agency\resources\views/show_pkg.blade.php ENDPATH**/ ?>