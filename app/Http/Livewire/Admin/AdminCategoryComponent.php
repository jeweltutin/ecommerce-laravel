<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;

class AdminCategoryComponent extends Component
{
    public function deleteCategory($id){
        $category = Category::find($id);
        $category->delete();
        session()->flash('message','Category has been deleted Successfully');
    }
    
    public function render()
    {
        $categories = Category::paginate(5);
        return view('livewire.admin.admin-category-component', compact('categories'))->layout('layouts.adminbase');
    }
}
