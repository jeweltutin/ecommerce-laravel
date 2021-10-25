<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\HomeSlider;

class AdminHomeSliderComponent extends Component
{
    public function deleteSlide($slide_id){
        $selectslide = HomeSlider::find($slide_id);
        if(file_exists(public_path('assets/images/sliders/'. $selectslide->image))){
            //dd('Found');
            unlink(public_path('assets/images/sliders/'. $selectslide->image));
        }
        $selectslide->delete();
        session()->flash('message', 'Slide deleted Successfully'); 
    }
    public function render()
    {
        $slides = HomeSlider::all();
        return view('livewire.admin.admin-home-slider-component', compact('slides'))->layout('layouts.adminbase');
    }
}
