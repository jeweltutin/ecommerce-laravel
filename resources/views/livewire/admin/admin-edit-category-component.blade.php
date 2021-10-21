<div>
    <div class="app-main__inner">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ route('admin.categories') }}" class="link">Category</a></li>
                <li class="item-link"><span>Edit</span></li>
            </ul>
        </div>
        <div class="row " style="padding-bottom: 15px;">      
            <div class="col-md-12">  
                 <div class="main-card card">                       
                        <div class="card-header">
                          Edit Category
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
                            <form class="" wire:Submit.prevent="updateCategory">
                                <div class="position-relative form-group">
                                    <label for="catname" class="">Category Name:</label>
                                    <input id="catname" wire:model="name" wire:keyup="generateslug" placeholder="Category Name" type="text" class="form-control">
                                    @error('name') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="position-relative form-group">
                                    <label for="catslug" class="">Password</label>
                                    <input id="catslug" placeholder="Category Slug" type="text" wire:model="slug" class="form-control">
                                    @error('slug') <span class="error">{{ $message }}</span> @enderror
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
