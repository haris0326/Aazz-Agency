
<header class="ap-topbar">
    <button type="button" class="ap-topbar-toggle" data-sidebar-toggle aria-label="Toggle sidebar">
        <i class="bi bi-list"></i>
    </button>

    <div class="ap-topbar-title d-none d-md-block">
        <?php echo $__env->yieldContent('topbar-title', 'Admin Panel'); ?>
    </div>

    <div class="ap-topbar-actions">
        <div class="dropdown">
            <button class="ap-icon-trigger" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Notifications">
                <i class="bi bi-bell"></i>
                <span class="ap-dot"></span>
            </button>
            <div class="dropdown-menu dropdown-menu-end" style="width: 300px;">
                <h6 class="dropdown-header">Notifications</h6>
                <a class="dropdown-item" href="<?php echo e(route('admin.inquiries.index')); ?>">
                    <i class="bi bi-envelope-paper me-2"></i> New package inquiries received
                </a>
                <a class="dropdown-item" href="<?php echo e(route('admin.proposals.index')); ?>">
                    <i class="bi bi-pencil-square me-2"></i> New leads waiting for review
                </a>
            </div>
        </div>

        <div class="dropdown">
            <button class="ap-user-trigger" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="<?php echo e(asset('admin.png')); ?>" alt="<?php echo e(Auth::user()->name); ?>" class="ap-user-avatar" />
                <span class="ap-user-meta">
                    <span class="name d-block"><?php echo e(Auth::user()->name); ?></span>
                    <span class="role d-block"><?php echo e(ucfirst(Auth::user()->role)); ?></span>
                </span>
                <i class="bi bi-chevron-down small text-muted-ap"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end">
                <div class="px-2 py-1">
                    <div class="fw-semibold"><?php echo e(Auth::user()->name); ?></div>
                    <div class="text-muted-ap small"><?php echo e(ucfirst(Auth::user()->role)); ?></div>
                </div>
                <hr class="my-2">
                <form action="<?php echo e(route('logout')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="dropdown-item text-danger">
                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</header><?php /**PATH D:\Laravel\Aazz-Agency\resources\views/partials/admin_partials_002/admin_header.blade.php ENDPATH**/ ?>