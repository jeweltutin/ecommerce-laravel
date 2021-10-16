<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use Session;

class CartComponent extends Component
{
    public function render()
    {
        return view('livewire.cart-component')->layout('layouts.base');
    }
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

    public function destroy($rowId){
        Cart::remove($rowId);
        //session()->flash('success_message','Item Has been removed');
        //Session::flash('success_message', 'Item Has been removed');
        return redirect()->back()->with('success_message', 'Product Removed from cart');
    }

    public function destroyAll(){
        Cart::destroy();
    }



}
