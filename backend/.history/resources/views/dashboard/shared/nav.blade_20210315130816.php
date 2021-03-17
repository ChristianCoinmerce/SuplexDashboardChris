<ul class="c-sidebar-nav ps">
    <li class="c-sidebar-nav-item">
        <a href="{{ route('dashboard.pop') }}" class="c-sidebar-nav-link">
            <i class="c-sidebar-nav-icon cil-speedometer"></i>Dashboard</a>
    </li>
    <li class="c-sidebar-nav-title">System</li>
    <li class="c-sidebar-nav-dropdown c-open">
        <a href="#" class="c-sidebar-nav-dropdown-toggle"><i class="c-sidebar-nav-icon cil-user"></i>Access</a>
        <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item">
                <a href="{{ route('connect.roles') }}" class="c-active c-sidebar-nav-link">User Management</a>
            </li>
            <li class="c-sidebar-nav-item">
                <a href="{{ route('roles.index') }}" class="c-active c-sidebar-nav-link">Role Management</a>
            </li>
            <li class="c-sidebar-nav-item">
                <a href="{{ route('posts.index') }}" class="c-active c-sidebar-nav-link">Post Management</a>
            </li>
            <li class="c-sidebar-nav-item">
                <a href="{{ route('comments.index') }}" class="c-active c-sidebar-nav-link">Comments Management</a>
            </li>
        </ul>
    </li>
    <li class="c-sidebar-nav-dropdown">
        <a href="#" class="c-sidebar-nav-dropdown-toggle"><i class="c-sidebar-nav-icon cil-list"></i>Ether</a>
        <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-icon cil-speedometer">
                <a href="{{ route('dashboard.index') }}" class="c-active c-sidebar-nav-link">Dashboard</a>
            </li>
            {{-- <li class="c-sidebar-nav-item">
                <a href="" class="c-active c-sidebar-nav-link">Logs</a>
            </li> --}}
        </ul>
    </li>
    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
    </div>
    <div class="ps__rail-y" style="top: 0px; right: 0px;">
        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
    </div>
</ul>
