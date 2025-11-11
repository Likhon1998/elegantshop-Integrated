<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    public function index()
    {
        $images = ProductImage::with('product')->latest()->paginate(10);
        return view('admin.product_images.index', compact('images'));
    }

    public function create()
    {
        $products = Product::all();
        return view('admin.product_images.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'image_path' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_primary' => 'nullable|boolean',
        ]);

        $path = $request->file('image_path')->store('product_images', 'public');

        ProductImage::create([
            'product_id' => $request->product_id,
            'image_path' => $path,
            'is_primary' => $request->has('is_primary'),
        ]);

        return redirect()->route('admin.product_images.index')->with('success', 'Image added successfully.');
    }

    public function edit(ProductImage $product_image)
    {
        $products = Product::all();
        return view('admin.product_images.edit', compact('product_image', 'products'));
    }

    public function update(Request $request, ProductImage $product_image)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'image_path' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_primary' => 'nullable|boolean',
        ]);

        $data = [
            'product_id' => $request->product_id,
            'is_primary' => $request->has('is_primary'),
        ];

        if ($request->hasFile('image_path')) {
            $data['image_path'] = $request->file('image_path')->store('product_images', 'public');
        }

        $product_image->update($data);

        return redirect()->route('admin.product_images.index')->with('success', 'Image updated successfully.');
    }

    public function destroy(ProductImage $product_image)
    {
        $product_image->delete();
        return back()->with('success', 'Image deleted successfully.');
    }
}
