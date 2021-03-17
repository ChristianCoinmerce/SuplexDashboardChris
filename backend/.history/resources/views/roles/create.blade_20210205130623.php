@extends('layouts.app')

@section('content')
<div id="form_container">
    <form class="appnitro" enctype="multipart/form-data" method="post" action="{{ route('role.store')}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <ul ><li >
    <label class="description">Roles</label>
    <span>
        <input name="name" class="element text" maxlength="255" size="8" value=""/>
        <label>First</label>
    </span>
    </li><li >
    <label class="description">Contact Name </label>
    <div>
        <input name="contact_name" class="element text medium" type="text" maxlength="255" value=""/>
    </div>
    </li><li >

    <label class="description">Payment Method
</label>
    <div>
    <select class="element select medium" name="payment_method">
        <option value="" selected="selected"></option>
            <option value="1" >IDEAL</option>
            <option value="2" >PayPal</option>
            <option value="3" >Creditcard</option>
    </select>
    </div>
    </li><li>
    <label class="description">Name IBAN </label>
    <div>
        <input name="iban_name" class="element text medium" type="text" maxlength="255" value=""/>
    </div>
    </li><li>
    <label class="description">IBAN </label>
    <div>
        <input name="iban_number" class="element text medium" type="text" maxlength="255" value=""/>
    </div>
    </li><li>
    <label class="description">BIC/SWIFT </label>
    <div>
        <input name="bic_swift" class="element text medium" type="text" maxlength="255" value=""/>
    </div>
    </li><li class="section_break">
        <p></p>
    </li>
    <li class="buttons">
        <input type="submit" name='publish' class="btn btn-success" value = "Publish"/>
    </li>
        </ul>
    </form>
</div>
@endsection
