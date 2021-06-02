<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// route - name of the class; static method get (request method); /  - main or index page of our web page;
Route::get('/', [HomeController::class, 'index']);
// route to the product page 
Route::get('/{cat}/{product_id}', [ProductController::class, 'get'])->name('getProduct');
//route to the categories
Route::get('/{cat}', [ProductController::class, 'getCategory'])->name('getCategory');