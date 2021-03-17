
        <div class="c-sidebar-brand">
            <div><img class="c-sidebar-brand-full" src="{{ url('/assets/brand/logo.png') }}" width="188" height="46" alt="CoreUI Logo"></div>
            <img class="c-sidebar-brand-minimized" src="{{ url('assets/brand/coreui-signet-white.svg') }}" width="118" height="46" alt="CoreUI Logo">
        </div>
        <ul class="c-sidebar-nav">
            @include("dashboard.shared.nav")

        </ul>
        <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
    </div>
