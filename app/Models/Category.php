<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
        // products to show the number of the products
        public function products(){
        return $this->hasMany(Product::class);
    }
}
