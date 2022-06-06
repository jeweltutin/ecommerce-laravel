<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ProductAttribute;

class AdminEditAttributeComponent extends Component
{
    public $name;
    public $attr_id;

    public function mount($attr_id){
        $pattribute = ProductAttribute::find($attr_id);
        $this->attr_id = $pattribute->id;
        $this->name = $pattribute->name;
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            "name" => "required" 
        ]);
    }

    public function updateAttribute(){
        $this->validate([
            "name" => "required"
        ]);

        $pattribute = ProductAttribute::find($this->attr_id);
        $pattribute->name = $this->name;
        $pattribute->save();
        session()->flash('message', 'Attribute updated seccessfully');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-attribute-component')->layout('layouts.adminbase');
    }
}
