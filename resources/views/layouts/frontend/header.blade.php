<!-- preloder start  -->
<div class="preloder_part">
    <div class="spinner">
        <div class="dot1"></div>
        <div class="dot2"></div>
    </div>
</div>
<!-- preloder end  -->

<!-- back to top start -->
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>
<!-- back to top end -->

<!-- header start -->
<header class="header header__style-three">
    <div class="header__top">
        <div class="container mxw_1360">
            <div class="header__top-info ul_li_between mt-none-10">
                <ul class="header__top-left ul_li mt-10">
                    <li><a href="#!">Call us</a> free 24/7 : (555) 172-244-7888</li>
                    <li><i class="fas fa-envelope"></i> adminpath@gmail.com</li>
                </ul>
                <ul class="header__top-right ul_li mt-10">
                    <li><i class="far fa-city"></i>Kuningan</li>
                    <li><a href="javascript:void(0);" id="logout-link"><i class="fas fa-sign-out-alt"></i>Keluar</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container mxw_1360">
        <div class="header__middle ul_li_between">
            <div class="header__logo">
                <a href="index.html">
                    <img src="{{ asset('frontend/assets') }}/img/logo.png" alt="" style="height: 90px;">
                </a>
            </div>
            <div class="d-none d-lg-block">
                <div class="ul_li">
                    <div class="header__social">
                        <a href="#!"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://wa.me/6285224004888" target="_blank"><i class="fab fa-whatsapp"></i></a>
                        <a href="https://instagram.com/laptopmurahkuningan" target="_blank"><i
                                class="fab fa-instagram"></i></a>
                        <a href="#!"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header__wrap" data-uk-sticky="top: 250; animation: uk-animation-slide-top;">
        <div class="container mxw_1360">
            <div class="header__main ul_li">
                <div class="header__logo">
                    <a href="index.html">
                        <img src="{{ asset('frontend/assets') }}/img/logo.png" alt="" style="height: 50px;">
                    </a>
                </div>
                <div class="header__category">
                    <a class="header__category-nav" href="{{ route('beranda.index') }}"><img class="bar"
                            src="{{ asset('frontend/assets') }}/img/icon/bar.svg" alt="">Cari Katalog</a>
                </div>
                <div class="hamburger_menu d-lg-none">
                    <a href="javascript:void(0);" class="active">
                        <div class="icon bar">
                            <span><i class="fal fa-bars"></i></span>
                        </div>
                    </a>
                </div>
                <div class="main-menu navbar navbar-expand-lg">
                    <nav class="main-menu__nav collapse navbar-collapse">
                        <ul>
                            <li class="{{ request()->routeIs(['beranda.*']) ? 'active' : '' }}"><a
                                    href="{{ route('beranda.index') }}">Beranda</a></li>
                            <li class="{{ request()->routeIs(['tentang.*']) ? 'active' : '' }}"><a
                                    href="{{ route('tentang.index') }}">Tentang</a></li>
                            <li class="{{ request()->routeIs(['belanja.*']) ? 'active' : '' }}"><a
                                    href="{{ route('belanja.index') }}">Belanja</a></li>
                            <li class="{{ request()->routeIs(['kontak.*']) ? 'active' : '' }}"><a
                                    href="{{ route('kontak.index') }}">Kontak</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="header__main-right ul_li">
                    @auth
                        <div class="header__icons ul_li mr-15">
                            <div class="icon wishlist-icon">
                                <a href="{{ route('keranjang.index', auth()->user()->id) }}">
                                    <img src="{{ asset('frontend/assets') }}/img/icon/shopping_bag.svg" alt="">
                                    <span class="count" id="cart-count">0</span>
                                </a>
                            </div>
                            <div class="icon">
                                <a href="{{ route('profile.index') }}"><img
                                        src="{{ asset('frontend/assets') }}/img/icon/user.svg" alt=""></a>
                            </div>
                        </div>
                    @endauth
                    @guest
                        <div class="login-sign-btn">
                            <a class="thm-btn thm-btn__2 text-black" href="{{ route('login') }}">
                                <span class="btn-wrap">
                                    <span>Login / Sign Up</span>
                                    <span>Login / Sign Up</span>
                                </span>
                            </a>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header end -->

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
