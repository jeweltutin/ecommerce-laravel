<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class ShopComponent extends Component
{
    public function render()
    {
        $products = Product::paginate(7);
        //return view('livewire.shop-component',['products' => $products])->layout('layouts.base');
        return view('livewire.shop-component', compact('products'))->layout('layouts.base');
    }
}
