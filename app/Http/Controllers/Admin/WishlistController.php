<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = Wishlist::with(['customer', 'product'])->latest()->paginate(10);
        return view('admin.wishlists.index', compact('wishlists'));
    }

    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('admin.wishlists.create', compact('customers', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'product_id' => 'required|exists:products,id',
        ]);

        Wishlist::create($request->all());
        return redirect()->route('admin.wishlists.index')->with('success', 'Wishlist item added successfully.');
    }

    public function edit($id)
    {
        $wishlist = Wishlist::findOrFail($id);
        $customers = Customer::all();
        $products = Product::all();
        return view('admin.wishlists.edit', compact('wishlist', 'customers', 'products'));
    }

    public function update(Request $request, $id)
    {
        $wishlist = Wishlist::findOrFail($id);
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'product_id' => 'required|exists:products,id',
        ]);

        $wishlist->update($request->all());
        return redirect()->route('admin.wishlists.index')->with('success', 'Wishlist updated successfully.');
    }

    public function destroy($id)
    {
        Wishlist::findOrFail($id)->delete();
        return redirect()->route('admin.wishlists.index')->with('success', 'Wishlist item deleted successfully.');
    }
}
