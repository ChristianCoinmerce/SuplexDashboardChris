@extends('layouts.dashboard')
@section('title', __('Posts Management'))
@section('content')


<div class="container-fluid">
    <div class="fade-in">
        <div class="card">
            <div class="card-header">
                Posts Management
                <div class="card-header-actions">
                    {{-- <a href="#addEmployeeModal1" data-toggle="modal" class="card-header-action"><i class="c-icon cil-plus"></i> Create Post</a> --}}
                </div>
            </div>
            <div class="card-body">
                <div class="">
                    <div class="row mb-4">
                        <div class="col form-inline">
                            {{-- Per Page: &nbsp;
                            {!! Form::open([ 'url' => route('connect.roles'), 'method' => 'get' ]) !!}
                            {!! Form::select ( 'per_page', [ '15' => '15', '30' => '30', '60' => '60', '100' => '100'], '15', array('onchange' => "submit()", 'class'=>'form-control')) !!}
                            {!! Form::close() !!} --}}


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
                                    <th style="cursor:pointer;">Title<i class="fas fa-sort-up"></i></th>
                                    <th style="cursor:pointer;">Body<i class="text-muted fas fa-sort"></i></th>
                                    <th style="cursor:pointer;">Timestamp<i class="text-muted fas fa-sort"></i></th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            {{-- <tbody wire:loading.class.remove="d-none" class="d-none">
                                <tr>
                                    <td colspan="8">
                                        Loading... </td>
                                </tr>
                            </tbody> --}}
                            @if($posts)
                            @foreach($posts as $post)
                            <tbody>
                                <tr class="" id="">
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->body }}</td>
                                    <td>{{ $post->created_at }}
                                    </td>
                                    <td class="" id="">
                                        <div id="editUserModal{{ $post['id'] }}" class="modal fade">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form method="POST" action="{{  route('posts.update') }}">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Post</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Title</label>
                                                                <input name="name" value="{{ $user->name }}" type="name" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Body</label>
                                                                <input type="email" value="{{ $user->email }}" name="email" class="form-control">
                                                            </div>
                                                            <input type="hidden" name="user_id" class="element text" maxlength="255" size="8" value="{{ $post['id'] }}"/></input>
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
                                                aria-haspopup="true" aria-expanded="false">Actions
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="moreMenuLink">
                                                <a href="" class="dropdown-item">View Profile</a>
                                                <a href="#editUserModal{{ $user['id'] }}" data-toggle="modal" class="dropdown-item">Edit</a>
                                                <a href="#deleteUserModal{{ $user['id'] }}" data-toggle="modal" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                            @endif
                        </table>
                        <div class="block" style="margin-bottom:-16px">
                            {{ $users->links() }}
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
				</div><br>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-primary" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>



@endsection
