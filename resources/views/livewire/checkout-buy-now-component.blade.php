<div>
    <!--main area-->
    <main id="main" class="main-site">   
    <div class="container">   
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
                <li class="item-link"><span>Checkout</span></li>
            </ul>
        </div>
        <div class=" main-content-area">

                @if(Cart::instance('buyNowCart')->count() > 0)
                    <div class="wrap-iten-in-cart">
                        @if(Session::has('success_message'))
                            <div class="alert alert-success">
                                <strong>Success</strong> {{ Session::get('success_message') }}
                            </div>
                        @endif
                        @if(Cart::instance('buyNowCart')->count() > 0)
                            <h3 class="box-title">Products Name</h3>
                            <ul class="products-cart">
                                @foreach (Cart::instance('buyNowCart')->content() as $item)
                                <li class="pr-cart-item">
                                    <div class="product-image">
                                        <figure><img src="{{ asset('assets/images/products') }}/{{ $item->model->image }}" alt="{{ $item->model->name }}"></figure>
                                    </div>
                                    <div class="product-name">
                                        <a class="link-to-product" href="{{ route('product.details', ['slug' => $item->model->slug]) }}">{{ $item->model->name }}</a>
                                    </div>

                                    <div class="price-field produtc-price"><p class="price">৳ {{ $item->model->regular_price }}</p></div>

                                    <div class="price-field sub-total"><p class="price">৳ {{ $item->subtotal }}</p></div>
                                </li>
                                @endforeach												
                            </ul>
                            @else
                                <p>No item in cart</p>
                        @endif
                    </div>

                    @else
                    <div class="text-center" style="padding: 30px 0;">
                        <h2>Your cart is empty!</h2>
                        <p>Add items to it now</p>
                        <a href="/shop" class="btn btn-success">Shop Now</a>
                    </div>
                @endif


            <form wire:submit.prevent="placeOrder">
            <div class="row">
                <div class="col-md-12">
                    <div class="wrap-address-billing">
                        <h3 class="box-title">Billing Address</h3>
                        <div class="billing-address">
                            <p class="row-in-form">
                                <label for="fname">first name<span>*</span></label>
                                <input type="text" name="fname" value="" placeholder="Your name" wire:model="firstname">
                                @error('firstname') <span class="text-danger">{{$message}}</span> @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="lname">last name<span>*</span></label>
                                <input type="text" name="lname" value="" placeholder="Your last name" wire:model="lastname">
                                @error('lastname') <span class="text-danger">{{$message}}</span> @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="email">Email Addreess:</label>
                                <input type="email" name="email" value="" placeholder="Type your email" wire:model="email">
                                @error('email') <span class="text-danger">{{$message}}</span> @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="phone">Phone number<span>*</span></label>
                                <input type="number" name="phone" value="" placeholder="10 digits format" wire:model="mobile">
                                @error('mobile') <span class="text-danger">{{$message}}</span> @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="add">Line1:</label>
                                <input type="text" name="add" value="" placeholder="Street at apartment number" wire:model="line1">
                                @error('line1') <span class="text-danger">{{$message}}</span> @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="add">Line2:</label>
                                <input type="text" name="add" value="" placeholder="Street at apartment number" wire:model="line2">
                                @error('line2') <span class="text-danger">{{$message}}</span> @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="country">Country<span>*</span></label>
                                <input type="text" name="country" value="" placeholder="Bangladesh" wire:model="country">
                                @error('country') <span class="text-danger">{{$message}}</span> @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="country">province<span>*</span></label>
                                <input type="text" name="province" value="" placeholder="province" wire:model="province">
                                @error('province') <span class="text-danger">{{$message}}</span> @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="city">Town / City<span>*</span></label>
                                <input type="text" name="city" value="" placeholder="City name" wire:model="city">
                                @error('city') <span class="text-danger">{{$message}}</span> @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="zip-code">Postcode / ZIP:</label>
                                <input type="number" name="zip-code" value="" placeholder="Your postal code" wire:model="zipcode">
                                @error('zipcode') <span class="text-danger">{{$message}}</span> @enderror
                            </p>
                            <p class="row-in-form fill-wife">
                                <label class="checkbox-field">
                                    <input name="create-account" value="forever" type="checkbox">
                                    <span>Create an account?</span>
                                </label>
                                <label class="checkbox-field">
                                    <input name="different-add" value="1" type="checkbox" wire:model="ship_to_different">
                                    <span>Ship to a different address?</span>
                                </label>
                            </p>
                        </div>
                    </div>
                </div>
                @if ($ship_to_different)
                    <div class="col-md-12">
                        <div class="wrap-address-billing">
                            <h3 class="box-title">Shipping Address</h3>
                            <div class="billing-address">
                                <p class="row-in-form">
                                    <label for="fname">first name<span>*</span></label>
                                    <input type="text" name="fname" value="" placeholder="Your name" wire:model="s_firstname">
                                    @error('s_firstname') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="lname">last name<span>*</span></label>
                                    <input type="text" name="lname" value="" placeholder="Your last name" wire:model="s_lastname">
                                    @error('s_lastname') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="email">Email Addreess:</label>
                                    <input type="email" name="email" value="" placeholder="Type your email" wire:model="s_email">
                                    @error('s_email') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="phone">Phone number<span>*</span></label>
                                    <input type="number" name="phone" value="" placeholder="10 digits format" wire:model="s_mobile">
                                    @error('s_mobile') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="add">Line1:</label>
                                    <input type="text" name="add" value="" placeholder="Street at apartment number" wire:model="s_line1">
                                    @error('s_line1') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="add">Line2:</label>
                                    <input type="text" name="add" value="" placeholder="Street at apartment number" wire:model="s_line2">
                                    @error('s_line2') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="country">Country<span>*</span></label>
                                    <input type="text" name="country" value="" placeholder="Bangladesh" wire:model="s_country">
                                    @error('s_country') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="country">province<span>*</span></label>
                                    <input type="text" name="province" value="" placeholder="province" wire:model="s_province">
                                    @error('s_province') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="city">Town / City<span>*</span></label>
                                    <input type="text" name="city" value="" placeholder="City name" wire:model="s_city">
                                    @error('s_city') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="zip-code">Postcode / ZIP:</label>
                                    <input type="number" name="zip-code" value="" placeholder="Your postal code" wire:model="s_zipcode">
                                    @error('s_zipcode') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
    
            <div class="summary summary-checkout">
                <div class="summary-item payment-method">
                    <h4 class="title-box">Payment Method</h4>
                    <p class="summary-info"><span class="title">Check / Money order</span></p>
                    <p class="summary-info"><span class="title">Credit Cart (saved)</span></p>
                    <div class="choose-payment-methods">
                        <label class="payment-method">
                            <input name="payment-method" id="payment-method-bank" value="cod" type="radio" wire:model="paymentmode">
                            <span>Cash On Delivery</span>
                            <span class="payment-desc">Order Now Pay on Delivery</span>
                        </label>
                        <label class="payment-method">
                            <input name="payment-method" value="card" type="radio" wire:model="paymentmode">
                            <span>Debit / Credit Card Pay</span>
                            <span class="payment-desc">There are many variations of passages of Lorem Ipsum available</span>
                        </label>
                        <label class="payment-method">
                            <input name="payment-method" id="payment-method-paypal" value="paypal" type="radio" wire:model="paymentmode">
                            <span>Paypal</span>
                            <span class="payment-desc">You can pay with your credit</span>
                            <span class="payment-desc">card if you don't have a paypal account</span>
                        </label>
                        @error('paymentmode') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
    
                    @if(Session::has('checkout'))
                        <p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price">৳ {{ Session::get('checkout')['total'] }}</span></p>
                    @endif
    
                    <button type="submit" class="btn btn-medium">Place order now</button>
                </div>
                <div class="summary-item shipping-method">
                    <h4 class="title-box f-title">Shipping method</h4>
                    <p class="summary-info"><span class="title">Flat Rate</span></p>
                    <p class="summary-info"><span class="title">Fixed $50.00</span></p>
                    @if (session()->has('coupon'))
                        <p>Coupon code applied</p>
                    @else
                    <h4 class="title-box">Discount Codes</h4>
                    <p class="row-in-form">
                        <label for="coupon-code">Enter Your Coupon code:</label>
                        <input id="coupon-code" type="text" name="coupon-code" value="" placeholder="">	
                    </p>
                    @endif
                    <a href="#" class="btn btn-small">Apply</a>
                </div>
            </div>
        </form>
    
        </div><!--end main content area-->
    </div><!--end container-->
    
    </main>
    <!--main area-->
    </div>
    