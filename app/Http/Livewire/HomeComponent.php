<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\HomeSlider;
use App\Models\Product;

class HomeComponent extends Component
{
    public function render()
    {
        $slides = HomeSlider::where('status',1)->get();
        $latestproducts = Product::orderBy('created_at','DESC')->get()->take(8);
        return view('livewire.home-component', compact(['slides','latestproducts']))->layout('layouts.base');
    }
}
