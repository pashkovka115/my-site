<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiteController;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class HomeController extends SiteController
{
    public function index()
    {
        $product = Product::where('id', 1)->first();
//        dump(app()->getLocale());

        return view('site.home.index', compact('product'));
    }
}
