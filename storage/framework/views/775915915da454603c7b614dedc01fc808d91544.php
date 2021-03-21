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
    <title>OG?DASH - Dashboard</title>


    <link rel="manifest" href="assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Icons-->
    <link href="<?php echo e(asset('css/free.min.css'), false); ?>" rel="stylesheet"> <!-- icons -->
    <link href="<?php echo e(asset('css/flag-icon.min.css'), false); ?>" rel="stylesheet"> <!-- icons -->
    <!-- Main styles for this application-->
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

    <link href="<?php echo e(asset('css/coreui-chartjs.css'), false); ?>" rel="stylesheet">
    <script src='https://cdn.tiny.cloud/1/903vg8dp38iluyzw9g8s2p12znbj7zthuxydv7m3f8ug9z52/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
    <script>
        tinymce.init({
          selector: '#mytextarea',
          content_style: "body { font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji; }",
        });
      </script>
  </head>



  <body class="c-app">
    <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">

      <?php echo $__env->make('dashboard.shared.nav-builder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      <?php echo $__env->make('dashboard.shared.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      <div class="c-body">

        <main class="c-main">

          <?php echo $__env->yieldContent('content'); ?>

        </main>
        <?php echo $__env->make('dashboard.shared.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
    </div>



    <!-- CoreUI and necessary plugins-->
    <script src="<?php echo e(asset('js/coreui.bundle.min.js'), false); ?>"></script>
    <script src="<?php echo e(asset('js/coreui-utils.js'), false); ?>"></script>
    <script src="<?php echo e(asset('js/app.js'), false); ?>"></script>
    <?php echo $__env->yieldContent('javascript'); ?>




  </body>
</html>
<?php /**PATH /Users/mac/Documents/SuplexDashboardChris/resources/views/layouts/dashboard.blade.php ENDPATH**/ ?>