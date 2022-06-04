<div>
    <div class="app-main__inner">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ route('admin.categories') }}" class="link">Attribute</a></li>
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
                    <div>Analytics Dashboard
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
                          Add New Attribute
                        <div class="btn-actions-pane-right">
                            <a href="{{ route('admin.attributes') }}" class="btn btn-success pull-right">All Attributes</a>
                        </div>                 
                </div></div>                              
            </div>
        </div>
        <div class="row justify-content-center" style="padding-top:15px;">
            <div class="col-md-9">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            @if (Session::has('message'))
                                <div class="alert alert-success fade show" role="alert">{{Session::get('message')}}</div>
                            @endif
                            <h5 class="card-title">Add Attribute</h5>
                            <form class="" wire:Submit.prevent="storeAttribute">
                                <div class="position-relative form-group">
                                    <label for="attrname" class="">Name:</label>
                                    <input id="attrname" wire:model="name" placeholder="Attribute Name" type="text" class="form-control">
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
<style>
.app-main .app-main__inner {
    overflow: hidden;
}
</style>
@endsection
