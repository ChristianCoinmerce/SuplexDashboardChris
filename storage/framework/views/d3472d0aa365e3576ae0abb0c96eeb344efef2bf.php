<?php $__env->startSection('title','Edit Post'); ?>

<?php $__env->startSection('content'); ?>
<form method="post" action='<?php echo e(url("home/update"), false); ?>'>
  <input type="hidden" name="_token" value="<?php echo e(csrf_token(), false); ?>">
  <input type="hidden" name="post_id" value="<?php echo e($post->id, false); ?><?php echo e(old('post_id'), false); ?>">

  <div class="card">
    <div class="card-body">
  <div class="form-group">
    <input required="required" placeholder="Enter title here" type="text" name = "title" class="form-control" value="<?php if(!old('title')): ?><?php echo e($post->title, false); ?><?php endif; ?><?php echo e(old('title'), false); ?>"/>
  </div>
  <div class="form-group">
    <textarea name='body' id="mytextarea" class="form-control" style="height: 500px">
      <?php if(!old('body')): ?>
      <?php echo $post->body; ?>

      <?php endif; ?>
      <?php echo old('body'); ?>

    </textarea>
  </div>
  <?php if($post->active == '1'): ?>
  <input type="submit" name='publish' class="btn btn-success" value = "Update"/>
  <?php else: ?>
  <input type="submit" name='publish' class="btn btn-success" value = "Publish"/>
  <?php endif; ?>
  
  <a href="<?php echo e(url('home/delete/'.$post->id.'?_token='.csrf_token()), false); ?>" class="btn btn-danger">Delete</a>
    </div></div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.homepage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/Documents/SuplexDashboardChris/resources/views/dashboard/homepage/edit.blade.php ENDPATH**/ ?>