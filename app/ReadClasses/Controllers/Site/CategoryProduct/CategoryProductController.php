<?php

namespace App\Http\Controllers\Site\CategoryProduct;

use App\Http\Controllers\Controller;
use App\Models\CategoryProduct\CategoryProduct;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    public function index($slug)
    {
        $category = CategoryProduct::where('slug', $slug)->firstOrFail();
        $products = Product::where('category_id', $category->id)->paginate();

        return view('site.category_product.index', compact('category', 'products'));
    }
}
