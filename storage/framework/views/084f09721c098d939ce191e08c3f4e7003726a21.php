<!DOCTYPE html>


<html lang="en">

<head>
    <script src="https://cdn.tiny.cloud/1/903vg8dp38iluyzw9g8s2p12znbj7zthuxydv7m3f8ug9z52/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <base href="./home">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Chris Admin Panel | <?php echo $__env->yieldContent('title'); ?></title>
    <link rel="manifest" href="assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link href="<?php echo e(asset('css/free.min.css'), false); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/flag-icon.min.css'), false); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/style.css'), false); ?>" rel="stylesheet">

    <?php echo $__env->yieldContent('css'); ?>

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
    <script src='https://cdn.tiny.cloud/1/903vg8dp38iluyzw9g8s2p12znbj7zthuxydv7m3f8ug9z52/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '#mytextarea'.$post['id'],
        content_style: "body { font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji; }",
      });
    </script>

    <link href="<?php echo e(asset('css/coreui-chartjs.css'), false); ?>" rel="stylesheet">
</head>

<body>
    <div id="app1">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">

                

            <div class="container"><a href="<?php echo e(url('home'), false); ?>" class="navbar-brand">OG?DASH</a>
                <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                    class="navbar-toggler"><span class="navbar-toggler-icon"></span>
                </button>
                <div id="navbarSupportedContent" class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle" style="max-height: 20px" src="https://gravatar.com/avatar/88b87698be0bc461f3cacf1f080929d5?s=80&amp;d=mp"> <?php echo e(Auth::user()->name, false); ?><span class="caret"></span>
                            </a>
                            <div aria-labelledby="navbarDropdown" class="dropdown-menu dropdown-menu-right">
                                <a href="<?php echo e(route('post.create'), false); ?>" class="dropdown-item">New Post</a>
                                <a href="" class="dropdown-item">Home</a>
                                <a href="<?php echo e(url('home/user/'.Auth::id()), false); ?>" class="dropdown-item">My Account</a>
                                <a href="<?php echo e(url('/auth/logout'), false); ?>" class="dropdown-item">Logout
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
                <a href="<?php echo e(url('/'), false); ?>" style="color: inherit;">Home</a>
                <li aria-current="page" class="breadcrumb-item active">
                    <?php $segments = ''; ?>
              <?php for($i = 1; $i <= count(Request::segments()); $i++): ?>
                  <?php $segments .= '/'. Request::segment($i); ?>
                  <?php if($i < count(Request::segments())): ?>
                  <?php else: ?>
                      <li class="breadcrumb-item active"><?php echo $__env->yieldContent('title'); ?></li>
                  <?php endif; ?>
              <?php endfor; ?>
                </li>
            </ol>
        </nav>
        <main>
            <div class="container py-4">
                
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </main>
    </div>

    <script src="<?php echo e(asset('js/coreui.bundle.min.js'), false); ?>"></script>
    <script src="<?php echo e(asset('js/coreui-utils.js'), false); ?>"></script>
    

    <?php echo $__env->yieldContent('javascript'); ?>
</body>

</html>
<?php /**PATH /Users/mac/Documents/SuplexDashboardChris/resources/views/layouts/homepage.blade.php ENDPATH**/ ?>