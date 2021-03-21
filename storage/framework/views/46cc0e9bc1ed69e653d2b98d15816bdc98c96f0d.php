<?php $__env->startSection('title', __('Roles Management')); ?>
<?php $__env->startSection('content'); ?>


<div class="container-fluid">
    <div class="fade-in">
        <div class="card">
            <div class="card-header">
                Role Management
                <div class="card-header-actions">
                    <a href="#addEmployeeModal1" data-toggle="modal" class="card-header-action">
                        <i class="c-icon cil-plus"></i> Create Role</a>
                </div>
            </div>
            <div class="card-body">
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
                                    <th style="cursor:pointer;">Role<i class="fas fa-sort-up"></i></th>
                                    <th style="cursor:pointer;">Description<i class="text-muted fas fa-sort"></i></th>
                                    <th style="cursor:pointer;">Permissions<i class="text-muted fas fa-sort"></i></th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            

                            <div id="app">
                                {{ message }}
                            </div>

                            <?php if($roles): ?>
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tbody>
                                <tr class="" id="">
                                    <td><?php echo e($role->id, false); ?></td>
                                    <td><?php echo e($role->name, false); ?></td>
                                    <td><?php echo e($role->description, false); ?></td>
                                    <td>

                                        <button href="#showPermission<?php echo e($role['id'], false); ?>"  data-toggle="modal" class="btn btn-sm btn-secondary">Show Perm.</button>
                                        <div></div>

                                    </td>
                                    <td class="" id="">
                                        <div id="editUserModal<?php echo e($role['id'], false); ?>" class="modal fade">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form method="POST" action="<?php echo e(route('roles.update'), false); ?>">
                                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token(), false); ?>">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Role</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Name</label>
                                                                <input name="name" value="<?php echo e($role->name, false); ?>" type="name" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Description</label>
                                                                <input type="name" value="<?php echo e($role->description, false); ?>" name="description" class="form-control">
                                                            </div>
                                                            <input type="hidden" name="role_id" class="element text" maxlength="255" size="8" value="<?php echo e($role['id'], false); ?>"/></input>
                                                            <div class="form-group">
                                                            <label>Permissions</label>
                                                            <div class="form-group">
                                                                <small for="exampleFormControlSelect2">Use CTRL to multiselect</small>
                                                                <select multiple class="form-control" name="permission_id[]" required>
                                                                    <?php if($permissions): ?>
                                                                    <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $perm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($perm['id'], false); ?>" ><h3><?php echo e($perm['description'], false); ?></h3></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php endif; ?>
                                                                </select>
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
                                        <div id="deleteUserModal<?php echo e($role['id'], false); ?>" class="modal fade">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form method="GET" action="<?php echo e(route('roles.destroy', $role['id']), false); ?>">
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
                                                            <a href="<?php echo e(url('roles/destroy/'.$role['id']), false); ?>"><button class="btn btn-danger">Delete</button></a>
                                                        </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="showPermission<?php echo e($role['id'], false); ?>" class="modal fade">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                    <?php if($role->permission()->exists()): ?>
                                                    <?php $a1=$a2=$a3=$a4=$a5=$a6=$a7=$a8=$a9=0; ?>
                                                    <?php $__currentLoopData = $role->permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                                        <?php switch($permission['keyword']):
                                                        case ('dashboard'): ?><div style="background-color:#ced2d8;; border-radius:5px; "><h5>&nbsp;&nbsp;<?php echo e($permission['name'], false); ?></h5></div>
                                                        <?php break; ?>
                                                        <?php case ('user_crud'): ?>
                                                            <?php if($a1==0): ?>
                                                                <div style="margin-bottom: 20px"></div>
                                                                <?php $a1++; ?>
                                                                User CRUD:<br>- <?php echo e($permission['name'], false); ?>

                                                            <?php else: ?>
                                                                - <?php echo e($permission['name'], false); ?>

                                                            <?php endif; ?>
                                                        <?php break; ?>
                                                        <?php case ('roles_crud'): ?>
                                                            <?php if($a2==0): ?>
                                                                <div style="margin-bottom: 20px"></div>
                                                                <?php $a2++; ?>
                                                                Roles CRUD:<br>- <?php echo e($permission['name'], false); ?>

                                                            <?php else: ?>
                                                                - <?php echo e($permission['name'], false); ?>

                                                            <?php endif; ?>
                                                        <?php break; ?>
                                                        <?php case ('posts_crud'): ?>
                                                            <?php if($a3==0): ?>
                                                                <div style="margin-bottom: 20px"></div>
                                                                <?php $a3++; ?>
                                                                Posts CRUD:<br>- <?php echo e($permission['name'], false); ?>

                                                            <?php else: ?>
                                                                - <?php echo e($permission['name'], false); ?>

                                                            <?php endif; ?>
                                                        <?php break; ?>
                                                        <?php case ('comments_crud'): ?>
                                                            <?php if($a4==0): ?>
                                                                <div style="margin-bottom: 20px"></div>
                                                                <?php $a4++; ?>
                                                                Comments CRUD:<br>- <?php echo e($permission['name'], false); ?>

                                                            <?php else: ?>
                                                                - <?php echo e($permission['name'], false); ?>

                                                            <?php endif; ?>
                                                        <?php break; ?>
                                                        <?php case ('homepage'): ?>
                                                                <div style="margin-bottom: 20px"></div>
                                                                <div style="background-color:#ced2d8;; border-radius:5px;"><h5>&nbsp;&nbsp;<?php echo e($permission['name'], false); ?></h5></div>
                                                        <?php break; ?>
                                                        <?php case ('posts_user'): ?>
                                                            <?php if($a5==0): ?>
                                                                <div style="margin-bottom: 20px"></div>
                                                                <?php $a5++; ?>
                                                                Basic Posts<br>- <?php echo e($permission['name'], false); ?>

                                                            <?php else: ?>
                                                                - <?php echo e($permission['name'], false); ?>

                                                            <?php endif; ?>
                                                        <?php break; ?>
                                                        <?php case ('comments_user'): ?>
                                                            <?php if($a6==0): ?>
                                                                <div style="margin-bottom: 20px"></div>
                                                                <?php $a6++; ?>
                                                                Basic Comments<br>- <?php echo e($permission['name'], false); ?>

                                                            <?php else: ?>
                                                                - <?php echo e($permission['name'], false); ?>

                                                            <?php endif; ?>
                                                        <?php break; ?>
                                                        <?php case ('profile_user'): ?>
                                                            <?php if($a7==0): ?>
                                                                <div style="margin-bottom: 20px"></div>
                                                                <?php $a7++; ?>
                                                                Basic User Profile<br>- <?php echo e($permission['name'], false); ?>

                                                            <?php else: ?>
                                                                - <?php echo e($permission['name'], false); ?>

                                                            <?php endif; ?>
                                                        <?php break; ?>
                                                        <?php endswitch; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                    </div>
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
                                                <a href="#editUserModal<?php echo e($role['id'], false); ?>" data-toggle="modal" class="dropdown-item">Edit</a>
                                                <a href="#deleteUserModal<?php echo e($role['id'], false); ?>" data-toggle="modal" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </table>
                        <div class="block" style="margin-bottom:-16px">
                            
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
            <form enctype="multipart/form-data" method="post" action="<?php echo e(route('roles.store'), false); ?>">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token(), false); ?>"/>
				<div class="modal-header">
					<h4 class="modal-title">Create Role</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Role Name</label>
						<input type="text" name="name" class="form-control" required/>
					</div>
					<div class="form-group">
						<label>Description</label>
						<input type="text" name="description" class="form-control" required/>
					</div>
                        <input type="hidden" name="role_id" class="element text" maxlength="255" size="8" value="<?php echo e($role['id'], false); ?>"/></input>
                    <div class="form-group">
                        <label>Permissions</label>
                    <div class="form-group">
                        <small >Use CTRL to multiselect</small>
                        <select multiple class="form-control" name="permission_id[]" required>
                            <?php if($permissions): ?>
                            <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $perm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($perm['id'], false); ?>" ><h3><?php echo e($perm['description'], false); ?></h3></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    </div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-primary" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>

<?php $__env->startSection('javascript'); ?>
    <script src="<?php echo e(asset('js/popovers.js'), false); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/Documents/SuplexDashboardChris/resources/views/roles/connect.blade.php ENDPATH**/ ?>