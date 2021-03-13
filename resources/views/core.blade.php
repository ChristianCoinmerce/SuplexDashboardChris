<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>OG?DASH</title>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
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

            .border {
                width: max-content;
                background: linear-gradient(90deg, red 50%, transparent 50%), linear-gradient(90deg, red 50%, transparent 50%), linear-gradient(0deg, red 50%, transparent 50%), linear-gradient(0deg, red 50%, transparent 50%);
                background-repeat: repeat-x, repeat-x, repeat-y, repeat-y;
                background-size: 15px 4px, 15px 4px, 4px 15px, 4px 15px;
                padding: 10px;
                animation: border-dance 13s infinite linear;
            }

            @keyframes border-dance {
            0% {
                background-position: 0 0, 100% 100%, 0 100%, 100% 0;
            }
            100% {
                background-position: 100% 0, 0 100%, 0 0, 100% 100%;
            }
            }
            .inline-a {
                width: 50%;
                margin-top: 63px;
            }.inline-b {
                width: 50%;
                margin-top: 63px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Homepage</a>
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="border" style="width:460px; height:550px;"><center>
                <div class="content" style="max-width: 400px">
                    <div class="title m-b-md">
                        OG?DASH
                    </div>
                    <div class="title" style="font-size: 25px; text-align:right;">
                        <p>- Blog View</p>
                        <p>- Admin Dashboard</p>
                        <p>- Full-Stack Laravel-8</p>
                        <p>- Ethermine Dashboard</p>
                        <p>- User/Roles/Permissions</p>
                    </div>
                    <div class="links" style="text-align: left; display:flex">

                        <p class="inline-a">By Chris</p>
                        <a class="inline-b" style="text-align: right !important; padding: 0" href="https://github.com/ChristianCoinmerce/SuplexDashboardChris"><u>Github</u></a>
                    </div>
                </div></center>
            </div>
        </div>
    </body>
</html>
