
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['paginator']));

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

foreach (array_filter((['paginator']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php if($paginator->total() > 0): ?>
<div class="ap-table-footer">
    <div>
        Showing <strong><?php echo e($paginator->firstItem()); ?></strong>–<strong><?php echo e($paginator->lastItem()); ?></strong>
        of <strong><?php echo e($paginator->total()); ?></strong> records
    </div>

    <div class="d-flex align-items-center gap-3">
        <form method="GET" class="d-flex align-items-center gap-2 mb-0">
            <?php $__currentLoopData = request()->except(['per_page', 'page']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <input type="hidden" name="<?php echo e($key); ?>" value="<?php echo e($value); ?>">
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <label class="mb-0 small text-muted">Per page</label>
            <select name="per_page" class="form-select form-select-sm" style="width:auto;" onchange="this.form.submit()">
                <?php $__currentLoopData = [15, 30, 50, 100]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($option); ?>" <?php if(request('per_page', 15) == $option): echo 'selected'; endif; ?>><?php echo e($option); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </form>

        <?php echo e($paginator->onEachSide(1)->links('vendor.pagination.admin-theme')); ?>

    </div>
</div>
<?php endif; ?><?php /**PATH D:\Laravel\Aazz-Agency\resources\views/components/admin/table-footer.blade.php ENDPATH**/ ?>