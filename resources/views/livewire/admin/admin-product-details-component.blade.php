<div class="app-main__inner">
    <div class="row " style="padding-bottom: 15px;">      
        <div class="col-md-12">  
                <div class="main-card card">                       
                    <div class="card-header">
                        Product Details
                    <div class="btn-actions-pane-right">
                        <a href="{{ route('admin.products') }}" class="btn btn-success pull-right">All Products</a>
                    </div>                 
            </div></div>                              
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="mb-3 card text-white card-body bg-primary">
                <h5 class="text-white card-title">Product Name</h5>
                {{ $product->name }}
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3 card text-white card-body bg-primary">
                <h5 class="text-white card-title">Regular Price</h5>
                {{ $product->regular_price }}
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3 card text-white card-body bg-primary">
                <h5 class="text-white card-title">Sale Price</h5>
                {{ $product->sale_price }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="card-shadow-primary border mb-3 card card-body border-primary">
                <h5 class="card-title">Stock Status</h5>
                {{ $product->stock_status }}
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-shadow-primary border mb-3 card card-body border-primary">
                <h5 class="card-title">Quantity</h5>
                {{ $product->quantity }}
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-shadow-primary border mb-3 card card-body border-primary">
                <h5 class="card-title">Category</h5>
                {{ $product->category->name }}
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-shadow-primary border mb-3 card card-body border-primary">
                <h5 class="card-title">Date & Time</h5>
                {{ $product->created_at }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card-shadow-primary border mb-3 card card-body border-success">
                <h5 class="card-title text-info">Product Image</h5>
                <div class="text-center">
                    <img src="{{ asset('assets/images/products') }}/{{$product->image}}" width="40%">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-stripped">
                <thead>
                    <th>SKU</th>
                    <th>Featured</th>
                    <th>Last Updated</th>
                </thead>
                <tr>
                    <td>
                        {{ $product->SKU }}
                    </td>
                    <td>
                        {{ $product->featured }}
                    </td>
                    <td>
                        {{ $product->updated_at }}
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card-shadow-primary border mb-3 card card-body border-success">
                <h5 class="card-title text-info">Product summary</h5>
                {!! $product->short_description !!}
            </div>
        </div>
        <div class="col-md-12">
            <div class="card-shadow-primary border mb-3 card card-body border-success">
                <h5 class="card-title text-info">Product Description</h5>
                {!! $product->description !!}
            </div>
        </div>
    </div>
</div>

