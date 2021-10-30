<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use Session;

class CartComponent extends Component
{
    public function increaseQuantity($rowId){
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId,$qty);
    }

    public function decreaseQuantity($rowId){
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId,$qty);
    }

    public function destroy($rowId){
        Cart::instance('cart')->remove($rowId);
        //session()->flash('success_message','Item Has been removed');
        //Session::flash('success_message', 'Item Has been removed');
        return redirect()->back()->with('success_message', 'Product Removed from cart');
    }

    public function destroyAll(){
        Cart::instance('cart')->destroy();
    }

    public function render(){
        $cartitems = Cart::instance('cart')->content();
        return view('livewire.cart-component', compact('cartitems'))->layout('layouts.base');
    }

}
