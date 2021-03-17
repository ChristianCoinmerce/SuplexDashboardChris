@extends('layouts.app')
@section('title', __('Role Management'))
@section('content')


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
                            {!! Form::open([ 'url' => route('connect.roles'), 'method' => 'get' ]) !!}
                            {!! Form::select ( 'per_page', [ '15' => '15', '30' => '30', '60' => '60', '100' => '100'], '15', array('onchange' => "submit()", 'class'=>'form-control')) !!}
                            {!! Form::close() !!}

                            <div class="col form-inline" style="justify-content: flex-end;">
                            <input style="width: 300px !important;" class="form-control" type="text"
                                placeholder="Search...">
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
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
                            {{-- <tbody wire:loading.class.remove="d-none" class="d-none">
                                <tr>
                                    <td colspan="8">
                                        Loading... </td>
                                </tr>
                            </tbody> --}}
                            @if($roles)
                            @foreach($roles as $role)
                            <tbody>
                                <tr class="" id="">
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->description }}</td>
                                    <td>
                                        <button class="btn btn-secondary" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="right" data-content="
                                        @if($role->permission()->exists())
                                        @foreach($role->permission as $permission)
                                        {{ $loop->first ? '' : ', ' }}
                                        {{ $permission->name }}
                                        @endforeach
                                        @else
                                        None
                                        @endif"
                                        >Hover</button>
                                    </td>
                                    <td class="" id="">
                                        <div id="editUserModal{{ $role['id'] }}" class="modal fade">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form method="POST" action="{{  route('roles.update') }}">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit User</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Name</label>
                                                                <input name="name" value="{{ $role->name }}" type="name" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Description</label>
                                                                <input type="name" value="{{ $role->description }}" name="description" class="form-control">
                                                            </div>
                                                            <input type="hidden" name="role_id" class="element text" maxlength="255" size="8" value="{{ $role['id'] }}"/></input>
                                                            <div class="form-group">
                                                            <label>Permissions</label>
                                                            <div class="form-group">
                                                                <small for="exampleFormControlSelect2">Use CTRL to multiselect</small>
                                                                <select multiple class="form-control" name="permission_id[]" required>
                                                                    @if($permissions)
                                                                    @foreach($permissions as $perm)
                                                                    <option value="{{ $perm['id'] }}" ><h3>{{ $perm['name'] }}</h3></option>
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
                                                            <a href="{{ url('roles/destroy/'.$role['id']) }}"><button class="btn btn-danger">Delete</button></a>
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
                                                <a href="#editUserModal{{ $role['id'] }}" data-toggle="modal" class="dropdown-item">Edit</a>
                                                <a href="#deleteUserModal{{ $role['id'] }}" data-toggle="modal" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                            @endif
                        </table>
                        <div class="block" style="margin-bottom:-16px">
                            {{-- {{ $roles->links() }} --}}
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
            <form enctype="multipart/form-data" method="post" action="{{ route('roles.store') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
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
                        <input type="hidden" name="role_id" class="element text" maxlength="255" size="8" value="{{ $role['id'] }}"/></input>
                    <div class="form-group">
                        <label>Permissions</label>
                    <div class="form-group">
                        <small >Use CTRL to multiselect</small>
                        <select multiple class="form-control" name="permission_id[]" required>
                            @if($permissions)
                            @foreach($permissions as $perm)
                            <option value="{{ $perm['id'] }}" ><h3>{{ $perm['name'] }}</h3></option>
                            @endforeach
                            @endif
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

@section('javascript')
    <script src="{{ asset('js/popovers.js') }}"></script>
@endsection

@endsection
