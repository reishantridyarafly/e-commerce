<div class="leftside-menu">

    <!-- Brand Logo Light -->
    <a href="index.html" class="logo logo-light">
        <span class="logo-lg">
            <img src="{{ asset('assets') }}/images/logo.png" alt="logo">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('assets') }}/images/logo-sm.png" alt="small logo">
        </span>
    </a>

    <!-- Brand Logo Dark -->
    <a href="index.html" class="logo logo-dark">
        <span class="logo-lg">
            <img src="{{ asset('assets') }}/images/logo-dark.png" alt="dark logo">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('assets') }}/images/logo-sm.png" alt="small logo">
        </span>
    </a>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title">Main</li>

            <li class="side-nav-item {{ request()->routeIs(['dashboard.index']) ? 'menuitem-active' : '' }}">
                <a href="{{ route('dashboard.index') }}"
                    class="side-nav-link {{ request()->routeIs(['dashboard.index']) ? 'active' : '' }}">
                    <i class="ri-dashboard-3-line"></i>
                    <span> Dashboard </span>
                </a>
            </li>

            <li class="side-nav-title">Master</li>

            <li class="side-nav-title">Pengaturan</li>
            <li class="side-nav-item {{ request()->routeIs(['profile.*']) ? 'menuitem-active' : '' }}">
                <a href="{{ route('profile.index') }}"
                    class="side-nav-link {{ request()->routeIs(['profile.*']) ? 'active' : '' }}">
                    <i class="ri-account-circle-line"></i>
                    <span> Profile </span>
                </a>
            </li>
            <li class="side-nav-item {{ request()->routeIs(['alamat.*']) ? 'menuitem-active' : '' }}">
                <a href="{{ route('alamat.index') }}"
                    class="side-nav-link {{ request()->routeIs(['alamat.*']) ? 'active' : '' }}">
                    <i class="ri-map-pin-line"></i>
                    <span> Alamat </span>
                </a>
            </li>

        </ul>
        <!--- End Sidemenu -->

        <div class="clearfix"></div>
    </div>
</div>
