<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = "categories";

    public function subCategories(){
        return $this->hasMany(Subcategory::class, 'category_id');
    }

    public function selproducts()
    {
        return $this->belongsToMany(Product::class,'product_category','category_id','product_id');
    }
}
