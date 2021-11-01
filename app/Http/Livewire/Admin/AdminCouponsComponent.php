<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupon;

class AdminCouponsComponent extends Component
{
    public function deleteCoupon($coupon_id){
        $coupon = Coupon::find($coupon_id);
        $coupon->delete();
        session()->flash('message', 'Coupon deleted Successfully');
    }
    public function render()
    {
        //$coupons = Coupon::all();
        $coupons = Coupon::paginate(10);
        return view('livewire.admin.admin-coupons-component', compact('coupons'))->layout('layouts.adminbase');
    }
}
