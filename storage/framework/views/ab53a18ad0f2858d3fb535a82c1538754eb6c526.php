
        <div class="c-sidebar-brand">
            <div style=""><img class="c-sidebar-brand-full" src="<?php echo e(url('/assets/brand/laravel1.png'), false); ?>" width="188" alt="CoreUI Logo"></div>
            <img class="c-sidebar-brand-minimized" src="<?php echo e(url('/assets/brand/laravel1.png'), false); ?>" width="118" height="10" alt="CoreUI Logo">
        </div>
        <ul class="c-sidebar-nav">
            <?php echo $__env->make("dashboard.shared.nav", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </ul>
        <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
    </div>
<?php /**PATH /Users/mac/Documents/SuplexDashboardChris/resources/views/dashboard/shared/nav-builder.blade.php ENDPATH**/ ?>