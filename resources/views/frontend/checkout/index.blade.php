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
                        <form name="checkout" method="post" class="checkout woocommerce-checkout"
                            action="http://localhost/wp/?page_id=6" enctype="multipart/form-data">

                            <div class="col2-set" id="customer_details">
                                <div class="coll-1">
                                    <div class="woocommerce-billing-fields">

                                        <h3>Detail Pembayaran</h3>

                                        <p class="form-row form-row form-row-first validate-required"
                                            id="billing_first_name_field">
                                            <label for="billing_first_name" class="">First Name <abbr class="required"
                                                    title="required">*</abbr></label>
                                            <input type="text" class="input-text " name="billing_first_name"
                                                id="billing_first_name" placeholder="" autocomplete="given-name"
                                                value="" />
                                        </p>

                                        <p class="form-row form-row form-row-last validate-required"
                                            id="billing_last_name_field">
                                            <label for="billing_last_name" class="">Last Name <abbr class="required"
                                                    title="required">*</abbr></label>
                                            <input type="text" class="input-text " name="billing_last_name"
                                                id="billing_last_name" placeholder="" autocomplete="family-name"
                                                value="" />
                                        </p>
                                        <div class="clear"></div>

                                        <p class="form-row form-row form-row-wide" id="billing_company_field">
                                            <label for="billing_company" class="">Company Name</label>
                                            <input type="text" class="input-text " name="billing_company"
                                                id="billing_company" placeholder="" autocomplete="organization"
                                                value="" />
                                        </p>

                                        <p class="form-row form-row form-row-first validate-required validate-email"
                                            id="billing_email_field">
                                            <label for="billing_email" class="">Email Address <abbr class="required"
                                                    title="required">*</abbr></label>
                                            <input type="email" class="input-text " name="billing_email"
                                                id="billing_email" placeholder="" autocomplete="email" value="" />
                                        </p>

                                        <p class="form-row form-row form-row-last validate-required validate-phone"
                                            id="billing_phone_field">
                                            <label for="billing_phone" class="">Phone <abbr class="required"
                                                    title="required">*</abbr></label>
                                            <input type="tel" class="input-text" name="billing_phone" id="billing_phone"
                                                placeholder="" autocomplete="tel" value="" />
                                        </p>
                                        <div class="clear"></div>

                                        <p class="form-row form-row form-row-wide address-field validate-required"
                                            id="billing_address_1_field">
                                            <label for="billing_address_1" class="">Address <abbr class="required"
                                                    title="required">*</abbr></label>
                                            <input type="text" class="input-text " name="billing_address_1"
                                                id="billing_address_1" placeholder="Street address"
                                                autocomplete="address-line1" value="" />
                                        </p>

                                        <p class="form-row form-row form-row-wide address-field"
                                            id="billing_address_2_field">
                                            <input type="text" class="input-text " name="billing_address_2"
                                                id="billing_address_2"
                                                placeholder="Apartment, suite, unit etc. (optional)"
                                                autocomplete="address-line2" value="" />
                                        </p>

                                        <p class="form-row form-row address-field validate-postcode validate-required form-row-first  woocommerce-invalid-required-field"
                                            id="billing_city_field">
                                            <label for="provinsi" class="">Provinsi <abbr class="required"
                                                    title="required">*</abbr></label>
                                            <select name="provinsi" id="provinsi"
                                                class="country_to_state country_select ">
                                                <option value="">Pilih Provinsi&hellip;</option>
                                                @forelse ($provinces as $row)
                                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                @empty
                                                    <option value="">Data tidak tersedia</option>
                                                @endforelse
                                            </select>
                                        </p>

                                        <p class="form-row form-row address-field validate-postcode validate-required form-row-first  woocommerce-invalid-required-field"
                                            id="billing_city_field">
                                            <label for="kota" class="">Kota <abbr class="required"
                                                    title="required">*</abbr></label>
                                            <select name="kota" id="kota"
                                                class="country_to_state country_select ">
                                                <option value="">Pilih Kota&hellip;</option>
                                            </select>
                                        </p>

                                        <p class="form-row form-row form-row-wide address-field update_totals_on_change validate-required"
                                            id="billing_country_field">
                                            <label for="kurir" class="">Kurir <abbr class="required"
                                                    title="required">*</abbr></label>
                                            <select name="kurir" id="kurir"
                                                class="country_to_state country_select ">
                                                <option value="">Pilih Ekspedisi&hellip;</option>
                                                <option value="jne">JNE</option>
                                                <option value="pos">POS</option>
                                                <option value="tiki">TIKI</option>
                                            </select>
                                        </p>

                                        <p class="form-row form-row form-row-wide address-field validate-required">
                                            <label for="ongkir" class="">Ongkos Kirim</label>
                                            <select name="ongkir" id="ongkir"
                                                class="country_to_state country_select ">
                                                <option value="">Pilih Ongkos Kirim&hellip;</option>
                                            </select>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <h3 id="order_review_heading">Detail Pesanan</h3>

                            <div id="order_review" class="woocommerce-checkout-review-order">
                                <table class="shop_table woocommerce-checkout-review-order-table">
                                    <thead>
                                        <tr>
                                            <th class="product-name">Product</th>
                                            <th class="product-total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="cart_single">
                                            <td class="product-name">
                                                Checked Hoodies Woo&nbsp; <strong class="product-quantity">&times;
                                                    1</strong> </td>
                                            <td class="product-total">
                                                <span class="woocommerce-Price-amount amount"><span
                                                        class="woocommerce-Price-currencySymbol">&pound;</span>165.00</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr class="cart-subtotal">
                                            <th>Subtotal</th>
                                            <td><span class="woocommerce-Price-amount amount"><span
                                                        class="woocommerce-Price-currencySymbol">&pound;</span>165.00</span>
                                            </td>
                                        </tr>

                                        <tr class="shipping">
                                            <th>Shipping</th>
                                            <td data-title="Shipping">
                                                Free Shipping
                                                <input type="hidden" name="shipping_method[0]" data-index="0"
                                                    id="shipping_method_0" value="free_shipping:1"
                                                    class="shipping_method" />

                                            </td>
                                        </tr>

                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td><strong><span class="woocommerce-Price-amount amount"><span
                                                            class="woocommerce-Price-currencySymbol">&pound;</span>165.00</span></strong>
                                            </td>
                                        </tr>

                                    </tfoot>
                                </table>
                                <div id="payment" class="woocommerce-checkout-payment">
                                    <ul class="wc_payment_methods payment_methods methods">
                                        <li class="wc_payment_method payment_method_cheque">
                                            <span class='grop-woo-radio-style'></span>
                                            <!--custom change-->
                                            <label for="payment_method_cheque">
                                                Check Payments </label>
                                            <div class="payment_box payment_method_cheque">
                                                <p>Please send a check to Store Name, Store Street, Store Town, Store State
                                                    / County, Store Postcode.</p>
                                            </div>
                                        </li>
                                        <li class="wc_payment_method payment_method_paypal">
                                            <input id="payment_method_paypal" type="radio" class="input-radio"
                                                name="payment_method" value="paypal"
                                                data-order_button_text="Proceed to PayPal" />
                                            <!--grop add span for radio button style-->
                                            <span class='grop-woo-radio-style'></span>
                                            <!--custom change-->
                                            <label for="payment_method_paypal">
                                                PayPal <img src="{{ asset('frontend/assets') }}/img/icon/paypal.png"
                                                    alt="PayPal Acceptance Mark" /><a href="#!" class="about_paypal"
                                                    title="What is PayPal?">What is PayPal?</a> </label>
                                            <div class="payment_box payment_method_paypal" style="display:none;">
                                                <p>Pay via PayPal; you can pay with your credit card if you don&#8217;t have
                                                    a PayPal account.</p>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="form-row place-order mt-20">
                                        <label for="payment_method_cheque">
                                            Bukti Pembayaran </label>
                                        <input type="file" class="form-control mb-3" name="" id="">

                                        <button class="thm-btn thm-btn__2 no-icon br-0">
                                            <span class="btn-wrap">
                                                <span>Place order</span>
                                                <span>Place order</span>
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
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#provinsi').on('change', function() {
                let id_provinsi = $('#provinsi').val();

                $.ajax({
                    type: "POST",
                    url: "{{ route('pembayaran.kota') }}",
                    data: {
                        id_provinsi: id_provinsi
                    },
                    success: function(response) {
                        $('#kota').html(response);
                        $('#kurir').empty().append(`
                            <option value="">Pilih Ekspedisi&hellip;</option>
                            <option value="jne">JNE</option>
                            <option value="pos">POS</option>
                            <option value="tiki">TIKI</option>
                        `);
                        $('#ongkir').empty().append(
                            '<option value="">Pilih Ongkos Kirim&hellip;</option>');
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        console.error(xhr.status + "\n" + xhr.responseText + "\n" +
                            thrownError);
                    }
                });
            });

            $('#kota').on('change', function() {
                $('#kurir').empty().append(`
                    <option value="">Pilih Ekspedisi&hellip;</option>
                    <option value="jne">JNE</option>
                    <option value="pos">POS</option>
                    <option value="tiki">TIKI</option>
                `);
                $('#ongkir').empty().append('<option value="">Pilih Ongkos Kirim&hellip;</option>');
            });

            $('#kurir').on('change', function() {
                let kota = $('#kota').val();
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
                        $.each(response, function(i, val) {
                            let cost = val.cost[0].value;
                            let formattedCost = cost.toLocaleString('id-ID', {
                                style: 'currency',
                                currency: 'IDR',
                                minimumFractionDigits: 0
                            });
                            $('#ongkir').append(
                                `<option value="${val.cost[0].value}">${val.service} | ${val.description} | ${formattedCost} | ${val.cost[0].etd}</option> `
                            );
                        });

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
