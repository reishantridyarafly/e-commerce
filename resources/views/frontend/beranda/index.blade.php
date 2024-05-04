@extends('layouts.frontend.main')
@section('title', 'Beranda')
@section('content')
    <!-- featured start -->
    <div class="featured pt-10">
        <div class="container mxw_1530">
            <div class="row mt-none-30">
                <div class="col-lg-9 mt-30">
                    <div class="featured__item featured__big bg_img ul_li_between"
                        data-background="{{ asset('frontend/assets') }}/img/bg/bg_06.jpg">
                        <div class="featured__content">
                            <span>Widesceen 4k .......</span>
                            <h2>Digital Slr Camera <br> High Defination</h2>
                            <p>Sumptuous, filling, and temptingly</p>
                            <div class="ul_li mt-20">
                                <div class="upto-offer ul_li">
                                    <span class="upto">Up <br> To</span>
                                    <span class="offer-no">70 <span>%</span></span>
                                </div>
                                <h4 class="price">$ 180.99</h4>
                            </div>
                            <div class="banner__btn mt-30">
                                <a class="thm-btn thm-btn__black" href="shop.html">
                                    <span class="btn-wrap">
                                        <span>Shop Now</span>
                                        <span>Shop Now</span>
                                    </span>
                                    <i class="far fa-long-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="featured__img">
                            <img src="{{ asset('frontend/assets') }}/img/product/img_56.png" alt="">
                        </div>
                        <div class="featured__shape">
                            <img src="{{ asset('frontend/assets') }}/img/icon/h_01.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mt-30">
                    <div class="add-banner bg_img add-banner__2 add-banner__h555"
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
                            <img src="{{ asset('frontend/assets') }}/img/product/img_57.png" alt="">
                        </div>
                        <div class="add-banner__text-box">
                            25% <br>
                            <span>off</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- featured end -->

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
                            <h2 class="section-heading"><span>Best Seller Product</span></h2>
                            <ul class="nav nav-tabs" id="vd-myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="vd-tab-01" data-bs-toggle="tab"
                                        data-bs-target="#vd-tab1" type="button" role="tab" aria-controls="vd-tab1"
                                        aria-selected="true">Engine</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="vd-tab-02" data-bs-toggle="tab"
                                        data-bs-target="#vd-tab2" type="button" role="tab" aria-controls="vd-tab2"
                                        aria-selected="false">Transmission</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="vd-tab-03" data-bs-toggle="tab"
                                        data-bs-target="#vd-tab3" type="button" role="tab" aria-controls="vd-tab3"
                                        aria-selected="false">Battery</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="vd-tab-04" data-bs-toggle="tab"
                                        data-bs-target="#vd-tab4" type="button" role="tab" aria-controls="vd-tab4"
                                        aria-selected="false">Radiator</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="vd-tab-05" data-bs-toggle="tab"
                                        data-bs-target="#vd-tab5" type="button" role="tab" aria-controls="vd-tab5"
                                        aria-selected="false">Fuel Tank</button>
                                </li>
                            </ul>
                        </div>
                        <div class="rd-products">
                            <div class="tab-content tab_has_slider" id="vd-myTabContent">
                                <div class="tab-pane fade" id="vd-tab1" role="tabpanel" aria-labelledby="vd-tab-01">
                                    <div class="rd-tab-product__slide">
                                        <div class="tab-product__item tx-product text-center">
                                            <div class="thumb">
                                                <a href="shop-single.html"><img
                                                        src="{{ asset('frontend/assets') }}/img/product/img_64.png"
                                                        alt=""></a>
                                                <ul class="product__action style-2 ul_li">
                                                    <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-heart"></i></a></li>
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
                                                <h3 class="title"><a href="shop-single.html">SAMSUNG Galaxy Tab
                                                        A7 Lite 8.7″ 32GB Android</a></h3>
                                                <span class="price">( $28.52 - <span class="old-price">$30.00</span>
                                                    )</span>
                                            </div>
                                            <span class="badge-skew">New</span>
                                        </div>
                                        <div class="tab-product__item bg2 tx-product text-center">
                                            <div class="thumb">
                                                <a href="shop-single.html"><img
                                                        src="{{ asset('frontend/assets') }}/img/product/img_65.png"
                                                        alt=""></a>
                                                <ul class="product__action style-2 ul_li">
                                                    <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-heart"></i></a></li>
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
                                                <h3 class="title"><a href="shop-single.html">Fire HD 10 tablet,
                                                        10.1″, 1080p Full HD, 32 GB</a></h3>
                                                <span class="price">( $28.52 - <span class="old-price">$30.00</span>
                                                    )</span>
                                            </div>
                                            <span class="badge-skew">New</span>
                                        </div>
                                        <div class="tab-product__item tx-product text-center">
                                            <div class="thumb">
                                                <a href="shop-single.html"><img
                                                        src="{{ asset('frontend/assets') }}/img/product/img_66.png"
                                                        alt=""></a>
                                                <ul class="product__action style-2 ul_li">
                                                    <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-heart"></i></a></li>
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
                                                <h3 class="title"><a href="shop-single.html">SAMSUNG Galaxy A13
                                                        5G Cell Phone, Factory</a></h3>
                                                <span class="price">( $28.52 - <span class="old-price">$30.00</span>
                                                    )</span>
                                            </div>
                                            <span class="badge-skew">New</span>
                                        </div>
                                        <div class="tab-product__item bg4 tx-product text-center">
                                            <div class="thumb">
                                                <a href="shop-single.html"><img
                                                        src="{{ asset('frontend/assets') }}/img/product/img_67.png"
                                                        alt=""></a>
                                                <ul class="product__action style-2 ul_li">
                                                    <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-heart"></i></a></li>
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
                                                <h3 class="title"><a href="shop-single.html">Sceptre 24″ Thin
                                                        75Hz 1080p LED Monitor</a></h3>
                                                <span class="price">( $28.52 - <span class="old-price">$30.00</span>
                                                    )</span>
                                            </div>
                                            <span class="badge-skew">New</span>
                                        </div>
                                        <div class="tab-product__item bg5 tx-product text-center">
                                            <div class="thumb">
                                                <a href="shop-single.html"><img
                                                        src="{{ asset('frontend/assets') }}/img/product/img_68.png"
                                                        alt=""></a>
                                                <ul class="product__action style-2 ul_li">
                                                    <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-heart"></i></a></li>
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
                                                <h3 class="title"><a href="shop-single.html">Rokinon Xeen CF
                                                        16mm T2.6 Pro Cinema Wide Angle</a></h3>
                                                <span class="price">( $28.52 - <span class="old-price">$30.00</span>
                                                    )</span>
                                            </div>
                                            <span class="badge-skew">New</span>
                                        </div>
                                        <div class="tab-product__item tx-product text-center">
                                            <div class="thumb">
                                                <a href="shop-single.html"><img
                                                        src="{{ asset('frontend/assets') }}/img/product/img_66.png"
                                                        alt=""></a>
                                                <ul class="product__action style-2 ul_li">
                                                    <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-heart"></i></a></li>
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
                                                <h3 class="title"><a href="shop-single.html">Portable External
                                                        Hard Drive Portable HDD USB</a></h3>
                                                <span class="price">( $28.52 - <span class="old-price">$30.00</span>
                                                    )</span>
                                            </div>
                                            <span class="badge-skew">New</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="vd-tab2" role="tabpanel" aria-labelledby="vd-tab-02">
                                    <div class="rd-tab-product__slide">
                                        <div class="tab-product__item tx-product text-center">
                                            <div class="thumb">
                                                <a href="shop-single.html"><img
                                                        src="{{ asset('frontend/assets') }}/img/product/img_64.png"
                                                        alt=""></a>
                                                <ul class="product__action style-2 ul_li">
                                                    <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-heart"></i></a></li>
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
                                                <h3 class="title"><a href="shop-single.html">SAMSUNG Galaxy Tab
                                                        A7 Lite 8.7″ 32GB Android</a></h3>
                                                <span class="price">( $28.52 - <span class="old-price">$30.00</span>
                                                    )</span>
                                            </div>
                                            <span class="badge-skew">New</span>
                                        </div>
                                        <div class="tab-product__item bg2 tx-product text-center">
                                            <div class="thumb">
                                                <a href="shop-single.html"><img
                                                        src="{{ asset('frontend/assets') }}/img/product/img_65.png"
                                                        alt=""></a>
                                                <ul class="product__action style-2 ul_li">
                                                    <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-heart"></i></a></li>
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
                                                <h3 class="title"><a href="shop-single.html">Fire HD 10 tablet,
                                                        10.1″, 1080p Full HD, 32 GB</a></h3>
                                                <span class="price">( $28.52 - <span class="old-price">$30.00</span>
                                                    )</span>
                                            </div>
                                            <span class="badge-skew">New</span>
                                        </div>
                                        <div class="tab-product__item tx-product text-center">
                                            <div class="thumb">
                                                <a href="shop-single.html"><img
                                                        src="{{ asset('frontend/assets') }}/img/product/img_66.png"
                                                        alt=""></a>
                                                <ul class="product__action style-2 ul_li">
                                                    <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-heart"></i></a></li>
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
                                                <h3 class="title"><a href="shop-single.html">SAMSUNG Galaxy A13
                                                        5G Cell Phone, Factory</a></h3>
                                                <span class="price">( $28.52 - <span class="old-price">$30.00</span>
                                                    )</span>
                                            </div>
                                            <span class="badge-skew">New</span>
                                        </div>
                                        <div class="tab-product__item bg4 tx-product text-center">
                                            <div class="thumb">
                                                <a href="shop-single.html"><img
                                                        src="{{ asset('frontend/assets') }}/img/product/img_67.png"
                                                        alt=""></a>
                                                <ul class="product__action style-2 ul_li">
                                                    <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-heart"></i></a></li>
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
                                                <h3 class="title"><a href="shop-single.html">Sceptre 24″ Thin
                                                        75Hz 1080p LED Monitor</a></h3>
                                                <span class="price">( $28.52 - <span class="old-price">$30.00</span>
                                                    )</span>
                                            </div>
                                            <span class="badge-skew">New</span>
                                        </div>
                                        <div class="tab-product__item bg5 tx-product text-center">
                                            <div class="thumb">
                                                <a href="shop-single.html"><img
                                                        src="{{ asset('frontend/assets') }}/img/product/img_68.png"
                                                        alt=""></a>
                                                <ul class="product__action style-2 ul_li">
                                                    <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-heart"></i></a></li>
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
                                                <h3 class="title"><a href="shop-single.html">Rokinon Xeen CF
                                                        16mm T2.6 Pro Cinema Wide Angle</a></h3>
                                                <span class="price">( $28.52 - <span class="old-price">$30.00</span>
                                                    )</span>
                                            </div>
                                            <span class="badge-skew">New</span>
                                        </div>
                                        <div class="tab-product__item tx-product text-center">
                                            <div class="thumb">
                                                <a href="shop-single.html"><img
                                                        src="{{ asset('frontend/assets') }}/img/product/img_66.png"
                                                        alt=""></a>
                                                <ul class="product__action style-2 ul_li">
                                                    <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-heart"></i></a></li>
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
                                                <h3 class="title"><a href="shop-single.html">Portable External
                                                        Hard Drive Portable HDD USB</a></h3>
                                                <span class="price">( $28.52 - <span class="old-price">$30.00</span>
                                                    )</span>
                                            </div>
                                            <span class="badge-skew">New</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="vd-tab3" role="tabpanel" aria-labelledby="vd-tab-03">
                                    <div class="rd-tab-product__slide">
                                        <div class="tab-product__item tx-product text-center">
                                            <div class="thumb">
                                                <a href="shop-single.html"><img
                                                        src="{{ asset('frontend/assets') }}/img/product/img_64.png"
                                                        alt=""></a>
                                                <ul class="product__action style-2 ul_li">
                                                    <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-heart"></i></a></li>
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
                                                <h3 class="title"><a href="shop-single.html">SAMSUNG Galaxy Tab
                                                        A7 Lite 8.7″ 32GB Android</a></h3>
                                                <span class="price">( $28.52 - <span class="old-price">$30.00</span>
                                                    )</span>
                                            </div>
                                            <span class="badge-skew">New</span>
                                        </div>
                                        <div class="tab-product__item bg2 tx-product text-center">
                                            <div class="thumb">
                                                <a href="shop-single.html"><img
                                                        src="{{ asset('frontend/assets') }}/img/product/img_65.png"
                                                        alt=""></a>
                                                <ul class="product__action style-2 ul_li">
                                                    <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-heart"></i></a></li>
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
                                                <h3 class="title"><a href="shop-single.html">Fire HD 10 tablet,
                                                        10.1″, 1080p Full HD, 32 GB</a></h3>
                                                <span class="price">( $28.52 - <span class="old-price">$30.00</span>
                                                    )</span>
                                            </div>
                                            <span class="badge-skew">New</span>
                                        </div>
                                        <div class="tab-product__item tx-product text-center">
                                            <div class="thumb">
                                                <a href="shop-single.html"><img
                                                        src="{{ asset('frontend/assets') }}/img/product/img_66.png"
                                                        alt=""></a>
                                                <ul class="product__action style-2 ul_li">
                                                    <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-heart"></i></a></li>
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
                                                <h3 class="title"><a href="shop-single.html">SAMSUNG Galaxy A13
                                                        5G Cell Phone, Factory</a></h3>
                                                <span class="price">( $28.52 - <span class="old-price">$30.00</span>
                                                    )</span>
                                            </div>
                                            <span class="badge-skew">New</span>
                                        </div>
                                        <div class="tab-product__item bg4 tx-product text-center">
                                            <div class="thumb">
                                                <a href="shop-single.html"><img
                                                        src="{{ asset('frontend/assets') }}/img/product/img_67.png"
                                                        alt=""></a>
                                                <ul class="product__action style-2 ul_li">
                                                    <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-heart"></i></a></li>
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
                                                <h3 class="title"><a href="shop-single.html">Sceptre 24″ Thin
                                                        75Hz 1080p LED Monitor</a></h3>
                                                <span class="price">( $28.52 - <span class="old-price">$30.00</span>
                                                    )</span>
                                            </div>
                                            <span class="badge-skew">New</span>
                                        </div>
                                        <div class="tab-product__item bg5 tx-product text-center">
                                            <div class="thumb">
                                                <a href="shop-single.html"><img
                                                        src="{{ asset('frontend/assets') }}/img/product/img_68.png"
                                                        alt=""></a>
                                                <ul class="product__action style-2 ul_li">
                                                    <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-heart"></i></a></li>
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
                                                <h3 class="title"><a href="shop-single.html">Rokinon Xeen CF
                                                        16mm T2.6 Pro Cinema Wide Angle</a></h3>
                                                <span class="price">( $28.52 - <span class="old-price">$30.00</span>
                                                    )</span>
                                            </div>
                                            <span class="badge-skew">New</span>
                                        </div>
                                        <div class="tab-product__item tx-product text-center">
                                            <div class="thumb">
                                                <a href="shop-single.html"><img
                                                        src="{{ asset('frontend/assets') }}/img/product/img_66.png"
                                                        alt=""></a>
                                                <ul class="product__action style-2 ul_li">
                                                    <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-heart"></i></a></li>
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
                                                <h3 class="title"><a href="shop-single.html">Portable External
                                                        Hard Drive Portable HDD USB</a></h3>
                                                <span class="price">( $28.52 - <span class="old-price">$30.00</span>
                                                    )</span>
                                            </div>
                                            <span class="badge-skew">New</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade show active" id="vd-tab4" role="tabpanel"
                                    aria-labelledby="vd-tab-04">
                                    <div class="rd-tab-product__slide">
                                        <div class="tab-product__item tx-product text-center">
                                            <div class="thumb">
                                                <a href="shop-single.html"><img
                                                        src="{{ asset('frontend/assets') }}/img/product/img_64.png"
                                                        alt=""></a>
                                                <ul class="product__action style-2 ul_li">
                                                    <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-heart"></i></a></li>
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
                                                <h3 class="title"><a href="shop-single.html">SAMSUNG Galaxy Tab
                                                        A7 Lite 8.7″ 32GB Android</a></h3>
                                                <span class="price">( $28.52 - <span class="old-price">$30.00</span>
                                                    )</span>
                                            </div>
                                            <span class="badge-skew">New</span>
                                        </div>
                                        <div class="tab-product__item bg2 tx-product text-center">
                                            <div class="thumb">
                                                <a href="shop-single.html"><img
                                                        src="{{ asset('frontend/assets') }}/img/product/img_65.png"
                                                        alt=""></a>
                                                <ul class="product__action style-2 ul_li">
                                                    <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-heart"></i></a></li>
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
                                                <h3 class="title"><a href="shop-single.html">Fire HD 10 tablet,
                                                        10.1″, 1080p Full HD, 32 GB</a></h3>
                                                <span class="price">( $28.52 - <span class="old-price">$30.00</span>
                                                    )</span>
                                            </div>
                                            <span class="badge-skew">New</span>
                                        </div>
                                        <div class="tab-product__item tx-product text-center">
                                            <div class="thumb">
                                                <a href="shop-single.html"><img
                                                        src="{{ asset('frontend/assets') }}/img/product/img_66.png"
                                                        alt=""></a>
                                                <ul class="product__action style-2 ul_li">
                                                    <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-heart"></i></a></li>
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
                                                <h3 class="title"><a href="shop-single.html">SAMSUNG Galaxy A13
                                                        5G Cell Phone, Factory</a></h3>
                                                <span class="price">( $28.52 - <span class="old-price">$30.00</span>
                                                    )</span>
                                            </div>
                                            <span class="badge-skew">New</span>
                                        </div>
                                        <div class="tab-product__item bg4 tx-product text-center">
                                            <div class="thumb">
                                                <a href="shop-single.html"><img
                                                        src="{{ asset('frontend/assets') }}/img/product/img_67.png"
                                                        alt=""></a>
                                                <ul class="product__action style-2 ul_li">
                                                    <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-heart"></i></a></li>
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
                                                <h3 class="title"><a href="shop-single.html">Sceptre 24″ Thin
                                                        75Hz 1080p LED Monitor</a></h3>
                                                <span class="price">( $28.52 - <span class="old-price">$30.00</span>
                                                    )</span>
                                            </div>
                                            <span class="badge-skew">New</span>
                                        </div>
                                        <div class="tab-product__item bg5 tx-product text-center">
                                            <div class="thumb">
                                                <a href="shop-single.html"><img
                                                        src="{{ asset('frontend/assets') }}/img/product/img_68.png"
                                                        alt=""></a>
                                                <ul class="product__action style-2 ul_li">
                                                    <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-heart"></i></a></li>
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
                                                <h3 class="title"><a href="shop-single.html">Rokinon Xeen CF
                                                        16mm T2.6 Pro Cinema Wide Angle</a></h3>
                                                <span class="price">( $28.52 - <span class="old-price">$30.00</span>
                                                    )</span>
                                            </div>
                                            <span class="badge-skew">New</span>
                                        </div>
                                        <div class="tab-product__item tx-product text-center">
                                            <div class="thumb">
                                                <a href="shop-single.html"><img
                                                        src="{{ asset('frontend/assets') }}/img/product/img_66.png"
                                                        alt=""></a>
                                                <ul class="product__action style-2 ul_li">
                                                    <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-heart"></i></a></li>
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
                                                <h3 class="title"><a href="shop-single.html">Portable External
                                                        Hard Drive Portable HDD USB</a></h3>
                                                <span class="price">( $28.52 - <span class="old-price">$30.00</span>
                                                    )</span>
                                            </div>
                                            <span class="badge-skew">New</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="vd-tab5" role="tabpanel" aria-labelledby="vd-tab-05">
                                    <div class="rd-tab-product__slide">
                                        <div class="tab-product__item tx-product text-center">
                                            <div class="thumb">
                                                <a href="shop-single.html"><img
                                                        src="{{ asset('frontend/assets') }}/img/product/img_64.png"
                                                        alt=""></a>
                                                <ul class="product__action style-2 ul_li">
                                                    <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-heart"></i></a></li>
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
                                                <h3 class="title"><a href="shop-single.html">SAMSUNG Galaxy Tab
                                                        A7 Lite 8.7″ 32GB Android</a></h3>
                                                <span class="price">( $28.52 - <span class="old-price">$30.00</span>
                                                    )</span>
                                            </div>
                                            <span class="badge-skew">New</span>
                                        </div>
                                        <div class="tab-product__item bg2 tx-product text-center">
                                            <div class="thumb">
                                                <a href="shop-single.html"><img
                                                        src="{{ asset('frontend/assets') }}/img/product/img_65.png"
                                                        alt=""></a>
                                                <ul class="product__action style-2 ul_li">
                                                    <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-heart"></i></a></li>
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
                                                <h3 class="title"><a href="shop-single.html">Fire HD 10 tablet,
                                                        10.1″, 1080p Full HD, 32 GB</a></h3>
                                                <span class="price">( $28.52 - <span class="old-price">$30.00</span>
                                                    )</span>
                                            </div>
                                            <span class="badge-skew">New</span>
                                        </div>
                                        <div class="tab-product__item tx-product text-center">
                                            <div class="thumb">
                                                <a href="shop-single.html"><img
                                                        src="{{ asset('frontend/assets') }}/img/product/img_66.png"
                                                        alt=""></a>
                                                <ul class="product__action style-2 ul_li">
                                                    <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-heart"></i></a></li>
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
                                                <h3 class="title"><a href="shop-single.html">SAMSUNG Galaxy A13
                                                        5G Cell Phone, Factory</a></h3>
                                                <span class="price">( $28.52 - <span class="old-price">$30.00</span>
                                                    )</span>
                                            </div>
                                            <span class="badge-skew">New</span>
                                        </div>
                                        <div class="tab-product__item bg4 tx-product text-center">
                                            <div class="thumb">
                                                <a href="shop-single.html"><img
                                                        src="{{ asset('frontend/assets') }}/img/product/img_67.png"
                                                        alt=""></a>
                                                <ul class="product__action style-2 ul_li">
                                                    <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-heart"></i></a></li>
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
                                                <h3 class="title"><a href="shop-single.html">Sceptre 24″ Thin
                                                        75Hz 1080p LED Monitor</a></h3>
                                                <span class="price">( $28.52 - <span class="old-price">$30.00</span>
                                                    )</span>
                                            </div>
                                            <span class="badge-skew">New</span>
                                        </div>
                                        <div class="tab-product__item bg5 tx-product text-center">
                                            <div class="thumb">
                                                <a href="shop-single.html"><img
                                                        src="{{ asset('frontend/assets') }}/img/product/img_68.png"
                                                        alt=""></a>
                                                <ul class="product__action style-2 ul_li">
                                                    <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-heart"></i></a></li>
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
                                                <h3 class="title"><a href="shop-single.html">Rokinon Xeen CF
                                                        16mm T2.6 Pro Cinema Wide Angle</a></h3>
                                                <span class="price">( $28.52 - <span class="old-price">$30.00</span>
                                                    )</span>
                                            </div>
                                            <span class="badge-skew">New</span>
                                        </div>
                                        <div class="tab-product__item tx-product text-center">
                                            <div class="thumb">
                                                <a href="shop-single.html"><img
                                                        src="{{ asset('frontend/assets') }}/img/product/img_66.png"
                                                        alt=""></a>
                                                <ul class="product__action style-2 ul_li">
                                                    <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                    </li>
                                                    <li><a href="#!"><i class="far fa-heart"></i></a></li>
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
                                                <h3 class="title"><a href="shop-single.html">Portable External
                                                        Hard Drive Portable HDD USB</a></h3>
                                                <span class="price">( $28.52 - <span class="old-price">$30.00</span>
                                                    )</span>
                                            </div>
                                            <span class="badge-skew">New</span>
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
    <!-- rd tab product end -->

    <!-- rd slide product start -->
    <div class="rd-parts pt-60 pb-30">
        <div class="container mxw_1530">
            <div class="row mt-none-30">
                <div class="col-lg-3 mt-30">
                    <div class="product-category product-category__two mr-60">
                        <h2 class="section-heading mb-40"><span><span>Catagory</span></span></h2>
                        <ul class="list-unstyled">
                            <li class="cat-item-has-children"><a href="#!">Motorbike parts</a></li>
                            <li class="cat-item-has-children"><a href="#!">Car parts Name</a></li>
                            <li class="cat-item-has-children"><a href="#!">Bicycle Parts</a></li>
                            <li><a href="#!">Taxi bike parts</a></li>
                            <li class="cat-item-has-children"><a href="#!">Double decker bus</a></li>
                            <li class="cat-item-has-children"><a href="#!">Tractor parts</a></li>
                            <li><a href="#!">Bull Dozer</a></li>
                            <li><a href="#!">Rope tram vehicle</a></li>
                            <li class="cat-item-has-children"><a href="#!">Excavator</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 mt-30">
                    <div class="rd-parts__wrap">
                        <div class="rd-products__nav ul_li_between mb-20">
                            <h2 class="section-heading"><span>Motorbike parts <span>(new)</span></span></h2>
                            <ul class="nav nav-tabs" id="rdpTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="rdp-tab-01" data-bs-toggle="tab"
                                        data-bs-target="#rdp-tab1" type="button" role="tab"
                                        aria-controls="rdp-tab1" aria-selected="true">Engine</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="rdp-tab-02" data-bs-toggle="tab"
                                        data-bs-target="#rdp-tab2" type="button" role="tab"
                                        aria-controls="rdp-tab2" aria-selected="false">Transmission</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="rdp-tab-03" data-bs-toggle="tab"
                                        data-bs-target="#rdp-tab3" type="button" role="tab"
                                        aria-controls="rdp-tab3" aria-selected="false">Battery</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="rdp-tab-04" data-bs-toggle="tab"
                                        data-bs-target="#rdp-tab4" type="button" role="tab"
                                        aria-controls="rdp-tab4" aria-selected="false">Radiator</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="rdp-tab-05" data-bs-toggle="tab"
                                        data-bs-target="#rdp-tab5" type="button" role="tab"
                                        aria-controls="rdp-tab5" aria-selected="false">Fuel Tank</button>
                                </li>
                            </ul>
                        </div>
                        <div class="rd-parts__products">
                            <div class="tab-content" id="rdpTabContent">
                                <div class="tab-pane animated fadeInUp" id="rdp-tab1" role="tabpanel"
                                    aria-labelledby="rdp-tab-01">
                                    <div class="row g-0 mt-none-30">
                                        <div class="col-1-of-5 mt-30">
                                            <div class="product__item style-3">
                                                <div class="product__img text-center pos-rel">
                                                    <a href="shop-single.html"><img
                                                            src="{{ asset('frontend/assets')}}/img/product/img_74.png" alt=""></a>
                                                    <ul class="product__action style-2 ul_li">
                                                        <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                        </li>
                                                        <li><a href="#!"><i
                                                                    class="far fa-shopping-basket"></i></a></li>
                                                        <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product__content">
                                                    <div class="product__review ul_li_center">
                                                        <ul class="rating-star ul_li mr-10">
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="far fa-star"></i></li>
                                                            <li><i class="far fa-star"></i></li>
                                                        </ul>
                                                        <span>(26)</span>
                                                    </div>
                                                    <h2 class="product__title"><a href="shop-single.html">Beats
                                                            Flex Wireless Earbuds – Apple W1 Headphone</a></h2>
                                                    <h4 class="product__price"><span
                                                            class="new">$30.52</span><span
                                                            class="old">$28.52</span></h4>
                                                </div>

                                                <span class="badge-skew">New</span>
                                            </div>
                                        </div>
                                        <div class="col-1-of-5 mt-30">
                                            <div class="product__item style-3">
                                                <div class="product__img text-center pos-rel">
                                                    <a href="shop-single.html"><img
                                                            src="{{ asset('frontend/assets')}}/img/product/img_93.png" alt=""></a>
                                                    <ul class="product__action style-2 ul_li">
                                                        <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                        </li>
                                                        <li><a href="#!"><i
                                                                    class="far fa-shopping-basket"></i></a></li>
                                                        <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product__content">
                                                    <div class="product__review ul_li_center">
                                                        <ul class="rating-star ul_li mr-10">
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="far fa-star"></i></li>
                                                            <li><i class="far fa-star"></i></li>
                                                        </ul>
                                                        <span>(26)</span>
                                                    </div>
                                                    <h2 class="product__title"><a href="shop-single.html">DEWALT
                                                            20V MAX* XR Oscillating Tool Kit,</a></h2>
                                                    <h4 class="product__price"><span
                                                            class="new">$30.52</span><span
                                                            class="old">$28.52</span></h4>
                                                </div>
                                                <span class="badge-skew">New</span>
                                            </div>
                                        </div>
                                        <div class="col-1-of-5 mt-30">
                                            <div class="product__item style-3">
                                                <div class="product__img text-center pos-rel">
                                                    <a href="shop-single.html"><img
                                                            src="{{ asset('frontend/assets')}}/img/product/img_94.png" alt=""></a>
                                                    <ul class="product__action style-2 ul_li">
                                                        <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                        </li>
                                                        <li><a href="#!"><i
                                                                    class="far fa-shopping-basket"></i></a></li>
                                                        <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product__content">
                                                    <div class="product__review ul_li_center">
                                                        <ul class="rating-star ul_li mr-10">
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="far fa-star"></i></li>
                                                            <li><i class="far fa-star"></i></li>
                                                        </ul>
                                                        <span>(26)</span>
                                                    </div>
                                                    <h2 class="product__title"><a
                                                            href="shop-single.html">BLACK+DECKER BPWH84W Washer
                                                            Portable Laundry</a></h2>
                                                    <h4 class="product__price"><span
                                                            class="new">$30.52</span><span
                                                            class="old">$28.52</span></h4>
                                                </div>

                                                <span class="badge-skew">New</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane animated fadeInUp" id="rdp-tab2" role="tabpanel"
                                    aria-labelledby="rdp-tab-02">
                                    <div class="row g-0 mt-none-30">
                                        <div class="col-1-of-5 mt-30">
                                            <div class="product__item style-3">
                                                <div class="product__img text-center pos-rel">
                                                    <a href="shop-single.html"><img
                                                            src="{{ asset('frontend/assets')}}/img/product/img_74.png" alt=""></a>
                                                    <ul class="product__action style-2 ul_li">
                                                        <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                        </li>
                                                        <li><a href="#!"><i
                                                                    class="far fa-shopping-basket"></i></a></li>
                                                        <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product__content">
                                                    <div class="product__review ul_li_center">
                                                        <ul class="rating-star ul_li mr-10">
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="far fa-star"></i></li>
                                                            <li><i class="far fa-star"></i></li>
                                                        </ul>
                                                        <span>(26)</span>
                                                    </div>
                                                    <h2 class="product__title"><a href="shop-single.html">Beats
                                                            Flex Wireless Earbuds – Apple W1 Headphone</a></h2>
                                                    <h4 class="product__price"><span
                                                            class="new">$30.52</span><span
                                                            class="old">$28.52</span></h4>
                                                </div>

                                                <span class="badge-skew">New</span>
                                            </div>
                                        </div>
                                        <div class="col-1-of-5 mt-30">
                                            <div class="product__item style-3">
                                                <div class="product__img text-center pos-rel">
                                                    <a href="shop-single.html"><img
                                                            src="{{ asset('frontend/assets')}}/img/product/img_93.png" alt=""></a>
                                                    <ul class="product__action style-2 ul_li">
                                                        <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                        </li>
                                                        <li><a href="#!"><i
                                                                    class="far fa-shopping-basket"></i></a></li>
                                                        <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product__content">
                                                    <div class="product__review ul_li_center">
                                                        <ul class="rating-star ul_li mr-10">
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="far fa-star"></i></li>
                                                            <li><i class="far fa-star"></i></li>
                                                        </ul>
                                                        <span>(26)</span>
                                                    </div>
                                                    <h2 class="product__title"><a href="shop-single.html">DEWALT
                                                            20V MAX* XR Oscillating Tool Kit,</a></h2>
                                                    <h4 class="product__price"><span
                                                            class="new">$30.52</span><span
                                                            class="old">$28.52</span></h4>
                                                </div>
                                                <span class="badge-skew">New</span>
                                            </div>
                                        </div>
                                        <div class="col-1-of-5 mt-30">
                                            <div class="product__item style-3">
                                                <div class="product__img text-center pos-rel">
                                                    <a href="shop-single.html"><img
                                                            src="{{ asset('frontend/assets')}}/img/product/img_94.png" alt=""></a>
                                                    <ul class="product__action style-2 ul_li">
                                                        <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                        </li>
                                                        <li><a href="#!"><i
                                                                    class="far fa-shopping-basket"></i></a></li>
                                                        <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product__content">
                                                    <div class="product__review ul_li_center">
                                                        <ul class="rating-star ul_li mr-10">
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="far fa-star"></i></li>
                                                            <li><i class="far fa-star"></i></li>
                                                        </ul>
                                                        <span>(26)</span>
                                                    </div>
                                                    <h2 class="product__title"><a
                                                            href="shop-single.html">BLACK+DECKER BPWH84W Washer
                                                            Portable Laundry</a></h2>
                                                    <h4 class="product__price"><span
                                                            class="new">$30.52</span><span
                                                            class="old">$28.52</span></h4>
                                                </div>

                                                <span class="badge-skew">New</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane animated fadeInUp" id="rdp-tab3" role="tabpanel"
                                    aria-labelledby="rdp-tab-03">
                                    <div class="row g-0 mt-none-30">
                                        <div class="col-1-of-5 mt-30">
                                            <div class="product__item style-3">
                                                <div class="product__img text-center pos-rel">
                                                    <a href="shop-single.html"><img
                                                            src="{{ asset('frontend/assets')}}/img/product/img_74.png" alt=""></a>
                                                    <ul class="product__action style-2 ul_li">
                                                        <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                        </li>
                                                        <li><a href="#!"><i
                                                                    class="far fa-shopping-basket"></i></a></li>
                                                        <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product__content">
                                                    <div class="product__review ul_li_center">
                                                        <ul class="rating-star ul_li mr-10">
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="far fa-star"></i></li>
                                                            <li><i class="far fa-star"></i></li>
                                                        </ul>
                                                        <span>(26)</span>
                                                    </div>
                                                    <h2 class="product__title"><a href="shop-single.html">Beats
                                                            Flex Wireless Earbuds – Apple W1 Headphone</a></h2>
                                                    <h4 class="product__price"><span
                                                            class="new">$30.52</span><span
                                                            class="old">$28.52</span></h4>
                                                </div>

                                                <span class="badge-skew">New</span>
                                            </div>
                                        </div>
                                        <div class="col-1-of-5 mt-30">
                                            <div class="product__item style-3">
                                                <div class="product__img text-center pos-rel">
                                                    <a href="shop-single.html"><img
                                                            src="{{ asset('frontend/assets')}}/img/product/img_93.png" alt=""></a>
                                                    <ul class="product__action style-2 ul_li">
                                                        <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                        </li>
                                                        <li><a href="#!"><i
                                                                    class="far fa-shopping-basket"></i></a></li>
                                                        <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product__content">
                                                    <div class="product__review ul_li_center">
                                                        <ul class="rating-star ul_li mr-10">
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="far fa-star"></i></li>
                                                            <li><i class="far fa-star"></i></li>
                                                        </ul>
                                                        <span>(26)</span>
                                                    </div>
                                                    <h2 class="product__title"><a href="shop-single.html">DEWALT
                                                            20V MAX* XR Oscillating Tool Kit,</a></h2>
                                                    <h4 class="product__price"><span
                                                            class="new">$30.52</span><span
                                                            class="old">$28.52</span></h4>
                                                </div>
                                                <span class="badge-skew">New</span>
                                            </div>
                                        </div>
                                        <div class="col-1-of-5 mt-30">
                                            <div class="product__item style-3">
                                                <div class="product__img text-center pos-rel">
                                                    <a href="shop-single.html"><img
                                                            src="{{ asset('frontend/assets')}}/img/product/img_94.png" alt=""></a>
                                                    <ul class="product__action style-2 ul_li">
                                                        <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                        </li>
                                                        <li><a href="#!"><i
                                                                    class="far fa-shopping-basket"></i></a></li>
                                                        <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product__content">
                                                    <div class="product__review ul_li_center">
                                                        <ul class="rating-star ul_li mr-10">
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="far fa-star"></i></li>
                                                            <li><i class="far fa-star"></i></li>
                                                        </ul>
                                                        <span>(26)</span>
                                                    </div>
                                                    <h2 class="product__title"><a
                                                            href="shop-single.html">BLACK+DECKER BPWH84W Washer
                                                            Portable Laundry</a></h2>
                                                    <h4 class="product__price"><span
                                                            class="new">$30.52</span><span
                                                            class="old">$28.52</span></h4>
                                                </div>

                                                <span class="badge-skew">New</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane animated fadeInUp show active" id="rdp-tab4"
                                    role="tabpanel" aria-labelledby="rdp-tab-04">
                                    <div class="row g-0 mt-none-30">
                                        <div class="col-1-of-5 mt-30">
                                            <div class="product__item style-3">
                                                <div class="product__img text-center pos-rel">
                                                    <a href="shop-single.html"><img
                                                            src="{{ asset('frontend/assets')}}/img/product/img_74.png" alt=""></a>
                                                    <ul class="product__action style-2 ul_li">
                                                        <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                        </li>
                                                        <li><a href="#!"><i
                                                                    class="far fa-shopping-basket"></i></a></li>
                                                        <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product__content">
                                                    <div class="product__review ul_li_center">
                                                        <ul class="rating-star ul_li mr-10">
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="far fa-star"></i></li>
                                                            <li><i class="far fa-star"></i></li>
                                                        </ul>
                                                        <span>(26)</span>
                                                    </div>
                                                    <h2 class="product__title"><a href="shop-single.html">Beats
                                                            Flex Wireless Earbuds – Apple W1 Headphone</a></h2>
                                                    <h4 class="product__price"><span
                                                            class="new">$30.52</span><span
                                                            class="old">$28.52</span></h4>
                                                </div>

                                                <span class="badge-skew">New</span>
                                            </div>
                                        </div>
                                        <div class="col-1-of-5 mt-30">
                                            <div class="product__item style-3">
                                                <div class="product__img text-center pos-rel">
                                                    <a href="shop-single.html"><img
                                                            src="{{ asset('frontend/assets')}}/img/product/img_93.png" alt=""></a>
                                                    <ul class="product__action style-2 ul_li">
                                                        <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                        </li>
                                                        <li><a href="#!"><i
                                                                    class="far fa-shopping-basket"></i></a></li>
                                                        <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product__content">
                                                    <div class="product__review ul_li_center">
                                                        <ul class="rating-star ul_li mr-10">
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="far fa-star"></i></li>
                                                            <li><i class="far fa-star"></i></li>
                                                        </ul>
                                                        <span>(26)</span>
                                                    </div>
                                                    <h2 class="product__title"><a href="shop-single.html">DEWALT
                                                            20V MAX* XR Oscillating Tool Kit,</a></h2>
                                                    <h4 class="product__price"><span
                                                            class="new">$30.52</span><span
                                                            class="old">$28.52</span></h4>
                                                </div>
                                                <span class="badge-skew">New</span>
                                            </div>
                                        </div>
                                        <div class="col-1-of-5 mt-30">
                                            <div class="product__item style-3">
                                                <div class="product__img text-center pos-rel">
                                                    <a href="shop-single.html"><img
                                                            src="{{ asset('frontend/assets')}}/img/product/img_94.png" alt=""></a>
                                                    <ul class="product__action style-2 ul_li">
                                                        <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                        </li>
                                                        <li><a href="#!"><i
                                                                    class="far fa-shopping-basket"></i></a></li>
                                                        <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product__content">
                                                    <div class="product__review ul_li_center">
                                                        <ul class="rating-star ul_li mr-10">
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="far fa-star"></i></li>
                                                            <li><i class="far fa-star"></i></li>
                                                        </ul>
                                                        <span>(26)</span>
                                                    </div>
                                                    <h2 class="product__title"><a
                                                            href="shop-single.html">BLACK+DECKER BPWH84W Washer
                                                            Portable Laundry</a></h2>
                                                    <h4 class="product__price"><span
                                                            class="new">$30.52</span><span
                                                            class="old">$28.52</span></h4>
                                                </div>

                                                <span class="badge-skew">New</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane animated fadeInUp" id="rdp-tab5" role="tabpanel"
                                    aria-labelledby="rdp-tab-05">
                                    <div class="row g-0 mt-none-30">
                                        <div class="col-1-of-5 mt-30">
                                            <div class="product__item style-3">
                                                <div class="product__img text-center pos-rel">
                                                    <a href="shop-single.html"><img
                                                            src="{{ asset('frontend/assets')}}/img/product/img_74.png" alt=""></a>
                                                    <ul class="product__action style-2 ul_li">
                                                        <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                        </li>
                                                        <li><a href="#!"><i
                                                                    class="far fa-shopping-basket"></i></a></li>
                                                        <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product__content">
                                                    <div class="product__review ul_li_center">
                                                        <ul class="rating-star ul_li mr-10">
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="far fa-star"></i></li>
                                                            <li><i class="far fa-star"></i></li>
                                                        </ul>
                                                        <span>(26)</span>
                                                    </div>
                                                    <h2 class="product__title"><a href="shop-single.html">Beats
                                                            Flex Wireless Earbuds – Apple W1 Headphone</a></h2>
                                                    <h4 class="product__price"><span
                                                            class="new">$30.52</span><span
                                                            class="old">$28.52</span></h4>
                                                </div>

                                                <span class="badge-skew">New</span>
                                            </div>
                                        </div>
                                        <div class="col-1-of-5 mt-30">
                                            <div class="product__item style-3">
                                                <div class="product__img text-center pos-rel">
                                                    <a href="shop-single.html"><img
                                                            src="{{ asset('frontend/assets')}}/img/product/img_93.png" alt=""></a>
                                                    <ul class="product__action style-2 ul_li">
                                                        <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                        </li>
                                                        <li><a href="#!"><i
                                                                    class="far fa-shopping-basket"></i></a></li>
                                                        <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product__content">
                                                    <div class="product__review ul_li_center">
                                                        <ul class="rating-star ul_li mr-10">
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="far fa-star"></i></li>
                                                            <li><i class="far fa-star"></i></li>
                                                        </ul>
                                                        <span>(26)</span>
                                                    </div>
                                                    <h2 class="product__title"><a href="shop-single.html">DEWALT
                                                            20V MAX* XR Oscillating Tool Kit,</a></h2>
                                                    <h4 class="product__price"><span
                                                            class="new">$30.52</span><span
                                                            class="old">$28.52</span></h4>
                                                </div>
                                                <span class="badge-skew">New</span>
                                            </div>
                                        </div>
                                        <div class="col-1-of-5 mt-30">
                                            <div class="product__item style-3">
                                                <div class="product__img text-center pos-rel">
                                                    <a href="shop-single.html"><img
                                                            src="{{ asset('frontend/assets')}}/img/product/img_94.png" alt=""></a>
                                                    <ul class="product__action style-2 ul_li">
                                                        <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                        </li>
                                                        <li><a href="#!"><i
                                                                    class="far fa-shopping-basket"></i></a></li>
                                                        <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product__content">
                                                    <div class="product__review ul_li_center">
                                                        <ul class="rating-star ul_li mr-10">
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="far fa-star"></i></li>
                                                            <li><i class="far fa-star"></i></li>
                                                        </ul>
                                                        <span>(26)</span>
                                                    </div>
                                                    <h2 class="product__title"><a
                                                            href="shop-single.html">BLACK+DECKER BPWH84W Washer
                                                            Portable Laundry</a></h2>
                                                    <h4 class="product__price"><span
                                                            class="new">$30.52</span><span
                                                            class="old">$28.52</span></h4>
                                                </div>

                                                <span class="badge-skew">New</span>
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
    </div>
    <!-- rd slide product end -->
@endsection
