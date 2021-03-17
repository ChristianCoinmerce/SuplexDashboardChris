<!DOCTYPE html>


<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Chris Admin Panel | @yield('title')</title>
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

<body>
<div id="app"><nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm"><div class="container"><a href="https://demo.laravel-boilerplate.com" class="navbar-brand">Laravel Boilerplate</a> <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button> <div id="navbarSupportedContent" class="collapse navbar-collapse"><ul class="navbar-nav ml-auto"><li class="nav-item dropdown"><a href="#" id="navbarDropdownLanguageLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">English</a> <div aria-labelledby="navbarDropdownLanguageLink" class="dropdown-menu dropdown-menu-right"><a href="https://demo.laravel-boilerplate.com/lang/ar" class="dropdown-item pt-1 pb-1">Arabic</a> <a href="https://demo.laravel-boilerplate.com/lang/az" class="dropdown-item pt-1 pb-1">Azerbaijan</a> <a href="https://demo.laravel-boilerplate.com/lang/pt_BR" class="dropdown-item pt-1 pb-1">Brazilian Portuguese</a> <a href="https://demo.laravel-boilerplate.com/lang/zh" class="dropdown-item pt-1 pb-1">Chinese Simplified</a> <a href="https://demo.laravel-boilerplate.com/lang/zh-TW" class="dropdown-item pt-1 pb-1">Chinese Traditional</a> <a href="https://demo.laravel-boilerplate.com/lang/cs" class="dropdown-item pt-1 pb-1">Czech</a> <a href="https://demo.laravel-boilerplate.com/lang/da" class="dropdown-item pt-1 pb-1">Danish</a> <a href="https://demo.laravel-boilerplate.com/lang/nl" class="dropdown-item pt-1 pb-1">Dutch</a> <a href="https://demo.laravel-boilerplate.com/lang/fr" class="dropdown-item pt-1 pb-1">French</a> <a href="https://demo.laravel-boilerplate.com/lang/de" class="dropdown-item pt-1 pb-1">German</a> <a href="https://demo.laravel-boilerplate.com/lang/el" class="dropdown-item pt-1 pb-1">Greek</a> <a href="https://demo.laravel-boilerplate.com/lang/he" class="dropdown-item pt-1 pb-1">Hebrew</a> <a href="https://demo.laravel-boilerplate.com/lang/id" class="dropdown-item pt-1 pb-1">Indonesian</a> <a href="https://demo.laravel-boilerplate.com/lang/it" class="dropdown-item pt-1 pb-1">Italian</a> <a href="https://demo.laravel-boilerplate.com/lang/ja" class="dropdown-item pt-1 pb-1">Japanese</a> <a href="https://demo.laravel-boilerplate.com/lang/no" class="dropdown-item pt-1 pb-1">Norwegian</a> <a href="https://demo.laravel-boilerplate.com/lang/fa" class="dropdown-item pt-1 pb-1">Persian</a> <a href="https://demo.laravel-boilerplate.com/lang/pl" class="dropdown-item pt-1 pb-1">Polish</a> <a href="https://demo.laravel-boilerplate.com/lang/pt_PT" class="dropdown-item pt-1 pb-1">Portuguese</a> <a href="https://demo.laravel-boilerplate.com/lang/ro" class="dropdown-item pt-1 pb-1">Romana</a> <a href="https://demo.laravel-boilerplate.com/lang/ru" class="dropdown-item pt-1 pb-1">Russian</a> <a href="https://demo.laravel-boilerplate.com/lang/es" class="dropdown-item pt-1 pb-1">Spanish</a> <a href="https://demo.laravel-boilerplate.com/lang/sv" class="dropdown-item pt-1 pb-1">Swedish</a> <a href="https://demo.laravel-boilerplate.com/lang/th" class="dropdown-item pt-1 pb-1">Thai</a> <a href="https://demo.laravel-boilerplate.com/lang/tr" class="dropdown-item pt-1 pb-1">Turkish</a> <a href="https://demo.laravel-boilerplate.com/lang/uk" class="dropdown-item pt-1 pb-1">Ukrainian</a></div></li> <li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="rounded-circle" style="max-height: 20px" src="https://gravatar.com/avatar/88b87698be0bc461f3cacf1f080929d5?s=80&amp;d=mp">
                                Test User <span class="caret"></span></a> <div aria-labelledby="navbarDropdown" class="dropdown-menu dropdown-menu-right"><a href="https://demo.laravel-boilerplate.com/dashboard" class="active dropdown-item">Dashboard</a> <a href="https://demo.laravel-boilerplate.com/account" class="dropdown-item">My Account</a> <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item">Logout                                     <form method="post" action="https://demo.laravel-boilerplate.com/logout" id="logout-form" class="form-horizontal d-none"><input type="hidden" name="_token" value="fuI7J3rFbmOF2lBrJlDRpTgQzgrrjDlRKIS7qatY"></form></a></div></li></ul></div></div></nav> <nav id="breadcrumbs" aria-label="breadcrumb"><ol class="container breadcrumb mb-0"><li class="breadcrumb-item"><a href="https://demo.laravel-boilerplate.com">Home</a></li> <li aria-current="page" class="breadcrumb-item active">
                        Dashboard
                    </li></ol></nav> <main><div class="container py-4"><div class="row justify-content-center"><div class="col-md-12"><div class="card"><div class="card-header">
            Dashboard

                    </div> <div class="card-body">
            You are logged in!
        </div></div></div></div></div></main></div>
        <div id="app"><nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm"><div class="container"><a href="https://demo.laravel-boilerplate.com" class="navbar-brand">Laravel Boilerplate</a> <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button> <div id="navbarSupportedContent" class="collapse navbar-collapse"><ul class="navbar-nav ml-auto"><li class="nav-item dropdown"><a href="#" id="navbarDropdownLanguageLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">English</a> <div aria-labelledby="navbarDropdownLanguageLink" class="dropdown-menu dropdown-menu-right"><a href="https://demo.laravel-boilerplate.com/lang/ar" class="dropdown-item pt-1 pb-1">Arabic</a> <a href="https://demo.laravel-boilerplate.com/lang/az" class="dropdown-item pt-1 pb-1">Azerbaijan</a> <a href="https://demo.laravel-boilerplate.com/lang/pt_BR" class="dropdown-item pt-1 pb-1">Brazilian Portuguese</a> <a href="https://demo.laravel-boilerplate.com/lang/zh" class="dropdown-item pt-1 pb-1">Chinese Simplified</a> <a href="https://demo.laravel-boilerplate.com/lang/zh-TW" class="dropdown-item pt-1 pb-1">Chinese Traditional</a> <a href="https://demo.laravel-boilerplate.com/lang/cs" class="dropdown-item pt-1 pb-1">Czech</a> <a href="https://demo.laravel-boilerplate.com/lang/da" class="dropdown-item pt-1 pb-1">Danish</a> <a href="https://demo.laravel-boilerplate.com/lang/nl" class="dropdown-item pt-1 pb-1">Dutch</a> <a href="https://demo.laravel-boilerplate.com/lang/fr" class="dropdown-item pt-1 pb-1">French</a> <a href="https://demo.laravel-boilerplate.com/lang/de" class="dropdown-item pt-1 pb-1">German</a> <a href="https://demo.laravel-boilerplate.com/lang/el" class="dropdown-item pt-1 pb-1">Greek</a> <a href="https://demo.laravel-boilerplate.com/lang/he" class="dropdown-item pt-1 pb-1">Hebrew</a> <a href="https://demo.laravel-boilerplate.com/lang/id" class="dropdown-item pt-1 pb-1">Indonesian</a> <a href="https://demo.laravel-boilerplate.com/lang/it" class="dropdown-item pt-1 pb-1">Italian</a> <a href="https://demo.laravel-boilerplate.com/lang/ja" class="dropdown-item pt-1 pb-1">Japanese</a> <a href="https://demo.laravel-boilerplate.com/lang/no" class="dropdown-item pt-1 pb-1">Norwegian</a> <a href="https://demo.laravel-boilerplate.com/lang/fa" class="dropdown-item pt-1 pb-1">Persian</a> <a href="https://demo.laravel-boilerplate.com/lang/pl" class="dropdown-item pt-1 pb-1">Polish</a> <a href="https://demo.laravel-boilerplate.com/lang/pt_PT" class="dropdown-item pt-1 pb-1">Portuguese</a> <a href="https://demo.laravel-boilerplate.com/lang/ro" class="dropdown-item pt-1 pb-1">Romana</a> <a href="https://demo.laravel-boilerplate.com/lang/ru" class="dropdown-item pt-1 pb-1">Russian</a> <a href="https://demo.laravel-boilerplate.com/lang/es" class="dropdown-item pt-1 pb-1">Spanish</a> <a href="https://demo.laravel-boilerplate.com/lang/sv" class="dropdown-item pt-1 pb-1">Swedish</a> <a href="https://demo.laravel-boilerplate.com/lang/th" class="dropdown-item pt-1 pb-1">Thai</a> <a href="https://demo.laravel-boilerplate.com/lang/tr" class="dropdown-item pt-1 pb-1">Turkish</a> <a href="https://demo.laravel-boilerplate.com/lang/uk" class="dropdown-item pt-1 pb-1">Ukrainian</a></div></li> <li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="rounded-circle" style="max-height: 20px" src="https://gravatar.com/avatar/88b87698be0bc461f3cacf1f080929d5?s=80&amp;d=mp">
                                Test User <span class="caret"></span></a> <div aria-labelledby="navbarDropdown" class="dropdown-menu dropdown-menu-right"><a href="https://demo.laravel-boilerplate.com/dashboard" class="active dropdown-item">Dashboard</a> <a href="https://demo.laravel-boilerplate.com/account" class="dropdown-item">My Account</a> <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item">Logout                                     <form method="post" action="https://demo.laravel-boilerplate.com/logout" id="logout-form" class="form-horizontal d-none"><input type="hidden" name="_token" value="fuI7J3rFbmOF2lBrJlDRpTgQzgrrjDlRKIS7qatY"></form></a></div></li></ul></div></div></nav> <nav id="breadcrumbs" aria-label="breadcrumb"><ol class="container breadcrumb mb-0"><li class="breadcrumb-item"><a href="https://demo.laravel-boilerplate.com">Home</a></li> <li aria-current="page" class="breadcrumb-item active">
                        Dashboard
                    </li></ol></nav> <main><div class="container py-4"><div class="row justify-content-center"><div class="col-md-12"><div class="card"><div class="card-header">
            Dashboard

                    </div> <div class="card-body">
            You are logged in!
        </div></div></div></div></div></main></div>


<script src="{{ asset('js/coreui.bundle.min.js') }}"></script>
<script src="{{ asset('js/coreui-utils.js') }}"></script>
@yield('javascript')
</body>
</html>
