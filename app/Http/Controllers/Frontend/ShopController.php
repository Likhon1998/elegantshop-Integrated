<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        // 🔹 Base query
        $query = Product::with(['category', 'brand'])->latest();

        // 🔹 Optional filters
        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        if ($request->filled('brand')) {
            $query->whereHas('brand', function ($q) use ($request) {
                $q->where('slug', $request->brand);
            });
        }

        if ($request->filled('min_price') && $request->filled('max_price')) {
            $query->whereBetween('price', [$request->min_price, $request->max_price]);
        }

        // 🔹 Pagination (12 products per page)
        $products = $query->paginate(12);

        // 🔹 Sidebar Data
        $categories = Category::withCount('products')->get();
        $brands = Brand::withCount('products')->get();

        return view('customer.shop', compact('products', 'categories', 'brands'));
    }
}
