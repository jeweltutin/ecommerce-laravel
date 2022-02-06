<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use illuminate\Support\Str;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use DB;

class AdminEditProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $stock_status;
    public $featured;
    public $quantity;
    public $image;
    public $category_id;
    public $newimage;
    public $product_id;

    public $images;
    public $newimages;
    public $scategory_id;

    public $selectedcategories = [];
    public $selectedsubcategories = [];

    protected $rules = [
        'name' => 'required',
        'slug' => 'required',
        'short_description' => 'required',
        'regular_price' => 'required|numeric',
        'sale_price' => 'nullable|numeric',
        'stock_status' => 'required',
        'quantity' => 'required|numeric',
        //'newimage' => 'nullable|mimes:jpeg,png,jpg|max:2048',   //Maximaum 2MB size image
        'category_id' => 'required'
    ];

    public function mount($product_slug){
        //$product = Product::where('slug', $product_slug)->first();
        $product = Product::with('productInCategories')->where('slug', $product_slug)->first();

        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->short_description = $product->short_description;
        $this->description = $product->description;
        $this->regular_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->SKU = $product->SKU;
        $this->stock_status = $product->stock_status;
        $this->featured = $product->featured;
        $this->quantity = $product->quantity;
        $this->image = $product->image;
        $this->images = explode(",", $product->images);
        $this->category_id = $product->category_id;
        $this->scategory_id = $product->subcategory_id;
        $this->product_id = $product->id;
    }

    public function generateSlug(){
        $this->slug = Str::slug($this->name,'-');
    }

    public function updateProduct(){
        $this->validate();

        if($this->newimage) {
            $this->validate([
                'newimage' => 'required|mimes:jpeg,png,jpg|max:2048'
            ]);
        }
        $product = Product::find($this->product_id);

        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        //dd($this->sale_price);
        if($this->sale_price == "")
        {
            //dd("Working");
            $product->sale_price = null;
        }else{
            $product->sale_price = $this->sale_price;
        }        
        $product->SKU = $this->SKU;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;

        if($this->newimage){
            if(file_exists('assets/images/products/'. $product->image)){
                unlink('assets/images/products'.'/'.$product->image);
            }
            $imageName = Carbon::now()->timestamp. '.' . $this->newimage->extension();
            $this->newimage->storeAs('products',$imageName);
            $product->image = $imageName;
        }

        if($this->newimages){
            if ($product->images) {
                $images = explode(",", $product->images);
                foreach($images as $image){
                    if ($image) {
                        if(file_exists('assets/images/products/'. $image)){
                            unlink('assets/images/products'.'/'.$image);
                        }
                    }
                }
            }

            $imagesname = '';
            foreach($this->newimages as $key=>$image){
                $imgName = Carbon::now()->timestamp . $key . '.' . $image->extension();
                $image->storeAs('products', $imgName);
                $imagesname = $imagesname . ',' . $imgName;
            }
            $product->images = $imagesname;
        }

        $product->category_id = $this->category_id;

        if ($this->scategory_id) {
            $product->subcategory_id = $this->scategory_id;
        }

        $product->save();

        if($this->selectedcategories){
            $product->productInCategories()->sync($this->selectedcategories);
        }

        if($this->selectedsubcategories){
            $product->productInSubCategories()->sync($this->selectedsubcategories);
        }

        session()->flash('message', 'Product Updated Successfully');
    }

    public function changeSubcategory(){
        $this->scatagory_id = 0;
    }

    public function render()
    {
        $categories = Category::all();
        //$selectedcategories = Category::with('selproducts')->where('product_id', $this->product_id)->get();

        //select `products`.*, `product_category`.`category_id` as `pivot_category_id`, `product_category`.`product_id` as `pivot_product_id` from `products` inner join `product_category` on `products`.`id` = `product_category`.`product_id` where `product_category`.`category_id` in (1, 2, 3, 4, 5, 6, 12, 13, 17);
        //dd($selectedcategories);
        //$selectedcategories = DB::select( DB::raw("SELECT * FROM some_table WHERE some_col = '$someVariable'") );

        //$slcats =  Category::with('selproducts')->where('id', $this->category_id)->get();
        $productId = $this->product_id;
        $slcats =  DB::table('categories')
                    ->join('product_category', function ($join) {
                        $join->on('categories.id', '=', 'product_category.category_id')->where('product_category.product_id', $this->product_id);
                    })
                    ->get();

        $slsubcats =  DB::table('subcategories')
                    ->join('subcategory_product', function ($join) {
                        $join->on('subcategories.id', '=', 'subcategory_product.subcategory_id')->where('subcategory_product.product_id', $this->product_id);
                    })
                    ->get();
        
        $scategories = Subcategory::where('category_id', $this->category_id)->get();
        return view('livewire.admin.admin-edit-product-component', 
                ['categories' => $categories, 
                 'scategories' => $scategories, 
                 'slcats' => $slcats, 
                 'slsubcats' => $slsubcats,
                 'productId' => $productId ])->layout('layouts.adminbase');
    }
}
