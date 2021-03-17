<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>VapeNation</title>
        <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
        @yield('meta')

        @stack('before-styles')
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        @stack('after-styles')
    </head>
    <body>

        <div id="app" class="flex-center position-ref full-height">
            <div class="top-right links">
                @auth
                    @if (true)
                        <a href="">@lang('Dashboard')</a>
                    @endif

                    <a href="">@lang('Account')</a>
                @else
                    <a href="">@lang('Login')</a>

                    @if (true)
                        <a href="">@lang('Register')</a>
                    @endif
                @endauth
            </div><!--top-right-->

            <div class="content">

                <div class="title m-b-md">
                    <example-component></example-component>
                </div><!--title-->

                <div class="links">
                    <a href="http://laravel-boilerplate.com" target="_blank"><i class="fa fa-book"></i> @lang('Docs')</a>
                    <a href="https://github.com/rappasoft/laravel-boilerplate" target="_blank"><i class="fab fa-github"></i> GitHub</a>
                </div><!--links-->
            </div><!--content-->
        </div><!--app-->

        @stack('before-scripts')

        @stack('after-scripts')
    </body>
</html>
