<?php

// php artisan make:controller HomeController    to create this controller 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    //method to create the view of the index page

    //test connection to DB to get and show the results on the screen
    public function index (){
    $products = Product::all();
    foreach ($products as $product){
        echo 'Title: '.$product->title;
        echo "<br>";
        echo 'Price: '.$product->price;
        echo "<br>";
        echo 'Description: '.$product->description;
        echo "<br>";
    } 
     
       // return view('home.index');
    }
}
