<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
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

// route to the cart page 
Route::get('/cart', [CartController::class, 'index'])->name('cartIndex');
//Route::get('/cart', 'CartController@index')->name('cartIndex');

// route for the cart adding  
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('addToCart');

//route to the categories
/*fixed error Route [getCategories] not defined -> $ php artisan route:clear or $ php artisan route:cache */
Route::get('/categories/{cat}', [ProductController::class, 'getCategories'])->name('getCategories');
//another way 
/*Route::name('/{cat}')->get('/{cat}', [ProductController::class, 'getCategories']);
Route::redirect('/', route('/{cat}')); */


// route to the product page 
Route::get('/categories/{cat}/{product_id}', [ProductController::class, 'get'])->name('getProduct');



/*Laravel BC
Route::get('/', 'HomeController@index')->name('home');
Route::get('/category/{cat}', 'ProductController@getCategories')->name('getCategories');
Route::get('/category/{cat}/{product_id}', 'ProductController@get')->name('getProduct');
*/