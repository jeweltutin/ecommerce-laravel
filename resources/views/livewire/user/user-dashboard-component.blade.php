<div class="content">   
    <style>
        .content {
          padding-top: 40px;
          padding-bottom: 40px;
        }
        .icon-stat {
            display: block;
            overflow: hidden;
            position: relative;
            padding: 15px;
            margin-bottom: 1em;
            background-color: #fff;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
        .icon-stat-label {
            display: block;
            color: #999;
            font-size: 13px;
        }
        .icon-stat-value {
            display: block;
            font-size: 28px;
            font-weight: 600;
        }
        .icon-stat-visual {
            position: relative;
            top: 22px;
            display: inline-block;
            width: 32px;
            height: 32px;
            border-radius: 4px;
            text-align: center;
            font-size: 16px;
            line-height: 30px;
        }
        .bg-primary {
            color: #fff;
            background: #d74b4b;
        }
        .bg-secondary {
            color: #fff;
            background: #6685a4;
        }
        
        .icon-stat-footer {
            padding: 10px 0 0;
            margin-top: 10px;
            color: #aaa;
            font-size: 12px;
            border-top: 1px solid #eee;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">    
              <div class="icon-stat">    
                <div class="row">
                  <div class="col-xs-8 text-left">
                    <span class="icon-stat-label">Total Cost</span>
                    <span class="icon-stat-value">৳{{$totalCost}}</span>
                  </div>   
                  <div class="col-xs-4 text-center">
                    <i class="fa fa-gift icon-stat-visual bg-primary"></i>
                  </div>
                </div>    
                <div class="icon-stat-footer">
                  <i class="fa fa-clock-o"></i> Updated Now
                </div>    
              </div>    
            </div>    
            <div class="col-md-3 col-sm-6">    
              <div class="icon-stat">    
                <div class="row">
                  <div class="col-xs-8 text-left">
                    <span class="icon-stat-label">Total Purchase</span>
                    <span class="icon-stat-value">{{$totalPurchase}}</span>
                  </div>    
                  <div class="col-xs-4 text-center">
                    <i class="fa fa-check-square-o icon-stat-visual bg-secondary"></i>
                  </div>
                </div>    
                <div class="icon-stat-footer">
                  <i class="fa fa-clock-o"></i> Updated Now
                </div>   
              </div>
            </div>
            <div class="col-md-3 col-sm-6">    
              <div class="icon-stat">    
                <div class="row">
                  <div class="col-xs-8 text-left">
                    <span class="icon-stat-label">Total Delivered</span>
                    <span class="icon-stat-value">{{$totalDelivered}}</span>
                  </div>    
                  <div class="col-xs-4 text-center">
                    <i class="fa fa-sun-o icon-stat-visual bg-primary"></i>
                  </div>
                </div>    
                <div class="icon-stat-footer">
                  <i class="fa fa-clock-o"></i> Updated Now
                </div>
              </div>    
            </div>    
            <div class="col-md-3 col-sm-6">    
              <div class="icon-stat">    
                <div class="row">
                  <div class="col-xs-8 text-left">
                    <span class="icon-stat-label">Total Canceled</span>
                    <span class="icon-stat-value">{{$totalCanceled}}</span>
                  </div>    
                  <div class="col-xs-4 text-center">
                    <i class="fa fa-gift icon-stat-visual bg-secondary"></i>
                  </div>
                </div>    
                <div class="icon-stat-footer">
                  <i class="fa fa-clock-o"></i> Updated Now
                </div>    
              </div>    
            </div>    
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
