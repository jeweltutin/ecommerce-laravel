<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupon;

class AdminAddCouponComponent extends Component
{
    public $code;
    public $type;
    public $value;
    public $cart_value;
    public $expiry_date;
    public $usage_limit;

    private function resetInput()
    {
        $this->code = null;
        $this->type = null;
        $this->value = null;
        $this->cart_value = null;
        $this->expiry_date = null;
        $this->usage_limit = null;
    }
    
    public function storeCoupon(){
        $this->validate([
            'code' => 'required|unique:coupons',
            'type' => 'required',
            'value' => 'required|numeric',
            'cart_value' => 'required|numeric',
            'expiry_date' => 'required'
        ]);

        $coupon = new Coupon();
        $coupon->code = $this->code;
        $coupon->type = $this->type;
        $coupon->value = $this->value;
        $coupon->cart_value = $this->cart_value;
        $coupon->expiry_date = $this->expiry_date;
        $coupon->usage_limit = $this->usage_limit;
        $coupon->save();
        session()->flash('message', 'Coupon created successfully');
        $this->resetInput();
    }

    public function render()
    {
        return view('livewire.admin.admin-add-coupon-component')->layout('layouts.adminbase');
    }
}
