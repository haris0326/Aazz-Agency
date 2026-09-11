


<?php $__env->startSection('title', ($blog->seo->meta_title ?? $blog->title) . ' | ' . config('app.name', 'Aazz Agency')); ?>
<?php $__env->startSection('description', \Illuminate\Support\Str::limit(strip_tags($blog->seo->meta_description ?? $blog->excerpt ?? strip_tags($blog->content)), 160)); ?>
<?php $__env->startSection('canonical_url', $blog->seo->canonical_url ?? route('blog.show', $blog->slug)); ?>
<?php $__env->startSection('og_image', $blog->seo->og_image ?? ($blog->featured_image ? asset($blog->featured_image) : asset('web_assets/images/default-og.png'))); ?>
<?php $__env->startSection('og_type', 'article'); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startPush('custom_css'); ?>
<style>
    /* Reading progress bar */
    #reading-progress {
        position: fixed; top: 0; left: 0; height: 3px; width: 0%;
        background: linear-gradient(90deg, #2563eb, #2dd4bf);
        z-index: 9999; transition: width 0.1s ease-out;
    }

    /* Glow blobs matching site hero style */
    .blog-glow-blob {
        position: absolute; width: 500px; height: 500px;
        background: radial-gradient(circle, rgba(59,130,246,0.15) 0%, transparent 70%);
        filter: blur(80px); z-index: 0; pointer-events: none;
    }

    /* Article typography */
    .blog-content { color: #334155; font-size: 1.05rem; line-height: 1.85; }
    .blog-content h2 {
        font-size: 1.65rem; font-weight: 800; color: #0f172a;
        margin-top: 2.5rem; margin-bottom: 1rem; scroll-margin-top: 100px;
    }
    .blog-content h3 {
        font-size: 1.3rem; font-weight: 700; color: #0f172a;
        margin-top: 2rem; margin-bottom: 0.85rem; scroll-margin-top: 100px;
    }
    .blog-content p { margin-bottom: 1.25rem; }
    .blog-content a { color: #2563eb; text-decoration: underline; text-underline-offset: 3px; }
    .blog-content a:hover { color: #2dd4bf; }
    .blog-content ul, .blog-content ol { margin: 1.25rem 0 1.25rem 1.5rem; }
    .blog-content li { margin-bottom: 0.5rem; }
    .blog-content ul { list-style: disc; }
    .blog-content ol { list-style: decimal; }
    .blog-content img { border-radius: 1.25rem; margin: 1.75rem 0; box-shadow: 0 20px 40px rgba(15,23,42,0.12); }
    .blog-content blockquote {
        border-left: 4px solid #2dd4bf; background: #f0fdfa; padding: 1.25rem 1.5rem;
        border-radius: 0 1rem 1rem 0; margin: 1.75rem 0; font-style: italic; color: #0f172a;
    }
    .blog-content code {
        background: #f1f5f9; color: #db2777; padding: 0.2rem 0.4rem; border-radius: 0.4rem; font-size: 0.9em;
    }
    .blog-content pre {
        background: #0f172a; color: #e2e8f0; padding: 1.25rem; border-radius: 1rem;
        overflow-x: auto; margin: 1.75rem 0;
    }
    .blog-content pre code { background: transparent; color: inherit; padding: 0; }

    /* TOC active link */
    #toc-list a.toc-active { color: #0f172a; font-weight: 700; border-color: #2dd4bf; }
    #toc-list a { transition: all 0.2s ease; }

    /* Reveal-on-scroll (lightweight, no external lib) */
    .reveal-up { opacity: 0; transform: translateY(24px); transition: opacity 0.6s ease, transform 0.6s ease; }
    .reveal-up.revealed { opacity: 1; transform: translateY(0); }

    .related-card:hover img { transform: scale(1.06); }

    /* Comment character counter */
    #commentCharCount.limit-near { color: #d97706; }
    #commentCharCount.limit-over { color: #dc2626; font-weight: 700; }


    /* ==========================================
       PREMIUM BLOG HERO IMAGE
    ========================================== */

    .blog-hero-image-wrap {
        position: relative;
        isolation: isolate;
    }

    .blog-hero-image-wrap::before {
        content: "";
        position: absolute;
        inset: 8% -5% -8% 5%;
        background: linear-gradient(
            135deg,
            rgba(37, 99, 235, 0.35),
            rgba(45, 212, 191, 0.25)
        );
        filter: blur(45px);
        border-radius: 3rem;
        z-index: -2;
    }

    .blog-hero-image-wrap::after {
        content: "";
        position: absolute;
        inset: 0;
        border-radius: 1.75rem;
        padding: 1px;
        background: linear-gradient(
            135deg,
            rgba(255,255,255,.18),
            rgba(45,212,191,.22),
            rgba(37,99,235,.18),
            rgba(255,255,255,.06)
        );
        -webkit-mask:
            linear-gradient(#fff 0 0) content-box,
            linear-gradient(#fff 0 0);
        -webkit-mask-composite: xor;
        mask-composite: exclude;
        pointer-events: none;
        z-index: 3;
    }

    .blog-hero-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        display: block;
        transition: transform .7s cubic-bezier(.2,.8,.2,1);
    }

    .blog-hero-image-container {
        overflow: hidden;
        border-radius: 1.75rem;
        background: #0f172a;
        box-shadow:
            0 30px 80px rgba(0,0,0,.35),
            0 10px 30px rgba(15,23,42,.25);
    }

    .blog-hero-image-container:hover .blog-hero-image {
        transform: scale(1.025);
    }

    @media (max-width: 1023px) {
        .blog-hero-image-container {
            border-radius: 1.5rem;
        }

        .blog-hero-image-wrap::before {
            inset: 5% 0 -5% 0;
            filter: blur(35px);
        }
    }

    @media (max-width: 640px) {
        .blog-hero-image-container {
            border-radius: 1.25rem;
        }

        .blog-hero-image {
            height: 260px !important;
        }
    }

</style>
<?php $__env->stopPush(); ?>

<div id="reading-progress"></div>




<header class="relative bg-[#020617] pt-28 md:pt-32 pb-16 md:pb-20 overflow-hidden">

    
    <div class="blog-glow-blob top-[-15%] left-[-8%]"></div>
    <div class="blog-glow-blob bottom-[-20%] right-[-8%] !bg-teal-400/10"></div>

    
    <div class="absolute inset-0 pointer-events-none"
         style="background:
            radial-gradient(circle at 15% 30%, rgba(37,99,235,.10), transparent 35%),
            radial-gradient(circle at 85% 70%, rgba(45,212,191,.08), transparent 35%);">
    </div>

    <div class="container mx-auto px-6 relative z-10">

        
        <nav class="flex items-center justify-center lg:justify-start gap-2
                    text-xs text-slate-400 mb-6 font-medium"
             aria-label="Breadcrumb">

            <a href="<?php echo e(route('home')); ?>"
               class="hover:text-teal-400 transition-colors">
                Home
            </a>

            <span class="opacity-40">/</span>

            <span class="text-slate-500">Blog</span>

            <?php if($blog->category): ?>
                <span class="opacity-40">/</span>
                <span class="text-teal-400">
                    <?php echo e($blog->category->name); ?>

                </span>
            <?php endif; ?>
        </nav>

        
        <div class="max-w-7xl mx-auto grid lg:grid-cols-12 gap-10 lg:gap-14 items-center">

            
            
            
            <div class="lg:col-span-7 text-center lg:text-left">

                
                <?php if($blog->category): ?>
                    <span class="inline-flex items-center px-4 py-1.5 mb-6
                                 text-[10px] md:text-xs font-black
                                 tracking-[0.22em] uppercase
                                 text-teal-400 bg-teal-400/10
                                 rounded-full border border-teal-400/20">

                        <span class="w-1.5 h-1.5 rounded-full bg-teal-400 mr-2"></span>

                        <?php echo e($blog->category->name); ?>

                    </span>
                <?php endif; ?>

                
                <h1 class="text-3xl sm:text-4xl md:text-5xl xl:text-[4.2rem]
                           font-black text-white
                           mb-6 tracking-tight leading-[1.05]">

                    <?php echo e($blog->title); ?>


                </h1>

                
                <?php if($blog->excerpt): ?>
                    <p class="text-slate-400 text-base md:text-lg
                              leading-relaxed max-w-2xl
                              mx-auto lg:mx-0 mb-8">

                        <?php echo e($blog->excerpt); ?>


                    </p>
                <?php endif; ?>

                
                <div class="flex flex-wrap items-center
                            justify-center lg:justify-start
                            gap-x-6 gap-y-4
                            text-slate-400 text-sm">

                    
                    <div class="flex items-center gap-3">

                        <div class="w-9 h-9 rounded-full
                                    bg-gradient-to-br from-blue-600 to-teal-400
                                    flex items-center justify-center
                                    text-white font-bold text-xs uppercase
                                    shrink-0">

                            <?php echo e(\Illuminate\Support\Str::substr($blog->author->name ?? 'A', 0, 1)); ?>


                        </div>

                        <span class="text-slate-300 font-semibold">
                            <?php echo e($blog->author->name ?? 'Aazz Agency'); ?>

                        </span>

                    </div>

                    
                    <div class="flex items-center gap-2">
                        <i class="far fa-calendar text-teal-400"></i>
                        <span>
                            <?php echo e(($blog->published_at ?? $blog->created_at)?->format('F j, Y')); ?>

                        </span>
                    </div>

                    
                    <div class="flex items-center gap-2">
                        <i class="far fa-clock text-teal-400"></i>
                        <span><?php echo e($readTime); ?> min read</span>
                    </div>

                    
                    <div class="flex items-center gap-2">
                        <i class="far fa-eye text-teal-400"></i>
                        <span><?php echo e(number_format($blog->views)); ?> views</span>
                    </div>

                </div>
            </div>


            
            
            
            <?php if($blog->featured_image): ?>

                <div class="lg:col-span-5 blog-hero-image-wrap">

                    <div class="blog-hero-image-container
                                relative aspect-[16/11]
                                lg:aspect-[4/3]">

                        <img
                            src="<?php echo e(asset($blog->featured_image)); ?>"
                            alt="<?php echo e($blog->title); ?>"
                            class="blog-hero-image"
                            loading="eager"
                            fetchpriority="high"
                        >

                        
                        <div class="absolute inset-x-0 bottom-0 h-1/3
                                    bg-gradient-to-t from-black/35 to-transparent
                                    pointer-events-none">
                        </div>

                        
                        <div class="absolute bottom-5 left-5
                                    px-3 py-1.5
                                    rounded-full
                                    bg-black/40 backdrop-blur-md
                                    border border-white/10
                                    text-white/80
                                    text-[10px] font-bold
                                    uppercase tracking-widest">

                            <?php echo e($blog->category->name ?? 'Featured Article'); ?>


                        </div>

                    </div>

                </div>

            <?php endif; ?>

        </div>
    </div>
</header>





<section class="bg-white pt-16 pb-24">
    <div class="container mx-auto px-6">
        <div class="max-w-6xl mx-auto flex flex-col lg:flex-row gap-12">

            
            <article class="w-full lg:w-8/12">

                
                <div id="toc-mobile-wrap" class="lg:hidden mb-8 hidden">
                    <details class="bg-slate-50 border border-slate-200 rounded-2xl p-5">
                        <summary class="font-bold text-slate-900 cursor-pointer flex items-center gap-2">
                            <i class="fas fa-list-ul text-teal-500"></i> Table of Contents
                        </summary>
                        <ul id="toc-list-mobile" class="mt-4 space-y-2 text-sm"></ul>
                    </details>
                </div>

                <div id="blog-content" class="blog-content">
                    <?php echo $blog->content; ?>

                </div>

                
                <?php if(!empty($blog->tags)): ?>
                <div class="mt-12 pt-8 border-t border-slate-100 flex flex-wrap items-center gap-3">
                    <span class="text-xs font-black uppercase tracking-widest text-slate-400 mr-1">Tags</span>
                    <?php $__currentLoopData = $blog->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="px-4 py-1.5 bg-slate-100 text-slate-600 text-xs font-semibold rounded-full">
                            #<?php echo e($tag); ?>

                        </span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endif; ?>

                
                <div class="mt-8 flex flex-wrap items-center gap-3">
                    <span class="text-xs font-black uppercase tracking-widest text-slate-400 mr-1">Share</span>
                    <?php $shareUrl = urlencode(route('blog.show', $blog->slug)); ?>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e($shareUrl); ?>" target="_blank" rel="noopener"
                       class="w-9 h-9 flex items-center justify-center rounded-full bg-slate-100 text-slate-600 hover:bg-blue-600 hover:text-white transition-colors">
                        <i class="fab fa-facebook-f text-sm"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url=<?php echo e($shareUrl); ?>&text=<?php echo e(urlencode($blog->title)); ?>" target="_blank" rel="noopener"
                       class="w-9 h-9 flex items-center justify-center rounded-full bg-slate-100 text-slate-600 hover:bg-black hover:text-white transition-colors">
                        <i class="fab fa-x-twitter text-sm"></i>
                    </a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo e($shareUrl); ?>" target="_blank" rel="noopener"
                       class="w-9 h-9 flex items-center justify-center rounded-full bg-slate-100 text-slate-600 hover:bg-blue-700 hover:text-white transition-colors">
                        <i class="fab fa-linkedin-in text-sm"></i>
                    </a>
                    <button type="button" id="copyLinkBtn" data-url="<?php echo e(route('blog.show', $blog->slug)); ?>"
                       class="w-9 h-9 flex items-center justify-center rounded-full bg-slate-100 text-slate-600 hover:bg-teal-500 hover:text-white transition-colors">
                        <i class="fas fa-link text-sm"></i>
                    </button>
                </div>

                
                <div class="mt-12 p-6 md:p-8 bg-slate-50 rounded-[2rem] border border-slate-100 flex items-center gap-5 reveal-up">
                    <div class="w-16 h-16 shrink-0 rounded-2xl bg-gradient-to-br from-blue-600 to-teal-400 flex items-center justify-center text-white font-black text-xl uppercase">
                        <?php echo e(\Illuminate\Support\Str::substr($blog->author->name ?? 'A', 0, 1)); ?>

                    </div>
                    <div>
                        <p class="text-xs font-black uppercase tracking-widest text-teal-500 mb-1">Written by</p>
                        <h4 class="text-lg font-bold text-slate-900"><?php echo e($blog->author->name ?? 'Aazz Agency Team'); ?></h4>
                        <p class="text-slate-500 text-sm mt-1">Sharing insights on digital growth, technology and strategy.</p>
                    </div>
                </div>

                
                
                
                <div class="mt-16 pt-12 border-t border-slate-100">
                    <h3 class="text-2xl font-black text-slate-900 mb-8 flex items-center gap-3">
                        <i class="far fa-comments text-teal-500"></i>
                        Comments <span id="commentCount" class="text-slate-400 font-semibold text-lg">(<?php echo e($comments->count()); ?>)</span>
                    </h3>

                    
                    <div id="commentsList" class="space-y-6 mb-10">
                        <?php $__empty_1 = true; $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="flex gap-4 p-5 bg-slate-50 rounded-2xl border border-slate-100">
                                <div class="w-11 h-11 shrink-0 rounded-full bg-gradient-to-br from-blue-600 to-teal-400 flex items-center justify-center text-white font-bold text-sm uppercase">
                                    <?php echo e(\Illuminate\Support\Str::substr($c->name, 0, 1)); ?>

                                </div>
                                <div class="min-w-0">
                                    <div class="flex items-center gap-3 mb-1">
                                        <p class="font-bold text-slate-900"><?php echo e($c->name); ?></p>
                                        <span class="text-xs text-slate-400"><?php echo e($c->created_at->format('M j, Y')); ?></span>
                                    </div>
                                    <p class="text-slate-600 text-sm leading-relaxed whitespace-pre-line"><?php echo e($c->message); ?></p>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div id="commentsEmptyState" class="text-center py-10 bg-slate-50 rounded-2xl border border-dashed border-slate-200">
                                <i class="far fa-comment-dots text-3xl text-slate-300 mb-3"></i>
                                <p class="text-slate-400 text-sm">No comments yet — be the first to share your thoughts!</p>
                            </div>
                        <?php endif; ?>
                    </div>

                    
                    <div class="bg-slate-50 rounded-[2rem] p-6 md:p-8 border border-slate-100">
                        <h4 class="text-lg font-bold text-slate-900 mb-1">Leave a Comment</h4>
                        <p class="text-slate-500 text-sm mb-6">
                            Your comment will be reviewed before it appears publicly. Required fields are marked *
                        </p>

                        <div id="commentSuccess" class="hidden mb-5 p-4 bg-teal-50 border border-teal-200 rounded-xl text-teal-700 text-sm">
                            <i class="fas fa-check-circle mr-2"></i>
                            <span id="commentSuccessText">Thanks! Your comment has been submitted and is awaiting approval.</span>
                        </div>

                        <div id="commentGeneralError" class="hidden mb-5 p-4 bg-red-50 border border-red-200 rounded-xl text-red-700 text-sm">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            <span id="commentGeneralErrorText">Something went wrong. Please try again.</span>
                        </div>

                        <form id="blogCommentForm" novalidate
                              action="<?php echo e(route('blog.comments.store', $blog->id)); ?>"
                              method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="blog_id" value="<?php echo e($blog->id); ?>">

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                                <div>
                                    <label class="block text-[11px] font-black uppercase text-slate-500 mb-1.5">Name *</label>
                                    <input type="text" name="name" required minlength="2" maxlength="100"
                                        placeholder="Your full name"
                                        class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white text-sm outline-none focus:border-teal-400 focus:ring-2 focus:ring-teal-400/20 transition">
                                    <p class="comment-error hidden text-red-500 text-xs mt-1.5" data-for="name">Please enter your name (min 2 characters).</p>
                                </div>
                                <div>
                                    <label class="block text-[11px] font-black uppercase text-slate-500 mb-1.5">Email *</label>
                                    <input type="email" name="email" required
                                        pattern="^[a-zA-Z0-9._%+-]+@(gmail|hotmail|yahoo)\.com$"
                                        placeholder="you@gmail.com"
                                        class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white text-sm outline-none focus:border-teal-400 focus:ring-2 focus:ring-teal-400/20 transition">
                                    <p class="comment-error hidden text-red-500 text-xs mt-1.5" data-for="email">
                                        Only Gmail, Hotmail or Yahoo addresses are accepted (e.g. name@gmail.com).
                                    </p>
                                </div>
                            </div>

                            <div class="mb-2">
                                <label class="block text-[11px] font-black uppercase text-slate-500 mb-1.5">Comment *</label>
                                <textarea name="message" rows="4" required minlength="5" maxlength="3000"
                                    placeholder="Share your thoughts... (links/website URLs are not allowed)"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white text-sm outline-none resize-none focus:border-teal-400 focus:ring-2 focus:ring-teal-400/20 transition"></textarea>
                                <p class="comment-error hidden text-red-500 text-xs mt-1.5" data-for="message">Comment must be between 5 and 3000 characters, and cannot contain links or website URLs.</p>
                            </div>
                            <p class="text-xs text-slate-400 mb-5 text-right">
                                <span id="commentCharCount">0</span> / 3000
                            </p>

                            <button type="submit" id="commentSubmitBtn"
                                class="inline-flex items-center gap-2 px-7 py-3.5 bg-gradient-to-r from-blue-600 to-teal-500 hover:from-blue-500 hover:to-teal-400 text-white font-bold rounded-xl transition-all shadow-lg shadow-blue-900/10 uppercase text-xs tracking-widest">
                                <span id="commentSubmitText">Post Comment</span>
                                <span id="commentSubmitLoader" class="hidden w-4 h-4 border-2 border-white/30 border-t-white rounded-full animate-spin"></span>
                            </button>
                        </form>
                    </div>
                </div>
            </article>

            
            <aside class="w-full lg:w-4/12">
                <div class="lg:sticky lg:top-28 space-y-6">

                    
                    <div id="toc-card" class="hidden bg-slate-50 border border-slate-100 rounded-[1.75rem] p-6">
                        <h4 class="text-sm font-black uppercase tracking-widest text-slate-900 mb-4 flex items-center gap-2">
                            <i class="fas fa-list-ul text-teal-500"></i> On this page
                        </h4>
                        <ul id="toc-list" class="space-y-1 text-sm"></ul>
                    </div>

                    
                    <?php if($relatedBlogs->isNotEmpty()): ?>
                    <div class="bg-[#020617] rounded-[1.75rem] p-6 overflow-hidden relative">
                        <div class="absolute -top-10 -right-10 w-32 h-32 bg-teal-400/10 rounded-full blur-2xl"></div>
                        <h4 class="text-sm font-black uppercase tracking-widest text-teal-400 mb-5 flex items-center gap-2 relative z-10">
                            <i class="fas fa-layer-group"></i>
                            <?php echo e($blog->category->name ?? 'Related'); ?> Posts
                        </h4>
                        <div class="space-y-4 relative z-10">
                            <?php $__currentLoopData = $relatedBlogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(route('blog.show', $related->slug)); ?>" class="flex items-center gap-3 group">
                                    <div class="w-16 h-16 shrink-0 rounded-xl overflow-hidden bg-white/5">
                                        <?php if($related->featured_image): ?>
                                            <img src="<?php echo e(asset($related->featured_image)); ?>" alt="<?php echo e($related->title); ?>"
                                                 loading="lazy" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                        <?php else: ?>
                                            <div class="w-full h-full flex items-center justify-center text-teal-400/40">
                                                <i class="far fa-image"></i>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="min-w-0">
                                        <p class="text-white text-sm font-semibold leading-snug line-clamp-2 group-hover:text-teal-400 transition-colors">
                                            <?php echo e($related->title); ?>

                                        </p>
                                        <p class="text-slate-500 text-xs mt-1">
                                            <?php echo e(($related->published_at ?? $related->created_at)?->format('M j, Y')); ?>

                                        </p>
                                    </div>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    
                    <div class="bg-gradient-to-br from-blue-600 to-teal-400 rounded-[1.75rem] p-6 text-center">
                        <i class="fas fa-rocket text-white text-2xl mb-3"></i>
                        <h4 class="text-white font-black text-lg mb-2">Have a project in mind?</h4>
                        <p class="text-white/80 text-xs mb-5 leading-relaxed">Let's turn your idea into a scalable digital product.</p>
                        <a href="<?php echo e(route('serviceform.show')); ?>"
                           class="inline-block w-full px-5 py-3 bg-white text-blue-700 font-black rounded-xl text-xs uppercase tracking-widest hover:bg-slate-100 transition-colors">
                            Get a Free Quote
                        </a>
                    </div>
                </div>
            </aside>

        </div>
    </div>
</section>




<?php if($relatedBlogs->isNotEmpty()): ?>
<section class="py-24 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center mb-14 reveal-up">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-4">More Articles You'll Like</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Keep exploring insights, trends and updates from the digital world.</p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-10">
            <?php $__currentLoopData = $relatedBlogs->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('blog.show', $related->slug)); ?>"
                   class="related-card group bg-white rounded-3xl overflow-hidden shadow-md hover:shadow-2xl transition duration-500 transform hover:-translate-y-2 reveal-up">
                    <div class="w-full h-56 overflow-hidden bg-slate-100">
                        <?php if($related->featured_image): ?>
                            <img src="<?php echo e(asset($related->featured_image)); ?>" alt="<?php echo e($related->title); ?>" loading="lazy"
                                 class="w-full h-full object-cover transition-transform duration-500">
                        <?php else: ?>
                            <div class="w-full h-full flex items-center justify-center text-slate-300 text-3xl">
                                <i class="far fa-image"></i>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="p-6">
                        <?php if($related->category): ?>
                            <p class="text-xs text-teal-600 font-bold uppercase tracking-widest mb-2"><?php echo e($related->category->name); ?></p>
                        <?php endif; ?>
                        <h3 class="text-xl font-bold text-gray-800 mb-4 group-hover:text-blue-600 transition line-clamp-2">
                            <?php echo e($related->title); ?>

                        </h3>
                        <span class="inline-flex items-center px-5 py-2 rounded-full bg-blue-600 text-white text-sm font-medium group-hover:bg-blue-700 transition">
                            Read More
                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </span>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('custom_js'); ?>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BlogPosting",
  "headline": <?php echo json_encode($blog->title); ?>,
  "description": <?php echo json_encode(\Illuminate\Support\Str::limit(strip_tags($blog->seo->meta_description ?? $blog->excerpt ?? ''), 160)); ?>,
  "image": <?php echo json_encode($blog->featured_image ? asset($blog->featured_image) : asset('web_assets/images/default-og.png')); ?>,
  "datePublished": <?php echo json_encode(optional($blog->published_at ?? $blog->created_at)->toIso8601String()); ?>,
  "dateModified": <?php echo json_encode(optional($blog->updated_at)->toIso8601String()); ?>,
  "author": { "@type": "Person", "name": <?php echo json_encode($blog->author->name ?? 'Aazz Agency'); ?> },
  "mainEntityOfPage": { "@type": "WebPage", "@id": <?php echo json_encode(route('blog.show', $blog->slug)); ?> }
}
</script>

<script>
(function () {
    'use strict';

    /* ---------------------------------------------------
       1) Reading progress bar (passive scroll, cheap)
    --------------------------------------------------- */
    var progressBar = document.getElementById('reading-progress');
    var article = document.getElementById('blog-content');
    if (progressBar && article) {
        var ticking = false;
        function updateProgress() {
            var rect = article.getBoundingClientRect();
            var articleHeight = article.offsetHeight - window.innerHeight;
            var scrolled = Math.min(Math.max(-rect.top, 0), articleHeight);
            var pct = articleHeight > 0 ? (scrolled / articleHeight) * 100 : 0;
            progressBar.style.width = pct + '%';
            ticking = false;
        }
        window.addEventListener('scroll', function () {
            if (!ticking) {
                requestAnimationFrame(updateProgress);
                ticking = true;
            }
        }, { passive: true });
        updateProgress();
    }

    /* ---------------------------------------------------
       2) Auto-build Table of Contents from h2 / h3
    --------------------------------------------------- */
    var headings = article ? article.querySelectorAll('h2, h3') : [];
    var tocCard = document.getElementById('toc-card');
    var tocList = document.getElementById('toc-list');
    var tocMobileWrap = document.getElementById('toc-mobile-wrap');
    var tocListMobile = document.getElementById('toc-list-mobile');
    var usedIds = {};

    function slugify(text) {
        return text.toLowerCase().trim()
            .replace(/[^\w\s-]/g, '')
            .replace(/\s+/g, '-')
            .substring(0, 60);
    }

    if (headings.length > 0 && tocCard && tocList) {
        tocCard.classList.remove('hidden');
        if (tocMobileWrap) tocMobileWrap.classList.remove('hidden');

        headings.forEach(function (heading, i) {
            var baseId = slugify(heading.textContent) || 'section-' + i;
            var id = baseId;
            var counter = 2;
            while (usedIds[id]) { id = baseId + '-' + counter++; }
            usedIds[id] = true;
            if (!heading.id) heading.id = id;

            var isH3 = heading.tagName === 'H3';
            var li = document.createElement('li');
            var a = document.createElement('a');
            a.href = '#' + heading.id;
            a.textContent = heading.textContent;
            a.dataset.target = heading.id;
            a.className = 'block py-1.5 border-l-2 border-transparent text-slate-500 hover:text-slate-900 hover:border-teal-400 transition-colors ' + (isH3 ? 'pl-6 text-[13px]' : 'pl-3 font-medium');
            li.appendChild(a);
            tocList.appendChild(li);

            if (tocListMobile) {
                var liM = li.cloneNode(true);
                tocListMobile.appendChild(liM);
            }
        });

        // Scroll-spy: highlight active section without a scroll listener per-frame cost
        var tocLinks = tocList.querySelectorAll('a');
        if ('IntersectionObserver' in window) {
            var observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        tocLinks.forEach(function (l) { l.classList.remove('toc-active'); });
                        var active = tocList.querySelector('a[data-target="' + entry.target.id + '"]');
                        if (active) active.classList.add('toc-active');
                    }
                });
            }, { rootMargin: '-100px 0px -70% 0px' });

            headings.forEach(function (h) { observer.observe(h); });
        }

        // Smooth scroll for TOC clicks
        document.querySelectorAll('#toc-list a, #toc-list-mobile a').forEach(function (link) {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                var target = document.getElementById(this.dataset.target);
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });
    }

    /* ---------------------------------------------------
       3) Copy link button
    --------------------------------------------------- */
    var copyBtn = document.getElementById('copyLinkBtn');
    if (copyBtn) {
        copyBtn.addEventListener('click', function () {
            var url = this.dataset.url;
            navigator.clipboard.writeText(url).then(function () {
                var icon = copyBtn.querySelector('i');
                icon.className = 'fas fa-check text-sm';
                setTimeout(function () { icon.className = 'fas fa-link text-sm'; }, 1800);
            });
        });
    }

    /* ---------------------------------------------------
       4) Lightweight reveal-on-scroll (no external lib)
    --------------------------------------------------- */
    var revealEls = document.querySelectorAll('.reveal-up');
    if (revealEls.length && 'IntersectionObserver' in window) {
        var revealObserver = new IntersectionObserver(function (entries, obs) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('revealed');
                    obs.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });
        revealEls.forEach(function (el) { revealObserver.observe(el); });
    } else {
        revealEls.forEach(function (el) { el.classList.add('revealed'); });
    }

    /* ---------------------------------------------------
       5) Comment form — wired to the real backend.
          Server enforces: max 3000 chars, gmail/hotmail/yahoo
          only, and no links/URLs in the message. New comments
          go in as 'pending' and only appear after an admin
          approves them — so the list on this page does NOT
          get the new comment appended immediately.
    --------------------------------------------------- */
    var commentForm = document.getElementById('blogCommentForm');
    var charCountEl = document.getElementById('commentCharCount');
    var messageField = commentForm ? commentForm.querySelector('[name="message"]') : null;

    if (messageField && charCountEl) {
        messageField.addEventListener('input', function () {
            var len = messageField.value.length;
            charCountEl.textContent = len;
            charCountEl.classList.toggle('limit-near', len > 2700 && len <= 3000);
            charCountEl.classList.toggle('limit-over', len > 3000);
        });
    }

    if (commentForm) {
        var emailPattern = /^[a-zA-Z0-9._%+-]+@(gmail|hotmail|yahoo)\.com$/i;
        var urlPattern = /(https?:\/\/|www\.)\S+|\b[a-z0-9-]+\.(com|net|org|io|co|info|biz|xyz|site|online|store|shop|me|dev|app|ai|us|uk|pk|in)\b/i;

        commentForm.addEventListener('submit', function (e) {
            e.preventDefault();

            var name = commentForm.querySelector('[name="name"]');
            var email = commentForm.querySelector('[name="email"]');
            var message = commentForm.querySelector('[name="message"]');

            commentForm.querySelectorAll('.comment-error').forEach(function (el) { el.classList.add('hidden'); });
            document.getElementById('commentGeneralError').classList.add('hidden');
            document.getElementById('commentSuccess').classList.add('hidden');

            var valid = true;

            if (name.value.trim().length < 2) { showError('name'); valid = false; }
            if (!emailPattern.test(email.value.trim())) { showError('email'); valid = false; }

            var msg = message.value.trim();
            if (msg.length < 5 || msg.length > 3000 || urlPattern.test(msg)) {
                showError('message'); valid = false;
            }

            if (!valid) return;

            var btn = document.getElementById('commentSubmitBtn');
            var text = document.getElementById('commentSubmitText');
            var loader = document.getElementById('commentSubmitLoader');

            btn.disabled = true;
            text.textContent = 'Posting...';
            loader.classList.remove('hidden');

            fetch(commentForm.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    'Accept': 'application/json',
                },
                body: new FormData(commentForm),
            })
            .then(function (res) {
                return res.json().then(function (data) { return { ok: res.ok, status: res.status, data: data }; });
            })
            .then(function (result) {
                if (result.ok && result.data.status === 'success') {
                    document.getElementById('commentSuccessText').textContent = result.data.message;
                    document.getElementById('commentSuccess').classList.remove('hidden');
                    commentForm.reset();
                    if (charCountEl) { charCountEl.textContent = '0'; charCountEl.classList.remove('limit-near', 'limit-over'); }
                } else if (result.status === 422 && result.data.errors) {
                    // Laravel validation error bag — map to the matching field
                    Object.keys(result.data.errors).forEach(function (field) {
                        var el = commentForm.querySelector('.comment-error[data-for="' + field + '"]');
                        if (el) {
                            el.textContent = result.data.errors[field][0];
                            el.classList.remove('hidden');
                        }
                    });
                } else {
                    document.getElementById('commentGeneralErrorText').textContent = result.data.message || 'Something went wrong. Please try again.';
                    document.getElementById('commentGeneralError').classList.remove('hidden');
                }
            })
            .catch(function () {
                document.getElementById('commentGeneralError').classList.remove('hidden');
            })
            .finally(function () {
                btn.disabled = false;
                text.textContent = 'Post Comment';
                loader.classList.add('hidden');
            });
        });

        function showError(field) {
            var el = commentForm.querySelector('.comment-error[data-for="' + field + '"]');
            if (el) el.classList.remove('hidden');
        }
    }
})();
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make(config('web_assets.layouts.main'), array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Laravel\Aazz-Agency\resources\views/blog_show.blade.php ENDPATH**/ ?>