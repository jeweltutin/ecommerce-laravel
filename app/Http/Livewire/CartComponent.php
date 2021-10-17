<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use Session;

class CartComponent extends Component
{
    public function increaseQuantity($rowId){
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId,$qty);
    }

    public function decreaseQuantity($rowId){
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId,$qty);
    }

    public function destroy($rowId){
        Cart::remove($rowId);
        //session()->flash('success_message','Item Has been removed');
        //Session::flash('success_message', 'Item Has been removed');
        return redirect()->back()->with('success_message', 'Product Removed from cart');
    }

    public function destroyAll(){
        Cart::destroy();
    }

    public function render(){
        $cartitems = Cart::content();
        return view('livewire.cart-component', compact('cartitems'))->layout('layouts.base');
    }

}
