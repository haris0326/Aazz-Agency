
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['name', 'label' => null, 'icon' => 'bi-cloud-upload', 'hint' => null, 'multiple' => false, 'accept' => 'image/*', 'inputId' => null]));

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

foreach (array_filter((['name', 'label' => null, 'icon' => 'bi-cloud-upload', 'hint' => null, 'multiple' => false, 'accept' => 'image/*', 'inputId' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php $inputId = $inputId ?? 'file_' . \Illuminate\Support\Str::slug($name); ?>

<div class="ap-field">
    <?php if($label): ?>
        <label for="<?php echo e($inputId); ?>" class="ap-field-label">
            <i class="bi <?php echo e($icon); ?>"></i> <?php echo e($label); ?>

            <?php if($hint): ?><span class="ap-field-hint"><?php echo e($hint); ?></span><?php endif; ?>
        </label>
    <?php endif; ?>

    <label for="<?php echo e($inputId); ?>" class="ap-file-drop d-block mb-0">
        <i class="bi bi-cloud-arrow-up"></i>
        <div class="ap-file-drop-text">Click to browse or drag files here</div>
        <input type="file" id="<?php echo e($inputId); ?>" name="<?php echo e($name); ?>" accept="<?php echo e($accept); ?>" <?php echo e($multiple ? 'multiple' : ''); ?> <?php echo e($attributes); ?> />
    </label>

    <div class="ap-image-preview-grid" id="<?php echo e($inputId); ?>_preview"></div>
</div><?php /**PATH D:\Laravel\Aazz-Agency\resources\views/components/admin/file-field.blade.php ENDPATH**/ ?>