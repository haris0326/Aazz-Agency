<!DOCTYPE html>
<html lang="en">

<?php
    /* ===============================
       CENTRAL SEO VARIABLES
    =============================== */
    $seoTitle = $title
        ?? trim($__env->yieldContent('title'))
        ?: config('app.name', 'AazzAgency');

    $seoDescription = $description
        ?? trim($__env->yieldContent('description'))
        ?: 'Default description for Aazz Agency services and solutions.';

    $canonicalUrl = $canonical
        ?? trim($__env->yieldContent('canonical_url'))
        ?: url()->current();

    $seoImage = $og_image
        ?? trim($__env->yieldContent('og_image'))
        ?: asset('assets/images/default-og.png');

    $ogType = trim($__env->yieldContent('og_type')) ?: 'website';
?>

<head>
    <!-- ===============================
    BASIC META
    ================================ -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ===============================
    SEO META (DYNAMIC)
    ================================ -->
    <title><?php echo e($seoTitle); ?></title>

    <meta name="description" content="<?php echo e($seoDescription); ?>">
    <link rel="canonical" href="<?php echo e($canonicalUrl); ?>">

    <!-- ===============================
    OPEN GRAPH
    ================================ -->
    <meta property="og:title" content="<?php echo e($seoTitle); ?>">
    <meta property="og:description" content="<?php echo e($seoDescription); ?>">
    <meta property="og:url" content="<?php echo e($canonicalUrl); ?>">
    <meta property="og:type" content="<?php echo e($ogType); ?>">
    <meta property="og:image" content="<?php echo e($seoImage); ?>">

    <!-- ===============================
    TWITTER CARD
    ================================ -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo e($seoTitle); ?>">
    <meta name="twitter:description" content="<?php echo e($seoDescription); ?>">
    <meta name="twitter:image" content="<?php echo e($seoImage); ?>">

    <!-- ===============================
    SCHEMA (SERVICE / PAGE)
    ================================ -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebPage",
      "name": "<?php echo e(e($seoTitle)); ?>",
      "description": "<?php echo e(e($seoDescription)); ?>",
      "url": "<?php echo e($canonicalUrl); ?>"
    }
    </script>

    <!-- ===============================
    SECURITY
    ================================ -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- ===============================
    VENDOR CSS & FONTS
    ================================ -->
    <script src="<?php echo e(config('web_assets.vendor.tailwind')); ?>"></script>
    <link href="<?php echo e(config('web_assets.vendor.google_fonts')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(config('web_assets.vendor.fontawesome')); ?>">

    <!-- ===============================
    COMMON CSS
    ================================ -->
    <?php $__currentLoopData = config('web_assets.common_css'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $css): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <link rel="stylesheet" href="<?php echo e(asset($css)); ?>">
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



    <!-- ===============================
    PAGE SPECIFIC CSS
    ================================ -->
    <?php echo $__env->yieldPushContent('custom_css'); ?>

</head>


<body class="font-sans antialiased">

    
    <?php echo $__env->make(config('web_assets.partials.header'), array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    
    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    
    <?php echo $__env->make(config('web_assets.partials.footer'), array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    
    <?php $__currentLoopData = config('web_assets.common_js'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $js): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <script src="<?php echo e(asset($js)); ?>" defer></script>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    
    <?php echo $__env->yieldPushContent('custom_js'); ?>

</body>
</html>
<?php /**PATH D:\Laravel\Aazz-Agency\resources\views/layouts/web_layout/main.blade.php ENDPATH**/ ?>