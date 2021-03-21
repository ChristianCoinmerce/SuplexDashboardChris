<?php $__env->startSection('title'); ?>

Add New Post

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-body">
<form method="POST" action="<?php echo e(route('post.create'), false); ?>">
    <input type="hidden" name="_token" value="<?php echo e(csrf_token(), false); ?>">


<div class="form-group">
<input required="required" value="<?php echo e(old('title'), false); ?>" placeholder="Enter title here" type="text" name = "title"class="form-control" />
</div>
<div class="form-group">
<textarea id="mytextarea"  name='body'class="form-control"><?php echo e(old('body'), false); ?></textarea>
</div>
<input type="submit" name='publish' class="btn btn-success" value = "Publish"/>
<input type="submit" name='save' class="btn btn-default" value = "Save Draft" />
</form></div></div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.homepage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/Documents/SuplexDashboardChris/resources/views/dashboard/homepage/create.blade.php ENDPATH**/ ?>