@extends('layouts.frontend.main')
@section('title', $product->nama)
@section('content')
    <!-- breadcrumb start -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="radios-breadcrumb breadcrumbs">
                <ul class="list-unstyled d-flex align-items-center">
                    <li class="radiosbcrumb-item radiosbcrumb-begin">
                        <a href="{{ route('beranda.index') }}"><span>Beranda</span></a>
                    </li>
                    <li class="radiosbcrumb-item radiosbcrumb-begin">
                        <a href="{{ route('belanja.index') }}"><span>Belanja</span></a>
                    </li>
                    <li class="radiosbcrumb-item radiosbcrumb-end">
                        <span>@yield('title')</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- breadcrumb end -->

    <!-- start shop-single-section -->
    <section class="shop-single-section pb-70">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="product-single-wrap mb-30">
                        <div class="product_details_img">
                            <div class="tab-content" id="myTabContent">
                                @foreach ($product->photos as $photo)
                                    <div class="tab-pane {{ $loop->first ? 'show active' : '' }}"
                                        id="photo{{ $loop->iteration }}" role="tabpanel"
                                        aria-labelledby="photo{{ $loop->iteration }}-tab">
                                        <div class="pl_thumb">
                                            <img src="{{ asset('storage/uploads/products/' . $photo->photo_name) }}"
                                                alt="Product Photo">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="shop_thumb_tab">
                            <ul class="nav" id="myTab2" role="tablist">
                                @foreach ($product->photos as $photo)
                                    <li class="nav-item">
                                        <button class="nav-link {{ $loop->first ? 'active' : '' }}"
                                            id="photo{{ $loop->iteration }}-tab" data-bs-toggle="tab"
                                            data-bs-target="#photo{{ $loop->iteration }}" type="button" role="tab"
                                            aria-controls="photo{{ $loop->iteration }}"
                                            aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                            <img src="{{ asset('storage/uploads/products/' . $photo->photo_name) }}"
                                                alt="Product Photo">
                                        </button>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="col-md-6 product-details-col">
                    <div class="product-details">
                        <h2>{{ $product->nama }}</h2>
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span>(2 Customer review)</span>
                        </div>
                        <div class="price">
                            <span
                                class="current">{{ 'Rp ' . number_format((float) $product->harga_jual, 0, ',', '.') }}</span>
                            <span class="old">{{ 'Rp ' . number_format((float) $product->harga, 0, ',', '.') }}</span>
                        </div>
                        <p>{{ $product->deskripsi_singkat }}</p>

                        <div class="thb-product-meta-before mt-20">
                            <div class="product_meta">
                                <span class="posted_in">Kategori: <a
                                        href="#!">{{ $product->category->nama }}</a></span>
                            </div>
                            <div class="product_meta">
                                <span class="posted_in">Stok: <a href="#!">{{ $product->stok }}</a></span>
                            </div>
                        </div>

                        <div class="product-option">
                            <form class="form">
                                <div class="product-row">
                                    <div>
                                        <input class="product-count" type="text" value="1" name="product-count">
                                    </div>
                                    <div class="add-to-cart-btn">
                                        <button class="thm-btn thm-btn__2 no-icon" type="submit">
                                            <span class="btn-wrap">
                                                <span>Beli Sekarang</span>
                                                <span>Beli Sekarang</span>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>


                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

            <div class="row">
                <div class="col col-xs-12">
                    <div class="single-product-info">
                        <!-- Nav tabs -->
                        <div class="tablist">
                            <ul class="nav nav-tabs" id="pills-tab" role="tablist">
                                <li><button class="active" id="pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#tb-01">Detail Product</button></li>
                                <li><button id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#tb-03">Ulasan
                                        (09)</button></li>
                            </ul>
                        </div>

                        <!-- Tab panes -->
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="tb-01">
                                {!! $product->deskripsi !!}
                            </div>
                            <div class="tab-pane fade" id="tb-03">
                                <div class="row">
                                    <div class="col-lg-6 col-sm-12 col-xs-12">
                                        <div class="client-rv">
                                            <div class="client-pic">
                                                <img src="{{ asset('frontend/assets') }}/img/avatar/comments/img_01.jpg"
                                                    alt>
                                            </div>
                                            <div class="details">
                                                <div class="name-rating-time">
                                                    <div class="name-rating">
                                                        <div>
                                                            <h4>Mice</h4>
                                                        </div>
                                                        <div class="rating">
                                                            <i class="fi flaticon-star"></i>
                                                            <i class="fi flaticon-star"></i>
                                                            <i class="fi flaticon-star"></i>
                                                            <i class="fi flaticon-star"></i>
                                                            <i class="fi flaticon-star"></i>
                                                        </div>
                                                    </div>
                                                    <div class="time">
                                                        <span>1 day ago</span>
                                                    </div>
                                                </div>
                                                <div class="review-body">
                                                    <p>Helplessly as he looked What's happened to me he thought. It wasn't a
                                                        dreamtrated magazine and housed in a nice, gilded frame. It showed a
                                                        lady fitted</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="client-rv">
                                            <div class="client-pic">
                                                <img src="{{ asset('frontend/assets') }}/img/avatar/comments/img_02.jpg"
                                                    alt>
                                            </div>
                                            <div class="details">
                                                <div class="name-rating-time">
                                                    <div class="name-rating">
                                                        <div>
                                                            <h4>Hone</h4>
                                                        </div>
                                                        <div class="rating">
                                                            <i class="fi flaticon-star"></i>
                                                            <i class="fi flaticon-star"></i>
                                                            <i class="fi flaticon-star"></i>
                                                            <i class="fi flaticon-star"></i>
                                                            <i class="fi flaticon-star"></i>
                                                        </div>
                                                    </div>
                                                    <div class="time">
                                                        <span>1 day ago</span>
                                                    </div>
                                                </div>
                                                <div class="review-body">
                                                    <p>Helplessly as he looked What's happened to me he thought. It wasn't a
                                                        dreamtrated magazine and housed in a nice, gilded frame. It showed a
                                                        lady fitted</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="client-rv">
                                            <div class="client-pic">
                                                <img src="{{ asset('frontend/assets') }}/img/avatar/comments/img_01.jpg"
                                                    alt>
                                            </div>
                                            <div class="details">
                                                <div class="name-rating-time">
                                                    <div class="name-rating">
                                                        <div>
                                                            <h4>Piloa</h4>
                                                        </div>
                                                        <div class="rating">
                                                            <i class="fi flaticon-star"></i>
                                                            <i class="fi flaticon-star"></i>
                                                            <i class="fi flaticon-star"></i>
                                                            <i class="fi flaticon-star"></i>
                                                            <i class="fi flaticon-star"></i>
                                                        </div>
                                                    </div>
                                                    <div class="time">
                                                        <span>2 days ago</span>
                                                    </div>
                                                </div>
                                                <div class="review-body">
                                                    <p>Helplessly as he looked What's happened to me he thought. It wasn't a
                                                        dreamtrated magazine and housed in a nice, gilded frame. It showed a
                                                        lady fitted</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- end col -->

                                    <div class="col-lg-6 col-sm-12 col-xs-12 review-form-wrapper">
                                        <div class="review-form">
                                            <h4>Here you can review the item</h4>
                                            <form>
                                                <div>
                                                    <input type="text" class="form-control" placeholder="Name *"
                                                        required>
                                                </div>
                                                <div>
                                                    <input type="email" class="form-control" placeholder="Email *"
                                                        required>
                                                </div>
                                                <div>
                                                    <textarea class="form-control" placeholder="Review *"></textarea>
                                                </div>
                                                <div class="rating-wrapper">
                                                    <div class="rating">
                                                        <a href="#!" class="star-1">
                                                            <i class="fal fa-star"></i>
                                                        </a>
                                                        <a href="#!" class="star-1">
                                                            <i class="fal fa-star"></i>
                                                        </a>
                                                        <a href="#!" class="star-1">
                                                            <i class="fal fa-star"></i>
                                                        </a>
                                                        <a href="#!" class="star-1">
                                                            <i class="fal fa-star"></i>
                                                        </a>
                                                        <a href="#!" class="star-1">
                                                            <i class="fal fa-star"></i>
                                                        </a>
                                                    </div>
                                                    <div class="submit">
                                                        <button class="thm-btn thm-btn__2 no-icon" type="submit">
                                                            <span class="btn-wrap">
                                                                <span>Shop Now</span>
                                                                <span>Shop Now</span>
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end row -->

            <div class="row">
                <div class="col col-xs-12">
                    <div class="realted-porduct">
                        <h3>Related product</h3>
                        <div class="shop-area">
                            <ul class="products clearfix">
                                <li class="product">
                                    <div class="product-holder">
                                        <a href="shop-single.html"><img
                                                src="{{ asset('frontend/assets') }}/img/product/img_165.png" alt></a>
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
                                        <h2 class="product__title"><a href="shop-single.html">Rokinon Xeen CF 16mm T2.6
                                                Pro Cinema Wide</a></h2>
                                        <span class="product__available">Available: <span>334</span></span>
                                        <div class="product__progress progress color-primary">
                                            <div class="progress-bar" role="progressbar" style="width: 50%"
                                                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <h4 class="product__price"><span class="new">$30.52</span><span
                                                class="old">$28.52</span></h4>
                                    </div>
                                </li>
                                <li class="product">
                                    <div class="product-holder">
                                        <a href="shop-single.html"><img
                                                src="{{ asset('frontend/assets') }}/img/product/img_166.png" alt></a>
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
                                        <h2 class="product__title"><a href="shop-single.html">Tab M10 Plus, FHD Android
                                                Tablet, Processor</a></h2>
                                        <span class="product__available">Available: <span>334</span></span>
                                        <div class="product__progress progress color-primary">
                                            <div class="progress-bar" role="progressbar" style="width: 50%"
                                                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <h4 class="product__price"><span class="new">$30.52</span><span
                                                class="old">$28.52</span></h4>
                                    </div>
                                    <span class="product__badge color-2"><span>New</span></span>
                                </li>
                                <li class="product">
                                    <div class="product-holder">
                                        <a href="shop-single.html"><img
                                                src="{{ asset('frontend/assets') }}/img/product/img_167.png" alt></a>
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
                                        <h2 class="product__title"><a href="shop-single.html">Portable 2TB External Hard
                                                Drive Portable HDD USB</a></h2>
                                        <span class="product__available">Available: <span>334</span></span>
                                        <div class="product__progress progress color-primary">
                                            <div class="progress-bar" role="progressbar" style="width: 50%"
                                                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <h4 class="product__price"><span class="new">$30.52</span><span
                                                class="old">$28.52</span></h4>
                                    </div>
                                </li>
                                <li class="product">
                                    <div class="product-holder">
                                        <a href="shop-single.html"><img
                                                src="{{ asset('frontend/assets') }}/img/product/img_168.png" alt></a>
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
                                        <h2 class="product__title"><a href="shop-single.html">Skullcandy Dime True In-Ear
                                                Earbuds – Golden</a></h2>
                                        <span class="product__available">Available: <span>334</span></span>
                                        <div class="product__progress progress color-primary">
                                            <div class="progress-bar" role="progressbar" style="width: 50%"
                                                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <h4 class="product__price"><span class="new">$30.52</span><span
                                                class="old">$28.52</span></h4>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- end of container -->
    </section>
    <!-- end of shop-single-section -->
@endsection
