<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 
use App\Models\Category;

//function to select only one product from DB to show it seperately and on a single page.
class ProductController extends Controller
{
    public function get($cat, $product_id)
    {
        //first() to return only one element. Fixed Property [] does not exist on this collection instance
        $item=Product::where('id', $product_id)->first();

        return view('product.get', [
            'item'=>$item
        ]);
    }

    //fixed syntax error, unexpected '=>' (T_DOUBLE_ARROW), expecting ']' -> MISSING ',' after categories.index
    public function getCategories(Request $request, $cat_alias)
    {
        $cat = Category::where('alias', $cat_alias)->first();
        
        //get the products by cat id for ajax filter, step 2 send $products to return view categories.index
        $products = Product::where('category_id', $cat->id)->get();
        
        //verifications for orderBy
        if(isset($request->orderBy)){
        if($request->orderBy == 'price-low-high'){
            $products = Product::where('category_id', $cat->id)->orderBy('price')->get();
        } 
        }
        
        //for the products filter rendering i.e render - create html code (see view/ajax.orderby)
        if($request->ajax()){
            return view('ajax.orderby',[
                'products' => $products
            ])->render();
        }
         
        return view('categories.index', [
            'cat'=>$cat,
            'products'=>$products,
        ]);
    }
}
