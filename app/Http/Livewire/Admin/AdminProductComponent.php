<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;

class AdminProductComponent extends Component
{
    public function deleteProduct($id){
        $product = Product::find($id);
        $images = explode(",", $product->images);

        foreach ($images as $image ){
            if ($image){
                if(file_exists(public_path('assets/images/products/'. $image))){
                    unlink(public_path('assets/images/products/'. $image));
                }           
            }             
        }

        if(file_exists(public_path('assets/images/products/'. $product->image))){
            //dd('Found');
            unlink(public_path('assets/images/products/'. $product->image));
        }
        
        //$filePath = public_path('assets/images/products/'. $product->image);
        //dd($filePath );

        $product->delete();
        //dd('deleted');

        session()->flash('message','Product Deleted Successfully');
    }

    public function render()
    {
        $products = Product::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.admin-product-component', ['products' => $products])->layout('layouts.adminbase');
    }
}
