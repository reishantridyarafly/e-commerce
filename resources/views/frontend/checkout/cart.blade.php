@extends('layouts.frontend.main')
@section('title', 'Pembayaran')
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

    <!-- start checkout-section -->
    <section class="checkout-section pb-80">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <div class="woocommerce">
                        <form id="form" class="checkout woocommerce-checkout">
                            <div class="col2-set" id="customer_details">
                                <div class="coll-1">
                                    <div class="woocommerce-billing-fields">
                                        <h3>Detail Pembayaran</h3>
                                        <p class="form-row form-row form-row-wide" id="billing_company_field">
                                            <label for="billing_conamempany" class="">Nama Lengkap</label>
                                            <input type="text" class="input-text " name="name" id="name"
                                                value="{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}"
                                                disabled />
                                        </p>

                                        <p class="form-row form-row form-row-first validate-required validate-email"
                                            id="billing_email_field">
                                            <label for="email" class="">Email <abbr class="required"
                                                    title="required">*</abbr></label>
                                            <input type="email" class="input-text " name="email" id="email"
                                                value="{{ auth()->user()->email }}" disabled />
                                        </p>

                                        <p class="form-row form-row form-row-last validate-required validate-phone"
                                            id="billing_phone_field">
                                            <label for="no_telepon" class="">Phone <abbr class="required"
                                                    title="required">*</abbr></label>
                                            <input type="text" class="input-text" name="no_telepon" id="no_telepon"
                                                value="{{ auth()->user()->no_telepon }}" disabled />
                                        </p>
                                        <div class="clear"></div>

                                        <p class="form-row form-row form-row-wide address-field validate-required"
                                            id="billing_address_1_field">
                                            <label for="address" class="">Alamat <abbr class="required"
                                                    title="required">*</abbr></label>
                                            <select name="address" id="address" class="country_to_state country_select ">
                                                <option value="">Pilih Alamat&hellip;</option>
                                                @forelse ($address as $row)
                                                    <option value="{{ $row->id }}"
                                                        {{ $row->default_alamat == 0 ? 'selected' : '' }}>
                                                        {{ $row->detail_alamat }}</option>
                                                @empty
                                                    <option value="">Data tidak tersedia</option>
                                                @endforelse
                                            </select>
                                            <small class="text-danger errorAddress"></small>
                                        </p>

                                        <p class="form-row form-row address-field validate-postcode validate-required form-row-first  woocommerce-invalid-required-field"
                                            id="billing_city_field">
                                            <label for="provinsi" class="">Provinsi <abbr class="required"
                                                    title="required">*</abbr></label>
                                            <input type="text" class="input-text" name="provinsi" id="provinsi"
                                                disabled />
                                        </p>

                                        <p class="form-row form-row address-field validate-postcode validate-required form-row-first  woocommerce-invalid-required-field"
                                            id="billing_city_field">
                                            <label for="kota" class="">Kota <abbr class="required"
                                                    title="required">*</abbr></label>
                                            <input type="hidden" class="input-text" name="kota_id" id="kota_id"
                                                value="" disabled />
                                            <input type="text" class="input-text" name="kota" id="kota"
                                                value="" disabled />
                                        </p>

                                        <p class="form-row form-row form-row-wide address-field update_totals_on_change validate-required"
                                            id="billing_country_field">
                                            <label for="kurir" class="">Kurir <abbr class="required"
                                                    title="required">*</abbr></label>
                                            <select name="kurir" id="kurir" class="country_to_state country_select ">
                                                <option value="">Pilih Ekspedisi&hellip;</option>
                                                <option value="jne">JNE</option>
                                                <option value="pos">POS</option>
                                                <option value="tiki">TIKI</option>
                                            </select>
                                            <small class="text-danger errorKurir"></small>
                                        </p>

                                        <p class="form-row form-row form-row-wide address-field validate-required">
                                            <label for="ongkir" class="">Ongkos Kirim</label>
                                            <select name="ongkir" id="ongkir"
                                                class="country_to_state country_select ">
                                                <option value="">Pilih Ongkos Kirim&hellip;</option>
                                            </select>
                                            <small class="text-danger errorOngkir"></small>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <h3 id="order_review_heading">Detail Pesanan</h3>

                            <div id="order_review" class="woocommerce-checkout-review-order">
                                <table class="shop_table woocommerce-checkout-review-order-table">
                                    <thead>
                                        <tr>
                                            <th class="product-name"><small>Product</small></th>
                                            <th class="product-total"><small>Total</small></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($items as $row)
                                            <input type="hidden" name="product_id[]" value="{{ $row->product->id }}">
                                            <input type="hidden" name="qty[]" value="{{ $row->quantity }}">
                                            <input type="hidden" name="harga[]"
                                                value="{{ $row->product->harga_jual }}">
                                            <input type="hidden" name="cart_id[]" value="{{ $row->id }}">
                                            <tr class="cart_single">
                                                <td class="product-name">
                                                    <small> {{ $row->product->nama }}&nbsp; <strong
                                                            class="product-quantity">&times;
                                                            {{ $row->quantity }}</strong> </small>
                                                </td>
                                                <td class="product-total">
                                                    <small
                                                        class="woocommerce-Price-amount amount">{{ 'Rp ' . number_format($row->product->harga_jual * $row->quantity, 0, ',', '.') }}</small>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="cart-subtotal">
                                            <th><small>Subtotal</small></th>
                                            <td><small
                                                    class="woocommerce-Price-amount amount">{{ 'Rp ' . number_format($subtotal, 0, ',', '.') }}</small>
                                            </td>
                                        </tr>

                                        <tr class="shipping">
                                            <th><small>Ongkos Kirim</small></th>
                                            <td>
                                                <small id="pembayaran_ongkir"></small>
                                            </td>
                                        </tr>

                                        <tr class="order-total">
                                            <th><Small>Total</Small></th>
                                            <td><strong><small id="total"
                                                        class="woocommerce-Price-amount amount"></small></strong>
                                            </td>
                                            <input type="hidden" name="total_pembayaran" id="total_pembayaran">
                                        </tr>

                                    </tfoot>
                                </table>
                                <div id="payment" class="woocommerce-checkout-payment">
                                    <ul class="wc_payment_methods payment_methods methods">
                                        <li class="wc_payment_method payment_method_cheque">
                                            <span class='grop-woo-radio-style'></span>
                                            <!--custom change-->
                                            <label for="payment_method_cheque">
                                                No Rekening </label>
                                            <div class="payment_box payment_method_cheque">
                                                <table>
                                                    @forelse ($rekening as $row)
                                                        <tr>
                                                            <td><strong>{{ $row->nama_bank }}</strong></td>
                                                            <td><strong>{{ $row->no_rekening }}</strong></td>
                                                            <td>{{ $row->nama }}</td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="3">Data tidak tersedia</td>
                                                        </tr>
                                                    @endforelse
                                                </table>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="form-row place-order mt-20">
                                        <label for="payment_method_cheque">
                                            Bukti Pembayaran </label>
                                        <input type="file" class="form-control mb-3" name="bukti_pembayaran"
                                            id="bukti_pembayaran">
                                        <small class="text-danger errorBukti"></small>

                                        <button class="thm-btn thm-btn__2 no-icon br-0" type="submit" id="checkout">
                                            <span class="btn-wrap">
                                                <span>Bayar Sekarang</span>
                                                <span>Bayar Sekarang</span>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end checkout-section -->
