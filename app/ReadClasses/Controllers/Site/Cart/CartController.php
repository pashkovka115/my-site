<?php

namespace App\Http\Controllers\Site\Cart;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SiteController;
use App\Models\Product\Product;
use App\Servises\Site;
use Illuminate\Http\Request;

class CartController extends SiteController
{
    public function index(Request $request)
    {
        $total_quantity = \Cart::session($_COOKIE[\App\Servises\Site::cartId()])->getTotalQuantity();
        $products = \Cart::getContent();

        return view('site.cart.index', compact('total_quantity', 'products'));
    }


    public function store(Request $request)
    {
        $id = 0;
        $qty = 0;

        if ($request->has('id')){
            $id = abs((int)$request->input('id'));
        }

        if ($request->has('qty')){
            $qty = abs((int)$request->input('qty'));
            if ($qty < 1){
                $qty = 1;
            }
        }


        $product = Product::where('id', $id)->firstOrFail();

        $cart_id = $_COOKIE[Site::cartId()];

        \Cart::session($cart_id)->add([
            'id' => $id,
            'name' => $product->name,
            'price' => preg_replace(['/[^\d\.\,]/'], '', $product->price),
            'quantity' => $qty,
            'attributes' => [
                'img' => $product->img_announce
            ],
            'associatedModel' => $product
        ]);


        return response()->json(\Cart::getContent());
    }


    public function update(Request $request)
    {
        $cart_id = $_COOKIE[Site::cartId()];
        \Cart::session($cart_id)->clear();

        if ($request->has('products')){
            foreach ($request->input('products') as $item){
                $product = Product::where('id', $item['product_id'])->firstOrFail();
                $new_item = [
                    'id' => $product->id,
                    'price' => (float)preg_replace(['/[^\d\.\,]/'], '', $product->price),
                    'quantity' => (float)$item['quantity'],
                    'name' => $product->name,
                    'attributes' => [
                        'img' => $product->img_announce
                    ],
                    'associatedModel' => $product
                    ];

                \Cart::session($cart_id)->add($new_item);
            }
        }

        if ($request->has('go_shopping')){
            return redirect()->route('site.home');
        }elseif ($request->has('clear_cart')){
            \Cart::session($cart_id)->clear();
        }

        return back();
    }
}
