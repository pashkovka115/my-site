<?php

namespace App\Http\Controllers\Site\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $items = \Cart::session($_COOKIE[\App\Servises\Site::cartId()])->getContent();

        $total_qty = 0;
        $total_summ = 0;

        foreach ($items as $product){
            $total_qty += $product->quantity;
            $total_summ += ($product->quantity * $product->price);
        }
        return view('site.checkout.index', compact('items', 'total_summ', 'total_qty'));
    }
}
