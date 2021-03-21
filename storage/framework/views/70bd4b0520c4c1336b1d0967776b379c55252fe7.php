<?php $__env->startSection('title'); ?>
Posts
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php if( !$posts->count() ): ?>
There is no post till now. Login and write a new post now!!!
<?php else: ?>
<div class="">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card">
                <div class="card-header">
                    <h4><a href="<?php echo e(url('home/'.$post->slug), false); ?>" style="color: inherit;"><?php echo e($post->title, false); ?></a></h4>
                </div>
                <div class="card-body" style="max-height: 500px; overflow: hidden;
                -webkit-mask-image: linear-gradient(to bottom, black 50%, transparent 100%);
                mask-image: linear-gradient(to bottom, black 50%, transparent 100%);">
                    <?php echo $post->body; ?>

                </div>
                <div class="card-footer">
                    <?php echo e($post->created_at->format('M d,Y \a\t h:i a'), false); ?> By
                    <a href="<?php echo e(url('dashboard/user/'.$post->author_id), false); ?>"><?php echo e($post->author->name, false); ?></a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php echo $posts->render(); ?>

        </div>


    </div>


</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.homepage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/Documents/SuplexDashboardChris/resources/views/dashboard/homepage/index.blade.php ENDPATH**/ ?>