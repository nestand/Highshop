<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;


class CartController extends Controller
{
    public function index (){
        //to return the view from the cart folder 
        return view('cart.index');
        }
        public function checkout() {
            return view('cart.checkout');
        }
}
