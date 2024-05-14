@extends('layouts.frontend.main')
@section('title', 'Belanja')
@section('content')
    <!-- breadcrumb start -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="radios-breadcrumb breadcrumbs">
                <ul class="list-unstyled d-flex align-items-center">
                    <li class="radiosbcrumb-item radiosbcrumb-begin">
                        <a href="{{ route('beranda.index') }}"><span>Beranda</span></a>
                    </li>
                    <li class="radiosbcrumb-item radiosbcrumb-end">
                        <span>@yield('title')</span>
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
                                    @forelse ($product as $row)
                                        <li class="product">
                                            <div class="product-holder">
                                                <a href="{{ route('belanja.detail', $row->id) }}"><img
                                                        src="{{ asset('storage/uploads/products/' . $row->featured_photo->photo_name) }}"
                                                        alt=""></a>
                                                <ul class="product__action">
                                                    <li><a href="javascript:void(0)" id="addCart"
                                                            data-id="{{ $row->id }}"><i
                                                                class="far fa-shopping-basket"></i></a></li>
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
                                                <h2 class="product__title"><a
                                                        href="{{ route('belanja.detail', $row->id) }}">{{ $row->nama }}</a>
                                                </h2>
                                                <div class="product__progress progress color-primary">
                                                    <div class="progress-bar" role="progressbar" style="width: 100%">
                                                    </div>
                                                </div>
                                                <h4 class="product__price"><span
                                                        class="new">{{ 'Rp ' . number_format((float) $row->harga_jual, 0, ',', '.') }}
                                                    </span><span
                                                        class="old">{{ 'Rp ' . number_format((float) $row->harga, 0, ',', '.') }}
                                                    </span></h4>
                                                <p class="product-description">{{ $row->deskripsi_singkat }}</p>
                                            </div>
                                        </li>
                                    @empty
                                        <h3 class="text-center">Data tidak tersedia</h3>
                                    @endforelse
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
                                    @forelse ($category as $row)
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

@section('javascript')
    <script>
        $(document).ready(function() {
            function updateCartCount() {
                $.ajax({
                    type: "GET",
                    url: "{{ route('keranjang.jumlah') }}",
                    dataType: 'json',
                    success: function(response) {
                        $('#cart-count').text(response.count);
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        console.error(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                });
            }

            updateCartCount();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('body').on('click', '#addCart', function() {
                let id = $(this).data('id');
                $.ajax({
                    type: "POST",
                    url: "/keranjang/tambah/" + id,
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses',
                            text: response.message,
                        })
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
