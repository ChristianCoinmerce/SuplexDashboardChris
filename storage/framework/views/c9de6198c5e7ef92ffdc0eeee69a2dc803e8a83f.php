

    <div class="c-wrapper">
      <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
        <button class="c-header-toggler c-class-toggler d-lg-none mr-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show"><span class="c-header-toggler-icon"></span></button><a class="c-header-brand d-sm-none" href="#"><img class="c-header-brand" height="40" src="<?php echo e(url('/assets/brand/laravel1.png'), false); ?>"></a>
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
                <use xlink:href="<?php echo e(url('/icons/sprites/free.svg#cil-bell'), false); ?>"></use>
              </svg></a></li>
          <li class="c-header-nav-item d-md-down-none mx-2"><a class="c-header-nav-link">
              <svg class="c-icon">
                <use xlink:href="<?php echo e(url('/icons/sprites/free.svg#cil-list-rich'), false); ?>"></use>
              </svg></a></li>
          <li class="c-header-nav-item d-md-down-none mx-2"><a class="c-header-nav-link">
              <svg class="c-icon">
                <use xlink:href="<?php echo e(url('/icons/sprites/free.svg#cil-envelope-open'), false); ?>"></use>
              </svg></a></li>
          <li class="c-header-nav-item dropdown"><a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              <div class="c-avatar"><img class="c-avatar-img" src="<?php echo e(url('/assets/img/avatars/6.jpg'), false); ?>"></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right pt-0">
              <div class="dropdown-header bg-light py-2"><strong>Account</strong></div>
                <a class="dropdown-item" href="<?php echo e(url('home'), false); ?>">
                    <svg class="c-icon mr-2">
                    </svg> Homepage
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?php echo e(url('/auth/logout'), false); ?>" class="dropdown-item">
                    <svg class="c-icon mr-2">
                    </svg>Logout
                </a>
            </div>
          </li>
        </ul>
        <div class="c-subheader px-3">
          <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item" style="color: inherit !important; text-decoration:none !important;"><a href="/" style="color: darkslategrey; color: inherit !important; text-decoration:none !important;">Home</a></li>
            <?php $segments = ''; ?>
            <?php for($i = 1; $i <= count(Request::segments()); $i++): ?>
                <?php $segments .= '/'. Request::segment($i); ?>
                <?php if($i < count(Request::segments())): ?>
                <?php else: ?>
                    <li class="breadcrumb-item active"><?php echo $__env->yieldContent('title'); ?></li>
                <?php endif; ?>
            <?php endfor; ?>
          </ol>
        </div>
    </header>
<?php /**PATH /Users/mac/Documents/SuplexDashboardChris/resources/views/dashboard/shared/header.blade.php ENDPATH**/ ?>