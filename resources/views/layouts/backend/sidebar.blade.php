<div class="leftside-menu">

    <!-- Brand Logo Light -->
    <a href="{{ route('beranda.index') }}" class="logo logo-light">
        <span class="logo-lg">
            <img src="{{ asset('backend/assets') }}/images/logo.png" alt="logo" style="height: 55px">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('backend/assets') }}/images/logo.png" alt="logo" style="height: 30px">
        </span>
    </a>

    <a href="{{ route('beranda.index') }}" class="logo logo-dark">
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
            @if (auth()->user()->type == 'Administrator' || auth()->user()->type == 'Pemilik')
                <li class="side-nav-title">Main</li>
                <li class="side-nav-item {{ request()->routeIs(['dashboard.index']) ? 'menuitem-active' : '' }}">
                    <a href="{{ route('dashboard.index') }}"
                        class="side-nav-link {{ request()->routeIs(['dashboard.index']) ? 'active' : '' }}">
                        <i class="ri-dashboard-3-line"></i>
                        <span> Dashboard </span>
                    </a>
                </li>
                <li class="side-nav-title">Master</li>
                <li class="side-nav-item {{ request()->routeIs(['transaksi.*']) ? 'menuitem-active' : '' }}">
                    <a href="{{ route('transaksi.index') }}"
                        class="side-nav-link {{ request()->routeIs(['transaksi.*']) ? 'active' : '' }}">
                        <i class="ri-time-line"></i>
                        <span> Transaksi </span>
                    </a>
                </li>
                <li class="side-nav-item {{ request()->routeIs(['pesan.*']) ? 'menuitem-active' : '' }}">
                    <a href="{{ route('pesan.index') }}"
                        class="side-nav-link {{ request()->routeIs(['pesan.*']) ? 'active' : '' }}">
                        <i class="ri-book-line"></i>
                        <span> Pesan Kontak </span>
                    </a>
                </li>
            @endif
            @if (auth()->user()->type == 'Administrator')
                <li class="side-nav-item {{ request()->routeIs(['katalog.*']) ? 'menuitem-active' : '' }}">
                    <a href="{{ route('katalog.index') }}"
                        class="side-nav-link {{ request()->routeIs(['katalog.*']) ? 'active' : '' }}">
                        <i class="ri-shopping-bag-2-line"></i>
                        <span> Katalog </span>
                    </a>
                </li>
                <li class="side-nav-item {{ request()->routeIs(['produk.*']) ? 'menuitem-active' : '' }}">
                    <a href="{{ route('produk.index') }}"
                        class="side-nav-link {{ request()->routeIs(['produk.*']) ? 'active' : '' }}">
                        <i class="ri-box-3-line"></i>
                        <span> Produk </span>
                    </a>
                </li>
                <li class="side-nav-item {{ request()->routeIs(['rekening.*']) ? 'menuitem-active' : '' }}">
                    <a href="{{ route('rekening.index') }}"
                        class="side-nav-link {{ request()->routeIs(['rekening.*']) ? 'active' : '' }}">
                        <i class="ri-wallet-2-line"></i>
                        <span> Rekening </span>
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

            <li class="side-nav-title">Informasi</li>
            <li class="side-nav-item {{ request()->routeIs(['profile.*']) ? 'menuitem-active' : '' }}">
                <a href="{{ route('profile.index') }}"
                    class="side-nav-link {{ request()->routeIs(['profile.*']) ? 'active' : '' }}">
                    <i class="ri-account-circle-line"></i>
                    <span> Profile </span>
                </a>
            </li>
            @if (auth()->user()->type == 'Pelanggan')
                <li class="side-nav-item {{ request()->routeIs(['transaksi.*']) ? 'menuitem-active' : '' }}">
                    <a href="{{ route('transaksi.index') }}"
                        class="side-nav-link {{ request()->routeIs(['transaksi.*']) ? 'active' : '' }}">
                        <i class="ri-time-line"></i>
                        <span> Transaksi </span>
                    </a>
                </li>
            @endif

            <li class="side-nav-item {{ request()->routeIs(['rating.*']) ? 'menuitem-active' : '' }}">
                <a href="{{ route('rating.index') }}"
                    class="side-nav-link {{ request()->routeIs(['rating.*']) ? 'active' : '' }}">
                    <i class="ri-star-line"></i>
                    <span> Rating </span>
                </a>
            </li>
            <li class="side-nav-item {{ request()->routeIs(['alamat.*']) ? 'menuitem-active' : '' }}">
                <a href="{{ route('alamat.index') }}"
                    class="side-nav-link {{ request()->routeIs(['alamat.*']) ? 'active' : '' }}">
                    <i class="ri-map-pin-line"></i>
                    <span> Alamat </span>
                </a>
            </li>

            @if (auth()->user()->type == 'Pemilik')
                <li class="side-nav-title">Laporan</li>
                <li class="side-nav-item {{ request()->routeIs(['laporan_penjualan.*']) ? 'menuitem-active' : '' }}">
                    <a href="{{ route('laporan_penjualan.index') }}"
                        class="side-nav-link {{ request()->routeIs(['laporan_penjualan.*']) ? 'active' : '' }}">
                        <i class="ri-file-line"></i>
                        <span> Penjualan </span>
                    </a>
                </li>
            @endif

            @if (auth()->user()->type == 'Administrator')
                <li class="side-nav-title">Pengaturan</li>
                <li class="side-nav-item {{ request()->routeIs(['banner.*']) ? 'menuitem-active' : '' }}">
                    <a href="{{ route('banner.index') }}"
                        class="side-nav-link {{ request()->routeIs(['banner.*']) ? 'active' : '' }}">
                        <i class="ri-folder-settings-line"></i>
                        <span> Banner </span>
                    </a>
                </li>
            @endif
        </ul>
        <!--- End Sidemenu -->

        <div class="clearfix"></div>
    </div>
</div>
