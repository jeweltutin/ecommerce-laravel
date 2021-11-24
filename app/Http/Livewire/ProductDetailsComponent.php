<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Sale;
use Cart;

class ProductDetailsComponent extends Component
{
    public $slug;
    public $qty;

    //For direct buy Now
    public $productId;
    public $productName;
    public $productQty;
    public $productPrice;

    public function mount($slug){
        $this->slug = $slug;
        $this->qty = 1;
    }

    public function store($product_id, $product_name, $product_price){
        Cart::instance('cart')->add($product_id, $product_name, $this->qty, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added in Cart');
        return redirect()->route('product.cart');
    }

    public function increaseQuantity(){      
        $this->qty++;
    }

    public function decreseQuantity(){
        if($this->qty > 1){
            $this->qty--;
        }
    }

    public function buyNowAddCart($product_id, $product_name, $product_price){
        if (Cart::instance('buyNowCart')->count() > 0){
            Cart::instance('buyNowCart')->destroy();
        }
        Cart::instance('buyNowCart')->add($product_id, $product_name, $this->qty, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added in Cart');
        return redirect()->route('checkout.buynow');
    }

    public function render()
    {
        $product = Product::where('slug', $this->slug)->first();
        $popular_products = Product::inRandomOrder()->limit(4)->get();
        $related_products = Product::where('category_id',$product->category_id)->inRandomOrder()->limit(8)->get();
        $sale = Sale::find(1);
        return view('livewire.product-details-component', ['product' => $product, 'popular_products' => $popular_products, 'related_products' => $related_products, 'sale' => $sale ])->layout('layouts.base');
    }
}
