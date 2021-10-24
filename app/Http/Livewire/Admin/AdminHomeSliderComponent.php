<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\HomeSlider;

class AdminHomeSliderComponent extends Component
{
    public function render()
    {
        $slides = HomeSlider::all();
        return view('livewire.admin.admin-home-slider-component', compact('slides'))->layout('layouts.adminbase');
    }
}
