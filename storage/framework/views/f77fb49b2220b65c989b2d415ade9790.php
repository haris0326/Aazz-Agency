<?php $__env->startSection('title', 'Services'); ?>
<?php $__env->startSection('description', 'Manage main services'); ?>
<?php $__env->startSection('topbar-title', 'Services'); ?>

<?php $__env->startSection(config('layout.admin_pages_content')); ?>

<?php $__env->startPush('styles'); ?>
<style>
    /* ---------- Professional header / breadcrumb polish ---------- */
    .ap-page-header,
    .page-header,
    [class*="page-header"] {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
    }
    .breadcrumb {
        font-size: 13px;
        margin-bottom: 4px;
        padding: 0;
        background: transparent;
    }
    .breadcrumb-item a {
        color: #6b7280;
        text-decoration: none;
        font-weight: 500;
        transition: color .15s ease;
    }
    .breadcrumb-item a:hover { color: #4f46e5; }
    .breadcrumb-item.active { color: #111827; font-weight: 600; }
    .breadcrumb-item + .breadcrumb-item::before {
        content: "›";
        color: #cbd5e1;
        font-weight: 700;
        padding-right: .5rem;
    }

    /* ---------- Status filter + badges ---------- */
    .ap-status-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 12px;
        font-weight: 600;
        padding: 3px 10px;
        border-radius: 999px;
        letter-spacing: .02em;
    }
    .ap-status-badge .dot {
        width: 6px; height: 6px; border-radius: 50%; flex-shrink: 0;
    }
    .ap-status-published { background: #ecfdf5; color: #047857; }
    .ap-status-published .dot { background: #10b981; }
    .ap-status-draft { background: #fffbeb; color: #b45309; }
    .ap-status-draft .dot { background: #f59e0b; animation: ap-pulse 1.6s infinite; }
    @keyframes ap-pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: .35; }
    }
    .ap-pending-edit-chip {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        font-size: 11px;
        color: #b45309;
        margin-left: 6px;
    }
    .ap-row-draft { background: #fffdf7; }
    .ap-row-draft td { color: #92601a; }
    .ap-row-draft .fw-semibold { color: #7c4a09; }
</style>
<?php $__env->stopPush(); ?>


<?php if (isset($component)) { $__componentOriginal035f795eaaa060cda7a1232e13402522 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal035f795eaaa060cda7a1232e13402522 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.index-page','data' => ['title' => 'Services','subtitle' => 'Manage all main services shown across the website','icon' => 'bi-gear-wide-connected','breadcrumbs' => [['label' => 'Dashboard', 'url' => route('admin.panel')], ['label' => 'Services']],'searchAction' => route('service.index'),'searchPlaceholder' => 'Search by title or description...','paginator' => $services]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.index-page'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Services','subtitle' => 'Manage all main services shown across the website','icon' => 'bi-gear-wide-connected','breadcrumbs' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([['label' => 'Dashboard', 'url' => route('admin.panel')], ['label' => 'Services']]),'search-action' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('service.index')),'search-placeholder' => 'Search by title or description...','paginator' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($services)]); ?>
     <?php $__env->slot('actions', null, []); ?> 
        <a href="<?php echo e(route('service.create')); ?>" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Add New Service
        </a>
     <?php $__env->endSlot(); ?>

     <?php $__env->slot('filters', null, []); ?> 
        <select name="status" class="form-select form-select-sm" style="max-width:170px" onchange="this.form.submit()">
            <option value="all" <?php if($statusFilter === 'all'): echo 'selected'; endif; ?>>All statuses</option>
            <option value="published" <?php if($statusFilter === 'published'): echo 'selected'; endif; ?>>Published only</option>
            <option value="draft" <?php if($statusFilter === 'draft'): echo 'selected'; endif; ?>>Drafts only</option>
        </select>

        <select name="service_cat_id" class="form-select form-select-sm" style="max-width:200px" onchange="this.form.submit()">
            <option value="">All Categories</option>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($cat->id); ?>" <?php if(request('service_cat_id') == $cat->id): echo 'selected'; endif; ?>><?php echo e($cat->cat_title); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
     <?php $__env->endSlot(); ?>

     <?php $__env->slot('thead', null, []); ?> 
        <th style="width:70px;">ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Category</th>
        <th>Status</th>
        <th>Last Activity</th>
        <th class="text-end">Actions</th>
     <?php $__env->endSlot(); ?>

     <?php $__env->slot('tbody', null, []); ?> 
        <?php $__empty_1 = true; $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr class="<?php echo e($row->row_type === 'draft' ? 'ap-row-draft' : ''); ?>">
                <td data-label="ID" class="text-muted-ap">
                    <?php echo e($row->row_type === 'draft' ? '—' : '#' . $row->id); ?>

                </td>
                <td data-label="Title" class="fw-semibold">
                    <?php echo e($row->title ?: 'Untitled draft'); ?>

                </td>
                <td data-label="Description" class="text-muted-ap">
                    <?php echo e($row->description ? \Str::limit($row->description, 50) : 'N/A'); ?>

                </td>
                <td data-label="Category">
                    <?php if($row->category): ?>
                        <span class="ap-badge ap-badge-info"><?php echo e($row->category->cat_title); ?></span>
                    <?php else: ?>
                        <span class="text-muted-ap">—</span>
                    <?php endif; ?>
                </td>
                <td data-label="Status">
                    <?php if($row->status === 'published'): ?>
                        <span class="ap-status-badge ap-status-published"><span class="dot"></span> Published</span>
                        <?php if($row->has_pending_edit): ?>
                            <span class="ap-pending-edit-chip"><i class="bi bi-pencil-fill"></i> Unsaved edits</span>
                        <?php endif; ?>
                    <?php else: ?>
                        <span class="ap-status-badge ap-status-draft"><span class="dot"></span> Draft</span>
                    <?php endif; ?>
                </td>
                <td data-label="Last Activity" class="text-muted-ap">
                    <?php echo e($row->activity_at?->diffForHumans() ?? '—'); ?>

                </td>
                <td data-label="">
                    <div class="ap-row-actions">
                        <?php if($row->row_type === 'service'): ?>
                            <?php if($row->category && $row->serviceSEO): ?>
                                <a href="<?php echo e(route('header_service.show', ['category_slug' => $row->category->cat_slug, 'service_slug' => $row->serviceSEO->meta_slug])); ?>"
                                   class="ap-icon-btn" title="View on site" target="_blank">
                                    <i class="bi bi-box-arrow-up-right"></i>
                                </a>
                            <?php endif; ?>
                            <a href="<?php echo e(route('service.edit', $row->id)); ?>" class="ap-icon-btn" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="<?php echo e(route('service.destroy', $row->id)); ?>" method="POST"
                                  data-confirm-delete
                                  data-confirm-message="Delete service &quot;<?php echo e($row->title); ?>&quot;? All related sections will also be deleted.">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="ap-icon-btn text-danger" title="Delete">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </form>
                        <?php else: ?>
                            <a href="<?php echo e(route('service.create', ['resume' => $row->draft_uuid])); ?>"
                               class="ap-icon-btn" title="Continue editing this draft">
                                <i class="bi bi-arrow-right-circle"></i>
                            </a>
                            <form action="<?php echo e(route('service.draft.destroy', $row->draft_uuid)); ?>" method="POST"
                                  data-confirm-delete
                                  data-confirm-message="Discard this draft permanently?">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="ap-icon-btn text-danger" title="Discard draft">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </form>
                        <?php endif; ?>
                    </div>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="7">
                    <?php if (isset($component)) { $__componentOriginal99089f8e2ef4184d7d35db81d60c6521 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal99089f8e2ef4184d7d35db81d60c6521 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.empty-state','data' => ['hasFilters' => request()->anyFilled(['search', 'service_cat_id', 'status']),'noDataText' => 'No services or drafts found','noResultsText' => 'Nothing matches your current search/filter.','createUrl' => route('service.create'),'createLabel' => 'Add New Service']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.empty-state'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['has-filters' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->anyFilled(['search', 'service_cat_id', 'status'])),'no-data-text' => 'No services or drafts found','no-results-text' => 'Nothing matches your current search/filter.','create-url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('service.create')),'create-label' => 'Add New Service']); ?>
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
<?php echo $__env->make(config('layout.admin_panel_layout'), array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Laravel\Aazz-Agency\resources\views/admin_panel/services/index.blade.php ENDPATH**/ ?>