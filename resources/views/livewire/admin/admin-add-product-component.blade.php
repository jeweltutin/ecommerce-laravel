<div>
    <div class="app-main__inner">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ route('admin.products') }}" class="link">Product</a></li>
                <li class="item-link"><span>Add</span></li>
            </ul>
        </div>
        <div class="row " style="padding-bottom: 15px;">      
            <div class="col-md-12">  
                 <div class="main-card card">                       
                        <div class="card-header">
                          Add New Product
                        <div class="btn-actions-pane-right">
                            <a href="{{ route('admin.products') }}" class="btn btn-success pull-right">All Products</a>
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
                            <h5 class="card-title">Add Product</h5>
                            <form class="form-horozontal" wire:Submit.prevent="addProduct" enctype="multipart/form-data">
                                <div class="position-relative form-group">
                                    <label for="pname" class="">Product Name:</label>
                                    <input id="pname" wire:model="name" wire:keyup="generateSlug" placeholder="Product Name" type="text" class="form-control">
                                    @error('name') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                                <div class="position-relative form-group">
                                    <label for="pslug" class="">Product Slug</label>
                                    <input id="pslug" placeholder="Product Slug" type="text" wire:model="slug" class="form-control">
                                    @error('slug') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                                <div class="position-relative form-group">
                                    <label for="psdesc" class="">Short Description</label>
                                    <textarea id="psdesc" class="form-control" placeholder="Short Description" wire:model="short_description"></textarea>
                                    @error('short_description') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                                <div class="position-relative form-group">
                                    <label for="sdesc" class="">Description</label>
                                    <textarea id="sdesc" class="form-control" placeholder="Description"  wire:model="description"></textarea>
                                </div>
                                 <div class="position-relative form-group">
                                    <label for="rprice" class="">Regular Price</label>
                                    <input id="rprice" placeholder="Regular Price" type="text" wire:model="regular_price" class="form-control">
                                    @error('regular_price') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                                <div class="position-relative form-group">
                                    <label for="slprice" class="">Sale Price</label>
                                    <input id="slprice" placeholder="Sale Price" type="text" wire:model="sale_price" class="form-control">
                                    @error('sale_price') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                                <div class="position-relative form-group">
                                    <label for="sku" class="">SKU</label>
                                    <input id="sku" placeholder="SKU" type="text" wire:model="sku" class="form-control">
                                </div>
                                <div class="position-relative form-group">
                                    <label for="sku" class="">Stock</label>
                                    <select class="form-control" wirw:model="stock_status">
                                        <option value="instock" selected>In Stock</option>
                                        <option value="outofstock">Out of Stock</option>
                                    </select>
                                    @error('stock_status') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                                <div class="position-relative form-group">
                                    <label for="featured" class="">Featured</label>
                                    <select id="featured" class="form-control" wire:model="featured">
                                        <option value="0" selected>No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="qty" class="">Quantity</label>
                                    <input id="qty" placeholder="Quantity" type="text" wire:model="quantity" class="form-control">
                                    @error('quantity') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                                <div class="position-relative form-group">
                                    <label for="pimage" class="">Product Image</label>
                                    <input id="pimage" placeholder="Product Image" type="file" wire:model="image" class="input-file">
                                    @if($image)
                                        <img src="{{ $image->temporaryUrl() }}" width="120">
                                    @endif
                                    @error('image') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                                <div class="position-relative form-group">
                                    <label for="cat" class="">Category</label>
                                    <select id="cat" class="form-control" wire:model="category_id">
                                        <option value="" selected>Select Category</option>
                                        @foreach ($categories as $category )
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id') <p class="text-danger">{{ $message }}</p> @enderror
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
