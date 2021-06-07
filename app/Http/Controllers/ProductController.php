<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 
use App\Models\Category;

//function to select only one product from DB to show it seperately and on a single page.
class ProductController extends Controller
{
    public function get($cat, $product_id){
        //first() to return only one element. Fixed Property [] does not exist on this collection instance
        $item=Product::where('id',$product_id)->first();

        return view ('product.get', [
            'item'=>$item
        ]);
    }

    //fixed syntax error, unexpected '=>' (T_DOUBLE_ARROW), expecting ']' -> MISSING ',' after categories.index
    public function getCategories(Request $request, $cat_alias){
        $cat = Category::where('alias', $cat_alias)->first();
        
        if ($request->ajax()) {
            return $request->orderBy;
        }
         
        return view ('categories.index', [
            'cat'=>$cat
        ]);
    }
}
