<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;
use Auth;

class AdminCategoryComponent extends Component
{
    public function deleteCategory($id){
        $category = Category::find($id);
        $category->delete();
        session()->flash('message','Category has been deleted Successfully');
    }

    public function deleteSubcategory($id){
        $scategory = Subcategory::find($id);
        $scategory->delete();
        session()->flash('message','Subcategory has been deleted Successfully.');
    }
    
    public function render()
    {
        if ( Auth::user()->user_type == 'ADM'){
            $categories = Category::paginate(12);
            $totalCaregory = Category::count();
            $totalSubCategory = Subcategory::count();
            return view('livewire.admin.admin-category-component', compact('categories','totalCaregory','totalSubCategory'))->layout('layouts.adminbase');
        }
        else{           
            return view('livewire.access-denied-component')->layout('layouts.base');
        }
    }
}
