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
        //for the pagination we replace get to paginate and put the number of products to show
        //get the products by cat id for ajax filter, step 2 send $products to return view categories.index
        $products = Product::where('category_id', $cat->id)->paginate(10);
        
        //verifications for orderBy
        if(isset($request->orderBy)){
            if($request->orderBy == 'price-low-high'){
                $products = Product::where('category_id',$cat->id)->orderBy('price')->paginate(10);
            }
            if($request->orderBy == 'price-high-low'){
                $products = Product::where('category_id',$cat->id)->orderBy('price','desc')->paginate(10);
            }
            if($request->orderBy == 'name-a-z'){
                $products = Product::where('category_id',$cat->id)->orderBy('title')->paginate(10);
            }
            if($request->orderBy == 'name-z-a'){
                $products = Product::where('category_id',$cat->id)->orderBy('title','desc')->paginate(10);
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
