
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'type' => 'text',
    'name',
    'label' => null,
    'icon' => null,
    'hint' => null,
    'value' => null,
    'required' => false,
    'rows' => 3,
    'placeholder' => null,
    'errorKey' => null,
]));

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

foreach (array_filter(([
    'type' => 'text',
    'name',
    'label' => null,
    'icon' => null,
    'hint' => null,
    'value' => null,
    'required' => false,
    'rows' => 3,
    'placeholder' => null,
    'errorKey' => null,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
    $errorKey = $errorKey ?? \Illuminate\Support\Str::of($name)->replace('[]', '');
    $fieldId = 'field_' . \Illuminate\Support\Str::slug($name) . '_' . uniqid();
    $placeholder = $placeholder ?? ($label ? "Enter {$label}" : '');
?>

<div class="ap-field">
    <?php if($label): ?>
        <label for="<?php echo e($fieldId); ?>" class="ap-field-label">
            <?php if($icon): ?><i class="bi <?php echo e($icon); ?>"></i><?php endif; ?>
            <?php echo e($label); ?>

            <?php if($required): ?><span class="ap-required">*</span><?php endif; ?>
            <?php if($hint): ?><span class="ap-field-hint"><?php echo e($hint); ?></span><?php endif; ?>
        </label>
    <?php endif; ?>

    <?php if($type === 'textarea'): ?>
        <textarea
            id="<?php echo e($fieldId); ?>"
            name="<?php echo e($name); ?>"
            rows="<?php echo e($rows); ?>"
            placeholder="<?php echo e($placeholder); ?>"
            <?php echo e($required ? 'required' : ''); ?>

            <?php echo e($attributes->merge(['class' => 'form-control' . ($errors->has($errorKey) ? ' is-invalid' : '')])); ?>

        ><?php echo e($value); ?></textarea>
    <?php elseif($type === 'select'): ?>
        <select
            id="<?php echo e($fieldId); ?>"
            name="<?php echo e($name); ?>"
            <?php echo e($required ? 'required' : ''); ?>

            <?php echo e($attributes->merge(['class' => 'form-select' . ($errors->has($errorKey) ? ' is-invalid' : '')])); ?>

        >
            <?php echo e($slot); ?>

        </select>
    <?php else: ?>
        <input
            type="<?php echo e($type); ?>"
            id="<?php echo e($fieldId); ?>"
            name="<?php echo e($name); ?>"
            value="<?php echo e($value); ?>"
            placeholder="<?php echo e($placeholder); ?>"
            <?php echo e($required ? 'required' : ''); ?>

            <?php echo e($attributes->merge(['class' => 'form-control' . ($errors->has($errorKey) ? ' is-invalid' : '')])); ?>

        />
    <?php endif; ?>

    <?php $__errorArgs = [$errorKey];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div><?php /**PATH D:\Laravel\Aazz-Agency\resources\views/components/admin/field.blade.php ENDPATH**/ ?>