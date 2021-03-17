@extends('layouts.app')
@section('content')
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title" style="background-color:#212529;">
				<div class="row">
					<div class="col-sm-6" style="width: 250px">
						<h2 style="margin-top:10px">Gebruikers CRUD</h2>
					</div>
					<div>
						<a href="#addEmployeeModal1" class="btn btn-success" data-toggle="modal">Add Role</a>
						<a href="#deleteUserModal2" class="btn btn-danger" data-toggle="modal">Delete</a>
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkAll">
								<label for="selectAll"></label>
							</span>
						</th>
						<th>ID</th>
						<th>Role</th>
						<th>Description</th>
						<th>Permissions</th>
					</tr>
				</thead>
            @if($roles)
            @foreach($roles as $role)
				<tbody><tr>
                    <td>
                        <span class="custom-checkbox">
                            <input type="checkbox" name="delete[]" id="" value="{{ $role['id'] }}"></a>
                            <label for="checkbox1"></label>
                        </span>
                    </td>
                    <td>{{ $role->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>

                    <a href="#editUserModal{{ $user['id'] }}" style="color:green" data-toggle="modal">E</a>
                    <a href="#deleteUserModal{{ $user['id'] }}" class="delete" data-toggle="modal">D</a>
                    <div id="editUserModal{{ $user['id'] }}" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="POST" action="{{  route('user-role.store_userrole') }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit User</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input name="name" value="{{ $user->name }}" type="name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" value="{{ $user->email }}" name="email" class="form-control">
                                        </div>
                                        <input type="hidden" name="user_id" class="element text" maxlength="255" size="8" value="{{ $user['id'] }}"/></input>
                                        <div class="form-group">
                                        <label>Role</label>
                                        <div class="form-group">
                                            <small for="exampleFormControlSelect2">Use CTRL to multiselect</small>
                                            <select multiple class="form-control" name="role_id[]">
                                                @if($roles)
                                                @foreach($roles as $role)
                                                <option value="{{ $role['id'] }}" ><h3>{{ $role['name'] }}</h3></option>
                                                @endforeach
                                                @endif
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
                    <div id="deleteUserModal{{ $user['id'] }}" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="GET" action="{{ route('user-role.destroy', $user['id']) }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Delete Employee</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete these Records?</p>
                                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                                    <div class="button">
                                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                        <a href="{{  url('user-role/delete/'.$user['id']) }}"><button class="btn btn-danger">Delete</button></a>
                                    </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="deleteUserModal2" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="GET" action="{{ route('user-role.destroy', $user['id']) }}">
                                <div class="modal-header">
                                    <h4 class="modal-title">Delete Employee</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete these Records?</p>
                                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                                <div class="button">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                    <a href="{{  url('user-role/destroyAll') }}"><button class="btn btn-danger">Delete</button></a>                                </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    </td>
                </tr></tbody>
            @endforeach
            @endif
			</table>
			<div class="clearfix">
                {{ $users->links() }}
            </div>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
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
<div id="addEmployeeModal2" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
            <form enctype="multipart/form-data" method="post" action="{{ route("user-role.store") }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
				<div class="modal-header">
					<h4 class="modal-title">Add Role</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Name</label>
						<input name="name" class="form-control" maxlength="255" size="8" value=""/>
					</div>
					<div class="form-group">
						<label>Description</label>
                        <input name="description" class="form-control" type="text" maxlength="255" value=""/>
					</div>
                    </div>
                        <input type="hidden" name="permission" class="element text" maxlength="255" size="8" value=""/></input>
                    <div class="form-group">
                        <label>Permissions</label>
                    <div class="form-group">
                        <small >Use CTRL to multiselect</small>
                        <select multiple class="form-control" name="permission[]">
                            {{-- @if($permissions)
                            @foreach($permissions as $permission)
                            <option value="{{ $permission['id'] }}" ><h3>{{ $permission['name'] }}</h3></option>
                            @endforeach
                            @endif --}}
                        </select>
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

@endsection
