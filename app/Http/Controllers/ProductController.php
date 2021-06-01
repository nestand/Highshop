<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 

//function to select only one product from DB to show it seperately and on a single page.
class ProductController extends Controller
{
    public function get($cat, $product_id){
        $item=Product::where('id',$product_id)->first();

        return view ('product.get', [
            'item'=>$item
        ]);
    }

    public function getCategory(){
        //
    }
}
