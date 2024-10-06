@extends('layouts.frontend.main')
@section('title', 'Keranjang')
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

    <!-- start cart-section -->
    <section class="cart-section woocommerce-cart pb-80">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <div class="woocommerce">
                        <form>
                            <table class="shop_table shop_table_responsive cart">
                                <thead>
                                    <tr>
                                        <th class="product-remove">&nbsp;</th>
                                        <th class="product-thumbnail">&nbsp;</th>
                                        <th class="product-name">Produk</th>
                                        <th class="product-price">Harga</th>
                                        <th class="product-quantity">Qty </th>
                                        <th class="product-subtotal">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($items as $row)
                                        <tr class="cart_single" data-id="{{ $row->id }}">
                                            <td class="product-remove">
                                                <a href="#!" class="remove" title="Remove this item"
                                                    data-id="{{ $row->id }}">&times;</a>
                                            </td>
                                            <td class="product-thumbnail">
                                                <a href="#!">
                                                    <img width="57" height="70"
                                                        src="{{ asset('storage/uploads/products/' . $row->product->photos->first()->photo_name) }}"
                                                        class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image"
                                                        alt="{{ route('belanja.detail', $row->product->slug) }}" />
                                                </a>
                                            </td>
                                            <td class="product-name" data-title="Product">
                                                <a
                                                    href="{{ route('belanja.detail', $row->product->slug) }}">{{ $row->product->nama }}</a>
                                            </td>
                                            <td class="product-price" data-title="Price">
                                                <span
                                                    class="woocommerce-Price-amount amount">{{ 'Rp ' . number_format($row->product->harga_jual, 0, ',', '.') }}</span>
                                            </td>
                                            <td class="product-quantity" data-title="Quantity">
                                                <div class="quantity">
                                                    <input type="number" step="1" min="0"
                                                        value="{{ $row->quantity }}" title="Qty" id="qty"
                                                        data-id="{{ $row->id }}"
                                                        data-price="{{ $row->product->harga_jual }}"
                                                        data-stok="{{ $row->product->stok }}"
                                                        class="product-count input-text qty text product-count form-control" />
                                                </div>
                                            </td>
                                            <td class="product-subtotal" data-title="Total">
                                                <span class="woocommerce-Price-amount amount"
                                                    id="subtotal_product">{{ 'Rp ' . number_format($row->quantity * $row->product->harga_jual, 0, ',', '.') }}</span>
                                            </td>
                                        </tr>
                                    @empty
                                        <h1>Data tidak tersedia</h1>
                                    @endforelse
                                </tbody>
                            </table>
                        </form>

                        <div class="cart-collaterals">
                            <div class="cart_totals calculated_shipping">
                                <table class="shop_table shop_table_responsive">
                                    <tr class="order-total">
                                        <th>Total</th>
                                        <td data-title="Total"><strong><span class="woocommerce-Price-amount amount"
                                                    id="cart_total"></span></strong>
                                        </td>
                                    </tr>
                                </table>

                                <div class="wc-proceed-to-checkout">
                                    <form action="{{ route('pembayaran.cartCheckout') }}" method="post">
                                        @csrf
                                        <button type="submit"
                                            class="checkout-button thm-btn thm-btn__2 no-icon br-0 alt wc-forward">
                                            <span class="btn-wrap">
                                                <span>Pembayaran</span>
                                                <span>Pembayaran</span>
                                            </span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end cart-section -->
@endsection

@section('javascript')
    <script>
        function formatRupiah(angka, prefix) {
            var number_string = angka.toString().replace(/[^0-9.-]+/g, ""),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? prefix + rupiah : '');
        }

        function updateCartTotals() {
            var subtotal = 0;
            $('.cart_single').each(function() {
                var quantity = $(this).find('#qty').val();
                var price = $(this).find('#qty').data('price');
                var itemSubtotal = quantity * price;
                subtotal += itemSubtotal;
            });

            var formattedSubtotal = formatRupiah(subtotal, 'Rp ');
            $('#cart_total').text(formattedSubtotal);
        }

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('body').on('change', '#qty', function() {
                var $this = $(this);
                var id = $this.data('id');
                var newQuantity = $this.val();
                var productPrice = $this.data('price');
                var stock = parseInt($this.data('stok'));

                if (newQuantity > stock) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                    });
                    Toast.fire({
                        icon: "error",
                        title: "Jumlah yang dimasukkan melebihi stok yang tersedia!"
                    });
                    updateCartTotals();
                    $this.val(stock);
                    newQuantity = stock;
                }

                var subtotal = newQuantity * productPrice;
                var formattedSubtotal = formatRupiah(subtotal, 'Rp ');

                $this.closest('tr').find('.product-subtotal .woocommerce-Price-amount').text(
                    formattedSubtotal);

                updateCartTotals();

                $.ajax({
                    url: '/keranjang/edit/' + id,
                    type: 'POST',
                    data: {
                        id: id,
                        quantity: newQuantity
                    },
                    success: function(response) {
                        console.log(response.message);
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        console.error(xhr.status + "\n" + xhr.responseText + "\n" +
                            thrownError);
                    }
                });
            });

            $('body').on('click', '.remove', function(e) {
                e.preventDefault();
                var $this = $(this);
                var id = $this.data('id');

                $.ajax({
                    url: '/keranjang/hapus/' + id,
                    type: 'DELETE',
                    success: function(response) {
                        $this.closest('tr').remove();
                        updateCartTotals();
                        console.log(response.message);
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        console.error(xhr.status + "\n" + xhr.responseText + "\n" +
                            thrownError);
                    }
                });
            });

            updateCartTotals();
        });
    </script>
@endsection
