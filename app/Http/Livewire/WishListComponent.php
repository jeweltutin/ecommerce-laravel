<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use Auth;

class WishListComponent extends Component
{
    public function removeFromWishlist($product_id){
        foreach(Cart::instance('wishlist')->content() as $witem){
            if ($witem->id == $product_id) {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wish-list-count-component', 'refreshComponent');
                return;
            }
        }
    }

    public function moveProductFromWishlistToCart($rowId){
        $item = Cart::instance('wishlist')->get($rowId);
        Cart::instance('wishlist')->remove($rowId);
        Cart::instance('cart')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Product');
        $this->emitTo('wish-list-count-component', 'refreshComponent');
        $this->emitTo('cart-count-component', 'refreshComponent');
    }

    public function render()
    {
        if(Auth::check())
        {
            Cart::instance('cart')->store(Auth::user()->email);
            Cart::instance('wishlist')->store(Auth::user()->email);
        }
        return view('livewire.wish-list-component')->layout('layouts.base');
    }
}
