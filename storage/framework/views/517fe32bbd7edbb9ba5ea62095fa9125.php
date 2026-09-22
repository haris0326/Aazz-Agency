
<?php if($paginator->hasPages()): ?>
    <nav aria-label="Pagination">
        <ul class="ap-pagination">
            
            <?php if($paginator->onFirstPage()): ?>
                <li class="ap-page-item disabled"><span class="ap-page-link"><i class="bi bi-chevron-left"></i></span></li>
            <?php else: ?>
                <li class="ap-page-item">
                    <a class="ap-page-link" href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev" aria-label="Previous">
                        <i class="bi bi-chevron-left"></i>
                    </a>
                </li>
            <?php endif; ?>

            
            <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(is_string($element)): ?>
                    <li class="ap-page-item disabled"><span class="ap-page-link ap-page-dots"><?php echo e($element); ?></span></li>
                <?php endif; ?>

                <?php if(is_array($element)): ?>
                    <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($page == $paginator->currentPage()): ?>
                            <li class="ap-page-item active"><span class="ap-page-link"><?php echo e($page); ?></span></li>
                        <?php else: ?>
                            <li class="ap-page-item">
                                <a class="ap-page-link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            
            <?php if($paginator->hasMorePages()): ?>
                <li class="ap-page-item">
                    <a class="ap-page-link" href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next" aria-label="Next">
                        <i class="bi bi-chevron-right"></i>
                    </a>
                </li>
            <?php else: ?>
                <li class="ap-page-item disabled"><span class="ap-page-link"><i class="bi bi-chevron-right"></i></span></li>
            <?php endif; ?>
        </ul>
    </nav>
<?php endif; ?><?php /**PATH D:\Laravel\Aazz-Agency\resources\views/vendor/pagination/admin-theme.blade.php ENDPATH**/ ?>