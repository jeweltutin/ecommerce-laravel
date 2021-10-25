<div>
    <div class="app-main__inner">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ route('admin.categories') }}" class="link">Categories Home</a></li>
                <li class="item-link"><span>Add</span></li>
            </ul>
        </div>
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Dashboard
                        <div class="page-title-subheading">This is an example dashboard created using build-in elements
                            and components.
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom"
                        class="btn-shadow mr-3 btn btn-dark">
                        <i class="fa fa-star"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="row " style="padding-bottom: 15px;">      
            <div class="col-md-12">  
                 <div class="main-card card">                       
                        <div class="card-header">
                          Manage Home Categories
                        <div class="btn-actions-pane-right">
                            <a href="{{ route('admin.homeslider') }}" class="btn btn-success pull-right">Home Slider</a>
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
                            <form class="" wire:Submit.prevent="addSlide">
                                <div class="position-relative form-group">
                                    <label for="hcate" class="">Choose Categories</label>
                                    <select id="hcate" name="categories[]" class="sel_categories form-control" multiple="multiple">
                                        @foreach ($categories as $category )
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="nop" class="">No of Products</label>
                                    <input id="nop" placeholder="Number of Products" type="text" class="form-control input-md" wire:model="title">
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
});
</script>
@endsection
