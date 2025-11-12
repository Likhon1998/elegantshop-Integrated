<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Slider;
use App\Models\Feature;
use App\Models\Category;
use App\Models\Product;
use App\Models\Banner;
use App\Models\Newsletter;

class CustomerDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:customer');
    }

    public function index()
    {
     
        $sliders = Slider::where('status', true)->orderBy('order', 'asc')->get();
        $features = Feature::where('status', true)->take(4)->get();
        $banners = Banner::where('status', true)->orderBy('order', 'asc')->get();

        $categories = Category::where('status', true)
            ->withCount('products')
            ->orderBy('name', 'asc')
            ->get();

        $featuredProducts = Product::with(['category', 'images'])
            ->where('status', true)
            ->where('is_featured', true)
            ->latest()
            ->take(8)
            ->get();

        $latestProducts = Product::with(['category', 'images'])
            ->where('status', true)
            ->latest()
            ->take(12)
            ->get();

       
        $customer = Auth::guard('customer')->user();

       
        return view('customer.index', compact(
            'customer',
            'sliders',
            'features',
            'banners',
            'categories',
            'featuredProducts',
            'latestProducts'
        ));
    }
}
