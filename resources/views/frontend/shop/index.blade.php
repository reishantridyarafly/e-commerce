@extends('layouts.frontend.main')
@section('title', 'Barang')
@section('content')
    <!-- breadcrumb start -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="radios-breadcrumb breadcrumbs">
                <ul class="list-unstyled d-flex align-items-center">
                    <li class="radiosbcrumb-item radiosbcrumb-begin">
                        <a href="index.html"><span>Home</span></a>
                    </li>
                    <li class="radiosbcrumb-item radiosbcrumb-end">
                        <span>Shop</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- breadcrumb end -->

    <!-- start shop-section -->
    <section class="shop-section pb-80">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="shop-area clearfix">
                        <div class="woocommerce-content-wrap">
                            <div class="woocommerce-toolbar-top">
                                <p class="woocommerce-result-count">Showing 1–12 of 70 results</p>
                                <div class="products-sizes">
                                    <a href="#!" class="grid-4">
                                        <div class="grid-draw">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                        <div class="grid-draw">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                        <div class="grid-draw">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </a>
                                    <a href="#!" class="grid-3 active">
                                        <div class="grid-draw">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                        <div class="grid-draw">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                        <div class="grid-draw">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </a>
                                    <a href="#!" class="list-view">
                                        <div class="grid-draw-line">
                                            <span></span>
                                            <span></span>
                                        </div>
                                        <div class="grid-draw-line">
                                            <span></span>
                                            <span></span>
                                        </div>
                                        <div class="grid-draw-line">
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </a>
                                </div>
                                <form class="woocommerce-ordering" method="get">
                                    <select name="orderby" class="orderby">
                                        <option value="menu_order" selected='selected'>Default sorting</option>
                                        <option value="popularity">Sort by popularity</option>
                                        <option value="rating">Sort by average rating</option>
                                        <option value="date">Sort by newness</option>
                                        <option value="price">Sort by price: low to high</option>
                                        <option value="price-desc">Sort by price: high to low</option>
                                    </select>
                                    <input type="hidden" name="post_type" value="product" />
                                </form>
                            </div>
                            <div class="woocommerce-content-inner">
                                <ul class="products three-column clearfix">
                                    <li class="product">
                                        <div class="product-holder">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_165.png"
                                                    alt=""></a>
                                            <ul class="product__action">
                                                <li><a href="#!"><i class="far fa-compress-alt"></i></a></li>
                                                <li><a href="#!"><i class="far fa-shopping-basket"></i></a></li>
                                                <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product-info">
                                            <div class="product__review ul_li">
                                                <ul class="rating-star ul_li mr-10">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                </ul>
                                                <span>(126) Review</span>
                                            </div>
                                            <h2 class="product__title"><a href="shop-single.html">JBL Tune 510BT
                                                    Wireless On-Ear</a></h2>
                                            <span class="product__available">Available: <span>334</span></span>
                                            <div class="product__progress progress color-primary">
                                                <div class="progress-bar" role="progressbar" style="width: 50%"
                                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                            <p class="product-description">Found himself transformed in his bed
                                                into a horrible vermin. He lay on his armour-like back, and if
                                                he lifted his head a little he could see his brown belly,
                                                slightly domed and divided by arches into stiff sections. The
                                                bedding was hardly able to cover it and seemed ready to slide
                                                off any moment. His many legs, pitifully thin compared with </p>
                                        </div>
                                    </li>
                                    <li class="product">
                                        <div class="product-holder">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_166.png"
                                                    alt=""></a>
                                            <ul class="product__action">
                                                <li><a href="#!"><i class="far fa-compress-alt"></i></a></li>
                                                <li><a href="#!"><i class="far fa-shopping-basket"></i></a></li>
                                                <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product-info">
                                            <div class="product__review ul_li">
                                                <ul class="rating-star ul_li mr-10">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                </ul>
                                                <span>(126) Review</span>
                                            </div>
                                            <h2 class="product__title"><a href="shop-single.html">Apple iPhone
                                                    12 Pro, 128GB, Pacific</a></h2>
                                            <span class="product__available">Available: <span>334</span></span>
                                            <div class="product__progress progress color-primary">
                                                <div class="progress-bar" role="progressbar" style="width: 50%"
                                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                            <p class="product-description">Found himself transformed in his bed
                                                into a horrible vermin. He lay on his armour-like back, and if
                                                he lifted his head a little he could see his brown belly,
                                                slightly domed and divided by arches into stiff sections. The
                                                bedding was hardly able to cover it and seemed ready to slide
                                                off any moment. His many legs, pitifully thin compared with </p>
                                        </div>
                                        <span class="product__badge color-2"><span>New</span></span>
                                    </li>
                                    <li class="product">
                                        <div class="product-holder">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_167.png"
                                                    alt=""></a>
                                            <ul class="product__action">
                                                <li><a href="#!"><i class="far fa-compress-alt"></i></a></li>
                                                <li><a href="#!"><i class="far fa-shopping-basket"></i></a></li>
                                                <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product-info">
                                            <div class="product__review ul_li">
                                                <ul class="rating-star ul_li mr-10">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                </ul>
                                                <span>(126) Review</span>
                                            </div>
                                            <h2 class="product__title"><a href="shop-single.html">Portable 2TB
                                                    External Hard Drive</a></h2>
                                            <span class="product__available">Available: <span>334</span></span>
                                            <div class="product__progress progress color-primary">
                                                <div class="progress-bar" role="progressbar" style="width: 50%"
                                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                            <p class="product-description">Found himself transformed in his bed
                                                into a horrible vermin. He lay on his armour-like back, and if
                                                he lifted his head a little he could see his brown belly,
                                                slightly domed and divided by arches into stiff sections. The
                                                bedding was hardly able to cover it and seemed ready to slide
                                                off any moment. His many legs, pitifully thin compared with </p>
                                        </div>
                                    </li>
                                    <li class="product">
                                        <div class="product-holder">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_168.png"
                                                    alt=""></a>
                                            <ul class="product__action">
                                                <li><a href="#!"><i class="far fa-compress-alt"></i></a></li>
                                                <li><a href="#!"><i class="far fa-shopping-basket"></i></a></li>
                                                <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product-info">
                                            <div class="product__review ul_li">
                                                <ul class="rating-star ul_li mr-10">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                </ul>
                                                <span>(126) Review</span>
                                            </div>
                                            <h2 class="product__title"><a href="shop-single.html">Fire HD 10
                                                    tablet, 10.1″, 1080p Full HD,</a></h2>
                                            <span class="product__available">Available: <span>334</span></span>
                                            <div class="product__progress progress color-primary">
                                                <div class="progress-bar" role="progressbar" style="width: 50%"
                                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                            <p class="product-description">Found himself transformed in his bed
                                                into a horrible vermin. He lay on his armour-like back, and if
                                                he lifted his head a little he could see his brown belly,
                                                slightly domed and divided by arches into stiff sections. The
                                                bedding was hardly able to cover it and seemed ready to slide
                                                off any moment. His many legs, pitifully thin compared with </p>
                                        </div>
                                    </li>
                                    <li class="product">
                                        <div class="product-holder">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_169.png"
                                                    alt=""></a>
                                            <ul class="product__action">
                                                <li><a href="#!"><i class="far fa-compress-alt"></i></a></li>
                                                <li><a href="#!"><i class="far fa-shopping-basket"></i></a></li>
                                                <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product-info">
                                            <div class="product__review ul_li">
                                                <ul class="rating-star ul_li mr-10">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                </ul>
                                                <span>(126) Review</span>
                                            </div>
                                            <h2 class="product__title"><a href="shop-single.html">Galaxy S20 FE
                                                    5G Cell Phone, Factory</a></h2>
                                            <span class="product__available">Available: <span>334</span></span>
                                            <div class="product__progress progress color-primary">
                                                <div class="progress-bar" role="progressbar" style="width: 50%"
                                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                            <p class="product-description">Found himself transformed in his bed
                                                into a horrible vermin. He lay on his armour-like back, and if
                                                he lifted his head a little he could see his brown belly,
                                                slightly domed and divided by arches into stiff sections. The
                                                bedding was hardly able to cover it and seemed ready to slide
                                                off any moment. His many legs, pitifully thin compared with </p>
                                        </div>
                                    </li>
                                    <li class="product">
                                        <div class="product-holder">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_170.png"
                                                    alt=""></a>
                                            <ul class="product__action">
                                                <li><a href="#!"><i class="far fa-compress-alt"></i></a></li>
                                                <li><a href="#!"><i class="far fa-shopping-basket"></i></a></li>
                                                <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product-info">
                                            <div class="product__review ul_li">
                                                <ul class="rating-star ul_li mr-10">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                </ul>
                                                <span>(126) Review</span>
                                            </div>
                                            <h2 class="product__title"><a href="shop-single.html">Galaxy S20 FE
                                                    5G Cell Phone, Factory</a></h2>
                                            <span class="product__available">Available: <span>334</span></span>
                                            <div class="product__progress progress color-primary">
                                                <div class="progress-bar" role="progressbar" style="width: 50%"
                                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                            <p class="product-description">Found himself transformed in his bed
                                                into a horrible vermin. He lay on his armour-like back, and if
                                                he lifted his head a little he could see his brown belly,
                                                slightly domed and divided by arches into stiff sections. The
                                                bedding was hardly able to cover it and seemed ready to slide
                                                off any moment. His many legs, pitifully thin compared with </p>
                                        </div>
                                        <span class="product__badge color-2"><span>New</span></span>
                                    </li>
                                    <li class="product">
                                        <div class="product-holder">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_171.png"
                                                    alt=""></a>
                                            <ul class="product__action">
                                                <li><a href="#!"><i class="far fa-compress-alt"></i></a></li>
                                                <li><a href="#!"><i class="far fa-shopping-basket"></i></a></li>
                                                <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product-info">
                                            <div class="product__review ul_li">
                                                <ul class="rating-star ul_li mr-10">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                </ul>
                                                <span>(126) Review</span>
                                            </div>
                                            <h2 class="product__title"><a href="shop-single.html">Aroma
                                                    Housewares 4-Cups 1Qt. Rice &</a></h2>
                                            <span class="product__available">Available: <span>334</span></span>
                                            <div class="product__progress progress color-primary">
                                                <div class="progress-bar" role="progressbar" style="width: 50%"
                                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                            <p class="product-description">Found himself transformed in his bed
                                                into a horrible vermin. He lay on his armour-like back, and if
                                                he lifted his head a little he could see his brown belly,
                                                slightly domed and divided by arches into stiff sections. The
                                                bedding was hardly able to cover it and seemed ready to slide
                                                off any moment. His many legs, pitifully thin compared with </p>
                                        </div>
                                        <span class="product__badge color-2"><span>New</span></span>
                                    </li>
                                    <li class="product">
                                        <div class="product-holder">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_172.png"
                                                    alt=""></a>
                                            <ul class="product__action">
                                                <li><a href="#!"><i class="far fa-compress-alt"></i></a></li>
                                                <li><a href="#!"><i class="far fa-shopping-basket"></i></a></li>
                                                <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product-info">
                                            <div class="product__review ul_li">
                                                <ul class="rating-star ul_li mr-10">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                </ul>
                                                <span>(126) Review</span>
                                            </div>
                                            <h2 class="product__title"><a href="shop-single.html">Chromebook
                                                    Flip Laptop, 14″ Full HD</a></h2>
                                            <span class="product__available">Available: <span>334</span></span>
                                            <div class="product__progress progress color-primary">
                                                <div class="progress-bar" role="progressbar" style="width: 50%"
                                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                            <p class="product-description">Found himself transformed in his bed
                                                into a horrible vermin. He lay on his armour-like back, and if
                                                he lifted his head a little he could see his brown belly,
                                                slightly domed and divided by arches into stiff sections. The
                                                bedding was hardly able to cover it and seemed ready to slide
                                                off any moment. His many legs, pitifully thin compared with </p>
                                        </div>
                                    </li>
                                    <li class="product">
                                        <div class="product-holder">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_173.png"
                                                    alt=""></a>
                                            <ul class="product__action">
                                                <li><a href="#!"><i class="far fa-compress-alt"></i></a></li>
                                                <li><a href="#!"><i class="far fa-shopping-basket"></i></a></li>
                                                <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product-info">
                                            <div class="product__review ul_li">
                                                <ul class="rating-star ul_li mr-10">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                </ul>
                                                <span>(126) Review</span>
                                            </div>
                                            <h2 class="product__title"><a href="shop-single.html">Sceptre 24″
                                                    Professional Thin 75Hz 1080p</a></h2>
                                            <span class="product__available">Available: <span>334</span></span>
                                            <div class="product__progress progress color-primary">
                                                <div class="progress-bar" role="progressbar" style="width: 50%"
                                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                            <p class="product-description">Found himself transformed in his bed
                                                into a horrible vermin. He lay on his armour-like back, and if
                                                he lifted his head a little he could see his brown belly,
                                                slightly domed and divided by arches into stiff sections. The
                                                bedding was hardly able to cover it and seemed ready to slide
                                                off any moment. His many legs, pitifully thin compared with </p>
                                        </div>
                                    </li>
                                    <li class="product">
                                        <div class="product-holder">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_174.png"
                                                    alt=""></a>
                                            <ul class="product__action">
                                                <li><a href="#!"><i class="far fa-compress-alt"></i></a></li>
                                                <li><a href="#!"><i class="far fa-shopping-basket"></i></a></li>
                                                <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product-info">
                                            <div class="product__review ul_li">
                                                <ul class="rating-star ul_li mr-10">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                </ul>
                                                <span>(126) Review</span>
                                            </div>
                                            <h2 class="product__title"><a href="shop-single.html">Acer SB220Q bi
                                                    21.5 Inches Full HD</a></h2>
                                            <span class="product__available">Available: <span>334</span></span>
                                            <div class="product__progress progress color-primary">
                                                <div class="progress-bar" role="progressbar" style="width: 50%"
                                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                            <p class="product-description">Found himself transformed in his bed
                                                into a horrible vermin. He lay on his armour-like back, and if
                                                he lifted his head a little he could see his brown belly,
                                                slightly domed and divided by arches into stiff sections. The
                                                bedding was hardly able to cover it and seemed ready to slide
                                                off any moment. His many legs, pitifully thin compared with </p>
                                        </div>
                                    </li>
                                    <li class="product">
                                        <div class="product-holder">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_175.png"
                                                    alt=""></a>
                                            <ul class="product__action">
                                                <li><a href="#!"><i class="far fa-compress-alt"></i></a></li>
                                                <li><a href="#!"><i class="far fa-shopping-basket"></i></a></li>
                                                <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product-info">
                                            <div class="product__review ul_li">
                                                <ul class="rating-star ul_li mr-10">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                </ul>
                                                <span>(126) Review</span>
                                            </div>
                                            <h2 class="product__title"><a href="shop-single.html">DEWALT 20V
                                                    MAX* XR Oscillating Tool Kit</a></h2>
                                            <span class="product__available">Available: <span>334</span></span>
                                            <div class="product__progress progress color-primary">
                                                <div class="progress-bar" role="progressbar" style="width: 50%"
                                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                            <p class="product-description">Found himself transformed in his bed
                                                into a horrible vermin. He lay on his armour-like back, and if
                                                he lifted his head a little he could see his brown belly,
                                                slightly domed and divided by arches into stiff sections. The
                                                bedding was hardly able to cover it and seemed ready to slide
                                                off any moment. His many legs, pitifully thin compared with </p>
                                        </div>
                                        <span class="product__badge color-2"><span>New</span></span>
                                    </li>
                                    <li class="product">
                                        <div class="product-holder">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('frontend/assets') }}/img/product/img_176.png"
                                                    alt=""></a>
                                            <ul class="product__action">
                                                <li><a href="#!"><i class="far fa-compress-alt"></i></a></li>
                                                <li><a href="#!"><i class="far fa-shopping-basket"></i></a></li>
                                                <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product-info">
                                            <div class="product__review ul_li">
                                                <ul class="rating-star ul_li mr-10">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                </ul>
                                                <span>(126) Review</span>
                                            </div>
                                            <h2 class="product__title"><a href="shop-single.html">Lenovo – Tab
                                                    P11 Plus – Tablet – 11″ 2K</a></h2>
                                            <span class="product__available">Available: <span>334</span></span>
                                            <div class="product__progress progress color-primary">
                                                <div class="progress-bar" role="progressbar" style="width: 50%"
                                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                            <p class="product-description">Found himself transformed in his bed
                                                into a horrible vermin. He lay on his armour-like back, and if
                                                he lifted his head a little he could see his brown belly,
                                                slightly domed and divided by arches into stiff sections. The
                                                bedding was hardly able to cover it and seemed ready to slide
                                                off any moment. His many legs, pitifully thin compared with </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="pagination_wrap pt-20">
                                <ul>
                                    <li><a href="#!"><i class="far fa-angle-double-left"></i></a></li>
                                    <li><a class="current_page" href="#!">1</a></li>
                                    <li><a href="#!">2</a></li>
                                    <li><a href="#!">3</a></li>
                                    <li><a href="#!"><i class="far fa-angle-double-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="shop-sidebar">
                            <div class="widget">
                                <h2 class="widget__title">
                                    <span>Pencarian</span>
                                </h2>
                                <form class="widget__search" action="#">
                                    <input type="text" placeholder="Cari...">
                                    <button><i class="far fa-search"></i></button>
                                </form>
                            </div>
                            <div class="widget">
                                <h2 class="widget__title">
                                    <span>Kategori</span>
                                </h2>
                                <ul class="widget__category">
                                    @forelse ($category_header as $row)
                                        <li><a href="#!">{{ $row->nama }}<i class="far fa-chevron-right"></i></a>
                                        </li>
                                    @empty
                                        <li><a href="#!">Data tidak tersedia<i class="far fa-chevron-right"></i></a>
                                        </li>
                                    @endforelse
                                </ul>
                            </div>
                            <div class="widget">
                                <div class="widget__add">
                                    <div class="content">
                                        <span>Trending</span>
                                        <h3>2021 <span>Laptop</span> <br> Collection</h3>
                                        <a class="thm-btn no-icon" href="#!">
                                            <span class="btn-wrap">
                                                <span>Buy Now</span>
                                                <span>Buy Now</span>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="image">
                                        <img class="add_img" src="{{ asset('frontend/assets') }}/img/product/img_177.png"
                                            alt="">
                                        <img class="add_shape"
                                            src="{{ asset('frontend/assets') }}/img/shape/add_shape.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </section>
    <!-- end shop-section -->
@endsection
