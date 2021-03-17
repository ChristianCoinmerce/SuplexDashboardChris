<!DOCTYPE html>
<!--
* CoreUI Free Laravel Bootstrap Admin Template
* @version v2.0.1
* @link https://coreui.io
* Copyright (c) 2020 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>CoreUI Free Bootstrap Admin Template</title>
    <link rel="apple-touch-icon" sizes="57x57" href="assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Icons-->
    <link href="{{ asset('css/free.min.css') }}" rel="stylesheet"> <!-- icons -->
    <link href="{{ asset('css/flag-icon.min.css') }}" rel="stylesheet"> <!-- icons -->
    <!-- Main styles for this application-->
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

    <link href="{{ asset('css/coreui-chartjs.css') }}" rel="stylesheet">
  </head>



  <body class="c-app">
    <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
        <div class="sidebar">
            <nav class="sidebar-nav">
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link" href="/">
                    <i class="nav-icon icon-speedometer"></i> Dashboard
                    <span class="badge badge-primary">NEW</span>
                  </a>
                </li>
                <li class="nav-title">Theme</li>
                <li class="nav-item">
                  <a class="nav-link" href="/colors">
                    <i class="nav-icon icon-drop"></i> Colors</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/typography">
                    <i class="nav-icon icon-pencil"></i> Typography</a>
                </li>
                <li class="nav-title">Components</li>
                <li class="nav-item nav-dropdown">
                  <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon icon-puzzle"></i> Base</a>
                  <ul class="nav-dropdown-items">
                    <li class="nav-item">
                      <a class="nav-link" href="/base/breadcrumb">
                        <i class="nav-icon icon-puzzle"></i> Breadcrumb</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/base/cards">
                        <i class="nav-icon icon-puzzle"></i> Cards</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/base/carousel">
                        <i class="nav-icon icon-puzzle"></i> Carousel</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/base/collapse">
                        <i class="nav-icon icon-puzzle"></i> Collapse</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/base/forms">
                        <i class="nav-icon icon-puzzle"></i> Forms</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/base/jumbotron">
                        <i class="nav-icon icon-puzzle"></i> Jumbotron</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/base/list-group">
                        <i class="nav-icon icon-puzzle"></i> List group</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/base/navs">
                        <i class="nav-icon icon-puzzle"></i> Navs</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/base/pagination">
                        <i class="nav-icon icon-puzzle"></i> Pagination</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/base/popovers">
                        <i class="nav-icon icon-puzzle"></i> Popovers</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/base/progress">
                        <i class="nav-icon icon-puzzle"></i> Progress</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/base/scrollspy">
                        <i class="nav-icon icon-puzzle"></i> Scrollspy</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/base/switches">
                        <i class="nav-icon icon-puzzle"></i> Switches</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/base/tables">
                        <i class="nav-icon icon-puzzle"></i> Tables</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/base/tabs">
                        <i class="nav-icon icon-puzzle"></i> Tabs</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/base/tooltips">
                        <i class="nav-icon icon-puzzle"></i> Tooltips</a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item nav-dropdown">
                  <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon icon-cursor"></i> Buttons</a>
                  <ul class="nav-dropdown-items">
                    <li class="nav-item">
                      <a class="nav-link" href="/buttons/buttons">
                        <i class="nav-icon icon-cursor"></i> Buttons</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/buttons/button-group">
                        <i class="nav-icon icon-cursor"></i> Buttons Group</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/buttons/dropdowns">
                        <i class="nav-icon icon-cursor"></i> Dropdowns</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/buttons/brand-buttons">
                        <i class="nav-icon icon-cursor"></i> Brand Buttons</a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/charts">
                    <i class="nav-icon icon-pie-chart"></i> Charts</a>
                </li>
                <li class="nav-item nav-dropdown">
                  <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon icon-star"></i> Icons</a>
                  <ul class="nav-dropdown-items">
                    <li class="nav-item">
                      <a class="nav-link" href="/icon/coreui-icons">
                        <i class="nav-icon icon-star"></i> CoreUI Icons
                        <span class="badge badge-success">NEW</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/icon/flags">
                        <i class="nav-icon icon-star"></i> Flags</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/icon/font-awesome">
                        <i class="nav-icon icon-star"></i> Font Awesome
                        <span class="badge badge-secondary">4.7</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/icon/simple-line-icons">
                        <i class="nav-icon icon-star"></i> Simple Line Icons</a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item nav-dropdown">
                  <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon icon-bell"></i> Notifications</a>
                  <ul class="nav-dropdown-items">
                    <li class="nav-item">
                      <a class="nav-link" href="/notifications/alerts">
                        <i class="nav-icon icon-bell"></i> Alerts</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/notifications/badge">
                        <i class="nav-icon icon-bell"></i> Badge</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/notifications/modals">
                        <i class="nav-icon icon-bell"></i> Modals</a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/widgets">
                    <i class="nav-icon icon-calculator"></i> Widgets
                    <span class="badge badge-primary">NEW</span>
                  </a>
                </li>
                <li class="divider"></li>
                <li class="nav-title">Extras</li>
                <li class="nav-item nav-dropdown">
                  <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon icon-star"></i> Pages</a>
                  <ul class="nav-dropdown-items">
                    <li class="nav-item">
                      <a class="nav-link" href="/login" target="_top">
                        <i class="nav-icon icon-star"></i> Login</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/register" target="_top">
                        <i class="nav-icon icon-star"></i> Register</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/404" target="_top">
                        <i class="nav-icon icon-star"></i> Error 404</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/500" target="_top">
                        <i class="nav-icon icon-star"></i> Error 500</a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item mt-auto">
                  <a class="nav-link nav-link-success" href="https://coreui.io" target="_top">
                    <i class="nav-icon icon-cloud-download"></i> Download CoreUI</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link nav-link-danger" href="https://coreui.io/pro/" target="_top">
                    <i class="nav-icon icon-layers"></i> Try CoreUI
                    <strong>PRO</strong>
                  </a>
                </li>
              </ul>
            </nav>
            <button class="sidebar-minimizer brand-minimizer" type="button"></button>
          </div>
      @include('dashboard.shared.nav-builder')

      @include('dashboard.shared.header')

      <div class="c-body">

        <main class="c-main">

          @yield('content')

        </main>
        @include('dashboard.shared.footer')
      </div>
    </div>



    <!-- CoreUI and necessary plugins-->
    <script src="{{ asset('js/coreui.bundle.min.js') }}"></script>
    <script src="{{ asset('js/coreui-utils.js') }}"></script>
    @yield('javascript')




  </body>
</html>
