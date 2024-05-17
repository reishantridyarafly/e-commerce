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
                        <a href="#!"><i class="fab fa-twitter"></i></a>
                        <a href="#!"><i class="fab fa-instagram"></i></a>
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
                    <a class="header__category-nav" href="#!"><img class="bar"
                            src="{{ asset('frontend/assets') }}/img/icon/bar.svg" alt="">Cari Kategori<i
                            class="fas fa-chevron-down"></i></a>
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

<!-- slide-bar start -->
<aside class="slide-bar">
    <div class="close-mobile-menu">
        <a href="javascript:void(0);"><i class="fal fa-times"></i></a>
    </div>

    <!-- sidebar-info start -->
    <div class="cart_sidebar">
        <button type="button" class="cart_close_btn"><i class="fal fa-times"></i></button>
        <h2 class="heading_title text-uppercase">Cart Items - <span>4</span></h2>
        <div class="cart_items_list">
            <div class="cart_item">
                <div class="item_image">
                    <img src="{{ asset('frontend/assets') }}/img/product/img_01.png" alt="image_not_found">
                </div>
                <div class="item_content">
                    <h4 class="item_title">
                        Rorem ipsum dolor sit amet.
                    </h4>
                    <span class="item_price">$19.00</span>
                    <button type="button" class="remove_btn"><i class="fal fa-times"></i></button>
                </div>
            </div>
            <div class="cart_item">
                <div class="item_image">
                    <img src="{{ asset('frontend/assets') }}/img/product/img_02.png" alt="image_not_found">
                </div>
                <div class="item_content">
                    <h4 class="item_title">
                        Rorem ipsum dolor sit amet.
                    </h4>
                    <span class="item_price">$22.00</span>
                    <button type="button" class="remove_btn"><i class="fal fa-times"></i></button>
                </div>
            </div>
            <div class="cart_item">
                <div class="item_image">
                    <img src="{{ asset('frontend/assets') }}/img/product/img_03.png" alt="image_not_found">
                </div>
                <div class="item_content">
                    <h4 class="item_title">
                        Rorem ipsum dolor sit amet.
                    </h4>
                    <span class="item_price">$43.00</span>
                    <button type="button" class="remove_btn"><i class="fal fa-times"></i></button>
                </div>
            </div>
            <div class="cart_item">
                <div class="item_image">
                    <img src="{{ asset('frontend/assets') }}/img/product/img_04.png" alt="image_not_found">
                </div>
                <div class="item_content">
                    <h4 class="item_title">
                        Rorem ipsum dolor sit amet.
                    </h4>
                    <span class="item_price">$14.00</span>
                    <button type="button" class="remove_btn"><i class="fal fa-times"></i></button>
                </div>
            </div>
        </div>
        <div class="total_price text-uppercase">
            <span>Sub Total:</span>
            <span>$87.00</span>
        </div>
        <ul class="btns_group ul_li">
            <li><a href="cart.html" class="thm-btn">
                    <span class="btn-wrap">
                        <span>View Cart</span>
                        <span>View Cart</span>
                    </span>
                </a></li>
            <li><a href="checkout.html" class="thm-btn thm-btn__black">
                    <span class="btn-wrap">
                        <span>Checkout</span>
                        <span>Checkout</span>
                    </span>
                </a></li>
        </ul>
    </div>
    <!-- sidebar-info end -->

    <!-- side-mobile-menu start -->
    <nav class="side-mobile-menu">
        <div class="header-mobile-search">
            <form role="search" method="get" action="#">
                <input type="text" placeholder="Search Keywords">
                <button type="submit"><i class="ti-search"></i></button>
            </form>
        </div>
        <ul id="mobile-menu-active">
            <li class="dropdown"><a href="index.html">Home</a>
                <ul class="sub-menu">
                    <li><a href="index.html">Home One</a></li>
                    <li><a href="home-2.html">Home Two</a></li>
                    <li><a href="home-3.html">Home Three</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#">Shop</a>
                <ul class="sub-menu">
                    <li><a href="shop.html">Shop Default</a></li>
                    <li><a href="shop-left-sidebar.html">Shop Left Sidebar</a></li>
                    <li><a href="shop-single.html">Shop Single</a></li>
                    <li><a href="cart.html">Shop Cart</a></li>
                    <li><a href="checkout.html">Shop Checkout</a></li>
                    <li><a href="account.html">Account</a></li>
                </ul>
            </li>
            <li><a href="shop.html">Accesories</a></li>
            <li class="dropdown">
                <a href="#!">Blog</a>
                <ul class="sub-menu">
                    <li><a href="news.html">Blog</a></li>
                    <li><a href="news-single.html">Blog Details</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#!">Pages</a>
                <ul class="submenu">
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="about.html">Account</a></li>
                    <li><a href="404.html">404</a></li>
                </ul>
            </li>
            <li><a href="contact.html">Contact</a></li>
        </ul>
    </nav>
    <!-- side-mobile-menu end -->
</aside>
<div class="body-overlay"></div>
<!-- slide-bar end -->

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>

