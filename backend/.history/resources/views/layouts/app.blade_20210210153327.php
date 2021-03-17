<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog</title>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
      <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('/css/clean-blog.min.css')}}" rel="stylesheet">
    <link href="{{ asset('/css/view.css')}}" rel="stylesheet">
  </head>
  <body>

    <nav style="background-color: #212529;">
        <div class="container">
          <a class="navbar-brand" href="{{ url('/') }}">Blog-Merch</a>
              <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                <li>
                  <a href="{{ url('/auth/login') }}">Login</a>
                </li>
                <li>
                  <a href="{{ url('/auth/register') }}">Register</a>
                </li>
                @else
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    @if (Auth::user()->can_post())
                    <li>
                      <a href="{{ url('/new-post') }}">Add new post</a>
                    </li>
                    <li>
                      <a href="{{ url('/user/'.Auth::id().'/posts') }}">My Posts</a>
                    </li>
                    @endif
                    <li>
                      <a href="{{ url('/user/'.Auth::id()) }}">My Profile</a>
                    </li>

                    @if (Auth::user() && Auth::user()->role == 'admin')
                    <li>
                        <a href="{{ url('/user/'.Auth::id()) }}">Admin Panel</a>
                      </li>
                    @endif

                    <li>
                      <a href="{{ url('/auth/logout') }}">Logout</a>
                    </li>
                  </ul>
                </li>
                @endif
              </ul>
        </div>
      </nav>
{{--
      <header class="masthead">
        <div class="overlay" style="height: 48%"></div>
        <div class="container">
          <div class="row">

              <div class="site-heading">

                <h1>SheepBlo.</h1>
                <span class="subheading">A Blog Made With Simplicity</span>

              </div>
            </div>
          </div>
        </div>
      </header> --}}




        <div class="row">
            <div class="">
                @yield('content')
                <hr>
            </div>
        </div>


    </div>
    <!-- Scripts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('/js/clean-blog.min.js')}}"></script>
  </body>
</html>
