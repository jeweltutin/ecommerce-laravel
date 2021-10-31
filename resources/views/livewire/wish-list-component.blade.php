<div>
    <main id="main" class="main-site left-sidebar">
        <div class="container">
            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="/" class="link">home</a></li>
                    <li class="item-link"><span>Wishlist</span></li>
                </ul>
            </div>
            {{-- <div class="row">
                @if (Cart::instance('wishlist')->content()->count() > 0 )
                <ul class="product-list grid-products equal-container">
                    @foreach(Cart::instance('wishlist')->content() as $item)
                    <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                        <div class="product product-style-3 equal-elem ">
                            <div class="product-thumnail">
                                <a href="{{ route('product.details', ['slug' => $item->model->slug]) }}"
                                    title="{{ $item->model->name }}">
                                    <figure><img src="{{ asset('assets/images/products') }}/{{ $item->model->image }}"
                                            alt="{{ $item->model->name }}"></figure>
                                </a>
                            </div>
                            <div class="product-info">
                                <a href="{{ route('product.details', ['slug' => $item->model->slug]) }}"
                                    class="product-name"><span>{{ $item->model->name }}</span></a>
                                <div class="wrap-price"><span
                                        class="product-price">{{ $item->model->regular_price }}</span></div>
                                <a href="#" class="btn add-to-cart"
                                    wire:click.prevent="store( {{ $item->model->id }}, '{{ $item->model->name }}', {{ $item->model->regular_price }} )">Add
                                    To Cart</a>
                                <div class="product-wish">
                                    <a href="#" wire:click.prevent="removeFromWishlist( {{ $item->model->id }} )"><i
                                            class="fa fa-heart fill-heart"></i></a>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
                @else
                <h4>No Iitem in wishlist</h4>
                @endif
            </div> --}}


            <section id="cart-view">
                <div class="row">
                    <div class="col-md-12">
                        <div class="cart-view-area">
                            <div class="cart-view-table aa-wishlist-table">
                                <div class="table-responsive">
                                @if (Cart::instance('wishlist')->content()->count() > 0 )
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Stock Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach(Cart::instance('wishlist')->content() as $item)
                                            <tr>
                                                <td>
                                                    <a href="#" wire:click.prevent="removeFromWishlist( {{ $item->model->id }} )"><i class="fa fa-close text-danger fa-2x"></i></a>
                                                </td>
                                                <td>
                                                    <a
                                                        href="{{ route('product.details', ['slug' => $item->model->slug]) }}">
                                                        <img src="{{ asset('assets/images/products') }}/{{ $item->model->image }}"
                                                            alt="{{ $item->model->name }}">
                                                    </a>
                                                </td>
                                                <td><a class="aa-cart-title"
                                                        href="{{ route('product.details', ['slug' => $item->model->slug]) }}">{{ $item->model->name }}</a>
                                                </td>
                                                <td>{{ $item->model->regular_price }}</td>
                                                <td>{{ $item->model->stock_status }}</td>
                                                <td>
                                                    <a href="#" class="aa-add-to-cart-btn" wire:click.prevent="moveProductFromWishlistToCart( '{{ $item->rowId }}' )">Move To Cart</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        @else
                                        <h4>No Iitem in wishlist</h4>
                                        @endif
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


        </div>
    </main>

</div>

@section('style')
<style>
    .product-wish {
        position: absolute;
        top: 10%;
        left: 0;
        z-index: 99;
        right: 30px;
        text-align: right;
        padding-top: 0;
    }

    .product-wish .fa {
        color: #cbcbcb;
        font-size: 32px;
    }

    .product-wish .fa:hover {
        color: #ff7007;
    }

    .fill-heart {
        color: #ff7007 !important;
    }


    #cart-view .cart-view-area {
        display: inline;
        float: left;
        padding-top: 0;
        width: 100%;
    }

    #cart-view .cart-view-area .cart-view-table {
        background-color: #F5F5F5;
        display: inline;
        float: left;
        width: 100%;
        padding: 30px;
        min-height: 350px;
    }

    #cart-view .cart-view-area .cart-view-table .table thead tr th {
        border-bottom: 1px solid #ddd;
        border-right: 1px solid #ddd;
        color: #555;
        font-size: 18px;
        padding: 20px 0;
        text-align: center;
    }

    #cart-view .cart-view-area .cart-view-table .table tbody tr td {
        vertical-align: middle;
        border-right: 1px solid #ccc;
        text-align: center;
    }

    .table>tbody>tr>td,
    .table>tfoot>tr>td {
        padding: 8px;
        line-height: 1.42857143;
        vertical-align: top;
        border-top: 1px solid #ddd;
    }

    #cart-view .cart-view-area .cart-view-table .table tbody tr td .aa-cart-title {
        color: #f66;
        font-size: 16px;
    }
    #cart-view .cart-view-area .cart-view-table .table tbody tr td .aa-cart-title:hover {
        color: #f66;
    }

    .aa-add-to-cart-btn {
        border: 1px solid #ccc;
        color: #555;
        display: inline-block;
        font-size: 14px;
        font-weight: bold;
        letter-spacing: 0.5px;
        margin-top: 5px;
        padding: 10px 15px;
        text-transform: uppercase;
        transition: all 0.5s ease 0s;
    }

    .aa-add-to-cart-btn:hover,
    .aa-add-to-cart-btn:focus {
        color: #f66;
        border-color: #f66;
    }

    #cart-view .cart-view-area .cart-view-table .table tbody tr td img {
        width: 80px;
        height: 100px;
    }

</style>
@endsection
