
<?php if($paginator->hasPages()): ?>
<nav style="display:flex;justify-content:center;gap:6px;margin-top:20px">
    
    <?php if($paginator->onFirstPage()): ?>
        <span style="padding:8px 14px;border-radius:8px;border:1.5px solid #dee2e6;color:#aaa;font-size:14px">&laquo;</span>
    <?php else: ?>
        <a href="<?php echo e($paginator->previousPageUrl()); ?>" style="padding:8px 14px;border-radius:8px;border:1.5px solid #dee2e6;color:var(--teal);font-size:14px;text-decoration:none">&laquo;</a>
    <?php endif; ?>

    
    <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(is_string($element)): ?>
            <span style="padding:8px 14px;border-radius:8px;border:1.5px solid #dee2e6;color:#aaa;font-size:14px"><?php echo e($element); ?></span>
        <?php endif; ?>

        <?php if(is_array($element)): ?>
            <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($page == $paginator->currentPage()): ?>
                    <span style="padding:8px 14px;border-radius:8px;background:var(--teal);color:#fff;font-size:14px;border:1.5px solid var(--teal)"><?php echo e($page); ?></span>
                <?php else: ?>
                    <a href="<?php echo e($url); ?>" style="padding:8px 14px;border-radius:8px;border:1.5px solid #dee2e6;color:var(--teal);font-size:14px;text-decoration:none"><?php echo e($page); ?></a>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    
    <?php if($paginator->hasMorePages()): ?>
        <a href="<?php echo e($paginator->nextPageUrl()); ?>" style="padding:8px 14px;border-radius:8px;border:1.5px solid #dee2e6;color:var(--teal);font-size:14px;text-decoration:none">&raquo;</a>
    <?php else: ?>
        <span style="padding:8px 14px;border-radius:8px;border:1.5px solid #dee2e6;color:#aaa;font-size:14px">&raquo;</span>
    <?php endif; ?>
</nav>
<?php endif; ?>
<?php /**PATH E:\poba-new\POBA-main\resources\views/vendor/pagination/simple-default.blade.php ENDPATH**/ ?>