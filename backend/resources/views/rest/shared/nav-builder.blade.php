
        <div class="c-sidebar-brand">
            <div style=""><img class="c-sidebar-brand-full" src="{{ url('/assets/brand/laravel1.png') }}" width="188" alt="CoreUI Logo"></div>
            <img class="c-sidebar-brand-minimized" src="{{ url('/assets/brand/laravel1.png') }}" width="118" height="10" alt="CoreUI Logo">
        </div>
        <ul class="c-sidebar-nav">
            @include("rest.shared.nav")

        </ul>
        <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
    </div>
