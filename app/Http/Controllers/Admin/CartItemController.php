<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::with(['customer', 'product'])->latest()->paginate(10);
        return view('admin.cart_items.index', compact('cartItems'));
    }

    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('admin.cart_items.create', compact('customers', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        CartItem::create($request->all());
        return redirect()->route('admin.cart_items.index')->with('success', 'Cart item added successfully.');
    }

    public function edit($id)
    {
        $cartItem = CartItem::findOrFail($id);
        $customers = Customer::all();
        $products = Product::all();
        return view('admin.cart_items.edit', compact('cartItem', 'customers', 'products'));
    }

    public function update(Request $request, $id)
    {
        $cartItem = CartItem::findOrFail($id);
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        $cartItem->update($request->all());
        return redirect()->route('admin.cart_items.index')->with('success', 'Cart item updated successfully.');
    }

    public function destroy($id)
    {
        CartItem::findOrFail($id)->delete();
        return redirect()->route('admin.cart_items.index')->with('success', 'Cart item deleted successfully.');
    }
}
