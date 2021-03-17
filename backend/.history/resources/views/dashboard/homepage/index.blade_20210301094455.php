@extends('layouts.homepage')
@section('title', __('Homepage'))
@section('content')


<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container"><a href="https://demo.laravel-boilerplate.com" class="navbar-brand">Laravel
                Boilerplate</a> <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" id="navbarDropdown"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                class="rounded-circle" style="max-height: 20px"
                                src="https://gravatar.com/avatar/88b87698be0bc461f3cacf1f080929d5?s=80&amp;d=mp">
                            Test User <span class="caret"></span></a>
                        <div aria-labelledby="navbarDropdown" class="dropdown-menu dropdown-menu-right"><a
                                href="https://demo.laravel-boilerplate.com/dashboard"
                                class="active dropdown-item">Dashboard</a> <a
                                href="https://demo.laravel-boilerplate.com/account" class="dropdown-item">My Account</a>
                            <a href="#"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                class="dropdown-item">Logout <form method="post"
                                    action="https://demo.laravel-boilerplate.com/logout" id="logout-form"
                                    class="form-horizontal d-none"><input type="hidden" name="_token"
                                        value="fuI7J3rFbmOF2lBrJlDRpTgQzgrrjDlRKIS7qatY"></form></a></div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <nav id="breadcrumbs" aria-label="breadcrumb">
        <ol class="container breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="https://demo.laravel-boilerplate.com">Home</a></li>
            <li aria-current="page" class="breadcrumb-item active">
                Dashboard
            </li>
        </ol>
    </nav>
    <main>
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Dashboard

                        </div>
                        <div class="card-body">
                            You are logged in!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>



@endsection
