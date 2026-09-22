
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['action', 'searchPlaceholder' => 'Search...', 'searchName' => 'search']));

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

foreach (array_filter((['action', 'searchPlaceholder' => 'Search...', 'searchName' => 'search']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<form method="GET" action="<?php echo e($action); ?>" class="ap-toolbar">
    <div class="position-relative" style="max-width: 320px; flex: 1 1 260px;">
        <i class="mdi mdi-magnify position-absolute" style="left:10px; top:50%; transform:translateY(-50%); color:#9ca3af;"></i>
        <input
            type="text"
            name="<?php echo e($searchName); ?>"
            value="<?php echo e(request($searchName)); ?>"
            placeholder="<?php echo e($searchPlaceholder); ?>"
            class="form-control form-control-sm"
            style="padding-left:32px;"
            data-debounce-search
            autocomplete="off"
        />
    </div>

    
    <?php echo e($slot); ?>


    <?php if(request()->anyFilled(array_diff(array_keys(request()->query()), ['page']))): ?>
        <a href="<?php echo e($action); ?>" class="btn btn-sm btn-outline-secondary">
            <i class="mdi mdi-close-circle-outline"></i> Reset
        </a>
    <?php endif; ?>

    <div class="ms-md-auto d-flex gap-2">
        <?php echo e($right ?? ''); ?>

    </div>
</form><?php /**PATH D:\Laravel\Aazz-Agency\resources\views/components/admin/search-filter-bar.blade.php ENDPATH**/ ?>