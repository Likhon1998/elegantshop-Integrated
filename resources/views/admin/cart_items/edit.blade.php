@extends('layouts.admin.app')

@section('title', 'Edit Cart Item')

@section('header')
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-3xl font-bold text-gray-800" style="font-family: var(--font-display);">
                <i class="fas fa-edit mr-2 text-blue-500"></i> Edit Cart Item
            </h2>
            <p class="mt-1 text-sm text-gray-600">Update cart item details</p>
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
                    <form action="{{ route('admin.cart_items.update', $cartItem->id) }}" method="POST" id="cartForm">
                        @csrf @method('PUT')

                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-user mr-2 text-blue-500"></i>Customer <span class="text-red-500">*</span>
                            </label>
                            <select name="customer_id" id="customer_id" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('customer_id') border-red-500 @enderror" required>
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}" {{ (old('customer_id', $cartItem->customer_id) == $customer->id) ? 'selected' : '' }}>
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
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" 
                                            data-price="{{ $product->price ?? 0 }}"
                                            {{ (old('product_id', $cartItem->product_id) == $product->id) ? 'selected' : '' }}>
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
                                <div class="flex items-center gap-2">
                                    <button type="button" id="decreaseQty" class="px-4 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <input type="number" 
                                           name="quantity" 
                                           id="quantity" 
                                           class="flex-1 px-4 py-3 border border-gray-300 rounded-lg text-center focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('quantity') border-red-500 @enderror" 
                                           value="{{ old('quantity', $cartItem->quantity) }}" 
                                           min="1" 
                                           required>
                                    <button type="button" id="increaseQty" class="px-4 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
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
                                           value="{{ old('price', $cartItem->price) }}" 
                                           required>
                                </div>
                                @error('price')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex gap-3 pt-4 border-t border-gray-200">
                            <button type="submit" class="flex-1 px-6 py-3 bg-gradient-to-r from-blue-500 to-indigo-500 text-white rounded-lg font-medium hover:shadow-lg transition-all flex items-center justify-center">
                                <i class="fas fa-check-circle mr-2"></i>Update Cart Item
                            </button>
                            <a href="{{ route('admin.cart_items.index') }}" class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg font-medium hover:bg-gray-200 transition-colors flex items-center justify-center">
                                <i class="fas fa-times-circle mr-2"></i>Cancel
                            </a>
                            <button type="button" onclick="openDeleteModal()" class="px-6 py-3 bg-red-50 text-red-600 rounded-lg font-medium hover:bg-red-100 transition-colors flex items-center justify-center">
                                <i class="fas fa-trash mr-2"></i>Delete
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Item Information -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 mt-6 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                        <i class="fas fa-info-circle mr-2 text-blue-500"></i>Item Information
                    </h3>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div class="bg-gray-50 rounded-lg p-4">
                            <p class="text-gray-600 mb-1">Created</p>
                            <p class="font-semibold text-gray-900">{{ $cartItem->created_at->format('d M Y, h:i A') }}</p>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-4">
                            <p class="text-gray-600 mb-1">Last Updated</p>
                            <p class="font-semibold text-gray-900">{{ $cartItem->updated_at->format('d M Y, h:i A') }}</p>
                        </div>
                    </div>
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
                        <strong class="text-xl" id="summaryQty">{{ $cartItem->quantity }}</strong>
                    </div>
                    <div class="flex justify-between items-center pb-3 border-b border-white border-opacity-20">
                        <span class="text-blue-100">Unit Price:</span>
                        <strong class="text-xl" id="summaryPrice">৳{{ number_format($cartItem->price, 2) }}</strong>
                    </div>
                    <div class="flex justify-between items-center pt-2">
                        <span class="font-semibold">Total:</span>
                        <h4 class="text-3xl font-bold" id="summaryTotal">৳{{ number_format($cartItem->quantity * $cartItem->price, 2) }}</h4>
                    </div>
                </div>
            </div>

            <!-- Customer Info -->
            <div class="bg-white rounded-xl shadow-sm border border-blue-200 overflow-hidden mb-6">
                <div class="px-6 py-4 bg-gradient-to-r from-blue-50 to-indigo-50 border-b border-blue-200">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                        <i class="fas fa-user-circle mr-2 text-blue-500"></i>Current Customer
                    </h3>
                </div>
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-indigo-600 rounded-full flex items-center justify-center text-white font-semibold text-lg mr-3">
                            {{ strtoupper(substr($cartItem->customer->name ?? 'N', 0, 1)) }}
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900">{{ $cartItem->customer->name ?? 'N/A' }}</p>
                            @if($cartItem->customer && $cartItem->customer->email)
                                <p class="text-sm text-gray-500">{{ $cartItem->customer->email }}</p>
                            @endif
                        </div>
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
                            <span>Changes are saved immediately</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mr-2 mt-0.5"></i>
                            <span>Use (+/-) buttons for quick quantity adjustment</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mr-2 mt-0.5"></i>
                            <span>Price changes affect only this cart item</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div id="deleteModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-xl bg-white">
            <div class="mt-3">
                <div class="flex items-center justify-center w-12 h-12 mx-auto bg-red-100 rounded-full">
                    <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mt-4 text-center">Confirm Delete</h3>
                <div class="mt-2 px-7 py-3">
                    <p class="text-sm text-gray-500 text-center mb-4">Are you sure you want to delete this cart item?</p>
                    <div class="bg-gray-50 rounded-lg p-3">
                        <p class="text-sm"><strong>Customer:</strong> {{ $cartItem->customer->name ?? 'N/A' }}</p>
                        <p class="text-sm mt-1"><strong>Product:</strong> {{ $cartItem->product->name ?? 'N/A' }}</p>
                        <p class="text-sm mt-1"><strong>Total Value:</strong> ৳{{ number_format($cartItem->quantity * $cartItem->price, 2) }}</p>
                    </div>
                </div>
                <div class="flex items-center gap-3 px-4 py-3">
                    <button onclick="closeDeleteModal()" class="flex-1 px-4 py-2 bg-gray-100 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-200 transition-colors">
                        Cancel
                    </button>
                    <form action="{{ route('admin.cart_items.destroy', $cartItem->id) }}" method="POST" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-lg hover:bg-red-700 transition-colors">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const quantityInput = document.getElementById('quantity');
    const priceInput = document.getElementById('price');
    const decreaseBtn = document.getElementById('decreaseQty');
    const increaseBtn = document.getElementById('increaseQty');

    // Quantity controls
    decreaseBtn.addEventListener('click', function() {
        const currentValue = parseInt(quantityInput.value) || 1;
        if (currentValue > 1) {
            quantityInput.value = currentValue - 1;
            updateSummary();
        }
    });

    increaseBtn.addEventListener('click', function() {
        const currentValue = parseInt(quantityInput.value) || 1;
        quantityInput.value = currentValue + 1;
        updateSummary();
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
});

// Delete modal functions
function openDeleteModal() {
    document.getElementById('deleteModal').classList.remove('hidden');
}

function closeDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
}

// Close modal on outside click
document.getElementById('deleteModal')?.addEventListener('click', function(e) {
    if (e.target === this) {
        closeDeleteModal();
    }
});
</script>
@endpush