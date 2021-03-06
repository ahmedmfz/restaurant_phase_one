@extends('layouts.master')


@section('css')

<link rel="stylesheet" href="{{ asset ('assets/cart/css/owl.carousel.css')}}">
<link rel="stylesheet" href="{{ asset ('assets/cart/css/style.css')}}">
<link rel="stylesheet" href="{{ asset ('assets/cart/css/responsive.css')}}">
<!-- noty -->
<link rel="stylesheet" href="{{asset('dashboard/assets/noty/noty.css')}}">
<!-- noty js  -->
<script src="{{asset('dashboard/assets/noty/noty.min.js')}}"></script>

@endsection

@section('content')
<div id="portfolio">

    <div class="section-title text-center center">
        <div class="overlay">
            <h2>Cart</h2>
            <hr>
            <p> your are welcome.</p>
        </div>
    </div>

    <div class="single-product-area ">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">

                <div class="col-md-12 ">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            @if(Cart::getTotalQuantity() != 0 )
                            
                                <table cellspacing="0" class="shop_table cart" id="cont_all_items_table">
                                    <thead>
                                        <tr>
                                            <th class="product-remove">action</th>
                                            <th class="product-thumbnail">image</th>
                                            <th class="product-name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cartItems as $item)
                                        <tr class="cart_item" id="item_cart_cont_{{$item->id}}">
                                            <td class="product-remove">

                                                <button type="button" class="px-4 py-2 text-white bg-red-600 remove" onclick="remove_item_cart('{{$item->id}}')">x</button>

                                            </td>

                                            <td class="product-thumbnail">
                                                <a href="single-product.html"><img width="145" height="145" alt="soap" class="shop_thumbnail" src="{{asset('assets/img/portfolio/01-large.jpg')}}"></a>
                                            </td>

                                            <td class="product-name">
                                                <a href="single-product.html">{{$item->name}}</a>
                                            </td>

                                            <td class="product-price">
                                                <span class="amount">?? <span id="price_{{$item->id}}">{{$item->price}}</span></span>
                                            </td>

                                            <td class="product-quantity">
                                                <div class="quantity buttons_added">
                                                    <input type="button" class="minus" value="-" onclick="decrement_quantity('{{$item->id}}')">
                                                    <input type="number" size="4" class="input-text qty text text-center" title="Qty" value="{{$item->quantity}}" min="0" step="1" id="input-quantity-{{$item->id}}" readonly>
                                                    <input type="button" class="plus" value="+" onclick="increment_quantity('{{$item->id}}')">
                                                </div>
                                                <div class="spinner-border text-success" role="status">
                                                    <span class="visually-hidden"></span>
                                                </div>
                                            </td>

                                            <td class="product-subtotal">
                                                <span class="amount" id="total_price_item_{{$item->id}}">?? {{ $item->price * $item->quantity}}</span>
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td class="actions" colspan="6">
                                                <div class="coupon">
                                                    <label for="coupon_code" class="tx-28">Coupon : </label>
                                                    <input type="text" placeholder="Coupon code" id="coupon_code" class="input-text" name="coupon_code">
                                                    <input type="submit" value="Apply Coupon" name="apply_coupon" class="button">
                                                </div>
                                                <input type="button" value="Cancel Order"  class="checkout-button-custom button" onclick="destroy_all_items()">
                                                <a href="{{ route('order')}}" name="proceed" class="checkout-button-custom button"> checkout</a>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            
                            @else
                            <div id="sorry_message">
                                <div class='alert alert-danger text-center'>
                                     <h2 class='m-5'>Sorry you donot have items check Menu</h2>
                                </div>
                            </div>
                            @endif

                            <div class="cart-collaterals">


                                <div class="cross-sells ">
                                    <h2>You may be interested in...</h2>
                                    <ul class="products">
                                        <li class="product">
                                            <a href="single-product.html">
                                                <img width="325" height="325" alt="T_4_front" class="attachment-shop_catalog wp-post-image" src="{{asset('assets/img/portfolio/03-large.jpg')}}">
                                                <h3>Ship Your Idea</h3>
                                                <span class="price"><span class="amount">?? 20.00</span></span>
                                            </a>

                                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="22" rel="nofollow" href="single-product.html">Select options</a>
                                        </li>

                                        <li class="product">
                                            <a href="single-product.html">
                                                <img width="325" height="325" alt="T_4_front" class="attachment-shop_catalog wp-post-image" src="{{asset('assets/img/portfolio/02-large.jpg')}}">
                                                <h3>Ship Your Idea</h3>
                                                <span class="price"><span class="amount">?? 20.00</span></span>
                                            </a>

                                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="22" rel="nofollow" href="single-product.html">Select options</a>
                                        </li>
                                    </ul>
                                </div>

                                @if(Cart::getTotalQuantity() != 0 )
                                <div id="all_items_math">
                                    <div class="cart_totals ">
                                        <h2>Cart Totals</h2>

                                        <table cellspacing="0">
                                            <tbody>
                                                <tr class="cart-subtotal">
                                                    <th>Cart Subtotal</th>
                                                    <td><span class="amount">?? {{ Cart::getTotal() }}</span></td>
                                                </tr>

                                                <tr class="shipping">
                                                    <th>Shipping and Handling</th>
                                                    <td>Free Shipping</td>
                                                </tr>

                                                <tr class="order-total">
                                                    <th>Order Total</th>
                                                    <td><strong><span class="amount">?? {{ Cart::getTotal() }}</span></strong> </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>


                                    <form method="post" action="#" class="shipping_calculator">
                                        <h2><a class="shipping-calculator-button" data-toggle="collapse" href="#calcalute-shipping-wrap" aria-expanded="false" aria-controls="calcalute-shipping-wrap">Calculate Shipping</a></h2>

                                        <section id="calcalute-shipping-wrap" class="shipping-calculator-form collapse">

                                            <p class="form-row form-row-wide">
                                                <select rel="calc_shipping_state" class="country_to_state" id="calc_shipping_country" name="calc_shipping_country">
                                                    <option value="">Select a country???</option>
                                                    <option value="AX">??land Islands</option>
                                                    <option value="AF">Afghanistan</option>
                                                    <option value="AL">Albania</option>
                                                    <option value="DZ">Algeria</option>
                                                    <option value="AD">Andorra</option>
                                                    <option value="AO">Angola</option>
                                                    <option value="AI">Anguilla</option>
                                                    <option value="AQ">Antarctica</option>
                                                    <option value="AG">Antigua and Barbuda</option>
                                                    <option value="AR">Argentina</option>
                                                    <option value="AM">Armenia</option>
                                                    <option value="AW">Aruba</option>
                                                    <option value="AU">Australia</option>
                                                    <option value="AT">Austria</option>
                                                    <option value="AZ">Azerbaijan</option>
                                                    <option value="BS">Bahamas</option>
                                                    <option value="BH">Bahrain</option>
                                                    <option value="BD">Bangladesh</option>
                                                    <option value="BB">Barbados</option>
                                                    <option value="BY">Belarus</option>
                                                    <option value="PW">Belau</option>
                                                    <option value="BE">Belgium</option>
                                                    <option value="BZ">Belize</option>
                                                    <option value="BJ">Benin</option>
                                                    <option value="BM">Bermuda</option>
                                                    <option value="BT">Bhutan</option>
                                                    <option value="BO">Bolivia</option>
                                                    <option value="BQ">Bonaire, Saint Eustatius and Saba</option>
                                                    <option value="BA">Bosnia and Herzegovina</option>
                                                    <option value="BW">Botswana</option>
                                                    <option value="BV">Bouvet Island</option>
                                                    <option value="BR">Brazil</option>
                                                    <option value="IO">British Indian Ocean Territory</option>
                                                    <option value="VG">British Virgin Islands</option>
                                                    <option value="BN">Brunei</option>
                                                    <option value="BG">Bulgaria</option>
                                                    <option value="BF">Burkina Faso</option>
                                                    <option value="BI">Burundi</option>
                                                    <option value="KH">Cambodia</option>
                                                    <option value="CM">Cameroon</option>
                                                    <option value="CA">Canada</option>
                                                    <option value="CV">Cape Verde</option>
                                                    <option value="KY">Cayman Islands</option>
                                                    <option value="CF">Central African Republic</option>
                                                    <option value="TD">Chad</option>
                                                    <option value="CL">Chile</option>
                                                    <option value="CN">China</option>
                                                    <option value="CX">Christmas Island</option>
                                                    <option value="CC">Cocos (Keeling) Islands</option>
                                                    <option value="CO">Colombia</option>
                                                    <option value="KM">Comoros</option>
                                                    <option value="CG">Congo (Brazzaville)</option>
                                                    <option value="CD">Congo (Kinshasa)</option>
                                                    <option value="CK">Cook Islands</option>
                                                    <option value="CR">Costa Rica</option>
                                                    <option value="HR">Croatia</option>
                                                    <option value="CU">Cuba</option>
                                                    <option value="CW">Cura??ao</option>
                                                    <option value="CY">Cyprus</option>
                                                    <option value="CZ">Czech Republic</option>
                                                    <option value="DK">Denmark</option>
                                                    <option value="DJ">Djibouti</option>
                                                    <option value="DM">Dominica</option>
                                                    <option value="DO">Dominican Republic</option>
                                                    <option value="EC">Ecuador</option>
                                                    <option value="EG">Egypt</option>
                                                    <option value="SV">El Salvador</option>
                                                    <option value="GQ">Equatorial Guinea</option>
                                                    <option value="ER">Eritrea</option>
                                                    <option value="EE">Estonia</option>
                                                    <option value="ET">Ethiopia</option>
                                                    <option value="FK">Falkland Islands</option>
                                                    <option value="FO">Faroe Islands</option>
                                                    <option value="FJ">Fiji</option>
                                                    <option value="FI">Finland</option>
                                                    <option value="FR">France</option>
                                                    <option value="GF">French Guiana</option>
                                                    <option value="PF">French Polynesia</option>
                                                    <option value="TF">French Southern Territories</option>
                                                    <option value="GA">Gabon</option>
                                                    <option value="GM">Gambia</option>
                                                    <option value="GE">Georgia</option>
                                                    <option value="DE">Germany</option>
                                                    <option value="GH">Ghana</option>
                                                    <option value="GI">Gibraltar</option>
                                                    <option value="GR">Greece</option>
                                                    <option value="GL">Greenland</option>
                                                    <option value="GD">Grenada</option>
                                                    <option value="GP">Guadeloupe</option>
                                                    <option value="GT">Guatemala</option>
                                                    <option value="GG">Guernsey</option>
                                                    <option value="GN">Guinea</option>
                                                    <option value="GW">Guinea-Bissau</option>
                                                    <option value="GY">Guyana</option>
                                                    <option value="HT">Haiti</option>
                                                    <option value="HM">Heard Island and McDonald Islands</option>
                                                    <option value="HN">Honduras</option>
                                                    <option value="HK">Hong Kong</option>
                                                    <option value="HU">Hungary</option>
                                                    <option value="IS">Iceland</option>
                                                    <option value="IN">India</option>
                                                    <option value="ID">Indonesia</option>
                                                    <option value="IR">Iran</option>
                                                    <option value="IQ">Iraq</option>
                                                    <option value="IM">Isle of Man</option>
                                                    <option value="IL">Israel</option>
                                                    <option value="IT">Italy</option>
                                                    <option value="CI">Ivory Coast</option>
                                                    <option value="JM">Jamaica</option>
                                                    <option value="JP">Japan</option>
                                                    <option value="JE">Jersey</option>
                                                    <option value="JO">Jordan</option>
                                                    <option value="KZ">Kazakhstan</option>
                                                    <option value="KE">Kenya</option>
                                                    <option value="KI">Kiribati</option>
                                                    <option value="KW">Kuwait</option>
                                                    <option value="KG">Kyrgyzstan</option>
                                                    <option value="LA">Laos</option>
                                                    <option value="LV">Latvia</option>
                                                    <option value="LB">Lebanon</option>
                                                    <option value="LS">Lesotho</option>
                                                    <option value="LR">Liberia</option>
                                                    <option value="LY">Libya</option>
                                                    <option value="LI">Liechtenstein</option>
                                                    <option value="LT">Lithuania</option>
                                                    <option value="LU">Luxembourg</option>
                                                    <option value="MO">Macao S.A.R., China</option>
                                                    <option value="MK">Macedonia</option>
                                                    <option value="MG">Madagascar</option>
                                                    <option value="MW">Malawi</option>
                                                    <option value="MY">Malaysia</option>
                                                    <option value="MV">Maldives</option>
                                                    <option value="ML">Mali</option>
                                                    <option value="MT">Malta</option>
                                                    <option value="MH">Marshall Islands</option>
                                                    <option value="MQ">Martinique</option>
                                                    <option value="MR">Mauritania</option>
                                                    <option value="MU">Mauritius</option>
                                                    <option value="YT">Mayotte</option>
                                                    <option value="MX">Mexico</option>
                                                    <option value="FM">Micronesia</option>
                                                    <option value="MD">Moldova</option>
                                                    <option value="MC">Monaco</option>
                                                    <option value="MN">Mongolia</option>
                                                    <option value="ME">Montenegro</option>
                                                    <option value="MS">Montserrat</option>
                                                    <option value="MA">Morocco</option>
                                                    <option value="MZ">Mozambique</option>
                                                    <option value="MM">Myanmar</option>
                                                    <option value="NA">Namibia</option>
                                                    <option value="NR">Nauru</option>
                                                    <option value="NP">Nepal</option>
                                                    <option value="NL">Netherlands</option>
                                                    <option value="AN">Netherlands Antilles</option>
                                                    <option value="NC">New Caledonia</option>
                                                    <option value="NZ">New Zealand</option>
                                                    <option value="NI">Nicaragua</option>
                                                    <option value="NE">Niger</option>
                                                    <option value="NG">Nigeria</option>
                                                    <option value="NU">Niue</option>
                                                    <option value="NF">Norfolk Island</option>
                                                    <option value="KP">North Korea</option>
                                                    <option value="NO">Norway</option>
                                                    <option value="OM">Oman</option>
                                                    <option value="PK">Pakistan</option>
                                                    <option value="PS">Palestinian Territory</option>
                                                    <option value="PA">Panama</option>
                                                    <option value="PG">Papua New Guinea</option>
                                                    <option value="PY">Paraguay</option>
                                                    <option value="PE">Peru</option>
                                                    <option value="PH">Philippines</option>
                                                    <option value="PN">Pitcairn</option>
                                                    <option value="PL">Poland</option>
                                                    <option value="PT">Portugal</option>
                                                    <option value="QA">Qatar</option>
                                                    <option value="IE">Republic of Ireland</option>
                                                    <option value="RE">Reunion</option>
                                                    <option value="RO">Romania</option>
                                                    <option value="RU">Russia</option>
                                                    <option value="RW">Rwanda</option>
                                                    <option value="ST">S??o Tom?? and Pr??ncipe</option>
                                                    <option value="BL">Saint Barth??lemy</option>
                                                    <option value="SH">Saint Helena</option>
                                                    <option value="KN">Saint Kitts and Nevis</option>
                                                    <option value="LC">Saint Lucia</option>
                                                    <option value="SX">Saint Martin (Dutch part)</option>
                                                    <option value="MF">Saint Martin (French part)</option>
                                                    <option value="PM">Saint Pierre and Miquelon</option>
                                                    <option value="VC">Saint Vincent and the Grenadines</option>
                                                    <option value="SM">San Marino</option>
                                                    <option value="SA">Saudi Arabia</option>
                                                    <option value="SN">Senegal</option>
                                                    <option value="RS">Serbia</option>
                                                    <option value="SC">Seychelles</option>
                                                    <option value="SL">Sierra Leone</option>
                                                    <option value="SG">Singapore</option>
                                                    <option value="SK">Slovakia</option>
                                                    <option value="SI">Slovenia</option>
                                                    <option value="SB">Solomon Islands</option>
                                                    <option value="SO">Somalia</option>
                                                    <option value="ZA">South Africa</option>
                                                    <option value="GS">South Georgia/Sandwich Islands</option>
                                                    <option value="KR">South Korea</option>
                                                    <option value="SS">South Sudan</option>
                                                    <option value="ES">Spain</option>
                                                    <option value="LK">Sri Lanka</option>
                                                    <option value="SD">Sudan</option>
                                                    <option value="SR">Suriname</option>
                                                    <option value="SJ">Svalbard and Jan Mayen</option>
                                                    <option value="SZ">Swaziland</option>
                                                    <option value="SE">Sweden</option>
                                                    <option value="CH">Switzerland</option>
                                                    <option value="SY">Syria</option>
                                                    <option value="TW">Taiwan</option>
                                                    <option value="TJ">Tajikistan</option>
                                                    <option value="TZ">Tanzania</option>
                                                    <option value="TH">Thailand</option>
                                                    <option value="TL">Timor-Leste</option>
                                                    <option value="TG">Togo</option>
                                                    <option value="TK">Tokelau</option>
                                                    <option value="TO">Tonga</option>
                                                    <option value="TT">Trinidad and Tobago</option>
                                                    <option value="TN">Tunisia</option>
                                                    <option value="TR">Turkey</option>
                                                    <option value="TM">Turkmenistan</option>
                                                    <option value="TC">Turks and Caicos Islands</option>
                                                    <option value="TV">Tuvalu</option>
                                                    <option value="UG">Uganda</option>
                                                    <option value="UA">Ukraine</option>
                                                    <option value="AE">United Arab Emirates</option>
                                                    <option selected="selected" value="GB">United Kingdom (UK)</option>
                                                    <option value="US">United States (US)</option>
                                                    <option value="UY">Uruguay</option>
                                                    <option value="UZ">Uzbekistan</option>
                                                    <option value="VU">Vanuatu</option>
                                                    <option value="VA">Vatican</option>
                                                    <option value="VE">Venezuela</option>
                                                    <option value="VN">Vietnam</option>
                                                    <option value="WF">Wallis and Futuna</option>
                                                    <option value="EH">Western Sahara</option>
                                                    <option value="WS">Western Samoa</option>
                                                    <option value="YE">Yemen</option>
                                                    <option value="ZM">Zambia</option>
                                                    <option value="ZW">Zimbabwe</option>
                                                </select>
                                            </p>

                                            <p class="form-row form-row-wide"><input type="text" id="calc_shipping_state" name="calc_shipping_state" placeholder="State / county" value="" class="input-text"> </p>

                                            <p class="form-row form-row-wide"><input type="text" id="calc_shipping_postcode" name="calc_shipping_postcode" placeholder="Postcode / Zip" value="" class="input-text"></p>


                                            <p><button class="button" value="1" name="calc_shipping" type="submit">Update Totals</button></p>

                                        </section>
                                    </form>
                                
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



