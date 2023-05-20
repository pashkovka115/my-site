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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
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
            'price' => $product->price,
            'quantity' => $qty,
            'attributes' => [
                'img' => $product->img_announce
            ],
            'associatedModel' => $product
        ]);


        return response()->json(\Cart::getContent());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->dd();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
