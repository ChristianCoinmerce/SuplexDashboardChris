<?php $__env->startSection('title'); ?>
Posts / <?php echo Str::limit($post->title, $limit = 40, $end = '....'); ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('title-meta'); ?>
<p><?php echo e($post->created_at->format('M d,Y \a\t h:i a'), false); ?> By <a
        href="<?php echo e(url('home/user/'.$post->author_id), false); ?>"><?php echo e($post->author->name, false); ?></a></p>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php if($post): ?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 style="color: inherit;"><?php echo e($post->title, false); ?></h5>
            </div>
            <div class="card-body">
                <?php echo $post->body; ?>

            </div>
            <div class="card-footer" >
                <?php echo e($post->created_at->format('M d,Y \a\t h:i a'), false); ?> By <a href="<?php echo e(url('home/user/'.$post->author_id), false); ?>"><?php echo e($post->author->name, false); ?></a>
                <?php if(!Auth::guest() && ($post->author_id == Auth::user()->id || Auth::user()->is_admin())): ?>
                <a href="<?php echo e(url('home/edit/'.$post->slug), false); ?>" style="color: white; float: right; text-decoration: none; " class="btn-sm btn-info">Edit Post</a>
                <a href="<?php echo e(url('home/delete/'.$post->id.'?_token='.csrf_token()), false); ?>" class="btn-sm btn-warning" style="margin-right:3px; color: white; float: right; text-decoration: none; ">Delete</a>
                <?php endif; ?>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div>
                    <h6>Leave a comment</h6>
                </div>
                <?php if(Auth::guest()): ?>
                <p>Login to Comment</p>
                <?php else: ?>
                <div class="panel-body">
                    <form method="post" action="/home/comment/add">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token(), false); ?>">
                        <input type="hidden" name="on_post" value="<?php echo e($post->id, false); ?>">
                        <input type="hidden" name="slug" value="<?php echo e($post->slug, false); ?>">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Type here" name="body" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                  <button class="btn btn-outline-success" name='post_comment'  type="button">Post</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <?php endif; ?>
            </div>

            <?php if($comments): ?>
            <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card-footer">
                <div>
                    <ul style="list-style: none; padding: 0">
                                    <h3><?php echo e($comment->author->name, false); ?></h3>
                                    <p><?php echo e($comment->created_at->format('M d,Y \a\t h:i a'), false); ?></p>
                                    <p><?php echo e($comment->body, false); ?></p>
                    </ul>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php else: ?>
404 error
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.homepage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/Documents/SuplexDashboardChris/resources/views/dashboard/homepage/show.blade.php ENDPATH**/ ?>