<div class="container-fluid">
    <div class="fade-in">
        <div class="card">
            <div class="card-header">
                User Management

                <div class="card-header-actions">
                    <a href="#addEmployeeModal1" class="card-header-action">
                        <i class="c-icon cil-plus"></i> Create User</a>
                </div>
                <!--card-header-actions-->
            </div>
            <!--card-header-->

            <div class="card-body">
                <div wire:id="OHqZ850z9DMlg6G3eIhu" class="">
                    <div wire:offline.class="d-block" wire:offline.class.remove="d-none"
                        class="alert alert-danger d-none">
                        You are not currently connected to the internet. </div>
                    <div class="row mb-4">
                        <div class="col form-inline">
                            Per Page: &nbsp;

                            <select wire:model="perPage" class="form-control">
                                <option>10</option>
                                <option>25</option>
                                <option>50</option>
                            </select>
                        </div>
                        <!--col-->

                        <div class="col">
                            <input wire:model.debounce.350ms="search" class="form-control" type="text"
                                placeholder="Search...">
                        </div>

                    </div>
                    <!--row-->

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="">
                                <tr>
                                    <th class="" id="" wire:click="sort('type')" style="cursor:pointer;">
                                        Type

                                        <i class="text-muted fas fa-sort"></i>
                                    </th>
                                    <th class="" id="" wire:click="sort('name')" style="cursor:pointer;">
                                        Name

                                        <i class="fas fa-sort-up"></i>
                                    </th>
                                    <th class="" id="" wire:click="sort('email')" style="cursor:pointer;">
                                        E-mail

                                        <i class="text-muted fas fa-sort"></i>
                                    </th>
                                    <th class="" id="" wire:click="sort('email_verified_at')" style="cursor:pointer;">
                                        Verified

                                        <i class="text-muted fas fa-sort"></i>
                                    </th>
                                    <th class="" id="" wire:click="sort('2fa')" style="cursor:pointer;">
                                        2FA

                                        <i class="text-muted fas fa-sort"></i>
                                    </th>
                                    <th class="" id="">
                                        Roles
                                    </th>
                                    <th class="" id="">
                                        Additional Permissions
                                    </th>
                                    <th class="" id="">
                                        Actions
                                    </th>
                                </tr>
                            </thead>

                            <tbody wire:loading.class.remove="d-none" class="d-none">
                                <tr>
                                    <td colspan="8">
                                        Loading... </td>
                                </tr>
                            </tbody>

                            <tbody>
                                <tr class="" id="">
                                    <td class="" id="">
                                        Administrator
                                    </td>
                                    <td class="" id="">
                                        Super Admin
                                    </td>
                                    <td class="" id="">
                                        <a href="mailto:admin@admin.com">admin@admin.com</a>
                                    </td>
                                    <td class="" id="">
                                        <span class="badge badge-success" data-toggle="tooltip" title=""
                                            data-original-title="Sunday, February 21st 2021, 4:53 AM WIB">Yes</span>

                                    </td>
                                    <td class="" id="">
                                        <span class="badge badge-danger">No</span>

                                    </td>
                                    <td class="" id="">
                                        All
                                    </td>
                                    <td class="" id="">
                                        All
                                    </td>
                                    <td class="" id="">
                                        <a href="https://demo.laravel-boilerplate.com/admin/auth/user/1"
                                            class="btn btn-info btn-sm"><i class="fas fa-search"></i> View</a>


                                        <a href="https://demo.laravel-boilerplate.com/admin/auth/user/1/edit"
                                            class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>






                                        <div class="dropdown d-inline-block">
                                            <a class="btn btn-sm btn-secondary dropdown-toggle" id="moreMenuLink"
                                                href="#" role="button" data-toggle="dropdown" data-boundary="window"
                                                aria-haspopup="true" aria-expanded="false">
                                                More </a>

                                            <div class="dropdown-menu" aria-labelledby="moreMenuLink">
                                                <a href="https://demo.laravel-boilerplate.com/admin/auth/user/1/password/change"
                                                    class="dropdown-item">Change Password</a>

                                            </div>
                                        </div>

                                    </td>
                                </tr>
                                <tr class="" id="">
                                    <td class="" id="">
                                        User
                                    </td>
                                    <td class="" id="">
                                        Test User
                                    </td>
                                    <td class="" id="">
                                        <a href="mailto:user@user.com">user@user.com</a>
                                    </td>
                                    <td class="" id="">
                                        <span class="badge badge-success" data-toggle="tooltip" title=""
                                            data-original-title="Sunday, February 21st 2021, 4:53 AM WIB">Yes</span>

                                    </td>
                                    <td class="" id="">
                                        <span class="badge badge-danger">No</span>

                                    </td>
                                    <td class="" id="">
                                        None
                                    </td>
                                    <td class="" id="">
                                        None
                                    </td>
                                    <td class="" id="">
                                        <a href="https://demo.laravel-boilerplate.com/admin/auth/user/2"
                                            class="btn btn-info btn-sm"><i class="fas fa-search"></i> View</a>


                                        <a href="https://demo.laravel-boilerplate.com/admin/auth/user/2/edit"
                                            class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>




                                        <form method="POST"
                                            action="https://demo.laravel-boilerplate.com/admin/auth/user/2"
                                            name="delete-item" class="d-inline">
                                            <input type="hidden" name="_token"
                                                value="7T3s0526GHVnhPrbY3mwbIY0ImTkI8uVgiebtUNR"> <input type="hidden"
                                                name="_method" value="delete">
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>




                                        <div class="dropdown d-inline-block">
                                            <a class="btn btn-sm btn-secondary dropdown-toggle" id="moreMenuLink"
                                                href="#" role="button" data-toggle="dropdown" data-boundary="window"
                                                aria-haspopup="true" aria-expanded="false">
                                                More </a>

                                            <div class="dropdown-menu" aria-labelledby="moreMenuLink">
                                                <a href="https://demo.laravel-boilerplate.com/admin/auth/user/2/password/change"
                                                    class="dropdown-item">Change Password</a>


                                                <form method="POST"
                                                    action="https://demo.laravel-boilerplate.com/admin/auth/user/2/clear-session"
                                                    name="confirm-item" class="d-inline">
                                                    <input type="hidden" name="_token"
                                                        value="7T3s0526GHVnhPrbY3mwbIY0ImTkI8uVgiebtUNR"> <input
                                                        type="hidden" name="_method" value="POST">
                                                    <button type="submit" class="dropdown-item">
                                                        Clear Session
                                                    </button>
                                                </form>


                                                <a href="https://demo.laravel-boilerplate.com/impersonate/take/2"
                                                    class="dropdown-item">Login As Test User</a>


                                                <form method="POST"
                                                    action="https://demo.laravel-boilerplate.com/admin/auth/user/2/mark/0"
                                                    name="confirm-item" class="d-inline">
                                                    <input type="hidden" name="_token"
                                                        value="7T3s0526GHVnhPrbY3mwbIY0ImTkI8uVgiebtUNR"> <input
                                                        type="hidden" name="_method" value="patch">
                                                    <button type="submit" class="dropdown-item">
                                                        Deactivate
                                                    </button>
                                                </form>

                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                    <!--table-responsive-->

                    <div class="row">
                        <div class="col">
                            <div>
                            </div>

                        </div>

                        <div class="col text-right text-muted">
                            Showing 1 to 2 out of 2 results </div>
                    </div>
                </div>
            </div>
            <!--card-body-->

        </div>
        <!--card-->

    </div>
    <!--fade-in-->
</div>
<div id="addEmployeeModal1" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
            <form enctype="multipart/form-data" method="post" action="{{ route('user-role.store_user') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
				<div class="modal-header">
					<h4 class="modal-title">Add User</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" class="form-control"/>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" name="email" class="form-control"/>
					</div>
                        <input type="hidden" name="user_id" class="element text" maxlength="255" size="8" value="{{ $user['id'] }}"/></input>
                    <div class="form-group">
                        <label>Role</label>
                    <div class="form-group">
                        <small >Use CTRL to multiselect</small>
                        <select multiple class="form-control" name="role_id[]">
                            @if($roles)
                            @foreach($roles as $role)
                            <option value="{{ $role['id'] }}" ><h3>{{ $role['name'] }}</h3></option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control"/>
					</div>
                    </div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>
