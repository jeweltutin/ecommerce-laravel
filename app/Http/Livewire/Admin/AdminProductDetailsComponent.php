<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;

class AdminProductDetailsComponent extends Component
{
    public function mount($product_id){
        $this->product_id = $product_id;
    }

    public function render()
    {
        $product = Product::find($this->product_id);
        return view('livewire.admin.admin-product-details-component', compact('product'))->layout('layouts.adminbase');
    }
}
