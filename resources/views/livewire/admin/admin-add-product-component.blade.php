<div>
    <div class="app-main__inner">
        <div class="row "> 
            <div class="col-md-12">
                <div class="card-shadow-primary mb-1 card card-body">
                    <div class="wrap-breadcrumb">
                        <ul>
                            <li class="item-link"><a href="{{ route('admin.products') }}" class="link">Product</a></li>
                            <li class="item-link"><span>Add</span></li>
                        </ul>
                    </div>
                    
                    <div class="card-header">
                        Add New Product
                    <div class="btn-actions-pane-right">
                        <a href="{{ route('admin.products') }}" class="btn btn-success pull-right">All Products</a>
                    </div>                 
                    </div>
                </div> 
            </div>                             
        </div>
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card-shadow-primary mb-3 card card-body">
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
                        <label for="short_description" class="">Short Description</label>
                            <div wire:ignore>
                                <textarea id="short_description" class="form-control" placeholder="Short Description" rows="10" wire:model="short_description"></textarea>
                                @error('short_description') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                    </div>
                    <div class="position-relative form-group">
                        <label for="description" class="">Description</label>
                        <div wire:ignore>
                            <textarea id="description" class="form-control" placeholder="Description" rows="20"  wire:model="description"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-shadow-primary mb-3 card card-body">
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
                        <label for="cat" class="">Category</label>
                        <select id="cat" class="form-control" wire:model="category_id" wire:change="changeSubcategory">
                            <option value="" selected>Select Category</option>
                            @foreach ($categories as $category )
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>

                    <div class="position-relative form-group">
                        <label for="cat" class="">Sub Category</label>
                        <select id="cat" class="form-control" wire:model="scategory_id">
                            <option value="0" selected>Select Sub Category</option>
                            @foreach ($scategories as $scategory )
                                <option value="{{ $scategory->id }}">{{ $scategory->name }}</option>
                            @endforeach
                        </select>
                        @error('scategory_id') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>

                    <div class="position-relative form-group">
                        <label for="cat" class=""><strong>All Category</strong></label><br />
                        <div style="max-height: 200px; overflow-y: scroll;">
                            @foreach ($categories as $category )
                                <input type="checkbox" value="{{ $category->id }}" wire:model="allcategories"  /> {{ $category->name }}<br />
                                @foreach ($category->subCategories as $subcategory )
                                    &emsp;<input type="checkbox" value="{{ $subcategory->id }}" /> {{ $subcategory->name }}<br />
                                @endforeach
                            @endforeach
                            <input type="checkbox" /> This is checkbox <br />
                        </div>
                    </div>



                    <div class="position-relative form-group">
                        <label for="pimage" class="">Product Image</label>
                        <input id="pimage" placeholder="Product Image" type="file" wire:model="image" class="input-file">
                        @if($image)
                            <img src="{{ $image->temporaryUrl() }}" width="120">
                        @endif
                        @error('image') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                    <button style="width: 200px" type="submit" class="mt-1 btn btn-primary">Submit</button>
                </div>
            </div>
                <!--<div class="card widget-content bg-white">
                    <hr />
                </div>-->

        </div>
        <div class="row">
            <div class="col-md-12">
            <div class="card-shadow-primary mb-1 card card-body">
                <div class="position-relative form-group">
                    <h6><label for="igalry" class="">Product Gallery</label></h6>
                    <input id="igalry" placeholder="Product Gallery" type="file" wire:model="images" class="input-file" multiple>
                    @if($images)
                        @foreach ($images as $image )
                            <img src="{{ $image->temporaryUrl() }}" width="120">
                        @endforeach
                    @endif
                    @error('images') <p class="text-danger">{{ $message }}</p> @enderror
                </div>
            </form>
            </div>
            </div>
        </div>
        
    </div>
</div>
@push('custom-scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.tiny.cloud/1/qc7ks1e1hdcndnl9zf3ded1in47krz1nli1x9nqnynh7uapj/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
$(function(){
    tinymce.init({
        selector: '#short_description',
        setup:function(editor){
            editor.on('Change',function(e){
                tinyMCE.triggerSave();
                var sd_data = $('#short_description').val();
                @this.set('short_description', sd_data);
            });
        }
    });

    tinymce.init({
    selector: '#description',
        setup:function(editor){
            editor.on('Change',function(e){
                tinyMCE.triggerSave();
                var d_data = $('#description').val();
                @this.set('description', d_data);
            });
        }
    });
});

</script>
@endpush
