<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    //protected $fillable = ['name','slug','short_description'];
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function orderItems(){
        return $this->hasmany(OrderItem::class,'product_id');
    }

    public function subCategories(){
        return $this->belongsTo(Subcategory::class,'subcategory_id');
    }

    public function productInCategories(){
        return $this->belongsToMany(Category::class,'product_category');
    }

    public function productInSubCategories(){
        return $this->belongsToMany(Subcategory::class,'subcategory_product');
    }
}
