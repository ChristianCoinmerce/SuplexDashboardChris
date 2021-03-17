@extends('layouts.app')

@section('content')

<script>
    $(function(){
  $('#form-submit-button').on('click', function(){
    $('#form1').submit();
  });
})
</script>

<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title" style="background-color:#212529;">
				<div class="row">
					<div class="col-sm-6">
						<h2 style="margin-top:10px">Gebruikers CRUD</h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">Add User</a>
                        <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">Add Role</a>
						<a href="#deleteUserModal2" class="btn btn-danger" data-toggle="modal">Delete</a>
                        <button id="form-submit-button">Delete2</button>
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
						<th>Name</th>
						<th>Email</th>
						<th>Role</th>
						<th>Actions</th>
					</tr>
				</thead>
            @if($users)
            @foreach($users as $user)
				<tbody><tr>
                    <td>
                        <span class="custom-checkbox">
                            <form id="form1">
                                <input type="checkbox" id="checkItem" name="id[]" value="{{ $user['id'] }}">
                                <label for="checkbox1"></label>
                            </form>
                        </span>
                    </td>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->roles()->exists())
                        @foreach($user->roles as $role)
                        {{ $loop->first ? '' : ', ' }}
                            {{ $role->name }}
                        @endforeach
                        @else
                           x
                        @endif
                    </td>
                    <td>
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
                                <form method="get" action="{{  route('user-role.destroyAll') }}">
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
                                        <input type="hidden" name="_method" value="delete"><button  class="btn btn-danger" type="submit" >Delete all</button>
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
                {!! $users->render() !!}
            </div>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">
					<h4 class="modal-title">Add Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Address</label>
						<textarea class="form-control" required></textarea>
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input type="text" class="form-control" required>
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
{{-- <div id="editEmployeeModal" data-id="" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
            <form class="appnitro" enctype="multipart/form-data" method="post" action="{{ route('user-role.connect_roles')}}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-header">
					<h4 class="modal-title">Edit User</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Name</label>
                        <select class="form-control" name="user_id">
                            <option value="" selected="selected"></option>
                                @if($users)
                                @foreach($users as $user)
                                <option value="{{ $user['id'] }}" ><h3>{{ $user['name'] }}</h3></option>
                                @endforeach
                                @endif
                        </select>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" required>
					</div>
					<label class="description">Role</label>
                    <div class="form-group">
                    <label for="exampleFormControlSelect2">Use CTRL to multiselect</label>
                        <select multiple class="form-control" id="exampleFormControlSelect2" name="role_id[]">
                            @if($roles)
                            @foreach($roles as $role)
                            <option value="{{ $role['id'] }}" ><h3>{{ $role['name'] }}</h3></option>
                            @endforeach
                            @endif
                        </select>
				    </div>
                    <div class="button">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-info" value="Save">
                    </div>
                </div>
			</form>
		</div>
	</div>
</div> --}}

@endsection
