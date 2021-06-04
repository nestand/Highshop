<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
        // to show the number of the products in a cat page... -> $cat->products->count()}} in index.category
        public function products(){
        return $this->hasMany(Product::class);
    }
}