@section('js')

<script src="{{ asset('assets/cart/js/owl.carousel.min.js')}}"></script>
<script src="{{ asset('assets/cart/js/jquery.sticky.js')}}"></script>
<script src="{{ asset('assets/cart/js/jquery.easing.1.3.min.js')}}"></script>
<script src="{{ asset('assets/cart/js/main.js')}}"></script>

<script>
    function increment_quantity(cart_id) {
        var inputQuantityElement = $("#input-quantity-" + cart_id);
        var newQuantity = parseInt($(inputQuantityElement).val()) + 1;
        save_to_db(cart_id, newQuantity);
    }

    function decrement_quantity(cart_id) {
        var inputQuantityElement = $("#input-quantity-" + cart_id);
        if ($(inputQuantityElement).val() > 1) {
            var newQuantity = parseInt($(inputQuantityElement).val()) - 1;
            save_to_db(cart_id, newQuantity);
        }else{
           
            new Noty({
                type: 'error',
                layout: 'topRight',
                text: "min quantity 1",
                theme: 'metroui',
                timeout: 2500,
                killer: true
            }).show();
   
        }
    }

    // update item in cart
    function save_to_db(cart_id, new_quantity) {

        var inputQuantityElement = $("#input-quantity-" + cart_id);
        var inputPriceItem = $("#price_" + cart_id).text();
        var inputTotalPriceItem = $("#total_price_item_" + cart_id);
        var data = {
            'id': cart_id,
            'quantity': new_quantity,
            "_token": "{{ csrf_token() }}",
        }
        $.ajax({
            url: "{{ route('cart.update')}}",
            data: data,
            type: 'post',
            success: function(response) {
                $(inputQuantityElement).val(new_quantity);
                $('#cart').text(response.data);
                inputTotalPriceItem.text('?? ' + (parseInt(inputPriceItem) * parseInt(response.qty)));
                new Noty({
                    type: 'success',
                    layout: 'topRight',
                    text: "You updated cart successfully",
                    theme: 'sunset',
                    timeout: 2500,
                    killer: true
                }).show();
            }
        });
    }
   
    // remove item from cart
    function remove_item_cart(product_id) {

        var data = {
            'id': product_id,
            "_token": "{{ csrf_token() }}",
        }

        $.ajax({
            url: "{{  route('cart.remove')}}",
            data: data,
            type: 'post',
            success: function(response) {
                $('#cart').text(response.data);
                $('#item_cart_cont_'+product_id).remove();
                if($('#cart').text() == 0){
                    $('#cont_all_items_table').remove();
                    $('#all_items_math').remove();
                }
                new Noty({
                    type: 'success',
                    layout: 'topRight',
                    text: "You deleted item  successfully",
                    theme: 'sunset',
                    timeout: 2500,
                    killer: true
                }).show();
            }
        });
    }

    function destroy_all_items(){
        

        var data = {
            "_token": "{{ csrf_token() }}",
        }

        $.ajax({
            url: "{{  route('cart.clear')}}",
            data: data,
            type: 'post',
            success: function(response) {
                $('#cart').text(response.data);
                $('#cont_all_items_table').remove();
                $('#all_items_math').remove();
                new Noty({
                    type: 'success',
                    layout: 'topRight',
                    text: "You Cancel order successfully",
                    theme: 'sunset',
                    timeout: 2500,
                    killer: true
                }).show();
            }
        });
    }

</script>
@endsection