@endsection

@section('javascript')
    <script>
        function formatCurrency(amount) {
            return 'Rp ' + parseFloat(amount).toLocaleString('id-ID', {
                minimumFractionDigits: 0
            });
        }

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var addressId = $('#address').val();
            if (addressId) {
                $.ajax({
                    url: "{{ url('/pembayaran/get-address-details/"+addressId+"') }}",
                    type: 'POST',
                    data: {
                        id: addressId
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('#provinsi').val(response.province_name);
                        $('#kota_id').val(response.city_id);
                        $('#kota').val(response.city_name);
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        console.error(xhr.status + "\n" + xhr.responseText + "\n" +
                            thrownError);
                    }
                });
            }

            $('#address').on('change', function() {
                var addressId = $(this).val();
                if (addressId) {
                    $.ajax({
                        url: "{{ url('/pembayaran/get-address-details/"+addressId+"') }}",
                        type: 'POST',
                        data: {
                            id: addressId
                        },
                        dataType: 'json',
                        success: function(response) {
                            $('#provinsi').val(response.province_name);
                            $('#kota_id').val(response.city_id);
                            $('#kota').val(response.city_name);
                            $('#ongkir').empty();
                        },
                        error: function() {
                            alert('Terjadi kesalahan saat mengambil data alamat.');
                        }
                    });
                } else {
                    $('#provinsi').val('');
                    $('#kota').val('');
                }
            });

            $('#kurir').on('change', function() {
                let kota = $('#kota_id').val();
                let kurir = $('#kurir').val();
                $('#ongkir').empty();

                $.ajax({
                    type: "POST",
                    url: "{{ route('pembayaran.check-ongkir') }}",
                    data: {
                        kota: kota,
                        kurir: kurir
                    },
                    success: function(response) {
                        $('#ongkir').html(response.ongkir);
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        console.error(xhr.status + "\n" + xhr.responseText + "\n" +
                            thrownError);
                    }
                });
            });

            $('#ongkir').on('change', function() {
                let ongkir = parseFloat($(this).val());
                let subtotal = parseFloat('{{ $subtotal }}');
                let total = subtotal + ongkir;

                $('#pembayaran_ongkir').text(formatCurrency(ongkir));
                $('#total').text(formatCurrency(total));
                $('#total_pembayaran').val(total);
            });

            $('#form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    data: new FormData(this),
                    url: "{{ route('pembayaran.storeCart') }}",
                    type: "POST",
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    cache: false,
                    beforeSend: function() {
                        $('#checkout').attr('disable', 'disabled');
                        $('#checkout').html(`<span class="btn-wrap">
                                                <span>Proses...</span>
                                                <span>Proses...</span>
                                            </span>`);
                    },
                    complete: function() {
                        $('#checkout').removeAttr('disable');
                        $('#checkout').html(`<span class="btn-wrap">
                                                <span>Bayar Sekarang</span>
                                                <span>Bayar Sekarang</span>
                                            </span>`);
                    },
                    success: function(response) {
                        if (response.errors) {

                            if (response.errors.address) {
                                $('.errorAddress').html(response.errors.address);
                            } else {
                                $('.errorAddress').html('');
                            }

                            if (response.errors.kurir) {
                                $('.errorKurir').html(response.errors.kurir);
                            } else {
                                $('.errorKurir').html('');
                            }

                            if (response.errors.ongkir) {
                                $('.errorOngkir').html(response.errors.ongkir);
                            } else {
                                $('.errorOngkir').html('');
                            }

                            if (response.errors.bukti_pembayaran) {
                                $('.errorBukti').html(response.errors.bukti_pembayaran);
                            } else {
                                $('.errorBukti').html('');
                            }

                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses',
                                text: response.message,
                            }).then(function() {
                                top.location.href = "{{ route('belanja.index') }}";
                            });
                        }
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
