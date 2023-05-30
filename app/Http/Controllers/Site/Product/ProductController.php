<?php

namespace App\Http\Controllers\Site\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $items = Product::with(['options'])
            ->where('is_show', true)
            ->orderBy('sort')
            ->paginate();

        return view('site.product.index', compact('items'));
    }


    public function show(string $slug)
    {
        $item = Product::with(['gallery', 'options'])
            ->where('is_show', true)
            ->where('slug', $slug)
            ->firstOrFail();

        return view('site.product.show', compact('item'));
    }
}
