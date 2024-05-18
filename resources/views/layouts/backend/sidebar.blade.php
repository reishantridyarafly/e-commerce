<div class="leftside-menu">

    <!-- Brand Logo Light -->
    <a href="{{ route('dashboard.index') }}" class="logo logo-light">
        <span class="logo-lg">
            <img src="{{ asset('backend/assets') }}/images/logo.png" alt="logo" style="height: 55px">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('backend/assets') }}/images/logo.png" alt="logo" style="height: 30px">
        </span>
    </a>

    <a href="{{ route('dashboard.index') }}" class="logo logo-dark">
        <span class="logo-lg">
            <img src="{{ asset('backend/assets') }}/images/logo.png" alt="logo" style="height: 55px">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('backend/assets') }}/images/logo.png" alt="logo" style="height: 30px">
        </span>
    </a>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!--- Sidemenu -->
        <ul class="side-nav">
            <li class="side-nav-title">Main</li>
            @if (auth()->user()->type == 'Pelanggan')
                <li class="side-nav-item {{ request()->routeIs(['beranda.index']) ? 'menuitem-active' : '' }}">
                    <a href="{{ route('beranda.index') }}"
                        class="side-nav-link {{ request()->routeIs(['beranda.index']) ? 'active' : '' }}">
                        <i class="ri-home-2-line"></i>
                        <span> Beranda </span>
                    </a>
                </li>
            @endif

            @if (auth()->user()->type == 'Administrator' || auth()->user()->type == 'Pelanggan')
                <li class="side-nav-item {{ request()->routeIs(['beranda.index']) ? 'menuitem-active' : '' }}">
                    <a href="{{ route('beranda.index') }}"
                        class="side-nav-link {{ request()->routeIs(['beranda.index']) ? 'active' : '' }}">
                        <i class="ri-time-line"></i>
                        <span> Riwayat Transaksi </span>
                    </a>
                </li>
            @endif

            @if (auth()->user()->type == 'Administrator')
                <li class="side-nav-item {{ request()->routeIs(['dashboard.index']) ? 'menuitem-active' : '' }}">
                    <a href="{{ route('dashboard.index') }}"
                        class="side-nav-link {{ request()->routeIs(['dashboard.index']) ? 'active' : '' }}">
                        <i class="ri-dashboard-3-line"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li class="side-nav-title">Master</li>
                <li class="side-nav-item {{ request()->routeIs(['kategori.*']) ? 'menuitem-active' : '' }}">
                    <a href="{{ route('kategori.index') }}"
                        class="side-nav-link {{ request()->routeIs(['kategori.*']) ? 'active' : '' }}">
                        <i class="ri-shopping-bag-2-line"></i>
                        <span> Katalog </span>
                    </a>
                </li>
                <li class="side-nav-item {{ request()->routeIs(['rekening.*']) ? 'menuitem-active' : '' }}">
                    <a href="{{ route('rekening.index') }}"
                        class="side-nav-link {{ request()->routeIs(['rekening.*']) ? 'active' : '' }}">
                        <i class="ri-wallet-2-line"></i>
                        <span> Rekening </span>
                    </a>
                </li>
                <li class="side-nav-item {{ request()->routeIs(['produk.*']) ? 'menuitem-active' : '' }}">
                    <a href="{{ route('produk.index') }}"
                        class="side-nav-link {{ request()->routeIs(['produk.*']) ? 'active' : '' }}">
                        <i class="ri-box-3-line"></i>
                        <span> Produk </span>
                    </a>
                </li>
                <li class="side-nav-item {{ request()->routeIs(['pelanggan.*']) ? 'menuitem-active' : '' }}">
                    <a href="{{ route('pelanggan.index') }}"
                        class="side-nav-link {{ request()->routeIs(['pelanggan.*']) ? 'active' : '' }}">
                        <i class="ri-user-line"></i>
                        <span> Pelanggan </span>
                    </a>
                </li>
                <li class="side-nav-item {{ request()->routeIs(['pengguna.*']) ? 'menuitem-active' : '' }}">
                    <a href="{{ route('pengguna.index') }}"
                        class="side-nav-link {{ request()->routeIs(['pengguna.*']) ? 'active' : '' }}">
                        <i class="ri-user-2-line"></i>
                        <span> Pengguna </span>
                    </a>
                </li>
            @endif

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
