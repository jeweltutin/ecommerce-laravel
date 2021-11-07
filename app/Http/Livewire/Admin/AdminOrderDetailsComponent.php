<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use DB;

class AdminOrderDetailsComponent extends Component
{
    public $order_id;

    public function mount($order_id){
        $this->order_id = $order_id;
        //dd($this->order_id);
    } 
    
    public function updateOrderStatus($order_id, $status){
        $order = Order::find($order_id);
        
        $order->status = $status;
        if($status == "delivered"){
            $order->delivered_date = DB::raw('CURRENT_DATE');
        }
        elseif($status == "canceled"){
            $order->canceled_date = DB::raw('CURRENT_DATE');
        }
        $order->save();
        session()->flash('order_message', 'Order status updated successfully');
    }

    public function render()
    {
        $order = Order::find($this->order_id);
        return view('livewire.admin.admin-order-details-component',compact('order'))->layout('layouts.adminbase');
    }
}
