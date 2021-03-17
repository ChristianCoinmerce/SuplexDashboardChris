<!DOCTYPE html>


<html lang="en">

<head>
    <script src="https://cdn.tiny.cloud/1/903vg8dp38iluyzw9g8s2p12znbj7zthuxydv7m3f8ug9z52/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <base href="./home">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Chris Admin Panel | @yield('title')</title>
    <link rel="manifest" href="assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link href="{{ asset('css/free.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/flag-icon.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    @yield('css')

    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        // Shared ID
        gtag('config', 'UA-118965717-3');
        // Bootstrap ID
        gtag('config', 'UA-118965717-5');

    </script>
    <script src='https://cdn.tiny.cloud/1/903vg8dp38iluyzw9g8s2p12znbj7zthuxydv7m3f8ug9z52/tinymce/5/tinymce.min.js' referrerpolicy="origin">
    </script>
    <script>
      tinymce.init({
        selector: '#mytextarea',
        content_style: "body { font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji; }",
      });
    </script>

    <link href="{{ asset('css/coreui-chartjs.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app1">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">

            <div id="app">
                @{{ message }}
              </div>

              <script src="http://cdnjs.cloudflare.com/ajax/libs/vue/1.0.1/vue.min.js"></script>
              <script>

                new Vue({
                    el: '#app',
                    data: {
                        message: 'Hello World'
                    }
                 });

                </script>

            <div class="container"><a href="{{ url('home') }}" class="navbar-brand">Laravel
                    Bloggie</a> <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                    class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
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
                                <a href="" class="dropdown-item">My Account</a>
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
            <ol class="container breadcrumb mb-0">
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
            </ol>
        </nav>
        <main>
            <div class="container py-4">
                {{-- <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                Dashboard

                            </div>
                            <div class="card-body">
                                You are logged in!
                            </div>
                        </div>
                    </div>
                </div> --}}
                @yield('content')
            </div>
        </main>
    </div>

    <script src="{{ asset('js/coreui.bundle.min.js') }}"></script>
    <script src="{{ asset('js/coreui-utils.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    @yield('javascript')
</body>

</html>
