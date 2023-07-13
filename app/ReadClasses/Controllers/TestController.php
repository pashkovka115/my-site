<?php

namespace App\Http\Controllers;

use App\Servises\Cart;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        // Write
         /* session(['cart' => [
            ['id' => 1, 'title' => 'Product 1'],
            ['id' => 2, 'title' => 'Product 2'],
        ]]);*/

        // Get
//        $cart = session('cart');
//        dump($cart);

        // Add
//        session()->push('cart', ['id' => 3, 'title' => 'Product 3']);

        // Read and delete
//        session(['test' => 'Test value']);
//        dump(session()->pull('test'));

        // Remove
//        session()->forget('test');
//        session()->forget('cart.2.id');

//        dump(session()->has('cart'));

//        Cart::set(['id' => 10, 'title' => 'Product 10']);
//        Cart::set([1,2,3]);
//        Cart::delete();
//        Cart::add(['test' => 'Test value']);
//        Cart::add(['test' => 'Test value']);
        /*Cart::update([
            ['id' => 1, 'title' => 'Product 1'],
            ['id' => 2, 'title' => 'Product 2'],
        ]);*/





//        session()->put();
        dump(session()->all());
    }
}
