<?php

namespace App\Http\Controllers\Admin\Sitemap;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        $index = Product::where('is_show', true)->orderByDesc('updated_at')->firstOrFail();

        return response()->view('admin.sitemaps.index', [
            'index' => $index,
        ])->header('Content-Type', 'text/xml');
    }


    public function products()
    {
        $products = Product::all(['updated_at', 'slug']);

        return response()->view('admin.sitemaps.products',
            compact('products'),
        )->header('Content-Type', 'text/xml');
    }
}
