@extends('layouts.app')

@section('content')


<div class="container-fluid">
    <div class="fade-in">
        <div class="card">
            <div class="card-header">
                User Management
                <div class="card-header-actions">
                    <a href="#addEmployeeModal1" class="card-header-action">
                        <i class="c-icon cil-plus"></i> Create User</a>
                </div>
            </div>
            <div class="card-body">
                <div class="">
                    <div class="row mb-4">
                        <div class="col form-inline">
                            Per Page: &nbsp;
                            <select wire:model="perPage" class="form-control">
                                <option>10</option>
                                <option>25</option>
                                <option>50</option>
                            </select>

                            {!! Form::open([ 'url' => route('connect.roles'), 'method' => 'get' ]) !!}
                            {!! Form::select ( 'per_page', [ '15' => '15', '30' => '30', '60' => '60', '100' => '100'], '15', array('onchange' => "submit()", 'class'=>'form-control')) !!}
                            {!! Form::close() !!}
                        </div>

                        <div class="col" style="width: 200px">
                            <input wire:model.debounce.350ms="search" class="form-control" type="text"
                                placeholder="Search...">
                        </div>

                    </div>

                    <div class="table-responsive">
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
                            {{-- <tbody wire:loading.class.remove="d-none" class="d-none">
                                <tr>
                                    <td colspan="8">
                                        Loading... </td>
                                </tr>
                            </tbody> --}}
                            @if($users)
                            @foreach($users as $user)
                            <tbody>
                                <tr class="" id="">
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
                                    <td class="" id="">
                                        <a href="" class="btn btn-info btn-sm"><i class="fas fa-search"></i> View</a>
                                        <a href="#editUserModal{{ $user['id'] }}" data-toggle="modal" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>
                                        <a href="#deleteUserModal{{ $user['id'] }}" data-toggle="modal" class="btn btn-danger btn-sm"><i class="fas fa-pencil-alt"></i> Delete</a>

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

                                        <div class="dropdown d-inline-block">
                                            <a class="btn btn-sm btn-secondary dropdown-toggle" id="moreMenuLink"
                                                href="#" role="button" data-toggle="dropdown" data-boundary="window"
                                                aria-haspopup="true" aria-expanded="false">More
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="moreMenuLink">
                                                <a href="" class="dropdown-item">Change Password</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                            @endif
                        </table>
                        <div class="block">
                            {{ $users->render() }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                        </div>
                        <div class="col text-right text-muted">
                            Showing 1 to 2 out of 2 results </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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



@endsection
