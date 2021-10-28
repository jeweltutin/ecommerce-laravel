<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;

class AdminEditCategoryComponent extends Component
{
    public $category_slug;
    public $catgory_id;
    public $name;
    public $slug;

    protected $rules = [
        'name' => 'required|min:3',
        'slug' => 'required',
    ];

    public function mount($category_slug){
        $this->category_slug = $category_slug;
        $category = Category::where('slug', $category_slug)->first();
        $this->category_id = $category->id;
        $this->name = $category->name;
        $this->slug = $category->slug;
    }

    public function generateslug(){
        $this->slug = Str::slug($this->name);
    }

    public function updateCategory(){
        $this->validate();
        $category = Category::find($this->category_id);
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->save();
        session()->flash('message', 'Category has been updated Successfully');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-category-component')->layout('layouts.adminbase');
    }
}