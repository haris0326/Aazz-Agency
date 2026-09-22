
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Aazz Agency Admin</title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="<?php echo e(asset('admin_panel/css/admin-theme.css')); ?>" rel="stylesheet" />

    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #eef2ff 0%, #f6f7fb 60%);
            padding: 20px;
        }
        .ap-login-card {
            width: 100%;
            max-width: 400px;
            background: #fff;
            border: 1px solid var(--ap-border);
            border-radius: var(--ap-radius-lg);
            box-shadow: var(--ap-shadow-md);
            padding: 36px 32px;
        }
        .ap-login-logo {
            width: 46px; height: 46px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--ap-primary), #7c3aed);
            display: flex; align-items: center; justify-content: center;
            color: #fff; font-weight: 700; font-size: 18px;
            margin: 0 auto 16px;
        }
    </style>
</head>
<body>

    <div class="ap-login-card">
        <div class="ap-login-logo">AZ</div>
        <h4 class="text-center mb-1">Welcome back</h4>
        <p class="text-center text-muted-ap mb-4" style="font-size: 13.5px;">Sign in to Aazz Agency Admin Panel</p>

        <?php if(session('error')): ?>
            <div class="alert alert-danger py-2 small"><?php echo e(session('error')); ?></div>
        <?php endif; ?>
        <?php if(session('success')): ?>
            <div class="alert alert-success py-2 small"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <form action="<?php echo e(route('login.post')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="mb-3">
                <label class="form-label fw-semibold" style="font-size: 13px;">Email</label>
                <input type="email" name="email" value="<?php echo e(old('email')); ?>"
                       class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                       placeholder="you@example.com" autofocus>
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="mb-2">
                <label class="form-label fw-semibold" style="font-size: 13px;">Password</label>
                <div class="input-group">
                    <input type="password" name="password" id="apPassword"
                           class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                           placeholder="••••••••">
                    <button type="button" class="btn btn-outline-secondary" id="apTogglePassword" tabindex="-1">
                        <i class="bi bi-eye" id="apToggleIcon"></i>
                    </button>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-3 py-2">
                <i class="bi bi-box-arrow-in-right"></i> Sign In
            </button>
        </form>

        <p class="text-center text-muted-ap mt-4 mb-0" style="font-size: 12px;">
            Access restricted to Admins and Super Admins.
        </p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('apTogglePassword').addEventListener('click', function () {
            var input = document.getElementById('apPassword');
            var icon = document.getElementById('apToggleIcon');
            var isPassword = input.type === 'password';
            input.type = isPassword ? 'text' : 'password';
            icon.className = isPassword ? 'bi bi-eye-slash' : 'bi bi-eye';
        });
    </script>
</body>
</html><?php /**PATH D:\Laravel\Aazz-Agency\resources\views/auth/login.blade.php ENDPATH**/ ?>