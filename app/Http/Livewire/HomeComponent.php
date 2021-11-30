<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\HomeSlider;
use App\Models\Product;
use App\Models\HomeCategory;
use App\Models\Category;
use App\Models\Sale;
use Cart;
use Auth;

class HomeComponent extends Component
{
    public function render()
    {
        $slides = HomeSlider::where('status',1)->get();
        $latestproducts = Product::orderBy('created_at','DESC')->get()->take(8);
        $saleproducts = Product::where('sale_price', '>', 0)->inrandomOrder()->get()->take(8);
        $saletimer = Sale::find(1);

        $homecatshow = HomeCategory::find(1);
        $catseparate = explode(',', $homecatshow->sel_categories);
        $selectcategories = Category::whereIn('id',$catseparate)->orderBy('name')->get();
        $productstoshow = $homecatshow->no_of_products;

        if (Auth::check()) {
            Cart::instance('cart')->restore(Auth::user()->email);
        }

        return view('livewire.home-component', compact(['slides','latestproducts','selectcategories','productstoshow','saleproducts','saletimer']))->layout('layouts.base');
    }
}
