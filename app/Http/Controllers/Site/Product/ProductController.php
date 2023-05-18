<?php

namespace App\Http\Controllers\Site\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        //
    }


    public function show(string $slug)
    {
        $product = Product::where('is_show', true)->where('slug', $slug)->firstOrFail();

        return view('site.product.show', compact('product'));
    }
}
