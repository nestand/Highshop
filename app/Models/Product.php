<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    //bulding one to many relations for the product image (few pics for one product in future)
    public function images(){
     return $this->hasMany(ProductImage::class);
    }
    //building many to one relation, few products to one cat
    public function category(){
     return $this->belongsTo(Category::class, 'category_id');
    }
    // https://laraveldaily.com/pivot-tables-and-many-to-many-relationships/
    // relationship manytomany between tables cart and products
    public function carts(){
        return $this->belongsToMany(Cart::class)->withPivot('quantity');
    }
}
