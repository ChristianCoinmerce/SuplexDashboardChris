<!doctype html>
 <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script src="https://cdn.tiny.cloud/1/903vg8dp38iluyzw9g8s2p12znbj7zthuxydv7m3f8ug9z52/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <base href="./home">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.Laravel = {csrfToken: '{{ csrf_token() }}'}</script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>OG?DASH</title>
    <link rel="manifest" href="assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link href="{{ asset('css/free.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/flag-icon.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @yield('css')
</head>

<body class="container-fluid" style="margin: 0; padding:0;">

    <div id="app1">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container"><a href="{{ url('home') }}" class="navbar-brand">OG?DASH</a>
                <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                    class="navbar-toggler"><span class="navbar-toggler-icon"></span>
                </button>
                <div id="navbarSupportedContent" class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle" style="max-height: 20px" src="https://gravatar.com/avatar/88b87698be0bc461f3cacf1f080929d5?s=80&amp;d=mp"> {{ Auth::user()->name }}<span class="caret"></span>
                            </a>
                            <div aria-labelledby="navbarDropdown" class="dropdown-menu dropdown-menu-right">
                                <a href="{{ route('post.create') }}" class="dropdown-item">New Post</a>
                                <a href="" class="dropdown-item">Home</a>
                                <a href="{{ url('home/user/'.Auth::id()) }}" class="dropdown-item">My Account</a>
                                <a href="{{ url('/auth/logout') }}" class="dropdown-item">Logout
                                    <form method="post" action="https://demo.laravel-boilerplate.com/logout" id="logout-form" class="form-horizontal d-none">
                                        <input type="hidden" name="_token" value="fuI7J3rFbmOF2lBrJlDRpTgQzgrrjDlRKIS7qatY">
                                    </form>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <nav id="breadcrumbs" aria-label="breadcrumb" style=" background-color: lightgrey;">
            <ol class="container breadcrumb mb-0" style="width: 100%;" >
                <div style="display: flex; width: 75%;">
                    <a href="{{ url('/') }}" style="color: inherit;">Home</a>
                    <li aria-current="page" class="breadcrumb-item active">
                        <?php $segments = ''; ?>
                        @for($i = 1; $i <= count(Request::segments()); $i++)
                            <?php $segments .= '/'. Request::segment($i); ?>
                            @if($i < count(Request::segments()))
                            @else
                                <li class="breadcrumb-item active">@yield('title')</li>
                            @endif
                        @endfor
                    </li>
                </div>
                <div style="width: 25%; text-align: right"><a href="#newPost" data-toggle="modal" class="card-header-action"><i class="c-icon cil-plus"></i> Create Post</a></div>
            </ol>
        </nav>
    </div>

    <div id="app">
        <post-list :user="{{ Auth::user() }}"></post-list>
        {{-- <navbar></navbar> --}}
        </script>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>

</body>

</html>
