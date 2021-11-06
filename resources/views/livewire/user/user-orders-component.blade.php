<div>
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">Dashboard</a></li>
                <li class="item-link"><span>Orders</span></li>
            </ul>
        </div>
        <div class="row " style="padding-bottom: 15px;">      
            <div class="col-md-12">  
                 <div class="panel panel-default">                       
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h5><strong>All Orders</strong></h5>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('shop') }}" class="btn btn-success pull-right">Shop</a>
                            </div>
                        </div>              
                    </div>
                    <div class="panel-body">
                        <table class="mb-0 table table-striped table-responsive">
                            <thead>
                            <tr>
                                <th width: 10px;>OrderId</th>
                                <th>Subtotal</th>
                                <th>Discount</th>
                                <th>Tax</th>
                                <th>Total</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Zipcode</th>
                                <th>Status</th>
                                <th>Order Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order )
                                    <tr>
                                        <th scope="row">{{ $order->id }}</th>
                                        <td>৳ {{ $order->subtotal }}</td>
                                        @if ($order->discount != null AND $order->discount != '' AND $order->discount != 0)
                                            <td><div class="mb-2 mr-2 badge badge-info">{{$order->discount}}</div></td>
                                        @else
                                            <td><div class="mb-2 mr-2 badge badge-danger">N/A</div></td>
                                        @endif
                                        <td>৳ {{ $order->tax }}</td>
                                        <td><strong>৳ {{ $order->total }}</strong></td>
                                        <td>{{ $order->firstname }}</td>
                                        <td>{{ $order->lastname }}</td>
                                        <td>{{ $order->mobile }}</td>
                                        <td>{{ $order->email }}</td>
                                        <td>{{ $order->zipcode }}</td>
                                        @if($order->status == 'ordered')
                                            <td><div class="mb-2 mr-2 badge badge-primary">{{$order->status}}</div></td>
                                        @elseif($order->status == 'delivered')
                                            <td><div class="mb-2 mr-2 badge badge-success">{{$order->status}}</div></td>
                                        @else
                                            <td><div class="mb-2 mr-2 badge badge-danger">{{$order->status}}</div></td>
                                        @endif
                                        <td>{{ $order->created_at }}</td>
                                        <td>
                                            <a href="{{ route('user.orderdetails', ['order_id' => $order->id]) }}" class="btn btn-info btn-sm">Details</a>
                                            {{-- <a href="" onclick="confirm('Are you sure, You want to delete this coupon?') || event.stopImmediatePropagation()" wire:click.prevent="deleteCoupon({{ $coupon->id }})" style="margin-left:10px;"> <i class="fa fa-times fa-1x text-danger fa-2x"></i></a> --}}
                                        </td>                                 
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    
                    </div>
                </div>                              
            </div>
        </div>
    </div>
</div>
