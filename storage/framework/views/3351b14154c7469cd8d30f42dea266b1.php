
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['icon' => 'bi-folder', 'title', 'subtitle' => null]));

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

foreach (array_filter((['icon' => 'bi-folder', 'title', 'subtitle' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="ap-form-section">
    <div class="ap-form-section-header">
        <div class="ap-form-section-icon"><i class="bi <?php echo e($icon); ?>"></i></div>
        <div>
            <h4><?php echo e($title); ?></h4>
            <?php if($subtitle): ?><p><?php echo e($subtitle); ?></p><?php endif; ?>
        </div>
    </div>
    <div class="ap-form-section-body">
        <?php echo e($slot); ?>

    </div>
</div><?php /**PATH D:\Laravel\Aazz-Agency\resources\views/components/admin/form-section.blade.php ENDPATH**/ ?>