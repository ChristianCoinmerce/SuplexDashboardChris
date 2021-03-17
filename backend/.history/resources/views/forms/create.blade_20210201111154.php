@extends('layouts.app')

@section('content')
    <div id="form_container">
		<form id="form_14132" class="appnitro" enctype="multipart/form-data" method="post" action="{{ route('form.store')}}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<ul ><li id="li_2" >
		<label class="description">Name</label>
		<label class="description"> </label>
		<span>
			<input name="name" class="element text" maxlength="255" size="8" value=""/>
			<label>First</label>
		</span>
		<span>
			<input name= "last_name" class="element text" maxlength="255" size="14" value=""/>
			<label>Last</label>
		</span>

		<li class="buttons">
			<input type="submit" name='publish' class="btn btn-success" value = "Publish"/>
		</li>
			</ul>
		</form>
	</div>
@endsection
