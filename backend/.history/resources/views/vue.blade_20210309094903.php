
@extends('layouts.homepage')



@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Vue</title>

    </head>
    <body>
        <div class="app">
            <example-component>dirk</example-component>
        </div>
    </body>
</html>
@endsection
