<div class="container">
    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="/" class="link">Dashboard</a></li>
            <li class="item-link"><span>Orders</span></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                    <div class="col-md-6">
                        <h5><strong>Ordered Items</strong></h5>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('user.orders') }}" class="btn btn-success pull-right">My Orders</a>
                        </div>
                    </div>   
                </div>
                <div class="panel-body">

                <div class="wrap-iten-in-cart">
                    <ul class="products-cart">
                        @foreach ($order->orderItems as $item)
                        <li class="pr-cart-item">
                            <div class="product-image">
                                <figure><img src="{{ asset('assets/images/products') }}/{{ $item->product->image }}" alt="{{ $item->product->name }}"></figure>
                            </div>
                            <div class="product-name">
                                <a class="link-to-product" href="{{ route('product.details', ['slug' => $item->product->slug]) }}">{{ $item->product->name }}</a>
                            </div>
                            <div class="price-field produtc-price"><p class="price">৳ {{ $item->price }}</p></div>
                            <div class="quantity">
                                <h5>{{ $item->quantity }}</h5>
                            </div>
                            <div class="price-field sub-total"><p class="price">৳ {{ $item->price * $item->quantity }}</p></div>

                        </li>
                        @endforeach												
                    </ul>
                </div>
                <div class="summary">
                    <div class="order-summary">
                        <h4 class="title-box text-primary">Order Summary</h4>
                        <p class="summary-info"><span class="title">Subtotal: </span><b class="index">৳ {{ $order->subtotal }} </b></p>
                        <p class="summary-info"><span class="title">Tax: </span><b class="index">৳ {{ $order->tax }} </b></p>
                        <p class="summary-info"><span class="title">Shipping: </span><b class="index">Free Shipping </b></p>
                        <p class="summary-info"><span class="title">Total: </span><b class="index">৳ {{ $order->total }} </b></p>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="padding-top:15px;">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">Billing Details</h5>
                      <table class="mb-0 table table-striped table-responsive">
                            <tr>
                                <th>First Name</th>
                                <td width="50%">{{ $order->firstname }}</td>
                                <th>Last Name</th>
                                <td>{{ $order->lastname }}</td>
                            </tr>
                            <tr>
                                <th>Mobile</th>
                                <td>{{ $order->mobile }}</td>
                                <th>Email</th>
                                <td>{{ $order->email }}</td>
                            </tr>
                            <tr>
                                <th>Line1</th>
                                <td>{{ $order->line1 }}</td>
                                <th>Line2</th>
                                <td>{{ $order->line2 }}</td>
                            </tr>
                            <tr>
                                <th>City</th>
                                <td>{{ $order->city }}</td>
                                <th>Province</th>
                                <td>{{ $order->province }}</td>
                            </tr>
                            <tr>
                                <th>Country</th>
                                <td>{{ $order->country }}</td>
                                <th>Zipcode</th>
                                <td>{{ $order->zipcode }}</td>
                            </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @if ($order->is_shipping_different)
    <div class="row" style="padding-top:15px;">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">Shipping Details</h5>
                      <table class="mb-0 table table-striped table-responsive">
                            <tr>
                                <th>First Name</th>
                                <td width="50%">{{ $order->shipping->firstname }}</td>
                                <th>Last Name</th>
                                <td>{{ $order->lastname }}</td>
                            </tr>
                            <tr>
                                <th>Mobile</th>
                                <td>{{ $order->mobile }}</td>
                                <th>Email</th>
                                <td>{{ $order->email }}</td>
                            </tr>
                            <tr>
                                <th>Line1</th>
                                <td>{{ $order->line1 }}</td>
                                <th>Line2</th>
                                <td>{{ $order->line2 }}</td>
                            </tr>
                            <tr>
                                <th>City</th>
                                <td>{{ $order->city }}</td>
                                <th>Province</th>
                                <td>{{ $order->province }}</td>
                            </tr>
                            <tr>
                                <th>Country</th>
                                <td>{{ $order->country }}</td>
                                <th>Zipcode</th>
                                <td>{{ $order->zipcode }}</td>
                            </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>            
    @endif

    <div class="row" style="padding-top:15px;">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">Transaction Info</h5>
                    <table class="mb-0 table table-striped table-responsive">
                        <tr>
                            <th width="60%">Transaction Mode</th>
                            <td>{{ $order->transaction->mode }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $order->transaction->status }}</td>
                        </tr>
                        <tr>
                            <th>Transaction Date</th>
                            <td>{{ $order->transaction->created_at }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div> 
</div>
