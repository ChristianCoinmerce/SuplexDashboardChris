
@extends('layouts.homepage')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Vue</title>

    </head>
    <body>
        <div class="container">
            <example-component></example-component>
        </div>
    </body>
</html>
@endsection
