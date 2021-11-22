<div>
    <div class="app-main__inner">
        <div class="row " style="padding-bottom: 15px;">  
            <div class="col-md-12"> 
                <div class="card-shadow-primary mb-1 card card-body">
                    <div class="wrap-breadcrumb">
                        <ul>
                            <li class="item-link"><a href="{{ route('admin.products') }}" class="link">Product</a></li>
                            <li class="item-link"><span>Add</span></li>
                        </ul>
                    </div>                   
                    <div class="card-header">
                        Edit Product
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
                <h5 class="card-title">Edit Product</h5>
                <form class="form-horozontal" wire:Submit.prevent="updateProduct" enctype="multipart/form-data">
                    <div class="position-relative form-group">
                        <label for="pname" class="">Product Name:</label>
                        <input id="pname" wire:model="name" wire:keyup="generateSlug" placeholder="Product Name" type="text" class="form-control">
                        @error('name') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="position-relative form-group">
                        <label for="pslug" class="">Product Slug</label>
                        <input id="pslug" placeholder="Product Slug" type="text" wire:model="slug" class="form-control">
                        @error('slug') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                    <div class="position-relative form-group">
                        <label for="psdesc" class="">Short Description</label>
                        <div wire:ignore>
                            <textarea id="short_description" class="form-control" placeholder="Short Description" rows="10" wire:model="short_description"></textarea>
                            @error('short_description') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="position-relative form-group">
                        <label for="sdesc" class="">Description</label>
                        <div wire:ignore>
                            <textarea id="description" class="form-control" placeholder="Description" rows="20" wire:model="description"></textarea>
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
                        <input id="sku" placeholder="SKU" type="text" wire:model="SKU" class="form-control">
                    </div>
                    <div class="position-relative form-group">
                        <label for="sku" class="">Stock</label>
                        <select id="sku" class="form-control" wirw:model="stock_status">
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
                        <select id="cat" class="form-control" wire:model="category_id">
                            <option value="" selected>Select Category</option>
                            @foreach ($categories as $category )
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                    <div class="position-relative form-group">
                        <label for="pimage" class="">Product Image</label>
                        <input id="pimage" placeholder="Product Image" type="file" wire:model="newimage" class="input-file">
                        @if($newimage)
                            <img src="{{ $newimage->temporaryUrl() }}" width="120">
                        @else
                            <img src="{{ asset('assets/images/products') }}/{{$image}}" alt="" width="120">
                        @endif
                        @error('newimage') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                    <button type="submit" class="mt-1 btn btn-primary btn-sm">Update</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card-shadow-primary mb-1 card card-body">
                    <div class="position-relative form-group">
                        <label for="pimages" class="">Product Gallery</label>
                        <input id="pimages" type="file" wire:model="newimages" class="input-file" multiple>
                        @if($newimages)
                            @foreach ($newimages as $newimage )
                                @if ($newimage)
                                <img src="{{ $newimage->temporaryUrl() }}" width="120">
                                @endif
                            @endforeach
                        @else
                        <p>
                            @foreach ($images as $image)
                                @if ($image)
                                    <img src="{{ asset('assets/images/products') }}/{{$image}}" alt="" width="120">
                                @endif
                            @endforeach
                        </p>
                        @endif
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!--<div class="card widget-content bg-white">
    <hr />
</div>-->
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