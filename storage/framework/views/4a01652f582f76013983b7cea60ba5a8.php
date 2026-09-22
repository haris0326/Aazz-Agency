

<?php $__env->startSection('title', 'Blog Posts'); ?>
<?php $__env->startSection('topbar-title', 'Blog'); ?>

<?php $__env->startSection(config('layout.admin_pages_content')); ?>

<?php $__env->startPush('styles'); ?>
<style>
    .ap-status-badge { display:inline-flex; align-items:center; gap:5px; font-size:12px; font-weight:600; padding:3px 10px; border-radius:999px; }
    .ap-status-badge .dot { width:6px; height:6px; border-radius:50%; }
    .ap-status-published { background:#ecfdf5; color:#047857; }
    .ap-status-published .dot { background:#10b981; }
    .ap-status-draft { background:#fffbeb; color:#b45309; }
    .ap-status-draft .dot { background:#f59e0b; animation:ap-pulse 1.6s infinite; }
    @keyframes ap-pulse { 0%,100%{opacity:1} 50%{opacity:.35} }
    .ap-row-draft { background:#fffdf7; }
    .ap-row-draft td { color:#92601a; }
    .ap-row-draft .fw-semibold { color:#7c4a09; }
</style>
<?php $__env->stopPush(); ?>


<?php if (isset($component)) { $__componentOriginal035f795eaaa060cda7a1232e13402522 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal035f795eaaa060cda7a1232e13402522 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.index-page','data' => ['title' => 'Blog Posts','subtitle' => 'Manage every article shown on your website','breadcrumbs' => [['label' => 'Dashboard', 'url' => route('admin.panel')], ['label' => 'Blog']],'searchAction' => route('blog.index'),'searchPlaceholder' => 'Search by title or excerpt...','paginator' => $blogs]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.index-page'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Blog Posts','subtitle' => 'Manage every article shown on your website','breadcrumbs' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([['label' => 'Dashboard', 'url' => route('admin.panel')], ['label' => 'Blog']]),'search-action' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('blog.index')),'search-placeholder' => 'Search by title or excerpt...','paginator' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($blogs)]); ?>
     <?php $__env->slot('actions', null, []); ?> 
        <a href="<?php echo e(route('blog.create')); ?>" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Write New Post
        </a>
     <?php $__env->endSlot(); ?>

     <?php $__env->slot('filters', null, []); ?> 
        <select name="status" class="form-select form-select-sm" style="max-width:170px" onchange="this.form.submit()">
            <option value="all" <?php if($statusFilter === 'all'): echo 'selected'; endif; ?>>All statuses</option>
            <option value="published" <?php if($statusFilter === 'published'): echo 'selected'; endif; ?>>Published only</option>
            <option value="draft" <?php if($statusFilter === 'draft'): echo 'selected'; endif; ?>>Drafts only</option>
        </select>

        <select name="blog_category_id" class="form-select form-select-sm" style="max-width:200px" onchange="this.form.submit()">
            <option value="">All Categories</option>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($cat->id); ?>" <?php if(request('blog_category_id') == $cat->id): echo 'selected'; endif; ?>><?php echo e($cat->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
     <?php $__env->endSlot(); ?>

     <?php $__env->slot('thead', null, []); ?> 
        <th style="width:60px;">ID</th>
        <th style="width:60px;">Cover</th>
        <th>Title</th>
        <th>Category</th>
        <th>Status</th>
        <th>Views</th>
        <th>Last Activity</th>
        <th class="text-end">Actions</th>
     <?php $__env->endSlot(); ?>

     <?php $__env->slot('tbody', null, []); ?> 
        <?php $__empty_1 = true; $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr class="<?php echo e($blog->status === 'draft' ? 'ap-row-draft' : ''); ?>">
                <td data-label="ID" class="text-muted-ap">#<?php echo e($blog->id); ?></td>
                <td data-label="Cover">
                    <?php if($blog->featured_image): ?>
                        <img src="<?php echo e(asset($blog->featured_image)); ?>" alt="" style="width:44px;height:44px;object-fit:cover;border-radius:8px;">
                    <?php else: ?>
                        <div style="width:44px;height:44px;border-radius:8px;background:#f3f4f6;display:flex;align-items:center;justify-content:center;color:#9ca3af;">
                            <i class="bi bi-image"></i>
                        </div>
                    <?php endif; ?>
                </td>
                <td data-label="Title" class="fw-semibold"><?php echo e($blog->title ?: 'Untitled draft'); ?></td>
                <td data-label="Category">
                    <?php if($blog->category): ?>
                        <span class="ap-badge ap-badge-info"><?php echo e($blog->category->name); ?></span>
                    <?php else: ?>
                        <span class="text-muted-ap">—</span>
                    <?php endif; ?>
                </td>
                <td data-label="Status">
                    <?php if($blog->status === 'published'): ?>
                        <span class="ap-status-badge ap-status-published"><span class="dot"></span> Published</span>
                    <?php else: ?>
                        <span class="ap-status-badge ap-status-draft"><span class="dot"></span> Draft</span>
                    <?php endif; ?>
                </td>
                <td data-label="Views" class="text-muted-ap"><?php echo e(number_format($blog->views)); ?></td>
                <td data-label="Last Activity" class="text-muted-ap"><?php echo e($blog->updated_at?->diffForHumans()); ?></td>
                <td data-label="">
                    <div class="ap-row-actions">
                        <?php if($blog->status === 'published'): ?>
                            <a href="<?php echo e(route('blog.show', $blog->slug)); ?>" class="ap-icon-btn" title="View on site" target="_blank">
                                <i class="bi bi-box-arrow-up-right"></i>
                            </a>
                        <?php endif; ?>
                        <a href="<?php echo e(route('blog.edit', $blog->id)); ?>" class="ap-icon-btn" title="Edit">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="<?php echo e(route('blog.destroy', $blog->id)); ?>" method="POST" data-confirm-delete
                              data-confirm-message="Delete blog post &quot;<?php echo e($blog->title); ?>&quot;? This cannot be undone.">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="ap-icon-btn text-danger" title="Delete">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="8">
                    <?php if (isset($component)) { $__componentOriginal99089f8e2ef4184d7d35db81d60c6521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal99089f8e2ef4184d7d35db81d60c6521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.empty-state','data' => ['hasFilters' => request()->anyFilled(['search', 'blog_category_id', 'status']),'noDataText' => 'No blog posts yet','noResultsText' => 'Nothing matches your current search/filter.','createUrl' => route('blog.create'),'createLabel' => 'Write New Post']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.empty-state'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['has-filters' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->anyFilled(['search', 'blog_category_id', 'status'])),'no-data-text' => 'No blog posts yet','no-results-text' => 'Nothing matches your current search/filter.','create-url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('blog.create')),'create-label' => 'Write New Post']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal99089f8e2ef4184d7d35db81d60c6521)): ?>
<?php $attributes = $__attributesOriginal99089f8e2ef4184d7d35db81d60c6521; ?>
<?php unset($__attributesOriginal99089f8e2ef4184d7d35db81d60c6521); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal99089f8e2ef4184d7d35db81d60c6521)): ?>
<?php $component = $__componentOriginal99089f8e2ef4184d7d35db81d60c6521; ?>
<?php unset($__componentOriginal99089f8e2ef4184d7d35db81d60c6521); ?>
<?php endif; ?>
                </td>
            </tr>
        <?php endif; ?>
     <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal035f795eaaa060cda7a1232e13402522)): ?>
<?php $attributes = $__attributesOriginal035f795eaaa060cda7a1232e13402522; ?>
<?php unset($__attributesOriginal035f795eaaa060cda7a1232e13402522); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal035f795eaaa060cda7a1232e13402522)): ?>
<?php $component = $__componentOriginal035f795eaaa060cda7a1232e13402522; ?>
<?php unset($__componentOriginal035f795eaaa060cda7a1232e13402522); ?>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make(config('layout.admin_panel_layout'), array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Laravel\Aazz-Agency\resources\views/admin_panel/blog/index.blade.php ENDPATH**/ ?>