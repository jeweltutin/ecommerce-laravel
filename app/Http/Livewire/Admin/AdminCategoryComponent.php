<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Auth;

class AdminCategoryComponent extends Component
{
    public function deleteCategory($id){
        $category = Category::find($id);
        $category->delete();
        session()->flash('message','Category has been deleted Successfully');
    }
    
    public function render()
    {
        if ( Auth::user()->user_type == 'ADM'){
            $categories = Category::paginate(5);
            return view('livewire.admin.admin-category-component', compact('categories'))->layout('layouts.adminbase');
        }
        else{           
            return view('livewire.access-denied-component')->layout('layouts.base');
        }
    }
}
