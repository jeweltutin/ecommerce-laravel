<div>
    <div class="app-main__inner">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ route('admin.categories') }}" class="link">Categories Home</a></li>
                <li class="item-link"><span>Add</span></li>
            </ul>
        </div>
        <div class="row " style="padding-bottom: 15px;">      
            <div class="col-md-12">  
                 <div class="main-card card">                       
                        <div class="card-header">
                          Manage Home Categories
                        <div class="btn-actions-pane-right">
                            <a href="{{ route('admin.categories') }}" class="btn btn-success pull-right">All Categories</a>
                        </div>                 
                </div></div>                              
            </div>
        </div>
        <div class="row justify-content-center" style="padding-top:15px;">
            <div class="col-md-9">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            @include('includes.msgshow')
                            <h5 class="card-title">Manage</h5>
                            <form class="" wire:Submit.prevent="updateHomeCategory">
                                <div class="position-relative form-group">
                                    <label for="hcate" class="">Choose Categories</label>
                                    <div  wire:ignore>
                                        <select id="hcate" name="categories[]" class="sel_categories form-control" multiple="multiple" wire:model="selected_categories">
                                            @foreach ($categories as $category )
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="nop" class="">No of Products</label>
                                    <input id="nop" placeholder="Number of Products" type="text" class="form-control input-md" wire:model="numberofproducts">
                                    @error('name') <span class="error">{{ $message }}</span> @enderror
                                </div>
                             
                                <button type="submit" class="mt-1 btn btn-primary">Submit</button>
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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('.sel_categories').select2();
    $('.sel_categories').on('change', function(e){
        var data = $('.sel_categories').select2("val");
        @this.set('selected_categories',data);
    });
});
</script>
@endsection
