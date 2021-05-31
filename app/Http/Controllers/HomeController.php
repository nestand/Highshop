<?php

// php artisan make:controller HomeController    to create this controller 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    //method to create the view of the main index page

    //connection to DB to get and show the results on the screen
    // and sort them by the date of creation

    public function index (){
    $products = Product::orderBy('created_at')->take(8)->get();
          
        return view('home.index',[
            'products'=>$products
            ]);
    }
}
