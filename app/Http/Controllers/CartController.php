<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index (){
        //to return the view from the cart folder 
        return view('cart.index');
        }
}
