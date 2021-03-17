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

                                        <button href="#showPermission{{ $role['id'] }}"  data-toggle="modal" class="btn btn-sm btn-secondary">Show Perm.</button>
                                        <div></div>

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
                                                                    <option value="{{ $perm['id'] }}" ><h3>{{ $perm['description'] }}</h3></option>
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
                                        <div id="showPermission{{ $role['id'] }}" class="modal fade">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                    @if($role->permission()->exists())
                                                    <?php $a1=$a2=$a3=$a4=$a5=$a6=$a7=$a8=$a9=0; ?>
                                                    @foreach($role->permission as $permission)

                                                        @if ($permission['keyword'] == "dashboard")
                                                            {{ $permission['keyword'] }}
                                                            <?php $dash="ok" ?>
                                                        @endif

                                                        @switch($permission['keyword'])
                                                        @case('dashboard')<div style="background-color:#ced2d8;; border-radius:5px; "><h5>&nbsp;&nbsp;{{ $permission['name'] }}</h5></div>
                                                        @break
                                                        @case('user_crud')
                                                            @if ($a1==0)
                                                                <div style="margin-bottom: 20px"></div>
                                                                <?php $a1++; ?>
                                                                User CRUD:<br>- {{$permission['name']}}
                                                            @else
                                                                - {{$permission['name']}}
                                                            @endif
                                                        @break
                                                        @case('roles_crud')
                                                            @if ($a2==0)
                                                                <div style="margin-bottom: 20px"></div>
                                                                <?php $a2++; ?>
                                                                Roles CRUD:<br>- {{$permission['name']}}
                                                            @else
                                                                - {{$permission['name']}}
                                                            @endif
                                                        @break
                                                        @case('posts_crud')
                                                            @if ($a3==0)
                                                                <div style="margin-bottom: 20px"></div>
                                                                <?php $a3++; ?>
                                                                Posts CRUD:<br>- {{$permission['name']}}
                                                            @else
                                                                - {{$permission['name']}}
                                                            @endif
                                                        @break
                                                        @case('comments_crud')
                                                            @if ($a4==0)
                                                                <div style="margin-bottom: 20px"></div>
                                                                <?php $a4++; ?>
                                                                Comments CRUD:<br>- {{$permission['name']}}
                                                            @else
                                                                - {{$permission['name']}}
                                                            @endif
                                                        @break
                                                        @case('homepage')
                                                            @if ($dash=="ok")
                                                                <div style="margin-bottom: 20px"></div>
                                                                <div style="background-color:#ced2d8;; border-radius:5px;"><h5>&nbsp;&nbsp;dash:{{ $dash }}, margin</h5></div>
                                                            @elseif (true)
                                                                <div style="background-color:#ced2d8;; border-radius:5px;"><h5>&nbsp;&nbsp;dash:{{ $permission['name'] }}, no-margin</h5></div>
                                                            @endif
                                                        @break
                                                        @case('posts_user')
                                                            @if ($a5==0)
                                                                <div style="margin-bottom: 20px"></div>
                                                                <?php $a5++; ?>
                                                                Basic Posts<br>- {{$permission['name']}}
                                                            @else
                                                                - {{$permission['name']}}
                                                            @endif
                                                        @break
                                                        @case('comments_user')
                                                            @if ($a6==0)
                                                                <div style="margin-bottom: 20px"></div>
                                                                <?php $a6++; ?>
                                                                Basic Comments<br>- {{$permission['name']}}
                                                            @else
                                                                - {{$permission['name']}}
                                                            @endif
                                                        @break
                                                        @case('profile_user')
                                                            @if ($a7==0)
                                                                <div style="margin-bottom: 20px"></div>
                                                                <?php $a7++; ?>
                                                                Basic User Profile<br>- {{$permission['name']}}
                                                            @else
                                                                - {{$permission['name']}}
                                                            @endif
                                                        @break
                                                        @endswitch
                                                    @endforeach
                                                    @endif
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
                            <option value="{{ $perm['id'] }}" ><h3>{{ $perm['description'] }}</h3></option>
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
