@extends('layouts.admin.app')

@section('title', 'Add Cart Item')

@section('header')
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-3xl font-bold text-gray-800" style="font-family: var(--font-display);">
                <i class="fas fa-cart-plus mr-2 text-blue-500"></i> Add Cart Item
            </h2>
            <p class="mt-1 text-sm text-gray-600">Add a new item to customer's shopping cart</p>
        </div>
        <a href="{{ route('admin.cart_items.index') }}" class="px-5 py-2.5 bg-gray-100 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-200 transition-all flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>Back to Cart Items
        </a>
    </div>
@endsection

@section('content')
    <!-- Error Messages -->
    @if($errors->any())
        <div class="bg-red-50 border-l-4 border-red-500 rounded-lg p-4 mb-6">
            <div class="flex items-start">
                <i class="fas fa-exclamation-circle text-red-500 text-xl mr-3 mt-0.5"></i>
                <div class="flex-1">
                    <p class="text-red-800 font-medium mb-2">Please fix the following errors:</p>
                    <ul class="list-disc list-inside text-sm text-red-700 space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Form -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-blue-50 to-indigo-50">
                    <h3 class="text-lg font-semibold text-gray-800">
                        <i class="fas fa-info-circle mr-2 text-blue-500"></i>Cart Item Details
                    </h3>
                </div>
                <div class="p-6">
                    <form action="{{ route('admin.cart_items.store') }}" method="POST" id="cartForm">
                        @csrf
                        
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-user mr-2 text-blue-500"></i>Customer <span class="text-red-500">*</span>
                            </label>
                            <select name="customer_id" id="customer_id" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('customer_id') border-red-500 @enderror" required>
                                <option value="">Select Customer</option>
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                                        {{ $customer->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('customer_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-box mr-2 text-blue-500"></i>Product <span class="text-red-500">*</span>
                            </label>
                            <select name="product_id" id="product_id" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('product_id') border-red-500 @enderror" required>
                                <option value="">Select Product</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" 
                                            data-price="{{ $product->price ?? 0 }}"
                                            {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                        {{ $product->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('product_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-layer-group mr-2 text-blue-500"></i>Quantity <span class="text-red-500">*</span>
                                </label>
                                <input type="number" 
                                       name="quantity" 
                                       id="quantity" 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('quantity') border-red-500 @enderror" 
                                       min="1" 
                                       value="{{ old('quantity', 1) }}" 
                                       required>
                                @error('quantity')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-tag mr-2 text-blue-500"></i>Price (Tk) <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500 font-medium">৳</span>
                                    <input type="number" 
                                           step="0.01" 
                                           name="price" 
                                           id="price" 
                                           class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('price') border-red-500 @enderror" 
                                           value="{{ old('price') }}" 
                                           required>
                                </div>
                                @error('price')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex gap-3 pt-4 border-t border-gray-200">
                            <button type="submit" class="flex-1 px-6 py-3 bg-gradient-to-r from-blue-500 to-indigo-500 text-white rounded-lg font-medium hover:shadow-lg transition-all flex items-center justify-center">
                                <i class="fas fa-check-circle mr-2"></i>Save Cart Item
                            </button>
                            <a href="{{ route('admin.cart_items.index') }}" class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg font-medium hover:bg-gray-200 transition-colors flex items-center justify-center">
                                <i class="fas fa-times-circle mr-2"></i>Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <!-- Cart Summary -->
            <div class="bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl shadow-sm p-6 text-white mb-6">
                <h3 class="text-lg font-semibold mb-4 flex items-center">
                    <i class="fas fa-calculator mr-2"></i>Cart Summary
                </h3>
                <div class="space-y-3">
                    <div class="flex justify-between items-center pb-3 border-b border-white border-opacity-20">
                        <span class="text-blue-100">Quantity:</span>
                        <strong class="text-xl" id="summaryQty">1</strong>
                    </div>
                    <div class="flex justify-between items-center pb-3 border-b border-white border-opacity-20">
                        <span class="text-blue-100">Unit Price:</span>
                        <strong class="text-xl" id="summaryPrice">৳0.00</strong>
                    </div>
                    <div class="flex justify-between items-center pt-2">
                        <span class="font-semibold">Total:</span>
                        <h4 class="text-3xl font-bold" id="summaryTotal">৳0.00</h4>
                    </div>
                </div>
            </div>

            <!-- Help Card -->
            <div class="bg-white rounded-xl shadow-sm border border-blue-200 overflow-hidden">
                <div class="px-6 py-4 bg-gradient-to-r from-blue-50 to-indigo-50 border-b border-blue-200">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                        <i class="fas fa-lightbulb mr-2 text-yellow-500"></i>Tips
                    </h3>
                </div>
                <div class="p-6">
                    <ul class="space-y-3 text-sm text-gray-600">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mr-2 mt-0.5"></i>
                            <span>Select the customer who owns this cart</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mr-2 mt-0.5"></i>
                            <span>Choose the product to add to cart</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mr-2 mt-0.5"></i>
                            <span>Price is automatically filled from product</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mr-2 mt-0.5"></i>
                            <span>All fields marked with * are required</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const productSelect = document.getElementById('product_id');
    const quantityInput = document.getElementById('quantity');
    const priceInput = document.getElementById('price');

    // Auto-fill product price
    productSelect.addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        const price = selectedOption.getAttribute('data-price');

        if (price) {
            priceInput.value = parseFloat(price).toFixed(2);
            updateSummary();
        }
    });

    quantityInput.addEventListener('input', updateSummary);
    priceInput.addEventListener('input', updateSummary);

    function updateSummary() {
        const quantity = parseInt(quantityInput.value) || 0;
        const price = parseFloat(priceInput.value) || 0;
        const total = quantity * price;

        document.getElementById('summaryQty').textContent = quantity;
        document.getElementById('summaryPrice').textContent = '৳' + price.toFixed(2);
        document.getElementById('summaryTotal').textContent = '৳' + total.toFixed(2);
    }

    // Initialize
    if (productSelect.value) productSelect.dispatchEvent(new Event('change'));
});
</script>
@endpush