@extends('layouts.frontend.main')
@section('title', 'Beranda')
@section('content')
    <!-- banner start -->
    <div class="banner pt-10">
        <div class="container mxw_1360">
            <div class="banner__wrapper d-flex">
                <div class="category-nav">
                    <ul class="category-nav__list list-unstyled">
                        @forelse ($categories as $category)
                            <li><a href="{{ route('belanja.category', $category->slug) }}">{{ $category->nama }}</a></li>
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
                @foreach ($latest_products as $latest_product)
                    <div class="banner-slide__single">
                        <div class="banner-slide__item ul_li bg_img">
                            <div class="banner-slide__img">
                                <img src="{{ asset('storage/uploads/products/' . $latest_product->photos->first()->photo_name) }}"
                                    alt="">
                            </div>
                            <div class="banner-slide__content">
                                <h3>{{ $latest_product->nama }}</h3>
                                <h4 class="price">Harga
                                    <span>{{ 'Rp ' . number_format($latest_product->harga_jual, 0, ',', '.') }}</span>
                                </h4>
                                <a href="{{ route('belanja.detail', $latest_product->slug) }}" class="product-view"
                                    data-id="{{ $latest_product->id }}">Beli Sekarang</a>
                            </div>
                        </div>
                    </div>
                @endforeach
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
                                        @forelse ($popular_products as $row)
                                            <div class="tab-product__item tx-product text-center">
                                                <div class="thumb">
                                                    <a href="{{ route('belanja.detail', $row->slug) }}"><img
                                                            src="{{ asset('storage/uploads/products/' . $row->photos->first()->photo_name) }}"
                                                            class="product-view" data-id="{{ $row->id }}"
                                                            alt=""></a>
                                                    <ul class="product__action style-2 ul_li">
                                                        <li><a href="#!"><i class="far fa-shopping-basket"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="content">
                                                    <div class="product__review ul_li_center">
                                                        <ul class="rating-star ul_li mr-10">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                @if ($i <= $row->average_rating)
                                                                    <li><i class="fas fa-star"></i></li>
                                                                @elseif ($i - $row->average_rating <= 0.5)
                                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                                @else
                                                                    <li><i class="far fa-star"></i></li>
                                                                @endif
                                                            @endfor
                                                        </ul>
                                                        <span>({{ $row->ratings_count }})</span>
                                                    </div>
                                                    <h3 class="title"><a href="{{ route('belanja.detail', $row->slug) }}"
                                                            class="product-view"
                                                            data-id="{{ $row->id }}">{{ $row->nama }}</a>
                                                    </h3>
                                                    <span
                                                        class="price">{{ 'Rp ' . number_format($row->harga_jual, 0, ',', '.') }}
                                                        <br> <span
                                                            class="old-price">{{ 'Rp ' . number_format($row->harga, 0, ',', '.') }}</span>
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
                        <h2 class="section-heading"><span>Populer Berdasarkan Kategori</span></h2>
                        <ul class="product__nav recent-product__nav nav nav-tabs" id="vdr-myTab" role="tablist">
                            @foreach ($categories->take(5) as $category)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link {{ $loop->first ? 'active' : '' }}"
                                        id="vdr-tab-{{ $category->id }}" data-bs-toggle="tab"
                                        data-bs-target="#vdr-tab{{ $category->id }}" type="button" role="tab"
                                        aria-controls="vdr-tab{{ $category->id }}"
                                        aria-selected="{{ $loop->first ? 'true' : 'false' }}">{{ $category->nama }}</button>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="tab-content" id="vdr-myTabContent">
                        @foreach ($categories as $category)
                            <div class="tab-pane animated fadeInUp{{ $loop->first ? ' show active' : '' }}"
                                id="vdr-tab{{ $category->id }}" role="tabpanel"
                                aria-labelledby="vdr-tab-{{ $category->id }}">
                                <div class="row justify-content-md-center">
                                    @foreach ($top_products_by_category[$category->id] as $product)
                                        <div class="col-lg-4 col-md-6">
                                            <div class="recent-product__item tx-product ul_li mt-30">
                                                <div class="thumb">
                                                    <a href="{{ route('belanja.detail', $product->slug) }}"
                                                        class="product-view" data-id="{{ $product->id }}"><img
                                                            src="{{ asset('storage/uploads/products/' . $product->photos->first()->photo_name) }}"
                                                            alt=""></a>
                                                </div>
                                                <div class="recent-product__content">
                                                    <ul class="rating-star ul_li mr-10">
                                                        @for ($i = 0; $i < 5; $i++)
                                                            <li><i
                                                                    class="{{ $i < $product->average_rating ? 'fas' : 'far' }} fa-star"></i>
                                                            </li>
                                                        @endfor
                                                    </ul>
                                                    <h3><a href="{{ route('belanja.detail', $product->slug) }}"
                                                            class="product-view"
                                                            data-id="{{ $product->id }}">{{ $product->nama }}</a>
                                                    </h3>
                                                    <h4 class="product__price"><span
                                                            class="new">{{ 'Rp ' . number_format($latest_product->harga_jual, 0, ',', '.') }}</span><span
                                                            class="old">{{ 'Rp ' . number_format($latest_product->harga, 0, ',', '.') }}</span>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- recent product end -->
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('body').on('click', '.product-view', function() {
                let productId = $(this).data('id');
                $.ajax({
                    type: "POST",
                    url: "{{ route('productViews.store') }}",
                    data: {
                        product_id: productId
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response.message);
                    },
                    error: function(xhr) {
                        console.error(xhr.status + ": " + xhr.responseText);
                    }
                });
            });

        });
    </script>
@endsection
