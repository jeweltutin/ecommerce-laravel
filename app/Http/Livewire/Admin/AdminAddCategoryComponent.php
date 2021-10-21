<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use illuminate\support\Str;

class AdminAddCategoryComponent extends Component
{
    public $name;
    public $slug;

    protected $rules = [
        'name' => 'required|min:3',
        'slug' => 'required',
    ];

    public function generateslug(){
        $this->slug = Str::slug($this->name);
    }

    public function storeCategory(){
        $this->validate();

        $category = new Category();
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->save();

        session()->flash('message', 'Category created Successfully');
        //return redirect()->to('');
        return redirect()->route('admin.addcategories');
    }


    public function render()
    {
        return view('livewire.admin.admin-add-category-component')->layout('layouts.adminbase');
    }
}
