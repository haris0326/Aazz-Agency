

<?php $__env->startSection('title', 'Edit Post'); ?>
<?php $__env->startSection('topbar-title', 'Blog'); ?>

<?php $__env->startSection(config('layout.admin_pages_content')); ?>

    <?php $__env->startPush('styles'); ?>

        <style>
            .ap-featured-preview {
                width: 100%;
                max-width: 280px;
                height: 160px;
                object-fit: cover;
                border-radius: 10px;
                border: 1px solid #e5e7eb;
            }

            .ap-featured-current {
                position: relative;
                display: inline-block;
            }

            .ap-featured-current img {
                display: block;
            }

            .ap-image-label {
                display: inline-flex;
                align-items: center;
                gap: 6px;
                margin-top: 8px;
                font-size: 12px;
                color: #6b7280;
            }
        </style>
    <?php $__env->stopPush(); ?>

    <?php if (isset($component)) { $__componentOriginalcb19cb35a534439097b02b8af91726ee = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcb19cb35a534439097b02b8af91726ee = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.page-header','data' => ['title' => 'Edit Post','subtitle' => 'Update '.e($blog->title ?: 'this blog post').'','breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.panel')],
            ['label' => 'Blog', 'url' => route('blog.index')],
            ['label' => 'Edit']
        ]]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Edit Post','subtitle' => 'Update '.e($blog->title ?: 'this blog post').'','breadcrumbs' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
            ['label' => 'Dashboard', 'url' => route('admin.panel')],
            ['label' => 'Blog', 'url' => route('blog.index')],
            ['label' => 'Edit']
        ])]); ?>
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

    <?php if($errors->any()): ?>

        <div class="alert alert-danger d-flex gap-2 align-items-start mb-4"> <i
                class="bi bi-exclamation-triangle-fill mt-1"></i>
            <div> <strong>There were some errors with your submission:</strong>
                <ul class="mb-0 mt-1"> <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
    </div> <?php endif; ?> <form id="blogForm" action="<?php echo e(route('blog.update', $blog->id)); ?>" method="POST"
        enctype="multipart/form-data"> <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
        <?php if (isset($component)) { $__componentOriginalba421f08b6b43aecb09f8eebe577a4f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalba421f08b6b43aecb09f8eebe577a4f3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form-section','data' => ['icon' => 'bi-file-text','title' => 'Post Details','subtitle' => 'Title, category and short summary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.form-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'bi-file-text','title' => 'Post Details','subtitle' => 'Title, category and short summary']); ?>
            <?php if (isset($component)) { $__componentOriginala36faa2d443b9f600fa80effd7afe361 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala36faa2d443b9f600fa80effd7afe361 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.field','data' => ['type' => 'text','name' => 'title','id' => 'title','label' => 'Post Title','icon' => 'bi-type','value' => old('title', $blog->title),'required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'title','id' => 'title','label' => 'Post Title','icon' => 'bi-type','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('title', $blog->title)),'required' => true]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.field','data' => ['type' => 'text','name' => 'slug','id' => 'slug','label' => 'URL Slug','icon' => 'bi-link-45deg','value' => old('slug', $blog->slug),'hint' => 'Public URL: /blog/your-slug — editable']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'slug','id' => 'slug','label' => 'URL Slug','icon' => 'bi-link-45deg','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('slug', $blog->slug)),'hint' => 'Public URL: /blog/your-slug — editable']); ?>
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
                <label class="ap-field-label">
                    <i class="bi bi-tag"></i> Category
                </label>

                <input type="text" name="blog_category" id="blog_category" class="form-control" list="categoryOptions"
                    autocomplete="off" placeholder="Type to search existing categories or type a new name"
                    value="<?php echo e(old('blog_category', $blog->category?->name)); ?>">

                <datalist id="categoryOptions">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($cat->name); ?>">
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </datalist>

                <small class="ap-field-hint">
                    Start typing — pick an existing category or type a new name.
                </small>

                <?php $__errorArgs = ['blog_category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="ap-field">
                <label class="ap-field-label">
                    <i class="bi bi-tags"></i> Tags
                </label>

                <div class="ap-tag-input-wrapper" id="tag-wrapper">
                    <div id="tag-pills" class="d-flex flex-wrap gap-2"></div>

                    <input type="text" id="tag-input" class="ap-tag-input-field" placeholder="Type and press Enter..."
                        autocomplete="off">
                </div>

                <input type="hidden" name="tags" id="tags"
                    value="<?php echo e(old('tags', is_array($blog->tags) ? implode(',', $blog->tags) : (string) $blog->tags)); ?>">

                <?php $__errorArgs = ['tags'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="ap-field">
                <label class="ap-field-label">
                    <i class="bi bi-image"></i> Featured Image
                </label>

                <input type="file" name="featured_image" id="featured_image" class="form-control"
                    accept="image/jpeg,image/png,image/jpg,image/webp">

                <?php if($blog->featured_image): ?>
                    <div class="mt-2">
                        <div class="ap-featured-current">
                            <img src="<?php echo e(asset($blog->featured_image)); ?>" alt="<?php echo e($blog->title); ?>" class="ap-featured-preview">
                        </div>

                        <div class="ap-image-label">
                            <i class="bi bi-check-circle-fill text-success"></i>
                            Current featured image
                        </div>
                    </div>
                <?php endif; ?>

                <img id="featuredPreview" class="ap-featured-preview mt-2" style="display:none;"
                    alt="New featured image preview">

                <small class="ap-field-hint">
                    Leave empty to keep the current image. Maximum size: 4 MB.
                </small>

                <?php $__errorArgs = ['featured_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                <?php unset($message);
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form-section','data' => ['icon' => 'bi-file-earmark-richtext','title' => 'Content','subtitle' => 'The full article body']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.form-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'bi-file-earmark-richtext','title' => 'Content','subtitle' => 'The full article body']); ?>
            <div class="ap-field">
                <label class="ap-field-label">
                    <i class="bi bi-text-paragraph"></i> Article Content
                    <span class="ap-required">*</span>
                </label>

                <textarea name="content" id="content" rows="15"
                    class="form-control <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e(old('content', $blog->content)); ?></textarea>

                <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                <?php unset($message);
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form-section','data' => ['icon' => 'bi-graph-up-arrow','title' => 'SEO Meta Data','subtitle' => 'Controls how this post appears in Google search results']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.form-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'bi-graph-up-arrow','title' => 'SEO Meta Data','subtitle' => 'Controls how this post appears in Google search results']); ?>
            <?php if (isset($component)) { $__componentOriginala36faa2d443b9f600fa80effd7afe361 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala36faa2d443b9f600fa80effd7afe361 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.field','data' => ['type' => 'text','name' => 'meta_title','id' => 'meta_title','label' => 'SEO Meta Title','icon' => 'bi-type','value' => old('meta_title', $blog->seo?->meta_title),'hint' => '60 characters max — recommended for SEO','required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'meta_title','id' => 'meta_title','label' => 'SEO Meta Title','icon' => 'bi-type','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('meta_title', $blog->seo?->meta_title)),'hint' => '60 characters max — recommended for SEO','required' => true]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.field','data' => ['type' => 'textarea','name' => 'meta_description','id' => 'meta_description','label' => 'SEO Meta Description','icon' => 'bi-text-paragraph','value' => old('meta_description', $blog->seo?->meta_description),'hint' => '150–160 characters recommended for SEO','rows' => '3','required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'textarea','name' => 'meta_description','id' => 'meta_description','label' => 'SEO Meta Description','icon' => 'bi-text-paragraph','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('meta_description', $blog->seo?->meta_description)),'hint' => '150–160 characters recommended for SEO','rows' => '3','required' => true]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.field','data' => ['type' => 'text','name' => 'meta_keywords','id' => 'meta_keywords','label' => 'Meta Keywords','icon' => 'bi-key','value' => old('meta_keywords', $blog->seo?->meta_keywords),'hint' => 'Comma separated, optional']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','name' => 'meta_keywords','id' => 'meta_keywords','label' => 'Meta Keywords','icon' => 'bi-key','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('meta_keywords', $blog->seo?->meta_keywords)),'hint' => 'Comma separated, optional']); ?>
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

        <div class="ap-form-actions"
            style="position: static; margin: 0; border-radius: var(--ap-radius); border: 1px solid var(--ap-border);">
            <a href="<?php echo e(route('blog.index')); ?>" class="btn btn-outline-secondary">
                Cancel
            </a>

            <button type="submit" class="btn btn-primary px-4">
                <i class="bi bi-check-lg"></i> Update Post
            </button>
        </div>

    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

    <script> CKEDITOR.replace('content', { filebrowserUploadUrl: "<?php echo e(route('blog.upload-image')); ?>?_token=<?php echo e(csrf_token()); ?>", filebrowserUploadMethod: 'form', height: 400, }); </script>
    <script> document.addEventListener('DOMContentLoaded', function () { // --------------------------------------------------------- // Slug // --------------------------------------------------------- const titleEl = document.getElementById('title'); const slugEl = document.getElementById('slug'); let slugTouched = false; slugEl.addEventListener('input', function () { slugTouched = true; }); titleEl.addEventListener('input', function () { if (slugTouched) return; slugEl.value = this.value .toLowerCase() .trim() .replace(/[^a-z0-9\s-]/g, '') .replace(/\s+/g, '-') .replace(/-+/g, '-'); }); // --------------------------------------------------------- // Featured image preview // --------------------------------------------------------- const imageInput = document.getElementById('featured_image'); const imagePreview = document.getElementById('featuredPreview'); imageInput.addEventListener('change', function (e) { const file = e.target.files[0]; if (!file) { imagePreview.src = ''; imagePreview.style.display = 'none'; return; } imagePreview.src = URL.createObjectURL(file); imagePreview.style.display = 'block'; }); // --------------------------------------------------------- // Tags // --------------------------------------------------------- const tagPills = document.getElementById('tag-pills'); const tagInput = document.getElementById('tag-input'); const tagsHidden = document.getElementById('tags'); let tags = []; const initialTags = tagsHidden.value .split(',') .map(tag => tag.trim()) .filter(Boolean); initialTags.forEach(function (tag) { if (!tags.includes(tag)) { tags.push(tag); } }); function renderTags() { tagPills.innerHTML = ''; tags.forEach(function (tag) { const pill = document.createElement('span'); pill.className = 'ap-tag-pill'; const label = document.createElement('span'); label.textContent = tag; const removeButton = document.createElement('button'); removeButton.type = 'button'; removeButton.className = 'remove-tag'; removeButton.setAttribute('aria-label', 'Remove tag'); removeButton.innerHTML = '&times;'; pill.appendChild(label); pill.appendChild(removeButton); tagPills.appendChild(pill); }); tagsHidden.value = tags.join(','); } function addTag(value) { value = value.trim(); if (!value) return; if (!tags.includes(value)) { tags.push(value); renderTags(); } } tagInput.addEventListener('keydown', function (e) { if (e.key === 'Enter' || e.key === ',') { e.preventDefault(); const value = this.value .trim() .replace(/,$/, ''); addTag(value); this.value = ''; } }); tagInput.addEventListener('blur', function () { if (this.value.trim()) { addTag(this.value); this.value = ''; } }); tagPills.addEventListener('click', function (e) { const button = e.target.closest('.remove-tag'); if (!button) return; const pill = button.closest('.ap-tag-pill'); const label = pill.querySelector('span')?.textContent.trim(); tags = tags.filter(function (tag) { return tag !== label; }); renderTags(); }); renderTags(); }); </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make(config('layout.admin_panel_layout'), array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Laravel\Aazz-Agency\resources\views/admin_panel/blog/edit_blog.blade.php ENDPATH**/ ?>