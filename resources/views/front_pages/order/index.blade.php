@extends('layouts.master')


@section('content')
<div id="portfolio">

    <div class="section-title text-center center">
        <div class="overlay">
            <h2>order</h2>
            <hr>
            <p> your are welcome.</p>
        </div>
    </div>

    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="woocommerce-info">Have a coupon? <a class="showcoupon" data-toggle="collapse" href="#coupon-collapse-wrap" aria-expanded="false" aria-controls="coupon-collapse-wrap">Click here to enter your code</a>
                            </div>

                            <form id="coupon-collapse-wrap" method="post" class="checkout_coupon collapse">

                                <p class="form-row form-row-first">
                                    <input type="text" value="" id="coupon_code" placeholder="Coupon code" class="input-text" name="coupon_code">
                                </p>

                                <p class="form-row form-row-last">
                                    <input type="submit" value="Apply Coupon" name="apply_coupon" class="button">
                                </p>

                                <div class="clear"></div>
                            </form>

                            <form enctype="multipart/form-data" action="{{ route('order.store')}}" class="checkout" method="post" name="checkout">
                                @csrf
                                <div id="customer_details" class="col2-set">

                                    <div class="col-1">
                                        <div class="woocommerce-shipping-fields">

                                            <div class="shipping_address" style="display: block;">

                                                <p id="shipping_first_name_field" class="form-row form-row-first validate-required">
                                                    <label class="" for="shipping_first_name">First Name <abbr title="required" class="required">*</abbr>
                                                    </label>
                                                    <input type="text" value="" placeholder="" id="shipping_first_name" name="first_name" class="input-text ">
                                                </p>

                                                <p id="shipping_last_name_field" class="form-row form-row-last validate-required">
                                                    <label class="" for="shipping_last_name">Last Name <abbr title="required" class="required">*</abbr>
                                                    </label>
                                                    <input type="text" value="" placeholder="" id="shipping_last_name" name="last_name" class="input-text ">
                                                </p>
                                                <div class="clear"></div>

                                                <p id="" class="form-row form-row-wide">
                                                    <label class="" for="shipping_company">Total Price</label>
                                                    <input type="text" value="{{ Cart::getTotal() }}" placeholder="" id="shipping_company" name="total" class="input-text" readonly>
                                                </p>

                                                <p id="shipping_address_1_field" class="form-row form-row-wide address-field validate-required">
                                                    <label class="" for="shipping_address_1">Address <abbr title="required" class="required">*</abbr>
                                                    </label>
                                                    <input type="text" value="" placeholder="Street address" id="shipping_address_1" name="address_1" class="input-text">
                                                </p>

                                                <p id="shipping_address_2_field" class="form-row form-row-wide address-field">
                                                    <input type="text" value="" placeholder=" (optional)" id="shipping_address_2" name="address_2" class="input-text ">
                                                </p>

                                                <p id="shipping_city_field" class="form-row form-row-wide address-field validate-required" data-o_class="form-row form-row-wide address-field validate-required">
                                                    <label class="" for="shipping_city">Town / City <abbr title="required" class="required">*</abbr>
                                                    </label>
                                                    <input type="text" value="" placeholder="Town / City" id="shipping_city" name="city" class="input-text ">
                                                </p>

                                                <p id="shipping_state_field" class="form-row form-row-first address-field validate-state" data-o_class="form-row form-row-first address-field validate-state">
                                                    <label class="" for="shipping_state">County</label>
                                                    <input type="text" id="shipping_state" name="country" placeholder="State / County" value="" class="input-text ">
                                                </p>
                                                <p id="shipping_postcode_field" class="form-row form-row-last address-field validate-required validate-postcode" data-o_class="form-row form-row-last address-field validate-required validate-postcode">
                                                    <label class="" for="shipping_postcode">Postcode <abbr title="required" class="required">*</abbr>
                                                    </label>
                                                    <input type="text" value="" placeholder="Postcode / Zip" id="shipping_postcode" name="postcode" class="input-text ">
                                                </p>

                                                <div class="clear"></div>


                                            </div>


                                            <p id="order_comments_field" class="form-row notes">
                                                <label class="" for="order_comments">Order Notes</label>
                                                <textarea cols="5" rows="2" placeholder="Notes about your order, e.g. special notes for delivery." id="order_comments" class="input-text " name="note"></textarea>
                                            </p>

                                        </div>
                                    </div>

                                    <div class="col-2">
                                        <h3 id="order_review_heading">Your order</h3>

                                        <div id="order_review" style="position: relative;">
                                            <table class="shop_table">
                                                <thead>
                                                    <tr>
                                                        <th class="product-name">Product</th>
                                                        <th class="product-total">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="cart_item">
                                                        <td class="product-name">
                                                            Ship Your Idea <strong class="product-quantity">× {{ Cart::getTotalQuantity()}}</strong> </td>
                                                        <td class="product-total">
                                                            <span class="amount">£ {{ Cart::getTotal() }}</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>

                                                    <tr class="cart-subtotal">
                                                        <th>Cart Subtotal</th>
                                                        <td><span class="amount">£ {{ Cart::getTotal() }}</span>
                                                        </td>
                                                    </tr>

                                                    <tr class="shipping">
                                                        <th>Shipping and Handling</th>
                                                        <td>

                                                            Free Shipping
                                                            <input type="hidden" class="shipping_method" value="free" id="shipping_method_0" data-index="0" name="shipping_status">
                                                        </td>
                                                    </tr>


                                                    <tr class="order-total">
                                                        <th>Order Total</th>
                                                        <td><strong><span class="amount">£ {{ Cart::getTotal() }}</span></strong> </td>
                                                    </tr>

                                                </tfoot>
                                            </table>


                                            <div id="payment">
                                                <ul class="payment_methods methods">
                                                    <li class="payment_method_bacs">
                                                        <input type="radio" data-order_button_text="" checked="checked" value="1" name="payment_status" class="input-radio" id="payment_method_bacs">
                                                        <label for="payment_method_bacs">Direct Bank Transfer </label>
                                                        <div class="payment_box payment_method_bacs">
                                                            <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                                        </div>
                                                    </li>
                                                    <li class="payment_method_cheque">
                                                        <input type="radio" data-order_button_text="" value="2" name="payment_status" class="input-radio" id="payment_method_cheque">
                                                        <label for="payment_method_cheque">Cheque Payment </label>
                                                        <div style="display:none;" class="payment_box payment_method_cheque">
                                                            <p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                                        </div>
                                                    </li>
                                                    <li class="payment_method_paypal">
                                                        <input type="radio" data-order_button_text="Proceed to PayPal" value="3" name="payment_status" class="input-radio" id="payment_method_paypal">
                                                        <label for="payment_method_paypal">PayPal <img alt="PayPal Acceptance Mark" src="https://www.paypalobjects.com/webstatic/mktg/Logo/AM_mc_vs_ms_ae_UK.png"><a title="What is PayPal?" onclick="javascript:window.open('https://www.paypal.com/gb/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;" class="about_paypal" href="https://www.paypal.com/gb/webapps/mpp/paypal-popup">What is PayPal?</a>
                                                        </label>
                                                        <div style="display:none;" class="payment_box payment_method_paypal">
                                                            <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                                        </div>
                                                    </li>
                                                </ul>

                                                <div class="form-row place-order">

                                                    <input type="submit" data-value="Place order" value="Place order" id="place_order" name="woocommerce_checkout_place_order" class="button alt">

                                                </div>

                                                <div class="clear"></div>

                                            </div>
                                        </div>

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

@endsection



@section('css')

<link rel="stylesheet" href="{{ asset ('assets/cart/css/owl.carousel.css')}}">
<link rel="stylesheet" href="{{ asset ('assets/cart/css/style.css')}}">
<link rel="stylesheet" href="{{ asset ('assets/cart/css/responsive.css')}}">

@endsection


@section('js')

<script src="{{ asset('assets/cart/js/owl.carousel.min.js')}}"></script>
<script src="{{ asset('assets/cart/js/jquery.sticky.js')}}"></script>
<script src="{{ asset('assets/cart/js/jquery.easing.1.3.min.js')}}"></script>
<script src="{{ asset('assets/cart/js/main.js')}}"></script>
@endsection