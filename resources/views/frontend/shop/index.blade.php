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
                            </div>
                            <div class="woocommerce-content-inner">
                                <ul class="products three-column clearfix">
                                    @forelse ($product as $row)
                                        <li class="product">
                                            <div class="product-holder">
                                                <a href="{{ route('belanja.detail', $row->slug) }}" class="product-view"
                                                    data-id="{{ $row->id }}"><img
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
                                                <h2 class="product__title"><a
                                                        href="{{ route('belanja.detail', $row->slug) }}"
                                                        class="product-view"
                                                        data-id="{{ $row->id }}">{{ $row->nama }}</a>
                                                </h2>
                                                <div class="product__progress progress color-primary">
                                                    <div class="progress-bar" role="progressbar" style="width: 100%">
                                                    </div>
                                                </div>
                                                <h4 class="product__price"><span
                                                        class="new">{{ 'Rp ' . number_format($row->harga_jual, 0, ',', '.') }}
                                                    </span><span
                                                        class="old">{{ $row->harga ? 'Rp ' . number_format($row->harga, 0, ',', '.') : '' }}
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
                                <div class="pagination_wrap pt-20">
                                    {{ $product->links('layouts.frontend.partials.pagination') }}
                                </div>
                            </div>
                        </div>
                        <div class="shop-sidebar">
                            <div class="widget">
                                <h2 class="widget__title">
                                    <span>Pencarian</span>
                                </h2>
                                <form class="widget__search" action="{{ route('belanja.search') }}">
                                    <input type="text" id="search" name="search" placeholder="Cari...">
                                    <button type="submit" id="search-button"><i class="far fa-search"></i></button>
                                </form>
                                <div id="search-results"></div>
                            </div>
                            <div class="widget">
                                <h2 class="widget__title">
                                    <span>Katalog</span>
                                </h2>
                                <ul class="widget__category">
                                    @forelse ($category as $row)
                                        <li><a href="{{ route('belanja.category', $row->slug) }}">{{ $row->nama }}<i
                                                    class="far fa-chevron-right"></i></a>
                                        </li>
                                    @empty
                                        <li><a href="#!">Data tidak tersedia<i class="far fa-chevron-right"></i></a>
                                        </li>
                                    @endforelse
                                </ul>
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

            $('body').on('click', '#addCart', function() {
                let id = $(this).data('id');
                $.ajax({
                    type: "POST",
                    url: "/keranjang/tambah/" + id,
                    data: {
                        id: id,
                        qty: 1
                    },
                    dataType: 'json',
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
