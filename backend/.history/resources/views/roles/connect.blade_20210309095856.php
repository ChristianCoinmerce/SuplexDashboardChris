@extends('layouts.dashboard')
@section('title', __('Roles Management'))
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
