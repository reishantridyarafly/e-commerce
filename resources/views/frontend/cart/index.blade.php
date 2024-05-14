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
                        <form action="/" method="post">
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
                                    <tr class="cart_single">
                                        <td class="product-remove">
                                            <a href="#!" class="remove" title="Remove this item" data-product_id="8"
                                                data-product_sku="my name is">&times;</a>
                                        </td>
                                        <td class="product-thumbnail">
                                            <a href="#!">
                                                <img width="57" height="70"
                                                    src="{{ asset('frontend/assets') }}/img/product/img_178.png"
                                                    class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image"
                                                    alt="#!" />
                                            </a>
                                        </td>
                                        <td class="product-name" data-title="Product">
                                            <a href="#!">Checked Hoodies Woo</a>
                                        </td>

                                        <td class="product-price" data-title="Price">
                                            <span class="woocommerce-Price-amount amount"><span
                                                    class="woocommerce-Price-currencySymbol">&pound;</span>165.00</span>
                                        </td>
                                        <td class="product-quantity" data-title="Quantity">
                                            <div class="quantity">
                                                <input type="number" step="1" min="0"
                                                    name="cart[c9f0f895fb98ab9159f51fd0297e236d][qty]" value="2"
                                                    title="Qty"
                                                    class="product-count input-text qty text product-count form-control" />
                                            </div>
                                        </td>
                                        <td class="product-subtotal" data-title="Total">
                                            <span class="woocommerce-Price-amount amount"><span
                                                    class="woocommerce-Price-currencySymbol">&pound;</span>330.00</span>
                                        </td>
                                    </tr>
                                    <tr class="cart_single">
                                        <td class="product-remove">
                                            <a href="#!" class="remove" title="Remove this item" data-product_id="21"
                                                data-product_sku="">&times;</a>
                                        </td>

                                        <td class="product-thumbnail">
                                            <a href="">
                                                <img width="57" height="70"
                                                    src="{{ asset('frontend/assets') }}/img/product/img_179.png"
                                                    class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image"
                                                    alt="#!" />
                                            </a>
                                        </td>

                                        <td class="product-name" data-title="Product">
                                            <a href="#!">product2</a>
                                        </td>

                                        <td class="product-price" data-title="Price">
                                            <span class="woocommerce-Price-amount amount"><span
                                                    class="woocommerce-Price-currencySymbol">&pound;</span>100.00</span>
                                        </td>

                                        <td class="product-quantity" data-title="Quantity">
                                            <div class="quantity">
                                                <input type="number" step="1" min="0"
                                                    name="cart[1FjMjtzom8sQqT4RxQCTwt8xSZ8N4UKdE5][qty]" value="1"
                                                    title="Qty" class="product-count input-text qty text" />
                                            </div>
                                        </td>

                                        <td class="product-subtotal" data-title="Total">
                                            <span class="woocommerce-Price-amount amount"><span
                                                    class="woocommerce-Price-currencySymbol">&pound;</span>100.00</span>
                                        </td>
                                    </tr>
                                    <tr class="cart_single">
                                        <td class="product-remove">
                                            <a href="#!" class="remove" title="Remove this item" data-product_id="8"
                                                data-product_sku="my name is">&times;</a>
                                        </td>
                                        <td class="product-thumbnail">
                                            <a href="#!">
                                                <img width="57" height="70"
                                                    src="{{ asset('frontend/assets') }}/img/product/img_180.png"
                                                    class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image"
                                                    alt="#!" />
                                            </a>
                                        </td>
                                        <td class="product-name" data-title="Product">
                                            <a href="#!">Checked Hoodies Woo</a>
                                        </td>

                                        <td class="product-price" data-title="Price">
                                            <span class="woocommerce-Price-amount amount"><span
                                                    class="woocommerce-Price-currencySymbol">&pound;</span>165.00</span>
                                        </td>
                                        <td class="product-quantity" data-title="Quantity">
                                            <div class="quantity">
                                                <input type="number" step="1" min="0"
                                                    name="cart[c9f0f895fb98ab9159f51fd0297e236d][qty]" value="2"
                                                    title="Qty"
                                                    class="product-count input-text qty text product-count form-control" />
                                            </div>
                                        </td>
                                        <td class="product-subtotal" data-title="Total">
                                            <span class="woocommerce-Price-amount amount"><span
                                                    class="woocommerce-Price-currencySymbol">&pound;</span>330.00</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>

                        <div class="cart-collaterals">
                            <div class="cart_totals calculated_shipping">
                                <h2>Total Keranjang</h2>
                                <table class="shop_table shop_table_responsive">
                                    <tr class="cart-subtotal">
                                        <th>Subtotal</th>
                                        <td data-title="Subtotal"><span class="woocommerce-Price-amount amount">
                                                <span class="woocommerce-Price-currencySymbol">&pound;</span>430.00</span>
                                        </td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Total</th>
                                        <td data-title="Total"><strong><span class="woocommerce-Price-amount amount"><span
                                                        class="woocommerce-Price-currencySymbol">&pound;</span>430.00</span></strong>
                                        </td>
                                    </tr>
                                </table>

                                <div class="wc-proceed-to-checkout">
                                    <a href="#!"
                                        class="checkout-button thm-btn thm-btn__2 no-icon br-0 alt wc-forward">
                                        <span class="btn-wrap">
                                            <span>Proceed to Checkout</span>
                                            <span>Proceed to Checkout</span>
                                        </span>
                                    </a>
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
