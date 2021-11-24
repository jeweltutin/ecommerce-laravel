<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use Cart;
use Auth;

class CheckoutBuyNowComponent extends Component
{
    public $ship_to_different;

    public $firstname;
    public $lastname;
    public $email;
    public $mobile;
    public $line1;
    public $line2;
    public $city;
    public $province;
    public $country;
    public $zipcode;

    public $s_firstname;
    public $s_lastname;
    public $s_email;
    public $s_mobile;
    public $s_line1;
    public $s_line2;
    public $s_city;
    public $s_province;
    public $s_country;
    public $s_zipcode;

    public $paymentmode;
    public $thankyou;

    public function placeOrder(){
        $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'line1' => 'required',
            //'line2' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'zipcode' => 'required',
            'paymentmode' => 'required'
       ]);


        $tax = Cart::instance('buyNowCart')->tax();
        $subtotal =  Cart::instance('buyNowCart')->subtotal();
        $total =  Cart::instance('buyNowCart')->total();

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->subtotal = $subtotal;
        //$order->discount = session()->get('checkout')['discount'];
        $order->tax = $tax;
        $order->total = $total;

        $order->firstname = $this->firstname;
        $order->lastname = $this->lastname;
        $order->email = $this->email;
        $order->mobile = $this->mobile;
        $order->line1 = $this->line1;
        $order->line2 = $this->line2;
        $order->city = $this->city;
        $order->province = $this->province;
        $order->country = $this->country;
        $order->zipcode = $this->zipcode;
        $order->status = 'ordered';
        $order->is_shipping_different = $this->ship_to_different ? 1 : 0;
        $order->save();

        foreach(Cart::instance('buyNowCart')->content() as $item){
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            $orderItem->save();
        }

        if($this->paymentmode == 'cod'){
            $transaction = new Transaction();
            $transaction->user_id = Auth::user()->id;
            $transaction->order_id = $order->id;
            $transaction->mode = 'cod';
            $transaction->status = 'pending';
            $transaction->save();
        }
        
        $this->thankyou = 1;
        Cart::instance('buyNowCart')->destroy();
        
        //dd($total);
    }

    public function verifyForCheckout(){
        if(!Auth::check()){
            return redirect()->route('login');
        }
        elseif($this->thankyou){
            return redirect()->route('thankyou');
        }
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
