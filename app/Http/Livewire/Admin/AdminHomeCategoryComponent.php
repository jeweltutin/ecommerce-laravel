<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;

class AdminHomeCategoryComponent extends Component
{
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-home-category-component', compact('categories'))->layout('layouts.adminbase');
    }
}
