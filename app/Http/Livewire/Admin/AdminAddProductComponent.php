<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class AdminAddProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $sku;
    public $stock_status;
    public $featured;
    public $quantity;
    public $image;
    public $category_id;
    public $images;
    public $scategory_id;

    public $selectedcategories = [];
    public $selectedsubcategories = [];

    protected $rules = [
         'name' => 'required',
         'slug' => 'required|unique:products',
         'short_description' => 'required',
         'regular_price' => 'required|numeric',
         'sale_price' => 'nullable|numeric',
         'stock_status' => 'required',
         'quantity' => 'required|numeric',
         'image' => 'required|mimes:jpeg,png,jpg|max:2048',   //Maximaum 2MB size image
         'category_id' => 'required'
    ];

    public function mount(){
        $this->stock_status = 'instock';
        $this->featured = 0;
    }

    public function generateSlug(){
        $this->slug = Str::slug($this->name, '-');
    }

    public function addProduct(){
        
        $this->validate();

        /* $product = Product::create([
            'name' => $this->name,
            'slug' => $this->slug,
            'short_description' => $this->short_description,
            'description' => 'This is description',
            'regular_price' => 1500,
            'sku' => 'DDff',
            'stock_status' => 1,
            'featured' => 0,
            'quantity' => 100,
            //'category_id' => 10
        ]);
        $product->productInCategories()->attach($this->allcategories);
        $product->save();
        dd($this->allcategories); */
        
        $product = new Product();
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->sku = $this->sku;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;

        $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('products',$imageName);
        $product->image = $imageName;

        if($this->images){
            $imagesName = '';
            foreach($this->images as $key=>$image){
                $imgName = Carbon::now()->timestamp. $key. '.' . $image->extension();
                $image->storeAs('products', $imgName);
                $imagesName = $imagesName . ',' . $imgName;
            }
            $product->images = $imagesName;
        }

        $product->category_id = $this->category_id;

        if ($this->scategory_id) {
            $product->subcategory_id = $this->scategory_id;
        }

        $product->save();

        if($this->selectedcategories){
            $product->productInCategories()->attach($this->selectedcategories);
        }

        if($this->selectedsubcategories){
            $product->productInSubCategories()->attach($this->selectedsubcategories);
        }
        
        session()->flash('message', 'Product Created Successfully');
    }

    public function changeSubcategory(){
        $this->scatagory_id = 0;
    }

    public function render()
    {
        //$categories = Category::all();
        $categories = Category::with('subcategories')->get();
        $scategories = Subcategory::where('category_id',$this->category_id)->get();
        return view('livewire.admin.admin-add-product-component', compact('categories','scategories'))->layout('layouts.adminbase');
    }
}
