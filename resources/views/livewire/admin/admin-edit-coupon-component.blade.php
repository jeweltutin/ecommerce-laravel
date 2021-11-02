<div>
    <div class="app-main__inner">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ route('admin.coupons') }}" class="link">Coupon</a></li>
                <li class="item-link"><span>Add</span></li>
            </ul>
        </div>

        <div class="row " style="padding-bottom: 15px;">      
            <div class="col-md-12">  
                 <div class="main-card card">                       
                        <div class="card-header">
                          Edit Coupon
                        <div class="btn-actions-pane-right">
                            <a href="{{ route('admin.coupons') }}" class="btn btn-success pull-right">All Coupons</a>
                        </div>                 
                </div></div>                              
            </div>
        </div>
        <div class="row justify-content-center" style="padding-top:15px;">
            <div class="col-md-9">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            @include('includes.msgshow')
                            <h5 class="card-title">Edit Coupon</h5>
                            <form class="" wire:Submit.prevent="updateCoupon">
                                <div class="position-relative form-group">
                                    <label for="ccode" class="">Coupon code</label>
                                    <input id="ccode" wire:model="code"  placeholder="Coupon code" type="text" class="form-control">
                                    @error('code') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="position-relative form-group">
                                    <label for="ctype" class="">Coupon Type</label>
                                    <select id="ctype" class="form-control" wire:model="type">
                                        <option value="">Select</option>
                                        <option value="fixed">Fixed</option>
                                        <option value="percent">Percent</option>
                                    </select>
                                    @error('type') <span class="error">{{ $message }}</span> @enderror
                                </div>

                                <div class="position-relative form-group">
                                    <label for="cval" class="">Coupon Value</label>
                                    <input id="cval" placeholder="Coupon Value" type="text" wire:model="value" class="form-control">
                                    @error('value') <span class="error">{{ $message }}</span> @enderror
                                </div>

                                <div class="position-relative form-group">
                                    <label for="cval" class="">Cart Value</label>
                                    <input id="cval" placeholder="Cart Value" type="text" wire:model="cart_value" class="form-control">
                                    @error('cart_value') <span class="error">{{ $message }}</span> @enderror
                                </div>

                                <div class="position-relative form-group">
                                    <label for="exp-date" class="">Expiry Date</label>
                                    <input id="exp-date" placeholder="Expiry Date" type="text" wire:model="expiry_date" class="form-control">
                                    @error('expiry_date') <span class="error">{{ $message }}</span> @enderror
                                </div>

                                <div class="position-relative form-group">
                                    <label for="ulimit" class="">Usage limit</label>
                                    <input id="ulimit" placeholder="Usage limit" type="number" wire:model="usage_limit" class="form-control">
                                </div>

                                <button type="submit" class="mt-1 btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                <!--<div class="card widget-content bg-white">
                    <hr />
                </div>-->
            </div>
        </div>
    </div>
</div>

@section('style')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
<script> 
$(function () {
    $('#exp-date').datetimepicker({
        format: 'YYYY-MM-DD',

    })
    .on('dp.hide', function (ev) {
        var data = $('#exp-date').val();
        @this.set('expiry_date', data);
    });
});
</script>
@endsection
