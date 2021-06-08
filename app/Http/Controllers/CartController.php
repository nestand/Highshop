<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use Darryldecode\Cart\Cart;

class CartController extends Controller
{
    public function index (){
        //to return the view from the cart folder 
        return view('cart.index');
        }
}
