<?php $__env->startSection('title', __('Users Management')); ?>
<?php $__env->startSection('content'); ?>


<div class="container-fluid">
    <div class="fade-in">
        <div class="card">
            <div class="card-header">
                User Management
                <div class="card-header-actions">
                    <a href="#addEmployeeModal1" data-toggle="modal" class="card-header-action">
                        <i class="c-icon cil-plus"></i> Create User</a>
                </div>
            </div>
            <div class="card-body" style="overflow: auto;">
                <div class="">
                    <div class="row mb-4">
                        <div class="col form-inline">
                            Per Page: &nbsp;
                            <?php echo Form::open([ 'url' => route('connect.roles'), 'method' => 'get' ]); ?>

                            <?php echo Form::select ( 'per_page', [ '15' => '15', '30' => '30', '60' => '60', '100' => '100'], '15', array('onchange' => "submit()", 'class'=>'form-control')); ?>

                            <?php echo Form::close(); ?>



                            <div class="col form-inline" style="justify-content: flex-end;">
                            <input style="width: 300px !important;" class="form-control" type="text"
                                placeholder="Search...">
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive"  style="overflow-x: inherit;">
                        <table class="table table-striped">
                            <thead class="">
                                <tr>
                                    <th style="cursor:pointer;">ID<i class="text-muted fas fa-sort"></i></th>
                                    <th style="cursor:pointer;">Name<i class="fas fa-sort-up"></i></th>
                                    <th style="cursor:pointer;">E-mail<i class="text-muted fas fa-sort"></i></th>
                                    <th style="cursor:pointer;">Role<i class="text-muted fas fa-sort"></i></th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            
                            <?php if($users): ?>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tbody>
                                <tr class="" id="">
                                    <td><?php echo e($user->id, false); ?></td>
                                    <td><?php echo e($user->name, false); ?></td>
                                    <td><?php echo e($user->email, false); ?></td>
                                    <td>
                                        <?php if($user->roles()->exists()): ?>
                                        <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e($loop->first ? '' : ', ', false); ?>

                                            <?php echo e($role->name, false); ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                        None
                                        <?php endif; ?>
                                    </td>
                                    <td class="" id="">
                                        <div id="editUserModal<?php echo e($user['id'], false); ?>" class="modal fade">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form method="POST" action="<?php echo e(route('user-role.store_userrole'), false); ?>">
                                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token(), false); ?>">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit User</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Name</label>
                                                                <input name="name" value="<?php echo e($user->name, false); ?>" type="name" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Email</label>
                                                                <input type="email" value="<?php echo e($user->email, false); ?>" name="email" class="form-control">
                                                            </div>
                                                            <input type="hidden" name="user_id" class="element text" maxlength="255" size="8" value="<?php echo e($user['id'], false); ?>"/></input>
                                                            <div class="form-group">
                                                            <label>Role</label>
                                                            <div class="form-group">
                                                                <small for="exampleFormControlSelect2">Use CTRL to multiselect</small>
                                                                <select multiple class="form-control" name="role_id[]">
                                                                    <?php if($roles): ?>
                                                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($role['id'], false); ?>" ><h3><?php echo e($role['name'], false); ?></h3></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php endif; ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Password</label>
                                                                <input type="password" name="password" class="form-control"/>
                                                            </div>
                                                            </div>
                                                            <div class="button">
                                                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                                <input type="submit" class="btn btn-info" value="Save">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="deleteUserModal<?php echo e($user['id'], false); ?>" class="modal fade">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form method="GET" action="<?php echo e(route('user-role.destroy', $user['id']), false); ?>">
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
                                                            <a href="<?php echo e(url('user-role/delete/'.$user['id']), false); ?>"><button class="btn btn-danger">Delete</button></a>
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
                                                <a href="" class="dropdown-item">View Profile</a>
                                                <a href="#editUserModal<?php echo e($user['id'], false); ?>" data-toggle="modal" class="dropdown-item">Edit</a>
                                                <a href="#deleteUserModal<?php echo e($user['id'], false); ?>" data-toggle="modal" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </table>
                        <div class="block" style="margin-bottom:-16px">
                            <?php echo e($users->links(), false); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="addEmployeeModal1" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
            <form enctype="multipart/form-data" method="post" action="<?php echo e(route('user-role.store_user'), false); ?>">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token(), false); ?>"/>
				<div class="modal-header">
					<h4 class="modal-title">Add User</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" class="form-control" required/>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" name="email" class="form-control" required/>
					</div>
                        <input type="hidden" name="user_id" class="element text" maxlength="255" size="8" value="<?php echo e($user['id'], false); ?>"/></input>
                    <div class="form-group">
                        <label>Role</label>
                    <div class="form-group">
                        <small >Use CTRL to multiselect</small>
                        <select multiple class="form-control" name="role_id[]">
                            <?php if($roles): ?>
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($role['id'], false); ?>" ><h3><?php echo e($role['name'], false); ?></h3></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control" required/>
					</div>
                    </div>
				</div><br>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-primary" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/Documents/SuplexDashboardChris/resources/views/roles/show.blade.php ENDPATH**/ ?>