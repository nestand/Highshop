<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//bulding one to many relations for the product image (few pics for one product in future)
class Product extends Model
{
    public function images(){
     return $this->hasMany(ProductImage::class);
    }
}
