<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
<<<<<<< HEAD
use App\Models\Product;
use App\Models\ProductImage;

=======
use App\Models\ProductImage;
use Darryldecode\Cart\Cart;
>>>>>>> 9fb059deb3f5b8d1a086250849688e1411aa20f4

class CartController extends Controller
{
    public function index()
    {
        //to return the view from the cart folder
        return view('cart.index');
    }
    //correction of PHP Strom that fixed ERR 500
    public function addToCart(Request $request): \Illuminate\Http\JsonResponse
    {
        //object Product
        $product = Product::where('id', $request->id)->first();

        //creation of unique id for any user
        if (!isset($_COOKIE['cart_id'])) {
            setcookie('cart_id', uniqid());
        }
<<<<<<< HEAD
        public function checkout() {
            return view('cart.checkout');
        }
=======
        $cart_id = $_COOKIE['cart_id'];
        \Cart::session($cart_id);

        // add the product to cart
        \Cart::add([
        'id' => $product->id,
        'name' => $product->title,
        // checking if there is price changement
        'price' => $product->new_price ? $product->new_price : $product->price,
        'quantity' => (int) $request->qty,
        'attributes' => [
            'img' => $product->images[0]->img ?? 'soon.png'
        ]
    ]);

        return response()->json(\Cart::getContent());
    }
>>>>>>> 9fb059deb3f5b8d1a086250849688e1411aa20f4
}
