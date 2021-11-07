<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\category;
use Cart;

class SearchComponent extends Component
{
    public $shorting;
    public $pagesize;

    public $min_price;
    public $max_price;

    public $search;
    public $product_cat;
    public $product_cat_id;

    public function mount(){
        $this->sorting = "default";
        $this->pagesize = 12;

        $this->min_price = 1;
        $this->max_price = 1000;

        $this->fill(request()->only('search','product_cat','product_cat_id'));
    }

    public function store($product_id, $product_name, $product_price){
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added in Cart');
        return redirect()->route('product.cart');
    }

    public function addToWishlist($product_id, $product_name, $product_price){
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        $this->emitTo('wish-list-count-component', 'refreshComponent');
    }

    public function removeFromWishlist($product_id){
        foreach(Cart::instance('wishlist')->content() as $witem){
            if ($witem->id == $product_id) {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wish-list-count-component', 'refreshComponent');
                return;
            }
        }
    }

    //use WithPagination;
    public function render()
    {
        if($this->sorting == 'date'){
            $products = Product::where('name','like','%'. $this->search . '%')->where('category_id','like','%' . $this->product_cat_id . '%')->whereBetween('regular_price', [$this->min_price, $this->max_price])->orderBy('created_at', 'DESC')->paginate($this->pagesize);
        }
        elseif($this->sorting == 'price'){
            $products = Product::where('name','like','%'. $this->search . '%')->where('category_id','like','%' . $this->product_cat_id . '%')->whereBetween('regular_price', [$this->min_price, $this->max_price])->orderBy('regular_price', 'ASC')->paginate($this->pagesize);
        }
        elseif($this->sorting == 'price-desc'){
            $products = Product::where('name','like','%'. $this->search . '%')->where('category_id','like','%' . $this->product_cat_id . '%')->whereBetween('regular_price', [$this->min_price, $this->max_price])->orderBy('regular_price', 'DESC')->paginate($this->pagesize);
        }
        else{
            $products = Product::where('name','like','%'. $this->search . '%')->where('category_id','like','%' . $this->product_cat_id . '%')->whereBetween('regular_price', [$this->min_price, $this->max_price])->paginate($this->pagesize);
        }

        $categories = Category::all();
        return view('livewire.search-component', compact(['products','categories']))->layout('layouts.base');
    }
}
