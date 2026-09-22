
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['title', 'subtitle' => null, 'breadcrumbs' => [], 'icon' => 'bi-grid-1x2-fill']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['title', 'subtitle' => null, 'breadcrumbs' => [], 'icon' => 'bi-grid-1x2-fill']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="ap-page-header">
    <?php if(count($breadcrumbs)): ?>
        <nav aria-label="breadcrumb" class="ap-breadcrumb-nav">
            <ol class="ap-breadcrumb">
                <li class="ap-breadcrumb-item ap-breadcrumb-home">
                    <a href="<?php echo e(route('admin.panel')); ?>"><i class="bi bi-house-door-fill"></i></a>
                </li>
                <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="ap-breadcrumb-sep"><i class="bi bi-chevron-right"></i></li>
                    <?php if(!empty($crumb['url']) && !$loop->last): ?>
                        <li class="ap-breadcrumb-item"><a href="<?php echo e($crumb['url']); ?>"><?php echo e($crumb['label']); ?></a></li>
                    <?php else: ?>
                        <li class="ap-breadcrumb-item ap-breadcrumb-active" aria-current="page"><?php echo e($crumb['label']); ?></li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ol>
        </nav>
    <?php endif; ?>

    <div class="ap-header-card">
        <div class="ap-header-card-main">
            <span class="ap-header-card-icon"><i class="bi <?php echo e($icon); ?>"></i></span>
            <div class="ap-header-card-text">
                <h1 class="ap-page-title"><?php echo e($title); ?></h1>
                <?php if($subtitle): ?>
                    <p class="ap-subtitle"><?php echo e($subtitle); ?></p>
                <?php endif; ?>
            </div>
        </div>

        <div class="ap-page-header-actions">
            <?php echo e($slot); ?>

        </div>
    </div>
</div><?php /**PATH D:\Laravel\Aazz-Agency\resources\views/components/admin/page-header.blade.php ENDPATH**/ ?>