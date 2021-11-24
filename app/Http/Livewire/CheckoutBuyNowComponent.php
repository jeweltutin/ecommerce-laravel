<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use Auth;

class CheckoutBuyNowComponent extends Component
{
    public $ship_to_different;

    public $productId;
    public $productName;
    public $productQty;
    public $productPrice;

    public function showVal($productName){
        dd($productName);
    }

    public function verifyForCheckout(){
        if(!Auth::check()){
            return redirect()->route('login');
        }
        /* elseif($this->thankyou){
            return redirect()->route('thankyou');
        } */
        elseif(Cart::instance('buyNowCart')->count() > 0){
            return true;
        }
    }

    public function render()
    {
        $this->verifyForCheckout();
        return view('livewire.checkout-buy-now-component')->layout('layouts.base');
    }
}
