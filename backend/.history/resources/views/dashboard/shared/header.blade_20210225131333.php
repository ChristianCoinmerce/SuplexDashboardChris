

    <div class="c-wrapper">
      <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
        <button class="c-header-toggler c-class-toggler d-lg-none mr-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show"><span class="c-header-toggler-icon"></span></button><a class="c-header-brand d-sm-none" href="#"><img class="c-header-brand" src="{{ url('/assets/brand/coreui-base.svg" width="97" height="46" alt="CoreUI Logo"></a>
        <button class="c-header-toggler c-class-toggler ml-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true"><span class="c-header-toggler-icon"></span></button>
        <?php
            use App\MenuBuilder\FreelyPositionedMenus;
            if(isset($appMenus['top menu'])){
                FreelyPositionedMenus::render( $appMenus['top menu'] , 'c-header-', 'd-md-down-none');
            }
        ?>
        <ul class="c-header-nav ml-auto mr-4">
          <li class="c-header-nav-item d-md-down-none mx-2"><a class="c-header-nav-link">
              <svg class="c-icon">
                <use xlink:href="{{ url('/icons/sprites/free.svg#cil-bell') }}"></use>
              </svg></a></li>
          <li class="c-header-nav-item d-md-down-none mx-2"><a class="c-header-nav-link">
              <svg class="c-icon">
                <use xlink:href="{{ url('/icons/sprites/free.svg#cil-list-rich') }}"></use>
              </svg></a></li>
          <li class="c-header-nav-item d-md-down-none mx-2"><a class="c-header-nav-link">
              <svg class="c-icon">
                <use xlink:href="{{ url('/icons/sprites/free.svg#cil-envelope-open') }}"></use>
              </svg></a></li>
          <li class="c-header-nav-item dropdown"><a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              <div class="c-avatar"><img class="c-avatar-img" src="{{ url('/assets/img/avatars/6.jpg') }}" alt="user@email.com"></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right pt-0">
                <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                <li style="position: absolute; allign:left">

                  <a href="{{ url('/auth/login') }}">Login</a>
                  <a href="{{ url('/auth/register') }}">Register</a>
                </li>
                @else
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color: white;">{{ Auth::user()->name }} <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    @if (Auth::user())
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
          </li>
        </ul>
        <div class="c-subheader px-3">
          <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <?php $segments = ''; ?>
            @for($i = 1; $i <= count(Request::segments()); $i++)
                <?php $segments .= '/'. Request::segment($i); ?>
                @if($i < count(Request::segments()))
                    <li class="breadcrumb-item">{{ Request::segment($i) }}</li>
                @else
                    <li class="breadcrumb-item active">@yield('title')</li>
                @endif
            @endfor
          </ol>
        </div>
    </header>
