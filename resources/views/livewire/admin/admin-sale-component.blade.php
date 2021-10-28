<div>
<div class="app-main__inner" style="background-color: white;">
<div class="" style="padding: 30px 0;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default bg-success" style="padding: 5px 8px;color: white; margin-bottom: 12px;">
                <h5><strong>Sale Setting</strong></h5>
            </div>
            <div class="panel-body">
                @include('includes.msgshow')
                <div class="alert alert-info">
                    @php
                        //$mytime = Carbon\Carbon::now();
                        //$mytime->format('D M Y');
                        //echo $mytime->toDateTimeString();

                        date_default_timezone_set("Asia/Dhaka");
                        echo "The time is " . date("Y-m-d h:i:sa");
                    @endphp
                </div>
                <form class="form-horizontal" wire:submit.prevent="updateSale">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Status</label>
                        <div class="col-md-4">
                            <select class="form-control" wire:model="status">
                                <option value="0">Inactive</option>
                                <option value="1">Active</option>
                            </select>                       
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Sale Date</label>
                        <div class="col-md-4">
                            <input type="text" id="sale-date" placeholder="YYYY/MM/DD H:M:S" class="form-control input-md" wire:model="sale_date">                                       
                        </div>
                        {{-- <div class="col-md-4">
                            <input type="datetime-local" id="sale-date" class="form-control input-md" wire:model="sale_date">
                        </div> --}}
                    </div>
                     <div class="form-group">
                        <label class="col-md-4 control-label">Sale Date</label>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">Update</button>                                       
                        </div>
                    </div>
                </form>
                <hr />
            </div>
        </div>
    </div>
</div>
</div>
</div>
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
<style>
.fade {
    opacity: 1!important;
}
</style>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
<script> 
$(function () {
    $('#sale-date').datetimepicker({
        format: 'YYYY-MM-DD HH:mm',

    })
    .on('dp.hide', function (ev) {
        var data = $('#sale-date').val();
        @this.set('sale_date', data);
    });
});
</script>
@endsection
