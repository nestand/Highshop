<?php

// php artisan make:controller HomeController    to create this controller 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //method to create the view of the index page
    public function index (){
        return view('home.index');
    }
}
