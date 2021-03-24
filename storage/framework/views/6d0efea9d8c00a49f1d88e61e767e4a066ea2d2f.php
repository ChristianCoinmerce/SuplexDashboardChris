<?php $__env->startSection('title', __('Comments Management')); ?>
<?php $__env->startSection('content'); ?>


<div class="container-fluid">
    <div class="fade-in">
        <div class="card">
            <div class="card-header">
                Comments Management
                <div class="card-header-actions">
                    
                </div>
            </div>
            <div class="card-body">
                <div class="">
                    <div class="row mb-4">
                        <div class="col form-inline">
                            Per Page: &nbsp;
                            <?php echo Form::open([ 'url' => route('comments.index'), 'method' => 'get' ]); ?>

                            <?php echo Form::select ( 'per_page', [ '15' => '15', '30' => '30', '60' => '60', '100' => '100'], '15', array('onchange' => "submit()", 'class'=>'form-control')); ?>

                            <?php echo Form::close(); ?>



                            <div class="col form-inline" style="justify-content: flex-end;">
                            <input style="width: 300px !important;" class="form-control" type="text"
                                placeholder="Search...">
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive" style="    overflow-x: inherit;">
                        <table class="table table-striped">
                            <thead class="">
                                <tr>
                                    <th style="cursor:pointer;">ID<i class="text-muted fas fa-sort"></i></th>
                                    <th style="cursor:pointer; width:20%">Title<i class="fas fa-sort-up"></i></th>
                                    <th style="cursor:pointer; max-width:5%">Body<i class="text-muted fas fa-sort"></i></th>
                                    <th style="cursor:pointer; width:180px">Timestamp<i class="text-muted fas fa-sort"></i></th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            
                            <?php if($comments): ?>
                            <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tbody>
                                <tr class="" id="">
                                    <td><?php echo e($comment->id, false); ?></td>
                                    <td><?php echo e($comment->on_post, false); ?></td>
                                    <td style="max-width: 400px"><?php echo str_limit(strip_tags($comment->body, '<div>'), 600); ?></td>
                                    <td><?php echo e($comment->created_at, false); ?>

                                    </td>
                                    <td>
                                        <div id="editUserModal<?php echo e($comment['id'], false); ?>" class="modal fade">
                                            <div class="modal-dialog" >
                                                <div class="modal-content">
                                                    <form method="POST" action="<?php echo e(route('comments.update'), false); ?>">
                                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token(), false); ?>">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Comment</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Text</label>
                                                                <input name="body" value="<?php echo e($comment->body, false); ?>" type="name" class="form-control">
                                                            </div>
                                                            <input type="hidden" name="comment_id" class="element text" maxlength="255" size="8" value="<?php echo e($comment['id'], false); ?>"/></input>
                                                            <div class="button">
                                                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                                <input type="submit" class="btn btn-info" value="Save">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="deleteUserModal<?php echo e($comment['id'], false); ?>" class="modal fade">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form method="GET" action="<?php echo e(route('posts.destroy', $comment['id']), false); ?>">
                                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token(), false); ?>">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Delete Employee</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure you want to delete these Records?</p>
                                                            <p class="text-warning"><small>This action cannot be undone.</small></p>
                                                        <div class="button">
                                                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                            <a href="<?php echo e(url('posts/delete/'.$comment['id']), false); ?>"><button class="btn btn-danger">Delete</button></a>
                                                        </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="dropdown d-inline-block">
                                            <a class="btn btn-sm btn-secondary dropdown-toggle" id="moreMenuLink"
                                                href="#" role="button" data-toggle="dropdown" data-boundary="window"
                                                aria-haspopup="true" aria-expanded="false">Actions
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="moreMenuLink">
                                                <a href="#editUserModal<?php echo e($comment['id'], false); ?>" data-toggle="modal" class="dropdown-item">Edit</a>
                                                <a href="#deleteUserModal<?php echo e($comment['id'], false); ?>" data-toggle="modal" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </table>
                        <div class="block" style="margin-bottom:-16px">
                            <?php echo e($comments->links(), false); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/Documents/SuplexDashboardChris/resources/views/roles/comments.blade.php ENDPATH**/ ?>