@extends('layouts.frontend.main')
@section('title', 'Beranda')
@section('content')
    <!-- banner start -->
    <div class="banner pt-10">
        <div class="container mxw_1360">
            <div class="banner__wrapper d-flex">
                <div class="category-nav">
                    <ul class="category-nav__list list-unstyled">
                        @forelse ($category as $row)
                            <li><a href="{{ route('belanja.category', $row->slug) }}">{{ $row->nama }}</a></li>
                        @empty
                            <li><a href="#!">Data tidak tersedia</a></li>
                        @endforelse
                    </ul>
                </div>
                <div class="banner__main banner__height ul_li bg_img"
                    data-background="{{ asset('frontend/assets') }}/img/bg/bg_19.jpg">
                    <div class="hero-banner__content">
                        <span class="subtitle">100% organic Food</span>
                        <h2 class="title text-uppercase">100% Fresh Grocery <br> Combo Pack</h2>
                        <p class="content">Sumptuous, filling, and temptingly healthy.</p>
                        <h4 class="price">From <span>$99.00</span></h4>
                        <div class="banner__btn mt-30">
                            <a class="thm-btn" href="shop.html">
                                <span class="btn-wrap">
                                    <span>Shop Now</span>
                                    <span>Shop Now</span>
                                </span>
                                <i class="far fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="banner__img">
                        <img src="{{ asset('frontend/assets') }}/img/product/img_121.png" alt="">
                    </div>
                    <div class="banner__ofer-box">
                        <img src="{{ asset('frontend/assets') }}/img/icon/offer_bg.png" alt="">
                        <span class="offer-text"><span class="discount">30<span>%</span></span> <br> <span>OFF</span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner end -->

    <!-- banner slide start  -->
    <div class="banner-slide pt-35">
        <div class="container mxw_1360">
            <div class="banner-slide__active">
                <div class="banner-slide__single">
                    <div class="banner-slide__item ul_li bg_img">
                        <div class="banner-slide__img">
                            <img src="{{ asset('frontend/assets') }}/img/product/img_122.png" alt="">
                        </div>
                        <div class="banner-slide__content">
                            <span class="offer">Get 30% off</span>
                            <h3>Smart Phone</h3>
                            <h4 class="price">Starting <span>560.99</span></h4>
                            <a href="shop.html">Buy Now</a>
                        </div>
                    </div>
                </div>

                <div class="banner-slide__single">
                    <div class="banner-slide__item ul_li bg_img"
                        data-background="{{ asset('frontend/assets') }}/img/bg/bg_20.jpg">
                        <div class="banner-slide__img">
                            <img src="{{ asset('frontend/assets') }}/img/product/img_123.png" alt="">
                        </div>
                        <div class="banner-slide__content">
                            <span class="offer">Get 30% off</span>
                            <h3>Montblanc Watch</h3>
                            <h4 class="price">Starting <span>560.99</span></h4>
                            <a href="shop.html">Buy Now</a>
                        </div>
                    </div>
                </div>

                <div class="banner-slide__single">
                    <div class="banner-slide__item ul_li bg_img">
                        <div class="banner-slide__img">
                            <img src="{{ asset('frontend/assets') }}/img/product/img_124.png" alt="">
                        </div>
                        <div class="banner-slide__content">
                            <span class="offer">Get 30% off</span>
                            <h3>SAMSUNG Galaxy</h3>
                            <h4 class="price">Starting <span>560.99</span></h4>
                            <a href="shop.html">Buy Now</a>
                        </div>
                    </div>
                </div>

                <div class="banner-slide__single">
                    <div class="banner-slide__item ul_li bg_img"
                        data-background="{{ asset('frontend/assets') }}/img/bg/bg_20.jpg">
                        <div class="banner-slide__img">
                            <img src="{{ asset('frontend/assets') }}/img/product/img_123.png" alt="">
                        </div>
                        <div class="banner-slide__content">
                            <span class="offer">Get 30% off</span>
                            <h3>Montblanc Watch</h3>
                            <h4 class="price">Starting <span>560.99</span></h4>
                            <a href="shop.html">Buy Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner slide end  -->

    <!-- rd tab product start -->
    <div class="rd-tab-product pt-60">
        <div class="container mxw_1530">
            <div class="row mt-none-30">
                <div class="col-lg-3 mt-30">
                    <div class="add-banner__wrap pr-90">
                        <div class="add-banner bg_img add-banner__2 add-banner__h444"
                            data-background="{{ asset('frontend/assets') }}/img/bg/bg_07.jpg">
                            <span>New</span>
                            <h2>Cloud Cam, <br>Security Camera</h2>
                            <div class="upto-offer ul_li mb-35">
                                <span class="upto">Up <br> To</span>
                                <span class="offer-no">70 <span>%</span></span>
                            </div>
                            <a class="thm-btn thm-btn__transparent" href="shop.html">
                                <span class="btn-wrap">
                                    <span>Shop Now</span>
                                    <span>Shop Now</span>
                                </span>
                                <i class="far fa-long-arrow-right"></i>
                            </a>
                            <div class="add-banner__img">
                                <img src="{{ asset('frontend/assets') }}/img/product/img_63.png" alt="">
                            </div>
                            <div class="add-banner__text-box add-banner__text-box--2">
                                25% <br>
                                <span>off</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 mt-30">
                    <div class="rd-products__wrap">
                        <div class="rd-products__nav ul_li_between mb-20">
                            <h2 class="section-heading"><span>Produk Terlaris</span></h2>
                        </div>
                        <div class="rd-products">
                            <div class="tab-content tab_has_slider" id="vd-myTabContent">
                                <div class="tab-pane fade show active" id="vd-tab4" role="tabpanel"
                                    aria-labelledby="vd-tab-04">
                                    <div class="rd-tab-product__slide">
                                        @forelse ($product as $row)
                                            <div class="tab-product__item tx-product text-center">
                                                <div class="thumb">
                                                    <a href="shop-single.html"><img
                                                            src="{{ asset('storage/uploads/products/' . $row->photos->first()->photo_name) }}"
                                                            alt=""></a>
                                                    <ul class="product__action style-2 ul_li">
                                                        <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="content">
                                                    <div class="product__review ul_li_center">
                                                        <ul class="rating-star ul_li mr-10">
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="far fa-star"></i></li>
                                                            <li><i class="far fa-star"></i></li>
                                                        </ul>
                                                        <span>(126)</span>
                                                    </div>
                                                    <h3 class="title"><a href="shop-single.html">{{ $row->nama }}</a></h3>
                                                    <span class="price">{{ 'Rp ' . number_format($row->harga_jual, 0, ',', '.') }} <br> <span class="old-price">{{ 'Rp ' . number_format($row->harga, 0, ',', '.') }}</span>
                                                        </span>
                                                </div>
                                            </div>
                                        @empty
                                            <h3>Data tidak tersedia</h3>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rd tab product end -->

    <!-- recent product start -->
    <div class="recent-product pt-60 pb-80">
        <div class="container">
            <div class="row mt-none-30">
                <div class="col-lg-12 mt-30">
                    <div class="product__nav-wrap style-2 ul_li_between">
                        <h2 class="section-heading"><span>Rekomendasi Barang</span></h2>
                        <ul class="product__nav recent-product__nav nav nav-tabs" id="vdr-myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="vdr-tab-01" data-bs-toggle="tab"
                                    data-bs-target="#vdr-tab1" type="button" role="tab" aria-controls="vdr-tab1"
                                    aria-selected="true">Teleevision</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="vdr-tab-02" data-bs-toggle="tab" data-bs-target="#vdr-tab2"
                                    type="button" role="tab" aria-controls="vdr-tab2"
                                    aria-selected="false">Computer & Laptop</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="vdr-tab-03" data-bs-toggle="tab" data-bs-target="#vdr-tab3"
                                    type="button" role="tab" aria-controls="vd-tab3"
                                    aria-selected="false">Lamp</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="vdr-tab-04" data-bs-toggle="tab" data-bs-target="#vdr-tab4"
                                    type="button" role="tab" aria-controls="vd-tab4"
                                    aria-selected="false">Accesories</button>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content" id="vdr-myTabContent">
                        <div class="tab-pane animated fadeInUp show active" id="vdr-tab1" role="tabpanel"
                            aria-labelledby="vdr-tab-01">
                            <div class="row justify-content-md-center">
                                <div class="col-lg-4 col-md-6">
                                    <div class="recent-product__item tx-product ul_li mt-30">
                                        <div class="thumb">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_39.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="recent-product__content">
                                            <ul class="rating-star ul_li mr-10">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                            </ul>
                                            <h3><a href="shop-signle.html">Portable 2TB External Hard Drive Portable</a>
                                            </h3>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="recent-product__item tx-product ul_li mt-30">
                                        <div class="thumb">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_40.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="recent-product__content">
                                            <ul class="rating-star ul_li mr-10">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                            </ul>
                                            <h3><a href="shop-signle.html">Freestanding Portable Air Conditioner
                                                    Indoor</a></h3>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="recent-product__item tx-product ul_li mt-30">
                                        <div class="thumb">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_41.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="recent-product__content">
                                            <ul class="rating-star ul_li mr-10">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                            </ul>
                                            <h3><a href="shop-signle.html">Galaxy S20 FE 5G Cell Phone, Factory
                                                    Unlocked</a></h3>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="recent-product__item tx-product ul_li mt-30">
                                        <div class="thumb">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_42.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="recent-product__content">
                                            <ul class="rating-star ul_li mr-10">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                            </ul>
                                            <h3><a href="shop-signle.html">Tab M10 Plus, FHD Android Tablet, Processor</a>
                                            </h3>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="recent-product__item tx-product ul_li mt-30">
                                        <div class="thumb">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_43.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="recent-product__content">
                                            <ul class="rating-star ul_li mr-10">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                            </ul>
                                            <h3><a href="shop-signle.html">JBL Tune 510BT Wireless On-Ear Head phones</a>
                                            </h3>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="recent-product__item tx-product ul_li mt-30">
                                        <div class="thumb">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_44.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="recent-product__content">
                                            <ul class="rating-star ul_li mr-10">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                            </ul>
                                            <h3><a href="shop-signle.html">Freestanding Portable Air Conditioner
                                                    Indoor</a></h3>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="recent-product__item tx-product ul_li mt-30">
                                        <div class="thumb">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_45.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="recent-product__content">
                                            <ul class="rating-star ul_li mr-10">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                            </ul>
                                            <h3><a href="shop-signle.html">Ninja Compact Smoothie & Food Processing
                                                    Blender</a></h3>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="recent-product__item tx-product ul_li mt-30">
                                        <div class="thumb">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_46.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="recent-product__content">
                                            <ul class="rating-star ul_li mr-10">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                            </ul>
                                            <h3><a href="shop-signle.html">Portable 2TB External Hard Drive Portable</a>
                                            </h3>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="recent-product__item tx-product ul_li mt-30">
                                        <div class="thumb">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_47.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="recent-product__content">
                                            <ul class="rating-star ul_li mr-10">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                            </ul>
                                            <h3><a href="shop-signle.html">Freestanding Portable Air Conditioner
                                                    Indoor</a></h3>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane animated fadeInUp" id="vdr-tab2" role="tabpanel"
                            aria-labelledby="vdr-tab-02">
                            <div class="row justify-content-md-center">
                                <div class="col-lg-4 col-md-6">
                                    <div class="recent-product__item tx-product ul_li mt-30">
                                        <div class="thumb">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_39.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="recent-product__content">
                                            <ul class="rating-star ul_li mr-10">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                            </ul>
                                            <h3><a href="shop-signle.html">Portable 2TB External Hard Drive Portable</a>
                                            </h3>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="recent-product__item tx-product ul_li mt-30">
                                        <div class="thumb">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_40.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="recent-product__content">
                                            <ul class="rating-star ul_li mr-10">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                            </ul>
                                            <h3><a href="shop-signle.html">Freestanding Portable Air Conditioner
                                                    Indoor</a></h3>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="recent-product__item tx-product ul_li mt-30">
                                        <div class="thumb">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_41.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="recent-product__content">
                                            <ul class="rating-star ul_li mr-10">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                            </ul>
                                            <h3><a href="shop-signle.html">Galaxy S20 FE 5G Cell Phone, Factory
                                                    Unlocked</a></h3>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="recent-product__item tx-product ul_li mt-30">
                                        <div class="thumb">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_42.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="recent-product__content">
                                            <ul class="rating-star ul_li mr-10">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                            </ul>
                                            <h3><a href="shop-signle.html">Tab M10 Plus, FHD Android Tablet, Processor</a>
                                            </h3>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="recent-product__item tx-product ul_li mt-30">
                                        <div class="thumb">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_43.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="recent-product__content">
                                            <ul class="rating-star ul_li mr-10">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                            </ul>
                                            <h3><a href="shop-signle.html">JBL Tune 510BT Wireless On-Ear Head phones</a>
                                            </h3>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="recent-product__item tx-product ul_li mt-30">
                                        <div class="thumb">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_44.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="recent-product__content">
                                            <ul class="rating-star ul_li mr-10">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                            </ul>
                                            <h3><a href="shop-signle.html">Freestanding Portable Air Conditioner
                                                    Indoor</a></h3>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="recent-product__item tx-product ul_li mt-30">
                                        <div class="thumb">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_45.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="recent-product__content">
                                            <ul class="rating-star ul_li mr-10">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                            </ul>
                                            <h3><a href="shop-signle.html">Ninja Compact Smoothie & Food Processing
                                                    Blender</a></h3>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="recent-product__item tx-product ul_li mt-30">
                                        <div class="thumb">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_46.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="recent-product__content">
                                            <ul class="rating-star ul_li mr-10">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                            </ul>
                                            <h3><a href="shop-signle.html">Portable 2TB External Hard Drive Portable</a>
                                            </h3>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="recent-product__item tx-product ul_li mt-30">
                                        <div class="thumb">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_47.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="recent-product__content">
                                            <ul class="rating-star ul_li mr-10">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                            </ul>
                                            <h3><a href="shop-signle.html">Freestanding Portable Air Conditioner
                                                    Indoor</a></h3>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane animated fadeInUp" id="vdr-tab3" role="tabpanel"
                            aria-labelledby="vdr-tab-03">
                            <div class="row justify-content-md-center">
                                <div class="col-lg-4 col-md-6">
                                    <div class="recent-product__item tx-product ul_li mt-30">
                                        <div class="thumb">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_39.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="recent-product__content">
                                            <ul class="rating-star ul_li mr-10">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                            </ul>
                                            <h3><a href="shop-signle.html">Portable 2TB External Hard Drive Portable</a>
                                            </h3>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="recent-product__item tx-product ul_li mt-30">
                                        <div class="thumb">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_40.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="recent-product__content">
                                            <ul class="rating-star ul_li mr-10">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                            </ul>
                                            <h3><a href="shop-signle.html">Freestanding Portable Air Conditioner
                                                    Indoor</a></h3>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="recent-product__item tx-product ul_li mt-30">
                                        <div class="thumb">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_41.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="recent-product__content">
                                            <ul class="rating-star ul_li mr-10">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                            </ul>
                                            <h3><a href="shop-signle.html">Galaxy S20 FE 5G Cell Phone, Factory
                                                    Unlocked</a></h3>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="recent-product__item tx-product ul_li mt-30">
                                        <div class="thumb">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_42.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="recent-product__content">
                                            <ul class="rating-star ul_li mr-10">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                            </ul>
                                            <h3><a href="shop-signle.html">Tab M10 Plus, FHD Android Tablet, Processor</a>
                                            </h3>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="recent-product__item tx-product ul_li mt-30">
                                        <div class="thumb">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_43.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="recent-product__content">
                                            <ul class="rating-star ul_li mr-10">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                            </ul>
                                            <h3><a href="shop-signle.html">JBL Tune 510BT Wireless On-Ear Head phones</a>
                                            </h3>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="recent-product__item tx-product ul_li mt-30">
                                        <div class="thumb">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_44.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="recent-product__content">
                                            <ul class="rating-star ul_li mr-10">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                            </ul>
                                            <h3><a href="shop-signle.html">Freestanding Portable Air Conditioner
                                                    Indoor</a></h3>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="recent-product__item tx-product ul_li mt-30">
                                        <div class="thumb">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_45.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="recent-product__content">
                                            <ul class="rating-star ul_li mr-10">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                            </ul>
                                            <h3><a href="shop-signle.html">Ninja Compact Smoothie & Food Processing
                                                    Blender</a></h3>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="recent-product__item tx-product ul_li mt-30">
                                        <div class="thumb">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_46.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="recent-product__content">
                                            <ul class="rating-star ul_li mr-10">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                            </ul>
                                            <h3><a href="shop-signle.html">Portable 2TB External Hard Drive Portable</a>
                                            </h3>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="recent-product__item tx-product ul_li mt-30">
                                        <div class="thumb">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_47.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="recent-product__content">
                                            <ul class="rating-star ul_li mr-10">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                            </ul>
                                            <h3><a href="shop-signle.html">Freestanding Portable Air Conditioner
                                                    Indoor</a></h3>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane animated fadeInUp" id="vdr-tab4" role="tabpanel"
                            aria-labelledby="vdr-tab-04">
                            <div class="row justify-content-md-center">
                                <div class="col-lg-4 col-md-6">
                                    <div class="recent-product__item tx-product ul_li mt-30">
                                        <div class="thumb">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_39.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="recent-product__content">
                                            <ul class="rating-star ul_li mr-10">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                            </ul>
                                            <h3><a href="shop-signle.html">Portable 2TB External Hard Drive Portable</a>
                                            </h3>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="recent-product__item tx-product ul_li mt-30">
                                        <div class="thumb">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_40.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="recent-product__content">
                                            <ul class="rating-star ul_li mr-10">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                            </ul>
                                            <h3><a href="shop-signle.html">Freestanding Portable Air Conditioner
                                                    Indoor</a></h3>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="recent-product__item tx-product ul_li mt-30">
                                        <div class="thumb">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_41.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="recent-product__content">
                                            <ul class="rating-star ul_li mr-10">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                            </ul>
                                            <h3><a href="shop-signle.html">Galaxy S20 FE 5G Cell Phone, Factory
                                                    Unlocked</a></h3>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="recent-product__item tx-product ul_li mt-30">
                                        <div class="thumb">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_42.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="recent-product__content">
                                            <ul class="rating-star ul_li mr-10">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                            </ul>
                                            <h3><a href="shop-signle.html">Tab M10 Plus, FHD Android Tablet, Processor</a>
                                            </h3>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="recent-product__item tx-product ul_li mt-30">
                                        <div class="thumb">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_43.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="recent-product__content">
                                            <ul class="rating-star ul_li mr-10">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                            </ul>
                                            <h3><a href="shop-signle.html">JBL Tune 510BT Wireless On-Ear Head phones</a>
                                            </h3>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="recent-product__item tx-product ul_li mt-30">
                                        <div class="thumb">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_44.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="recent-product__content">
                                            <ul class="rating-star ul_li mr-10">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                            </ul>
                                            <h3><a href="shop-signle.html">Freestanding Portable Air Conditioner
                                                    Indoor</a></h3>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="recent-product__item tx-product ul_li mt-30">
                                        <div class="thumb">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_45.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="recent-product__content">
                                            <ul class="rating-star ul_li mr-10">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                            </ul>
                                            <h3><a href="shop-signle.html">Ninja Compact Smoothie & Food Processing
                                                    Blender</a></h3>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="recent-product__item tx-product ul_li mt-30">
                                        <div class="thumb">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_46.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="recent-product__content">
                                            <ul class="rating-star ul_li mr-10">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                            </ul>
                                            <h3><a href="shop-signle.html">Portable 2TB External Hard Drive Portable</a>
                                            </h3>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="recent-product__item tx-product ul_li mt-30">
                                        <div class="thumb">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_47.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="recent-product__content">
                                            <ul class="rating-star ul_li mr-10">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                            </ul>
                                            <h3><a href="shop-signle.html">Freestanding Portable Air Conditioner
                                                    Indoor</a></h3>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- recent product end -->
@endsection
