<div>
    <main id="main">
        <div class="container">
            <!--MAIN SLIDE-->
            <div class="wrap-main-slide">
                <div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true"
                    data-dots="false">
                    @foreach ($slides as $slide )
                    <div class="item-slide">
                        <img src="{{ asset('assets/images/sliders') }}/{{ $slide->image }}" alt="" class="img-slide">
                        <div class="slide-info slide-1">
                            <h2 class="f-title">{!! $slide->title !!}</h2>
                            <span class="subtitle">{{ $slide->subtitle }}</span>
                            <p class="sale-info">{!! $slide->price !!}</p>
                            <a href="{{ $slide->link }}" class="btn-link">Shop Now</a>
                        </div>
                    </div>
                    @endforeach
                    {{--<div class="item-slide">
						<img src="{{ asset('assets/images/main-slider-1-1.jpg') }}" alt="" class="img-slide">
                        <div class="slide-info slide-1">
                            <h2 class="f-title">Kid Smart <b>Watches</b></h2>
                            <span class="subtitle">Compra todos tus productos Smart por internet.</span>
                            <p class="sale-info">Only price: <span class="price">$59.99</span></p>
                            <a href="#" class="btn-link">Shop Now</a>
                        </div>
                    </div>
                    <div class="item-slide">
                        <img src="{{ asset('assets/images/main-slider-1-2.jpg') }}" alt="" class="img-slide">
                        <div class="slide-info slide-2">
                            <h2 class="f-title">Extra 25% Off</h2>
                            <span class="f-subtitle">On online payments</span>
                            <p class="discount-code">Use Code: #FA6868</p>
                            <h4 class="s-title">Get Free</h4>
                            <p class="s-subtitle">TRansparent Bra Straps</p>
                        </div>
                    </div>
                    <div class="item-slide">
                        <img src="{{ asset('assets/images/main-slider-1-3.jpg') }}" alt="" class="img-slide">
                        <div class="slide-info slide-3">
                            <h2 class="f-title">Great Range of <b>Exclusive Furniture Packages</b></h2>
                            <span class="f-subtitle">Exclusive Furniture Packages to Suit every need.</span>
                            <p class="sale-info">Stating at: <b class="price">$225.00</b></p>
                            <a href="#" class="btn-link">Shop Now</a>
                        </div>
                    </div> --}}
            </div>
        </div>

        <!--BANNER-->
        <div class="wrap-banner style-twin-default">
            <div class="banner-item">
                <a href="#" class="link-banner banner-effect-1">
                    <figure><img src="{{ asset('assets/images/home-1-banner-1.jpg') }}" alt="" width="580" height="190">
                    </figure>
                </a>
            </div>
            <div class="banner-item">
                <a href="#" class="link-banner banner-effect-1">
                    <figure><img src="{{ asset('assets/images/home-1-banner-2.jpg') }}" alt="" width="580" height="190">
                    </figure>
                </a>
            </div>
        </div>

        <!--On Sale-->
        @if($saleproducts)->count() > 0)
        <div class="wrap-show-advance-info-box style-1 has-countdown">
            <h3 class="title-box">On Sale</h3>
            <div class="wrap-countdown mercado-countdown" data-expire="2020/12/12 12:34:56"></div>
            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5"
                data-loop="false" data-nav="true" data-dots="false"
                data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                @foreach ($saleproducts as $slproduct )
                <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                        <a href="{{ route('product.details', ['slug' => $slproduct ->slug]) }}" title="{{ $slproduct->name }}">
                            <figure><img src="{{ asset('assets/images/products') }}/{{ $slproduct->image }}" width="800" height="800" alt=""></figure>
                        </a>
                        <div class="group-flash">
                            <span class="flash-item sale-label">sale</span>
                        </div>
                        <div class="wrap-btn">
                            <a href="#" class="function-link">quick view</a>
                        </div>
                    </div>
                    <div class="product-info">
                        <a href="{{ route('product.details', ['slug' => $slproduct ->slug]) }}" class="product-name"><span>{{ $slproduct->name }}</span></a>
                        <div class="wrap-price">
                            <ins><p class="product-price">{{ $slproduct->sale_price }}</p></ins> 
                            <del><p class="product-price">{{ $slproduct->regular_price }}</p></del>
                        </div>
                    </div>
                </div>
                @endforeach               
            </div>
        </div>
        @else
            <p>No products On sale </p>
        @endif

        <!--Latest Products-->
        <div class="wrap-show-advance-info-box style-1">
            <h3 class="title-box">Latest Products</h3>
            <div class="wrap-top-banner">
                <a href="#" class="link-banner banner-effect-2">
                    <figure><img src="{{ asset('assets/images/digital-electronic-bann') }}er.jpg" width="1170"
                            height="240" alt=""></figure>
                </a>
            </div>
            <div class="wrap-products">
                <div class="wrap-product-tab tab-style-1">
                    <div class="tab-contents">
                        <div class="tab-content-item active" id="digital_1a">
                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                                @foreach ($latestproducts as $lp )
                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{ route('product.details', ['slug' => $lp ->slug]) }}"
                                            title="{{ $lp->name }}">
                                            <figure><img src="{{ asset('assets/images/products') }}/{{ $lp->image }}"
                                                    width="800" height="800"
                                                    alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                        </a>
                                        {{-- <div class="group-flash">
													<span class="flash-item new-label">new</span>
													<span class="flash-item sale-label">sale</span>
													<span class="flash-item bestseller-label">Bestseller</span>
												</div>
												<div class="wrap-btn">
													<a href="#" class="function-link">quick view</a>
										</div> --}}
                                    </div>
                                    <div class="product-info">
                                        <a href="{{ route('product.details', ['slug' => $lp ->slug]) }}"
                                            class="product-name"><span>{{ $lp->name }}</span></a>
                                        <div class="wrap-price"><span
                                                class="product-price">{{ $lp->regular_price }}</span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Product Categories-->
        <div class="wrap-show-advance-info-box style-1">
            <h3 class="title-box">Product Categories</h3>
            <div class="wrap-top-banner">
                <a href="#" class="link-banner banner-effect-2">
                    <figure><img src="assets/images/fashion-accesories-banner.jpg" width="1170" height="240" alt="">
                    </figure>
                </a>
            </div>
            <div class="wrap-products">
                <div class="wrap-product-tab tab-style-1">
                    <div class="tab-control">
                        @foreach ($selectcategories as $key => $cattab )
                        <a href="#tab_{{ $cattab->id }}" class="tab-control-item {{ $key==0 ? 'active' : ''}}">{{ $cattab->name }}</a>
                        @endforeach
                    </div>
                    <div class="tab-contents">
                        @foreach ($selectcategories as $key => $category)

                        <div class="tab-content-item {{ $key==0 ? 'active' : ''}}" id="tab_{{ $category->id }}">
                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                                @php
                                $categories_products = DB::table('products')->where('category_id',$category->id)->get()->take($productstoshow);
                                @endphp
                                @foreach ($categories_products as $key => $cproduct)
                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{ route('product.details', ['slug' => $cproduct->slug ])}}" title="{{ $cproduct->name }}">
                                            <figure>
                                            <img src="{{ asset('assets/images/products') }}/{{ $cproduct->image }}" width="800" height="800" alt="{{ $cproduct->name }}">
                                            </figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item bestseller-label">Bestseller</span>
                                            <span class="flash-item new-label">new</span>
                                            <span class="flash-item sale-label">sale</span>
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="#" class="function-link">quick view</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{ route('product.details', ['slug' => $cproduct->slug ])}}"
                                            title="{{ $cproduct->name }}"
                                            class="product-name"><span>{{ $cproduct->name }}</span></a>
                                        <div class="wrap-price">
                                            <span class="product-price">{{ $cproduct->regular_price }}</span>
                                        </div>
                                        <div class="product-rating">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
</div>
</main>
</div>
