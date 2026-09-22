
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'title',
    'subtitle' => null,
    'breadcrumbs' => [],
    'icon' => 'bi-grid-1x2-fill',
    'searchAction',
    'searchPlaceholder' => 'Search...',
    'paginator',
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
    'title',
    'subtitle' => null,
    'breadcrumbs' => [],
    'icon' => 'bi-grid-1x2-fill',
    'searchAction',
    'searchPlaceholder' => 'Search...',
    'paginator',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php if (isset($component)) { $__componentOriginalcb19cb35a534439097b02b8af91726ee = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcb19cb35a534439097b02b8af91726ee = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.page-header','data' => ['title' => $title,'subtitle' => $subtitle,'breadcrumbs' => $breadcrumbs,'icon' => $icon]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($title),'subtitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($subtitle),'breadcrumbs' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($breadcrumbs),'icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($icon)]); ?>
    <?php echo e($actions ?? ''); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcb19cb35a534439097b02b8af91726ee)): ?>
<?php $attributes = $__attributesOriginalcb19cb35a534439097b02b8af91726ee; ?>
<?php unset($__attributesOriginalcb19cb35a534439097b02b8af91726ee); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcb19cb35a534439097b02b8af91726ee)): ?>
<?php $component = $__componentOriginalcb19cb35a534439097b02b8af91726ee; ?>
<?php unset($__componentOriginalcb19cb35a534439097b02b8af91726ee); ?>
<?php endif; ?>

<div class="ap-card">
    <?php if (isset($component)) { $__componentOriginal09d211374ce4124ff3434bde2f9cb4f2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal09d211374ce4124ff3434bde2f9cb4f2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.search-filter-bar','data' => ['action' => $searchAction,'searchPlaceholder' => $searchPlaceholder]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.search-filter-bar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($searchAction),'search-placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($searchPlaceholder)]); ?>
        <?php echo e($filters ?? ''); ?>

     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal09d211374ce4124ff3434bde2f9cb4f2)): ?>
<?php $attributes = $__attributesOriginal09d211374ce4124ff3434bde2f9cb4f2; ?>
<?php unset($__attributesOriginal09d211374ce4124ff3434bde2f9cb4f2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal09d211374ce4124ff3434bde2f9cb4f2)): ?>
<?php $component = $__componentOriginal09d211374ce4124ff3434bde2f9cb4f2; ?>
<?php unset($__componentOriginal09d211374ce4124ff3434bde2f9cb4f2); ?>
<?php endif; ?>

    <div class="ap-table-wrapper">
        <table class="table ap-table ap-table-responsive-cards mb-0">
            <thead>
                <tr><?php echo e($thead); ?></tr>
            </thead>
            <tbody>
                <?php echo e($tbody); ?>

            </tbody>
        </table>
    </div>

    <?php if (isset($component)) { $__componentOriginal6e30e6fa85341f0553efe21aafc15c2a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6e30e6fa85341f0553efe21aafc15c2a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.table-footer','data' => ['paginator' => $paginator]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.table-footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['paginator' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($paginator)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6e30e6fa85341f0553efe21aafc15c2a)): ?>
<?php $attributes = $__attributesOriginal6e30e6fa85341f0553efe21aafc15c2a; ?>
<?php unset($__attributesOriginal6e30e6fa85341f0553efe21aafc15c2a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6e30e6fa85341f0553efe21aafc15c2a)): ?>
<?php $component = $__componentOriginal6e30e6fa85341f0553efe21aafc15c2a; ?>
<?php unset($__componentOriginal6e30e6fa85341f0553efe21aafc15c2a); ?>
<?php endif; ?>
</div><?php /**PATH D:\Laravel\Aazz-Agency\resources\views/components/admin/index-page.blade.php ENDPATH**/ ?>