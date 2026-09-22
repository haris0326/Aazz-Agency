<?php $__env->startSection('title', 'Add Service'); ?>
<?php $__env->startSection('topbar-title', 'Services'); ?>

<?php $__env->startSection(config('layout.admin_pages_content')); ?>

<?php $__env->startPush('styles'); ?>
<style>
    .ap-toast {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 1080;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-left: 4px solid #6b7280;
        box-shadow: 0 8px 24px rgba(0,0,0,0.08);
        border-radius: 10px;
        padding: 10px 16px;
        font-size: 13.5px;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        color: #374151;
        transition: transform .25s ease, opacity .25s ease, border-color .2s ease;
        max-width: 320px;
    }
    .ap-toast-icon { font-size: 16px; line-height: 1; flex-shrink: 0; }
    .ap-toast.ap-toast-saving  { border-left-color: #f59e0b; }
    .ap-toast.ap-toast-saving  .ap-toast-icon { color: #f59e0b; animation: ap-spin 1s linear infinite; }
    .ap-toast.ap-toast-saved   { border-left-color: #10b981; }
    .ap-toast.ap-toast-saved   .ap-toast-icon { color: #10b981; }
    .ap-toast.ap-toast-error   { border-left-color: #ef4444; }
    .ap-toast.ap-toast-error   .ap-toast-icon { color: #ef4444; }
    @keyframes ap-spin { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }

    @media (max-width: 576px) {
        .ap-toast { left: 12px; right: 12px; top: 12px; max-width: none; }
    }
</style>
<?php $__env->stopPush(); ?>

<?php if (isset($component)) { $__componentOriginalcb19cb35a534439097b02b8af91726ee = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcb19cb35a534439097b02b8af91726ee = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.page-header','data' => ['title' => 'Add New Service','subtitle' => 'Fill in all sections below — your progress saves automatically every few seconds','breadcrumbs' => [['label' => 'Dashboard', 'url' => route('admin.panel')], ['label' => 'Services', 'url' => route('service.index')], ['label' => 'Add New']]]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Add New Service','subtitle' => 'Fill in all sections below — your progress saves automatically every few seconds','breadcrumbs' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([['label' => 'Dashboard', 'url' => route('admin.panel')], ['label' => 'Services', 'url' => route('service.index')], ['label' => 'Add New']])]); ?>
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

<div id="draftToast" class="ap-toast" role="status" aria-live="polite">
    <span class="ap-toast-icon"><i class="bi bi-cloud-arrow-up-fill"></i></span>
    <span class="ap-toast-text">Draft saving is on — changes are kept automatically</span>
</div>

<?php if($resumeDraft ?? null): ?>
<div class="alert alert-info d-flex gap-2 align-items-start mb-4">
    <i class="bi bi-info-circle-fill mt-1"></i>
    <div>
        <strong>Resuming your last draft</strong> — fields below have been restored from your
        previous unsaved session.
    </div>
</div>
<?php endif; ?>

<?php if($errors->any()): ?>
<div class="alert alert-danger d-flex gap-2 align-items-start mb-4">
    <i class="bi bi-exclamation-triangle-fill mt-1"></i>
    <div>
        <strong>There were some errors with your submission:</strong>
        <ul class="mb-0 mt-1">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>
<?php endif; ?>

<form id="serviceForm" action="<?php echo e(route('service.store')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>

    <input type="hidden" name="draft_uuid" id="draft_uuid" value="<?php echo e($draftUuid); ?>">
    
    <?php if (isset($component)) { $__componentOriginalba421f08b6b43aecb09f8eebe577a4f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalba421f08b6b43aecb09f8eebe577a4f3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form-section','data' => ['icon' => 'bi-info-circle','title' => 'Service Details','subtitle' => 'Core information shown across the site']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.form-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'bi-info-circle','title' => 'Service Details','subtitle' => 'Core information shown across the site']); ?>

        <?php if (isset($component)) { $__componentOriginala36faa2d443b9f600fa80effd7afe361 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala36faa2d443b9f600fa80effd7afe361 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.field','data' => ['type' => 'text','name' => 'title','label' => 'Service Title','icon' => 'bi-type','hint' => '2 keywords','value' => old('title'),'required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'title','label' => 'Service Title','icon' => 'bi-type','hint' => '2 keywords','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('title')),'required' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $attributes = $__attributesOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__attributesOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $component = $__componentOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__componentOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>

        <?php if (isset($component)) { $__componentOriginala36faa2d443b9f600fa80effd7afe361 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala36faa2d443b9f600fa80effd7afe361 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.field','data' => ['type' => 'textarea','name' => 'description','label' => 'Description','icon' => 'bi-text-paragraph','hint' => '200 characters max','value' => old('description'),'rows' => '4','required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'textarea','name' => 'description','label' => 'Description','icon' => 'bi-text-paragraph','hint' => '200 characters max','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('description')),'rows' => '4','required' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $attributes = $__attributesOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__attributesOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $component = $__componentOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__componentOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>

        <?php if (isset($component)) { $__componentOriginala36faa2d443b9f600fa80effd7afe361 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala36faa2d443b9f600fa80effd7afe361 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.field','data' => ['type' => 'select','name' => 'service_cat_id','label' => 'Service Category','icon' => 'bi-tag','required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'select','name' => 'service_cat_id','label' => 'Service Category','icon' => 'bi-tag','required' => true]); ?>
            <option value="" disabled <?php if(!old('service_cat_id')): echo 'selected'; endif; ?>>Select Category</option>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($category->id); ?>" <?php if(old('service_cat_id') == $category->id): echo 'selected'; endif; ?>><?php echo e($category->cat_title); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $attributes = $__attributesOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__attributesOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $component = $__componentOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__componentOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalba421f08b6b43aecb09f8eebe577a4f3)): ?>
<?php $attributes = $__attributesOriginalba421f08b6b43aecb09f8eebe577a4f3; ?>
<?php unset($__attributesOriginalba421f08b6b43aecb09f8eebe577a4f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalba421f08b6b43aecb09f8eebe577a4f3)): ?>
<?php $component = $__componentOriginalba421f08b6b43aecb09f8eebe577a4f3; ?>
<?php unset($__componentOriginalba421f08b6b43aecb09f8eebe577a4f3); ?>
<?php endif; ?>

    
    <?php if (isset($component)) { $__componentOriginalba421f08b6b43aecb09f8eebe577a4f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalba421f08b6b43aecb09f8eebe577a4f3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form-section','data' => ['icon' => 'bi-window-stack','title' => 'Hero Section','subtitle' => 'The top banner shown on the service page']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.form-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'bi-window-stack','title' => 'Hero Section','subtitle' => 'The top banner shown on the service page']); ?>
        <?php if (isset($component)) { $__componentOriginala36faa2d443b9f600fa80effd7afe361 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala36faa2d443b9f600fa80effd7afe361 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.field','data' => ['type' => 'text','name' => 'hero_main_title','label' => 'Hero Main Title','icon' => 'bi-type','hint' => '100 characters max','value' => old('hero_main_title')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'hero_main_title','label' => 'Hero Main Title','icon' => 'bi-type','hint' => '100 characters max','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('hero_main_title'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $attributes = $__attributesOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__attributesOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $component = $__componentOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__componentOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>

        <?php if (isset($component)) { $__componentOriginala36faa2d443b9f600fa80effd7afe361 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala36faa2d443b9f600fa80effd7afe361 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.field','data' => ['type' => 'textarea','name' => 'hero_main_desc','label' => 'Hero Description','icon' => 'bi-text-paragraph','hint' => '200 characters max','value' => old('hero_main_desc'),'rows' => '3']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'textarea','name' => 'hero_main_desc','label' => 'Hero Description','icon' => 'bi-text-paragraph','hint' => '200 characters max','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('hero_main_desc')),'rows' => '3']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $attributes = $__attributesOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__attributesOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $component = $__componentOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__componentOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>

        <div class="row">
            <div class="col-md-6">
                <?php if (isset($component)) { $__componentOriginala36faa2d443b9f600fa80effd7afe361 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala36faa2d443b9f600fa80effd7afe361 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.field','data' => ['type' => 'text','name' => 'hero_button_text','label' => 'Button Text','icon' => 'bi-cursor','hint' => '3 words max','value' => old('hero_button_text')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'hero_button_text','label' => 'Button Text','icon' => 'bi-cursor','hint' => '3 words max','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('hero_button_text'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $attributes = $__attributesOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__attributesOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $component = $__componentOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__componentOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>
            </div>
            <div class="col-md-6">
                <?php if (isset($component)) { $__componentOriginala36faa2d443b9f600fa80effd7afe361 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala36faa2d443b9f600fa80effd7afe361 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.field','data' => ['type' => 'text','name' => 'hero_button_link','label' => 'Button Link','icon' => 'bi-link-45deg','value' => old('hero_button_link')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'hero_button_link','label' => 'Button Link','icon' => 'bi-link-45deg','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('hero_button_link'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $attributes = $__attributesOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__attributesOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $component = $__componentOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__componentOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>
            </div>
        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalba421f08b6b43aecb09f8eebe577a4f3)): ?>
<?php $attributes = $__attributesOriginalba421f08b6b43aecb09f8eebe577a4f3; ?>
<?php unset($__attributesOriginalba421f08b6b43aecb09f8eebe577a4f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalba421f08b6b43aecb09f8eebe577a4f3)): ?>
<?php $component = $__componentOriginalba421f08b6b43aecb09f8eebe577a4f3; ?>
<?php unset($__componentOriginalba421f08b6b43aecb09f8eebe577a4f3); ?>
<?php endif; ?>

    
    <?php if (isset($component)) { $__componentOriginalba421f08b6b43aecb09f8eebe577a4f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalba421f08b6b43aecb09f8eebe577a4f3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form-section','data' => ['icon' => 'bi-gear-wide-connected','title' => 'About Services','subtitle' => 'Feature blocks with icon + description']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.form-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'bi-gear-wide-connected','title' => 'About Services','subtitle' => 'Feature blocks with icon + description']); ?>
        <div id="about-service-fields">
            <?php $__currentLoopData = old('about_title', ['']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="ap-repeater-item">
                <?php if (isset($component)) { $__componentOriginala36faa2d443b9f600fa80effd7afe361 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala36faa2d443b9f600fa80effd7afe361 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.field','data' => ['type' => 'text','name' => 'about_title[]','label' => 'Service Title','hint' => '3 words max','value' => $title,'errorKey' => 'about_title.'.$index,'required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'about_title[]','label' => 'Service Title','hint' => '3 words max','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($title),'error-key' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('about_title.'.$index),'required' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $attributes = $__attributesOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__attributesOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $component = $__componentOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__componentOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginala36faa2d443b9f600fa80effd7afe361 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala36faa2d443b9f600fa80effd7afe361 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.field','data' => ['type' => 'textarea','name' => 'about_description[]','label' => 'Service Description','hint' => '120 characters max','value' => old('about_description.'.$index),'errorKey' => 'about_description.'.$index,'required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'textarea','name' => 'about_description[]','label' => 'Service Description','hint' => '120 characters max','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('about_description.'.$index)),'error-key' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('about_description.'.$index),'required' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $attributes = $__attributesOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__attributesOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $component = $__componentOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__componentOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginala36faa2d443b9f600fa80effd7afe361 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala36faa2d443b9f600fa80effd7afe361 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.field','data' => ['type' => 'text','name' => 'about_icon_class[]','label' => 'Icon Class','hint' => 'e.g. bi bi-check-circle','value' => old('about_icon_class.'.$index),'errorKey' => 'about_icon_class.'.$index,'required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'about_icon_class[]','label' => 'Icon Class','hint' => 'e.g. bi bi-check-circle','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('about_icon_class.'.$index)),'error-key' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('about_icon_class.'.$index),'required' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $attributes = $__attributesOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__attributesOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $component = $__componentOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__componentOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>

                <button type="button" class="btn btn-outline-danger btn-sm ap-repeater-remove remove-btn">
                    <i class="bi bi-trash3"></i> Remove
                </button>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <button type="button" class="ap-repeater-add-btn w-100" id="addServiceBtn">
            <i class="bi bi-plus-lg"></i> Add More Services
        </button>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalba421f08b6b43aecb09f8eebe577a4f3)): ?>
<?php $attributes = $__attributesOriginalba421f08b6b43aecb09f8eebe577a4f3; ?>
<?php unset($__attributesOriginalba421f08b6b43aecb09f8eebe577a4f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalba421f08b6b43aecb09f8eebe577a4f3)): ?>
<?php $component = $__componentOriginalba421f08b6b43aecb09f8eebe577a4f3; ?>
<?php unset($__componentOriginalba421f08b6b43aecb09f8eebe577a4f3); ?>
<?php endif; ?>

    
    <?php if (isset($component)) { $__componentOriginalba421f08b6b43aecb09f8eebe577a4f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalba421f08b6b43aecb09f8eebe577a4f3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form-section','data' => ['icon' => 'bi-clipboard-check','title' => 'Test Order','subtitle' => 'Sample order walkthrough shown to customers']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.form-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'bi-clipboard-check','title' => 'Test Order','subtitle' => 'Sample order walkthrough shown to customers']); ?>
        <div id="test-order-fields">
            <div class="ap-repeater-item">
                <?php if (isset($component)) { $__componentOriginala36faa2d443b9f600fa80effd7afe361 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala36faa2d443b9f600fa80effd7afe361 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.field','data' => ['type' => 'text','name' => 'test_title[]','label' => 'Test Order Title','hint' => '5 words max','value' => old('test_title.0'),'required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'test_title[]','label' => 'Test Order Title','hint' => '5 words max','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('test_title.0')),'required' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $attributes = $__attributesOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__attributesOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $component = $__componentOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__componentOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginala36faa2d443b9f600fa80effd7afe361 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala36faa2d443b9f600fa80effd7afe361 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.field','data' => ['type' => 'textarea','name' => 'test_description[]','label' => 'Test Order Description','hint' => '250 characters max','value' => old('test_description.0'),'required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'textarea','name' => 'test_description[]','label' => 'Test Order Description','hint' => '250 characters max','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('test_description.0')),'required' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $attributes = $__attributesOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__attributesOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $component = $__componentOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__componentOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginal884a61ad480466f631fe23200a68faa6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal884a61ad480466f631fe23200a68faa6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.file-field','data' => ['name' => 'test_images[]','inputId' => 'test_images','label' => 'Upload Test Order Images','icon' => 'bi-images','hint' => 'Max 3 images — JPG, PNG, JPEG','multiple' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.file-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'test_images[]','input-id' => 'test_images','label' => 'Upload Test Order Images','icon' => 'bi-images','hint' => 'Max 3 images — JPG, PNG, JPEG','multiple' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal884a61ad480466f631fe23200a68faa6)): ?>
<?php $attributes = $__attributesOriginal884a61ad480466f631fe23200a68faa6; ?>
<?php unset($__attributesOriginal884a61ad480466f631fe23200a68faa6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal884a61ad480466f631fe23200a68faa6)): ?>
<?php $component = $__componentOriginal884a61ad480466f631fe23200a68faa6; ?>
<?php unset($__componentOriginal884a61ad480466f631fe23200a68faa6); ?>
<?php endif; ?>

                <div class="row">
                    <div class="col-md-6">
                        <?php if (isset($component)) { $__componentOriginala36faa2d443b9f600fa80effd7afe361 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala36faa2d443b9f600fa80effd7afe361 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.field','data' => ['type' => 'textarea','name' => 'step_1','label' => 'Step 1','hint' => '5 words max','rows' => '2','value' => old('step_1'),'required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'textarea','name' => 'step_1','label' => 'Step 1','hint' => '5 words max','rows' => '2','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('step_1')),'required' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $attributes = $__attributesOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__attributesOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $component = $__componentOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__componentOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <?php if (isset($component)) { $__componentOriginala36faa2d443b9f600fa80effd7afe361 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala36faa2d443b9f600fa80effd7afe361 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.field','data' => ['type' => 'textarea','name' => 'step_2','label' => 'Step 2','hint' => '5 words max','rows' => '2','value' => old('step_2'),'required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'textarea','name' => 'step_2','label' => 'Step 2','hint' => '5 words max','rows' => '2','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('step_2')),'required' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $attributes = $__attributesOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__attributesOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $component = $__componentOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__componentOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <?php if (isset($component)) { $__componentOriginala36faa2d443b9f600fa80effd7afe361 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala36faa2d443b9f600fa80effd7afe361 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.field','data' => ['type' => 'textarea','name' => 'step_3','label' => 'Step 3','hint' => '5 words max','rows' => '2','value' => old('step_3'),'required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'textarea','name' => 'step_3','label' => 'Step 3','hint' => '5 words max','rows' => '2','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('step_3')),'required' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $attributes = $__attributesOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__attributesOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $component = $__componentOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__componentOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <?php if (isset($component)) { $__componentOriginala36faa2d443b9f600fa80effd7afe361 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala36faa2d443b9f600fa80effd7afe361 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.field','data' => ['type' => 'textarea','name' => 'step_4','label' => 'Step 4','hint' => '5 words max','rows' => '2','value' => old('step_4'),'required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'textarea','name' => 'step_4','label' => 'Step 4','hint' => '5 words max','rows' => '2','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('step_4')),'required' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $attributes = $__attributesOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__attributesOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $component = $__componentOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__componentOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalba421f08b6b43aecb09f8eebe577a4f3)): ?>
<?php $attributes = $__attributesOriginalba421f08b6b43aecb09f8eebe577a4f3; ?>
<?php unset($__attributesOriginalba421f08b6b43aecb09f8eebe577a4f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalba421f08b6b43aecb09f8eebe577a4f3)): ?>
<?php $component = $__componentOriginalba421f08b6b43aecb09f8eebe577a4f3; ?>
<?php unset($__componentOriginalba421f08b6b43aecb09f8eebe577a4f3); ?>
<?php endif; ?>

    
    <?php if (isset($component)) { $__componentOriginalba421f08b6b43aecb09f8eebe577a4f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalba421f08b6b43aecb09f8eebe577a4f3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form-section','data' => ['icon' => 'bi-tags','title' => 'Order Feature Tags','subtitle' => 'Type a feature and press Enter or comma to add it as a tag']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.form-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'bi-tags','title' => 'Order Feature Tags','subtitle' => 'Type a feature and press Enter or comma to add it as a tag']); ?>
        <div class="ap-tag-input-wrapper" id="order-feature-tag-wrapper">
            <div id="order-feature-tags" class="d-flex flex-wrap gap-2"></div>
            <input type="text" id="tag-input" class="ap-tag-input-field" placeholder="Type and press Enter..." />
        </div>
        <input type="hidden" name="order_feature_titles" id="order_feature_titles" value="[]">
        <?php $__errorArgs = ['order_feature_titles'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalba421f08b6b43aecb09f8eebe577a4f3)): ?>
<?php $attributes = $__attributesOriginalba421f08b6b43aecb09f8eebe577a4f3; ?>
<?php unset($__attributesOriginalba421f08b6b43aecb09f8eebe577a4f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalba421f08b6b43aecb09f8eebe577a4f3)): ?>
<?php $component = $__componentOriginalba421f08b6b43aecb09f8eebe577a4f3; ?>
<?php unset($__componentOriginalba421f08b6b43aecb09f8eebe577a4f3); ?>
<?php endif; ?>

    
    <?php if (isset($component)) { $__componentOriginalba421f08b6b43aecb09f8eebe577a4f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalba421f08b6b43aecb09f8eebe577a4f3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form-section','data' => ['icon' => 'bi-star','title' => 'Why Choose Us','subtitle' => 'Trust-building feature highlights']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.form-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'bi-star','title' => 'Why Choose Us','subtitle' => 'Trust-building feature highlights']); ?>
        <div id="why-choose-us-fields">
            <div class="ap-repeater-item">
                <?php if (isset($component)) { $__componentOriginala36faa2d443b9f600fa80effd7afe361 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala36faa2d443b9f600fa80effd7afe361 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.field','data' => ['type' => 'text','name' => 'why_choose_title[]','label' => 'Feature Title','hint' => '3 words max','value' => old('why_choose_title.0'),'required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'why_choose_title[]','label' => 'Feature Title','hint' => '3 words max','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('why_choose_title.0')),'required' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $attributes = $__attributesOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__attributesOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $component = $__componentOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__componentOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginala36faa2d443b9f600fa80effd7afe361 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala36faa2d443b9f600fa80effd7afe361 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.field','data' => ['type' => 'textarea','name' => 'why_choose_description[]','label' => 'Feature Description','hint' => '160 characters max','value' => old('why_choose_description.0'),'required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'textarea','name' => 'why_choose_description[]','label' => 'Feature Description','hint' => '160 characters max','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('why_choose_description.0')),'required' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $attributes = $__attributesOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__attributesOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $component = $__componentOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__componentOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginala36faa2d443b9f600fa80effd7afe361 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala36faa2d443b9f600fa80effd7afe361 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.field','data' => ['type' => 'text','name' => 'why_choose_icon_class[]','label' => 'Icon Class','hint' => 'e.g. bi bi-shield-check','value' => old('why_choose_icon_class.0'),'required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'why_choose_icon_class[]','label' => 'Icon Class','hint' => 'e.g. bi bi-shield-check','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('why_choose_icon_class.0')),'required' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $attributes = $__attributesOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__attributesOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $component = $__componentOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__componentOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>
                <button type="button" class="btn btn-outline-danger btn-sm ap-repeater-remove remove-btn">
                    <i class="bi bi-trash3"></i> Remove
                </button>
            </div>
        </div>
        <button type="button" class="ap-repeater-add-btn w-100" id="addWhyChooseBtn">
            <i class="bi bi-plus-lg"></i> Add More Features
        </button>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalba421f08b6b43aecb09f8eebe577a4f3)): ?>
<?php $attributes = $__attributesOriginalba421f08b6b43aecb09f8eebe577a4f3; ?>
<?php unset($__attributesOriginalba421f08b6b43aecb09f8eebe577a4f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalba421f08b6b43aecb09f8eebe577a4f3)): ?>
<?php $component = $__componentOriginalba421f08b6b43aecb09f8eebe577a4f3; ?>
<?php unset($__componentOriginalba421f08b6b43aecb09f8eebe577a4f3); ?>
<?php endif; ?>

    
    <?php if (isset($component)) { $__componentOriginalba421f08b6b43aecb09f8eebe577a4f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalba421f08b6b43aecb09f8eebe577a4f3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form-section','data' => ['icon' => 'bi-file-earmark-text','title' => 'Content Section','subtitle' => 'Long-form content blocks for the service page']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.form-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'bi-file-earmark-text','title' => 'Content Section','subtitle' => 'Long-form content blocks for the service page']); ?>
        <?php if (isset($component)) { $__componentOriginala36faa2d443b9f600fa80effd7afe361 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala36faa2d443b9f600fa80effd7afe361 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.field','data' => ['type' => 'text','name' => 'content_title','label' => 'Content Title','icon' => 'bi-type','hint' => '100 characters max','value' => old('content_title'),'required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'content_title','label' => 'Content Title','icon' => 'bi-type','hint' => '100 characters max','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('content_title')),'required' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $attributes = $__attributesOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__attributesOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $component = $__componentOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__componentOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginala36faa2d443b9f600fa80effd7afe361 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala36faa2d443b9f600fa80effd7afe361 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.field','data' => ['type' => 'textarea','name' => 'content_description','label' => 'Content Description','icon' => 'bi-text-paragraph','hint' => '500 characters max','value' => old('content_description'),'rows' => '3','required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'textarea','name' => 'content_description','label' => 'Content Description','icon' => 'bi-text-paragraph','hint' => '500 characters max','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('content_description')),'rows' => '3','required' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $attributes = $__attributesOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__attributesOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $component = $__componentOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__componentOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>

        <div class="ap-field">
            <label class="ap-field-label"><i class="bi bi-text-paragraph"></i> Content 2 <span class="ap-required">*</span>
                <span class="ap-field-hint">Rich text editor</span></label>
            <textarea name="content_2" id="content_2" rows="6" class="form-control <?php $__errorArgs = ['content_2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required><?php echo e(old('content_2')); ?></textarea>
            <?php $__errorArgs = ['content_2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback d-block"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="ap-field">
            <label class="ap-field-label"><i class="bi bi-text-paragraph"></i> Content 3 <span class="ap-required">*</span>
                <span class="ap-field-hint">Rich text editor</span></label>
            <textarea name="content_3" id="content_3" rows="6" class="form-control <?php $__errorArgs = ['content_3'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required><?php echo e(old('content_3')); ?></textarea>
            <?php $__errorArgs = ['content_3'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback d-block"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalba421f08b6b43aecb09f8eebe577a4f3)): ?>
<?php $attributes = $__attributesOriginalba421f08b6b43aecb09f8eebe577a4f3; ?>
<?php unset($__attributesOriginalba421f08b6b43aecb09f8eebe577a4f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalba421f08b6b43aecb09f8eebe577a4f3)): ?>
<?php $component = $__componentOriginalba421f08b6b43aecb09f8eebe577a4f3; ?>
<?php unset($__componentOriginalba421f08b6b43aecb09f8eebe577a4f3); ?>
<?php endif; ?>

    
    <?php if (isset($component)) { $__componentOriginalba421f08b6b43aecb09f8eebe577a4f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalba421f08b6b43aecb09f8eebe577a4f3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form-section','data' => ['icon' => 'bi-layout-text-window','title' => 'Tab Content','subtitle' => 'Tabbed information sections']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.form-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'bi-layout-text-window','title' => 'Tab Content','subtitle' => 'Tabbed information sections']); ?>
        <div id="tabContentContainer">
            <?php $__currentLoopData = old('tab_title', ['']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $oldTitle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="ap-repeater-item">
                <div class="row">
                    <div class="col-md-5">
                        <?php if (isset($component)) { $__componentOriginala36faa2d443b9f600fa80effd7afe361 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala36faa2d443b9f600fa80effd7afe361 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.field','data' => ['type' => 'text','name' => 'tab_title[]','label' => 'Title','hint' => '2 words max','value' => $oldTitle,'errorKey' => 'tab_title.'.$index,'required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'tab_title[]','label' => 'Title','hint' => '2 words max','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($oldTitle),'error-key' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('tab_title.'.$index),'required' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $attributes = $__attributesOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__attributesOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $component = $__componentOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__componentOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>
                    </div>
                    <div class="col-md-7">
                        <?php if (isset($component)) { $__componentOriginala36faa2d443b9f600fa80effd7afe361 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala36faa2d443b9f600fa80effd7afe361 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.field','data' => ['type' => 'textarea','name' => 'tab_description[]','label' => 'Description','hint' => '1500 characters max','rows' => '2','value' => old('tab_description.'.$index),'errorKey' => 'tab_description.'.$index,'required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'textarea','name' => 'tab_description[]','label' => 'Description','hint' => '1500 characters max','rows' => '2','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('tab_description.'.$index)),'error-key' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('tab_description.'.$index),'required' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $attributes = $__attributesOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__attributesOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $component = $__componentOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__componentOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>
                    </div>
                </div>
                <button type="button" class="btn btn-outline-danger btn-sm ap-repeater-remove remove-btn">
                    <i class="bi bi-trash3"></i> Remove
                </button>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <button type="button" class="ap-repeater-add-btn w-100" id="addTabContentBtn">
            <i class="bi bi-plus-lg"></i> Add More
        </button>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalba421f08b6b43aecb09f8eebe577a4f3)): ?>
<?php $attributes = $__attributesOriginalba421f08b6b43aecb09f8eebe577a4f3; ?>
<?php unset($__attributesOriginalba421f08b6b43aecb09f8eebe577a4f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalba421f08b6b43aecb09f8eebe577a4f3)): ?>
<?php $component = $__componentOriginalba421f08b6b43aecb09f8eebe577a4f3; ?>
<?php unset($__componentOriginalba421f08b6b43aecb09f8eebe577a4f3); ?>
<?php endif; ?>

    
    <?php if (isset($component)) { $__componentOriginalba421f08b6b43aecb09f8eebe577a4f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalba421f08b6b43aecb09f8eebe577a4f3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form-section','data' => ['icon' => 'bi-question-circle','title' => 'FAQ Section','subtitle' => 'Frequently asked questions for this service']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.form-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'bi-question-circle','title' => 'FAQ Section','subtitle' => 'Frequently asked questions for this service']); ?>
        <div id="faq-fields">
            <div class="ap-repeater-item">
                <?php if (isset($component)) { $__componentOriginala36faa2d443b9f600fa80effd7afe361 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala36faa2d443b9f600fa80effd7afe361 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.field','data' => ['type' => 'text','name' => 'faq_question[]','label' => 'FAQ Question','value' => old('faq_question.0'),'required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'faq_question[]','label' => 'FAQ Question','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('faq_question.0')),'required' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $attributes = $__attributesOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__attributesOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $component = $__componentOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__componentOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginala36faa2d443b9f600fa80effd7afe361 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala36faa2d443b9f600fa80effd7afe361 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.field','data' => ['type' => 'textarea','name' => 'faq_answer[]','label' => 'FAQ Answer','rows' => '3','value' => old('faq_answer.0')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'textarea','name' => 'faq_answer[]','label' => 'FAQ Answer','rows' => '3','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('faq_answer.0'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $attributes = $__attributesOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__attributesOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $component = $__componentOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__componentOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>
                <button type="button" class="btn btn-outline-danger btn-sm ap-repeater-remove remove-faq">
                    <i class="bi bi-trash3"></i> Remove
                </button>
            </div>
        </div>
        <button type="button" class="ap-repeater-add-btn w-100" id="add-faq">
            <i class="bi bi-plus-lg"></i> Add FAQ
        </button>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalba421f08b6b43aecb09f8eebe577a4f3)): ?>
<?php $attributes = $__attributesOriginalba421f08b6b43aecb09f8eebe577a4f3; ?>
<?php unset($__attributesOriginalba421f08b6b43aecb09f8eebe577a4f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalba421f08b6b43aecb09f8eebe577a4f3)): ?>
<?php $component = $__componentOriginalba421f08b6b43aecb09f8eebe577a4f3; ?>
<?php unset($__componentOriginalba421f08b6b43aecb09f8eebe577a4f3); ?>
<?php endif; ?>

    
    <?php if (isset($component)) { $__componentOriginalba421f08b6b43aecb09f8eebe577a4f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalba421f08b6b43aecb09f8eebe577a4f3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form-section','data' => ['icon' => 'bi-graph-up-arrow','title' => 'SEO Meta Data','subtitle' => 'Search engine metadata for this service page']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.form-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'bi-graph-up-arrow','title' => 'SEO Meta Data','subtitle' => 'Search engine metadata for this service page']); ?>
        <?php if (isset($component)) { $__componentOriginala36faa2d443b9f600fa80effd7afe361 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala36faa2d443b9f600fa80effd7afe361 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.field','data' => ['type' => 'text','name' => 'meta_title','label' => 'SEO Meta Title','icon' => 'bi-type','hint' => '60 characters max','value' => old('meta_title'),'errorKey' => 'meta_title']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'meta_title','label' => 'SEO Meta Title','icon' => 'bi-type','hint' => '60 characters max','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('meta_title')),'error-key' => 'meta_title']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $attributes = $__attributesOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__attributesOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $component = $__componentOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__componentOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginala36faa2d443b9f600fa80effd7afe361 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala36faa2d443b9f600fa80effd7afe361 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.field','data' => ['type' => 'textarea','name' => 'meta_description','label' => 'SEO Meta Description','icon' => 'bi-text-paragraph','hint' => '200 characters max','value' => old('meta_description'),'rows' => '3','errorKey' => 'meta_description']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'textarea','name' => 'meta_description','label' => 'SEO Meta Description','icon' => 'bi-text-paragraph','hint' => '200 characters max','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('meta_description')),'rows' => '3','error-key' => 'meta_description']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $attributes = $__attributesOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__attributesOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $component = $__componentOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__componentOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginala36faa2d443b9f600fa80effd7afe361 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala36faa2d443b9f600fa80effd7afe361 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.field','data' => ['type' => 'text','name' => 'meta_slug','label' => 'Meta Slug','icon' => 'bi-link-45deg','hint' => 'e.g. my-service','value' => old('meta_slug')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'meta_slug','label' => 'Meta Slug','icon' => 'bi-link-45deg','hint' => 'e.g. my-service','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('meta_slug'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $attributes = $__attributesOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__attributesOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala36faa2d443b9f600fa80effd7afe361)): ?>
<?php $component = $__componentOriginala36faa2d443b9f600fa80effd7afe361; ?>
<?php unset($__componentOriginala36faa2d443b9f600fa80effd7afe361); ?>
<?php endif; ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalba421f08b6b43aecb09f8eebe577a4f3)): ?>
<?php $attributes = $__attributesOriginalba421f08b6b43aecb09f8eebe577a4f3; ?>
<?php unset($__attributesOriginalba421f08b6b43aecb09f8eebe577a4f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalba421f08b6b43aecb09f8eebe577a4f3)): ?>
<?php $component = $__componentOriginalba421f08b6b43aecb09f8eebe577a4f3; ?>
<?php unset($__componentOriginalba421f08b6b43aecb09f8eebe577a4f3); ?>
<?php endif; ?>

    
    <div class="ap-form-actions" style="position: static; margin: 0; border-radius: var(--ap-radius); border: 1px solid var(--ap-border);">
        <a href="<?php echo e(route('service.index')); ?>" class="btn btn-outline-secondary">Cancel</a>
        <button type="submit" class="btn btn-primary px-4">
            <i class="bi bi-check-lg"></i> Save Service
        </button>
    </div>
</form>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

<script>
    CKEDITOR.replace('content_2');
    CKEDITOR.replace('content_3');
</script>


<script>
(function () {
    const form            = document.getElementById('serviceForm');
    const draftUuidInput  = document.getElementById('draft_uuid');
    const toast           = document.getElementById('draftToast');
    const toastText       = toast.querySelector('.ap-toast-text');

    const AUTOSAVE_URL = "<?php echo e(route('service.autosave')); ?>";
    const CSRF_TOKEN    = "<?php echo e(csrf_token()); ?>";
    const FORM_TYPE     = "create";
    const SERVICE_ID    = null;
    const RESUME_PAYLOAD = <?php echo json_encode($resumeDraft ?? null, 15, 512) ?>;

    let lastSerialized = null;
    let isSaving = false;

    function syncEditors() {
        if (window.CKEDITOR) {
            ['content_2', 'content_3'].forEach(function (id) {
                if (CKEDITOR.instances[id]) CKEDITOR.instances[id].updateElement();
            });
        }
    }

    function collectPayload() {
        syncEditors();
        const payload = {};
        form.querySelectorAll('input, textarea, select').forEach(function (el) {
            if (!el.name || el.type === 'file') return;
            if ((el.type === 'checkbox' || el.type === 'radio') && !el.checked) return;

            const name = el.name;
            if (name.endsWith('[]')) {
                const key = name.slice(0, -2);
                (payload[key] = payload[key] || []).push(el.value);
            } else {
                payload[name] = el.value;
            }
        });
        return payload;
    }

    function setToast(state, msg) {
        toast.classList.remove('ap-toast-saving', 'ap-toast-saved', 'ap-toast-error');
        toast.classList.add('ap-toast-' + state);
        toastText.textContent = msg;
    }

    async function saveDraft() {
        if (isSaving) return;
        const payload    = collectPayload();
        const serialized = JSON.stringify(payload);
        if (serialized === lastSerialized) return;

        isSaving = true;
        setToast('saving', 'Saving draft...');

        try {
            const res = await fetch(AUTOSAVE_URL, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': CSRF_TOKEN,
                    'Accept': 'application/json',
                },
                body: JSON.stringify({
                    draft_uuid: draftUuidInput.value,
                    form_type:  FORM_TYPE,
                    service_id: SERVICE_ID,
                    payload:    payload,
                }),
            });
            if (!res.ok) throw new Error('HTTP ' + res.status);

            lastSerialized = serialized;
            setToast('saved', 'Draft saved · ' + new Date().toLocaleTimeString());
        } catch (err) {
            console.error('Draft autosave error:', err);
            setToast('error', 'Could not save draft — retrying...');
        } finally {
            isSaving = false;
        }
    }

    // ---- Resume a previously saved draft (from index "Continue editing") ----
    function restoreRepeaters(key, count) {
        const addButtonMap = {
            about_title: 'addServiceBtn',
            why_choose_title: 'addWhyChooseBtn',
            tab_title: 'addTabContentBtn',
            faq_question: 'add-faq',
        };
        const btn = document.getElementById(addButtonMap[key]);
        if (!btn) return;
        for (let i = 1; i < count; i++) btn.click(); // row 0 already exists in markup
    }

    function restoreDraftIntoForm(payload) {
        if (!payload) return;

        // Repeaters first, so the newly created inputs exist before we fill them
        if (Array.isArray(payload.about_title)) restoreRepeaters('about_title', payload.about_title.length);
        if (Array.isArray(payload.why_choose_title)) restoreRepeaters('why_choose_title', payload.why_choose_title.length);
        if (Array.isArray(payload.tab_title)) restoreRepeaters('tab_title', payload.tab_title.length);
        if (Array.isArray(payload.faq_question)) restoreRepeaters('faq_question', payload.faq_question.length);

        Object.keys(payload).forEach(function (key) {
            const value = payload[key];

            if (Array.isArray(value)) {
                const elements = form.querySelectorAll('[name="' + key + '[]"]');
                elements.forEach(function (el, idx) {
                    if (value[idx] !== undefined) el.value = value[idx];
                });
            } else {
                const el = form.querySelector('[name="' + key + '"]');
                if (el) el.value = value;
            }
        });

        // Rich text editors need their content pushed in after CKEDITOR init
        setTimeout(function () {
            if (window.CKEDITOR) {
                if (payload.content_2 && CKEDITOR.instances.content_2) CKEDITOR.instances.content_2.setData(payload.content_2);
                if (payload.content_3 && CKEDITOR.instances.content_3) CKEDITOR.instances.content_3.setData(payload.content_3);
            }
        }, 300);

        // Order feature tags (stored as a JSON string in a hidden field)
        if (payload.order_feature_titles) {
            try {
                const tags = JSON.parse(payload.order_feature_titles);
                if (Array.isArray(tags) && window.__renderOrderFeatureTags) {
                    window.__renderOrderFeatureTags(tags);
                }
            } catch (e) { /* ignore malformed value */ }
        }

        lastSerialized = JSON.stringify(collectPayload());
        setToast('saved', 'Draft restored from your last session');
    }

    if (RESUME_PAYLOAD) {
        document.addEventListener('DOMContentLoaded', function () {
            restoreDraftIntoForm(RESUME_PAYLOAD);
        });
    }

    setInterval(saveDraft, 5000);
})();
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    function addField(containerId, fieldHTML) {
        document.getElementById(containerId).insertAdjacentHTML('beforeend', fieldHTML);
    }
    function setupRemoveButton(containerId, btnClass) {
        document.getElementById(containerId).addEventListener('click', function (e) {
            if (e.target.closest('.' + btnClass)) {
                e.target.closest('.ap-repeater-item').remove();
            }
        });
    }

    // ---- About Services ----
    document.getElementById('addServiceBtn').addEventListener('click', function () {
        addField('about-service-fields', `
            <div class="ap-repeater-item">
                <div class="ap-field">
                    <label class="ap-field-label">Service Title <span class="ap-field-hint">3 words max</span></label>
                    <input type="text" name="about_title[]" class="form-control" placeholder="Enter Service Title" required>
                </div>
                <div class="ap-field">
                    <label class="ap-field-label">Service Description <span class="ap-field-hint">120 characters max</span></label>
                    <textarea name="about_description[]" class="form-control" placeholder="Enter Service Description" required></textarea>
                </div>
                <div class="ap-field">
                    <label class="ap-field-label">Icon Class <span class="ap-field-hint">e.g. bi bi-check-circle</span></label>
                    <input type="text" name="about_icon_class[]" class="form-control" placeholder="Enter Icon Class" required>
                </div>
                <button type="button" class="btn btn-outline-danger btn-sm ap-repeater-remove remove-btn">
                    <i class="bi bi-trash3"></i> Remove
                </button>
            </div>`);
    });
    setupRemoveButton('about-service-fields', 'remove-btn');

    // ---- Why Choose Us ----
    document.getElementById('addWhyChooseBtn').addEventListener('click', function () {
        addField('why-choose-us-fields', `
            <div class="ap-repeater-item">
                <div class="ap-field">
                    <label class="ap-field-label">Feature Title <span class="ap-field-hint">3 words max</span></label>
                    <input type="text" name="why_choose_title[]" class="form-control" placeholder="Enter Feature Title" required>
                </div>
                <div class="ap-field">
                    <label class="ap-field-label">Feature Description <span class="ap-field-hint">160 characters max</span></label>
                    <textarea name="why_choose_description[]" class="form-control" placeholder="Enter Feature Description" required></textarea>
                </div>
                <div class="ap-field">
                    <label class="ap-field-label">Icon Class <span class="ap-field-hint">e.g. bi bi-shield-check</span></label>
                    <input type="text" name="why_choose_icon_class[]" class="form-control" placeholder="Enter Icon Class" required>
                </div>
                <button type="button" class="btn btn-outline-danger btn-sm ap-repeater-remove remove-btn">
                    <i class="bi bi-trash3"></i> Remove
                </button>
            </div>`);
    });
    setupRemoveButton('why-choose-us-fields', 'remove-btn');

    // ---- Tab Content ----
    document.getElementById('addTabContentBtn').addEventListener('click', function () {
        addField('tabContentContainer', `
            <div class="ap-repeater-item">
                <div class="row">
                    <div class="col-md-5">
                        <div class="ap-field">
                            <label class="ap-field-label">Title <span class="ap-field-hint">2 words max</span></label>
                            <input type="text" class="form-control" name="tab_title[]" required>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="ap-field">
                            <label class="ap-field-label">Description <span class="ap-field-hint">1500 characters max</span></label>
                            <textarea class="form-control" name="tab_description[]" rows="2" required></textarea>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-outline-danger btn-sm ap-repeater-remove remove-btn">
                    <i class="bi bi-trash3"></i> Remove
                </button>
            </div>`);
    });
    setupRemoveButton('tabContentContainer', 'remove-btn');

    // ---- FAQ ----
    document.getElementById('add-faq').addEventListener('click', function () {
        addField('faq-fields', `
            <div class="ap-repeater-item">
                <div class="ap-field">
                    <label class="ap-field-label">FAQ Question</label>
                    <input type="text" name="faq_question[]" class="form-control" placeholder="Enter FAQ Question" required>
                </div>
                <div class="ap-field">
                    <label class="ap-field-label">FAQ Answer</label>
                    <textarea name="faq_answer[]" rows="3" class="form-control" placeholder="Enter FAQ Answer"></textarea>
                </div>
                <button type="button" class="btn btn-outline-danger btn-sm ap-repeater-remove remove-faq">
                    <i class="bi bi-trash3"></i> Remove
                </button>
            </div>`);
    });
    setupRemoveButton('faq-fields', 'remove-faq');

    // ---- Image count guard ----
    var testImages = document.getElementById('test_images');
    if (testImages) {
        testImages.addEventListener('change', function () {
            if (this.files.length > 3) {
                alert('You can upload a maximum of 3 images.');
                this.value = '';
            }
        });
    }

    // ---- Order Feature Tags ----

    window.__renderOrderFeatureTags = function (restoredTags) {
        tags = restoredTags;
        renderTags();
    };

    let tags = [];

    function renderTags() {
        const container = document.getElementById('order-feature-tags');
        container.innerHTML = '';
        tags.forEach(function (tag) {
            const pill = document.createElement('span');
            pill.className = 'ap-tag-pill';
            pill.innerHTML = tag.replace(/</g, '&lt;') + '<button type="button" class="remove-tag" aria-label="Remove tag">&times;</button>';
            container.appendChild(pill);
        });
        document.getElementById('order_feature_titles').value = JSON.stringify(tags);
    }
    const tagInput = document.getElementById('tag-input');

    function addTag(val) {
        val = val.trim();
        if (val && !tags.includes(val)) {
            tags.push(val);
            renderTags();
        }
    }

    tagInput.addEventListener('keydown', function (e) {
        if (e.key === 'Enter' || e.key === ',') {
            e.preventDefault();
            const val = this.value.trim().replace(/,$/, '');
            addTag(val);
            this.value = '';
        }
    });

    // NEW: paste handler — comma-separated text ko auto tags bana do
    tagInput.addEventListener('paste', function (e) {
        e.preventDefault();
        const pasted = (e.clipboardData || window.clipboardData).getData('text');
        pasted.split(',').forEach(function (part) {
            addTag(part);
        });
        this.value = '';
    });

    // NEW: agar user tag likh ke focus hata de (Tab/click away) bina Enter dabaye, wo bhi save ho
    tagInput.addEventListener('blur', function () {
        if (this.value.trim()) {
            addTag(this.value);
            this.value = '';
        }
    });
    document.getElementById('order-feature-tags').addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-tag')) {
            const label = e.target.parentElement.textContent.replace('×', '').trim();
            tags = tags.filter(t => t !== label);
            renderTags();
        }
    });
    renderTags();
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make(config('layout.admin_panel_layout'), array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Laravel\Aazz-Agency\resources\views/admin_panel/services/add_service.blade.php ENDPATH**/ ?>