<div class="app-main__inner">
    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="/" class="link">Dashboard</a></li>
            <li class="item-link"><span>Order Details</span></li>
        </ul>
    </div>
        <div class="row">
        <div class="col-md-12">
            <div class="main-card card">
                <div class="card-header">
                    Order Details
                    <div class="btn-actions-pane-right">
                        <a href="{{ route('admin.orders') }}" class="btn btn-success pull-right">All Orders</a>
                    </div>   
                </div>
                <div class="card-body">      
                    <table class="table table-striped table-responsive">
                        <tr>
                            <th>Order Id</th>
                            <td width="14%">{{ $order->id }}</td>
                            <th>Order Date</th>
                            <td width="14%">{{ $order->created_at }}</td>
                            <th>Status</th>
                            <td width="14%">{{ $order->status }}</td>
                            @if ($order->status == "delivered" )
                                <th>Delivery Date</th>
                                <td>{{ $order->delivered_date }}</td>
                            @elseif($order->status == "canceled")
                                <th>Cancellation Date</th>
                                <td>{{ $order->canceled_date }}</td>
                            @endif
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="main-card card">
                <div class="card-header">
                    Update Status   
                </div>
                <div class="card-body">
                    <div class="order-status">
                        @if(Session::has('order_message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('order_message') }}</div>
                        @endif
                        <h4>Current Order Status :
                            @if($order->status == 'ordered')
                                    <div class="mb-2 mr-2 badge badge-primary">{{$order->status}}</div>
                                @elseif($order->status == 'delivered')
                                    <div class="mb-2 mr-2 badge badge-success">{{$order->status}}</div>
                                @else
                                    <div class="mb-2 mr-2 badge badge-danger">{{$order->status}}</div>
                            @endif
                        </h4>
                    </div>            
                    <div class="dropdown">                   
                        <div class="mb-2 mr-2 btn-group">
                            <button class="btn btn-info">Status</button>
                            <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="dropdown-toggle-split dropdown-toggle btn btn-info"><span class="sr-only">Toggle Dropdown</span></button>
                            <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu">
                                {{-- <button type="button" tabindex="0" class="dropdown-item">Menus</button>
                                <button type="button" tabindex="0" class="dropdown-item">Settings</button>
                                <button type="button" tabindex="0" class="dropdown-item">Actions</button> --}}
                                <a href="#" class="dropdown-item" wire:click.prevent="updateOrderStatus({{ $order->id }}, 'delivered')">Delivered</a>
                                <a href="#" class="dropdown-item" wire:click.prevent="updateOrderStatus({{ $order->id }}, 'canceled')">Canceled</a>
                            </div>
                        </div>
                       {{--  <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Status
                            <span class="caret"></span>
                        </button>
                        <li><a href="#">Delivered</a></li>
                        <li><a href="#">Cancelled</a></li> --}}
                    </div>
                    <div class="wrap-iten-in-cart">
                        <h3 class="title-box text-primary">Orderd Item(s)</h3>
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

@section('style')
<style>
.order-status{
    text-align: center;
    padding: 10px 0 0 0;
    background-color: blanchedalmond;
    color: chocolate;
    border: 2px dotted;
}
.dropdown{
    text-align: center;
}
button.btn.btn-info {
    margin-top: 20px;
}
</style>
@endsection
