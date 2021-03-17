@extends('layouts.app')
@section('content')
<div id="form_container">
    <form class="appnitro" enctype="multipart/form-data" method="post" action="{{ route('user-role.connect_role')}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </li><li >
    <label class="description">User</label>
    <select class="form-control" name="user_id">
        <option value="" selected="selected"></option>
            @if($users)
            @foreach($users as $user)
            <option value="{{ $user['id'] }}" ><h3>{{ $user['name'] }}</h3></option>
            @endforeach
            @endif
    </select>
    </li><li><br>
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
    </li>
    <li class="buttons">
        <input type="submit" name='publish' class="btn btn-success" value = "Publish"/>
    </li>
        </ul>
    </form>
</div>

@endsection
