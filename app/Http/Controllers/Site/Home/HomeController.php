<?php

namespace App\Http\Controllers\Site\Home;

use App\Http\Controllers\SiteController;
use App\Models\Product\Product;

class HomeController extends SiteController
{
    public function index()
    {
        $products = Product::with('options')->where('is_show', true)->paginate();

        return view('site.home.index', compact('products'));
    }
}
