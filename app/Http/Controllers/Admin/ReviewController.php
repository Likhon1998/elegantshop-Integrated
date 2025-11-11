<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with(['product', 'customer'])->latest()->paginate(10);
        return view('admin.reviews.index', compact('reviews'));
    }

    public function create()
    {
        $products = Product::all();
        $customers = Customer::all();
        return view('admin.reviews.create', compact('products', 'customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'customer_id' => 'nullable|exists:customers,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
            'status' => 'boolean',
        ]);

        Review::create($request->all());
        return redirect()->route('admin.reviews.index')->with('success', 'Review added successfully.');
    }

    public function edit($id)
    {
        $review = Review::findOrFail($id);
        $products = Product::all();
        $customers = Customer::all();
        return view('admin.reviews.edit', compact('review', 'products', 'customers'));
    }

    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'customer_id' => 'nullable|exists:customers,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
            'status' => 'boolean',
        ]);

        $review->update($request->all());
        return redirect()->route('admin.reviews.index')->with('success', 'Review updated successfully.');
    }

    public function destroy($id)
    {
        Review::findOrFail($id)->delete();
        return redirect()->route('admin.reviews.index')->with('success', 'Review deleted successfully.');
    }
}
