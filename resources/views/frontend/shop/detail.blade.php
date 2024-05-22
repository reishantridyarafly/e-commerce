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
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $product->average_rating)
                                    <i class="fas fa-star"></i>
                                @elseif ($i - $product->average_rating <= 0.5)
                                    <i class="fas fa-star-half-alt"></i>
                                @else
                                    <i class="far fa-star"></i>
                                @endif
                            @endfor
                            <span>({{ $product->ratings_count }})</span>
                        </div>

                        <div class="price">
                            <span class="current">{{ 'Rp ' . number_format($product->harga_jual, 0, ',', '.') }}</span>
                            <span class="old">{{ 'Rp ' . number_format($product->harga, 0, ',', '.') }}</span>
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
                            <form class="form" method="POST" action="{{ route('pembayaran.directCheckout') }}">
                                @csrf
                                <input type="hidden" name="id" id="id" value="{{ $product->id }}">
                                <div class="product-row">
                                    <div>
                                        <input class="product-count" type="text" value="1" name="qty"
                                            id="qty">
                                    </div>
                                    <div class="add-to-cart-btn">
                                        <button class="thm-btn thm-btn__2 no-icon" type="button" id="addCart"
                                            data-id="{{ $product->id }}">
                                            <span class="btn-wrap">
                                                <span>Keranjang</span>
                                                <span>Keranjang</span>
                                            </span>
                                        </button>
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
                                        data-bs-target="#tb-01">Detail Produk</button></li>
                                <li><button id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#tb-03">Ulasan
                                        ({{ $product->ratings_count }})</button></li>
                            </ul>
                        </div>

                        <!-- Tab panes -->
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="tb-01">
                                {!! $product->deskripsi !!}
                            </div>
                            <div class="tab-pane fade" id="tb-03">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-xs-12">
                                        @forelse ($reviews as $review)
                                            <div class="client-rv">
                                                <div class="client-pic">
                                                    <img src="{{ $review->user->avatar == '' ? 'https://ui-avatars.com/api/?background=random&name=' . $review->user->first_name . ' ' . $review->user->last_name : asset('storage/avatar/' . $review->user->avatar) }}"
                                                        alt>
                                                </div>
                                                <div class="details">
                                                    <div class="name-rating-time">
                                                        <div class="name-rating">
                                                            <div>
                                                                <h4>{{ $review->user->first_name . ' ' . $review->user->last_name }}
                                                                </h4>
                                                            </div>
                                                            <div class="rating">
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                    @if ($i <= $review->rating)
                                                                        <i class="fas fa-star"></i>
                                                                    @elseif ($i - $review->rating <= 0.5)
                                                                        <i class="fas fa-star-half-alt"></i>
                                                                    @else
                                                                        <i class="far fa-star"></i>
                                                                    @endif
                                                                @endfor
                                                            </div>
                                                        </div>
                                                        <div class="time">
                                                            <span>{{ $review->created_at->diffForHumans() }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="review-body">
                                                        <p>{{ $review->comment }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                        @endforelse
                                    </div> <!-- end col -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end row -->

            <div class="row">
                <div class="col col-xs-12">
                    <div class="realted-porduct">
                        <h3>Rekomendasi Produk</h3>
                        <div class="shop-area">
                            <ul class="products clearfix">
                                @foreach ($recommendedProducts as $recommendedProduct)
                                    @php
                                        $recommendedProductRating = $recommendedProduct->ratings->avg('rating');
                                        $recommendedProductRatingCount = $recommendedProduct->ratings->count();
                                    @endphp
                                    <li class="product">
                                        <div class="product-holder">
                                            <a href="{{ route('belanja.detail', $recommendedProduct->slug) }}"><img
                                                    src="{{ asset('storage/uploads/products/' . $recommendedProduct->photos->first()->photo_name) }}"
                                                    alt="{{ $recommendedProduct->nama }}"></a>
                                            <ul class="product__action">
                                                <li><a href="#!"><i class="far fa-compress-alt"></i></a></li>
                                                <li><a href="#!"><i class="far fa-shopping-basket"></i></a></li>
                                                <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product-info">
                                            <div class="product__review ul_li">
                                                <ul class="rating-star ul_li mr-10">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= $recommendedProductRating)
                                                            <li><i class="fas fa-star"></i></li>
                                                        @elseif ($i - $recommendedProductRating <= 0.5)
                                                            <li><i class="fas fa-star-half-alt"></i></li>
                                                        @else
                                                            <li><i class="far fa-star"></i></li>
                                                        @endif
                                                    @endfor
                                                </ul>
                                                <span>({{ $recommendedProductRatingCount }}) Review</span>
                                            </div>
                                            <h2 class="product__title"><a
                                                    href="{{ route('belanja.detail', $recommendedProduct->slug) }}">{{ $recommendedProduct->nama }}</a>
                                            </h2>
                                            <span class="product__available">Available:
                                                <span>{{ $recommendedProduct->stok }}</span></span>
                                            <div class="product__progress progress color-primary">
                                                <div class="progress-bar" role="progressbar" style="width: 100%"
                                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <h4 class="product__price"><span
                                                    class="new">{{ 'Rp ' . number_format($recommendedProduct->harga_jual, 0, ',', '.') }}</span><span
                                                    class="old">{{ 'Rp ' . number_format($recommendedProduct->harga, 0, ',', '.') }}</span>
                                            </h4>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>




        </div> <!-- end of container -->
    </section>
    <!-- end of shop-single-section -->
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('body').on('click', '#addCart', function() {
                let id = $(this).data('id');
                let qty = $('#qty').val();
                $.ajax({
                    type: "POST",
                    url: "/keranjang/tambah/" + id,
                    data: {
                        id: id,
                        qty: qty,
                    },
                    dataType: 'json',
                    beforeSend: function() {
                        $('#addCart').attr('disable', 'disabled');
                        $('#addCart').html(`<span class="btn-wrap">
                                                <span>Proses...</span>
                                                <span>Proses...</span>
                                            </span>`);
                    },
                    complete: function() {
                        $('#addCart').removeAttr('disable');
                        $('#addCart').html(`<span class="btn-wrap">
                                                <span>Keranjang</span>
                                                <span>Keranjang</span>
                                            </span>`);
                    },
                    success: function(response) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: "success",
                            title: response.message
                        });
                        updateCartCount();
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        console.error(xhr.status + "\n" + xhr.responseText + "\n" +
                            thrownError);
                    }
                });
            });
        });
    </script>
@endsection
