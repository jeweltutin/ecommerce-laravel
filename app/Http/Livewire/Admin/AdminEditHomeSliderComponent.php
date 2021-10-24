<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\HomeSlider;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class AdminEditHomeSliderComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $image;
    public $status;
    public $newimage;
    public $slide_id;

    public function mount($slide_id){
        $slide = HomeSlider::find($slide_id);
        
        $this->title = $slide->title;
        $this->subtitle = $slide->subtitle;
        $this->price = $slide->price;
        $this->link = $slide->link;
        $this->image = $slide->image;
        $this->status = $slide->status;
        $this->slide_id = $slide->id;
    }

    public function updateSlide(){
        $slide = HomeSlider::find($this->slide_id);
        //dd($slide);
        $slide->title = $this->title;
        $slide->subtitle = $this->subtitle;
        $slide->price = $this->price;
        $slide->link = $this->link;
        if($this->newimage){
            $imagename = Carbon::now()->timestamp. '.' . $this->newimage->extension();
            $this->newimage->storeAs('sliders',$imagename);
            $slide->image = $imagename;
        }
        $slide->status = $this->status;

        $slide->save();
        session()->flash('message','Slide Updated Successfully');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-home-slider-component')->layout('layouts.adminbase');
    }
}
