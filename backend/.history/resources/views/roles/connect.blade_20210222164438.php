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
                        <th>Actions</th>
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
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->description }}</td>
                    <td>@foreach($role->permission as $permission)
                        {{ $loop->first ? '' : ', ' }}
                            {{ $permission->name }}
                        @endforeach
                    </td>
                    <td>
                        <a href="#editUserModal{{ $role['id'] }}" style="color:green" data-toggle="modal">E</a>
                        <a href="#deleteUserModal{{ $role['id'] }}" class="delete" data-toggle="modal">D</a>

                        <div id="deleteUserModal{{ $role['id'] }}" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="GET" action="{{ route('roles.destroy', $role['id']) }}">
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
                                            <a href="{{  url('roles/destroy/'.$role['id']) }}"><button class="btn btn-danger">Delete</button></a>
                                        </div>
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
                {{-- {{ $roles->links() }} --}}
            </div>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<div id="addEmployeeModal1" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
            <form enctype="multipart/form-data" method="post" action="{{ route('roles.store') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
				<div class="modal-header">
					<h4 class="modal-title">Add Role</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Role Name</label>
						<input type="text" name="name" class="form-control"/>
					</div>
					<div class="form-group">
						<label>Description</label>
						<input type="text" name="description" class="form-control"/>
					</div>
                        <input type="hidden" name="role_id" class="element text" maxlength="255" size="8" value="{{ dd($role['id']) }}"/></input>
                    <div class="form-group">
                        <label>Role</label>
                    <div class="form-group">
                        <small >Use CTRL to multiselect</small>
                        <select multiple class="form-control" name="permission_id[]">
                            @if($permissions)
                            @foreach($permissions as $permission)
                            <option value="{{ $permission['id'] }}" ><h3>{{ $permission['name'] }}</h3></option>
                            @endforeach
                            @endif
                        </select>
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

@endsection
