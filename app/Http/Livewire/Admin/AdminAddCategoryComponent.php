<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;
use illuminate\support\Str;

class AdminAddCategoryComponent extends Component
{
    public $name;
    public $slug;

    public $category_id;

    protected $rules = [
        'name' => 'required|min:3',
        'slug' => 'required|unique:categories',
    ];

    public function generateslug(){
        $this->slug = Str::slug($this->name);
    }

    public function storeCategory(){
        $this->validate();

        if($this->category_id){
            $scategory = new Subcategory();
            $scategory->name = $this->name; 
            $scategory->slug = $this->slug; 
            $scategory->category_id = $this->category_id; 
            $scategory->save(); 
        }
        else{
            $category = new Category();
            $category->name = $this->name;
            $category->slug = $this->slug;
            $category->save();
        }

        session()->flash('message', 'Category created Successfully');
        //return redirect()->to('');
        return redirect()->route('admin.addcategories');
    }


    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-add-category-component', compact('categories'))->layout('layouts.adminbase');
    }
}
