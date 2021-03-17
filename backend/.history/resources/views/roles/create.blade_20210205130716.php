@extends('layouts.app')

@section('content')
<div id="form_container">
    <form class="appnitro" enctype="multipart/form-data" method="post" action="{{ route('role.store')}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <ul ><li >
    <label class="description">Role</label>
    <span>
        <input name="name" class="element text" maxlength="255" size="8" value=""/>
    </span>
    </li><li >
    <label class="description">Description</label>
    <div>
        <input name="contact_name" class="element text medium" type="text" maxlength="255" value=""/>
    </div>
    </li><li >

        <p></p>
    </li>
    <li class="buttons">
        <input type="submit" name='publish' class="btn btn-success" value = "Publish"/>
    </li>
        </ul>
    </form>
</div>
@endsection
