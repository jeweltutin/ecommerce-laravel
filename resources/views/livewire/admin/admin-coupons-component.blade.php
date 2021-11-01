<div>
    <div class="app-main__inner">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">Dashboard</a></li>
                <li class="item-link"><span>Coupon</span></li>
            </ul>
        </div>
        <div class="row " style="padding-bottom: 15px;">      
            <div class="col-md-12">  
                 <div class="main-card card">                       
                        <div class="card-header">
                          All Coupon
                        <div class="btn-actions-pane-right">
                            <a href="{{ route('admin.addcoupon') }}" class="btn btn-success pull-right">Add New Coupon</a>
                        </div>                 
                </div></div>                              
            </div>
        </div>
        <div class="row" style="padding-top:15px;">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Coupon List</h5>
                        @include('includes.msgshow')
                        <table class="mb-0 table table-striped">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Coupon Code</th>
                                <th>Coupon Type</th>
                                <th>Coupon Value</th>
                                <th>Cart Value</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($coupons as $coupon )
                                    <tr>
                                        <th scope="row">{{ $coupon->id }}</th>
                                        <td>{{ $coupon->code }}</td>
                                        <td>{{ $coupon->type }}</td>
                                        @if($coupon->type == 'fixed')
                                            <td>{{ $coupon->value }}</td>
                                        @else
                                            <td>{{ $coupon->value }}</td>
                                        @endif
                                        <td>{{ $coupon->cart_value }}</td>
                                        <td>
                                            <a href="{{ route('admin.editcoupon', ['coupon_id' => $coupon->id]) }}"> <i class="fa fa-edit fa-2x"></i></a>
                                            <a href="" onclick="confirm('Are you sure, You want to delete this coupon?') || event.stopImmediatePropagation()" wire:click.prevent="deleteCoupon({{ $coupon->id }})" style="margin-left:10px;"> <i class="fa fa-times fa-1x text-danger fa-2x"></i></a>
                                        </td>                                   
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
                <div class="card widget-content bg-white">
                    {{ $coupons->links('pagination::bootstrap-4'); }}
                </div>
            </div>
        </div>
    </div>


</div>
