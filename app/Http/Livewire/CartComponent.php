<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CartComponent extends Component
{
    public function increaseQuantity($rowId){
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId,$qty);
        return redirect()->route('product.cart');
    }

    public function decreaseQuantity($rowId){
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId,$qty);
        return back();
    }


    public function render()
    {
        return view('livewire.cart-component')->layout('layouts.base');
    }
}
