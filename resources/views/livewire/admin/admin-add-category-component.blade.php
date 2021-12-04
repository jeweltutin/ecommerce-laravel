<div>
    <div class="app-main__inner">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ route('admin.categories') }}" class="link">Category</a></li>
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
                          Add New Category
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
                            @if (Session::has('message'))
                                <div class="alert alert-success fade show" role="alert">{{Session::get('message')}}</div>
                            @endif
                            <h5 class="card-title">Add Category</h5>
                            <form class="" wire:Submit.prevent="storeCategory">
                                <div class="position-relative form-group">
                                    <label for="catname" class="">Category Name:</label>
                                    <input id="catname" wire:model="name" wire:keyup="generateslug" placeholder="Category Name" type="text" class="form-control">
                                    @error('name') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="position-relative form-group">
                                    <label for="catslug" class="">Category Slug</label>
                                    <input id="catslug" placeholder="Category Slug" type="text" wire:model="slug" class="form-control">
                                    @error('slug') <span class="error">{{ $message }}</span> @enderror
                                </div>

                                <div class="position-relative form-group">
                                    <label for="pcat" class="">Parent Category:</label>
                                    <select class="form-control input-md" wire:model="category_id">
                                        <option value="">None</option>
                                        @foreach ($categories as $category )
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
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
