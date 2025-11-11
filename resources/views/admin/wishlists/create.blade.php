@extends('layouts.admin.app')

@section('title', 'Add to Wishlist')

@section('header')
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-3xl font-bold text-gray-800" style="font-family: var(--font-display);">
                <i class="fas fa-plus-circle mr-2 text-pink-500"></i> Add to Wishlist
            </h2>
            <p class="mt-1 text-sm text-gray-600">Add a product to customer's wishlist</p>
        </div>
        <a href="{{ route('admin.wishlists.index') }}" class="px-5 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition-all flex items-center shadow-sm">
            <i class="fas fa-arrow-left mr-2"></i>Back to List
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
                    <ul class="list-disc list-inside text-red-700 text-sm space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <!-- Form Card -->
    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-pink-50 to-rose-50">
                <h3 class="text-lg font-semibold text-gray-800">
                    <i class="fas fa-info-circle mr-2 text-pink-500"></i>Wishlist Details
                </h3>
                <p class="text-sm text-gray-600 mt-1">Select customer and product to add to wishlist</p>
            </div>

            <form action="{{ route('admin.wishlists.store') }}" method="POST" class="p-6">
                @csrf
                
                <div class="space-y-6">
                    <!-- Customer & Product Row -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Customer Selection -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-user text-pink-500 mr-2"></i>Select Customer
                                <span class="text-red-500">*</span>
                            </label>
                            <select name="customer_id" 
                                    id="customer-select"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all bg-white @error('customer_id') border-red-500 @enderror"
                                    required>
                                <option value="" selected disabled>-- Select a customer --</option>
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                                        {{ $customer->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('customer_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-xs text-gray-500">Choose which customer this wishlist belongs to</p>
                        </div>

                        <!-- Product Selection -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-box text-pink-500 mr-2"></i>Select Product
                                <span class="text-red-500">*</span>
                            </label>
                            <select name="product_id" 
                                    id="product-select"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all bg-white @error('product_id') border-red-500 @enderror"
                                    required>
                                <option value="" selected disabled>-- Select a product --</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                        {{ $product->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('product_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-xs text-gray-500">Choose which product to add to wishlist</p>
                        </div>
                    </div>

                    <!-- Preview Card -->
                    <div class="bg-gradient-to-r from-pink-50 to-rose-50 border-2 border-dashed border-pink-200 rounded-xl p-6">
                        <h4 class="text-sm font-semibold text-gray-700 mb-3 flex items-center">
                            <i class="fas fa-eye mr-2 text-pink-500"></i>Wishlist Preview
                        </h4>
                        <div class="flex items-center space-x-4">
                            <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center border-2 border-pink-300 shadow-sm">
                                <i class="fas fa-heart text-pink-500 text-2xl"></i>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center space-x-2 mb-2">
                                    <span class="text-sm font-medium text-gray-700">Customer:</span>
                                    <span id="preview-customer" class="text-sm text-gray-900 font-semibold">Not selected</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="text-sm font-medium text-gray-700">Product:</span>
                                    <span id="preview-product" class="text-sm text-gray-900 font-semibold">Not selected</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Info Banner -->
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <i class="fas fa-info-circle text-blue-500 text-lg"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-blue-800">
                                    <strong>Note:</strong> Adding this item will allow the customer to save this product for later purchase. They can view and manage their wishlist from their account.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200">
                        <a href="{{ route('admin.wishlists.index') }}" 
                           class="px-6 py-3 bg-white border border-gray-300 text-gray-700 rounded-lg font-medium hover:bg-gray-50 transition-all flex items-center">
                            <i class="fas fa-times mr-2"></i>Cancel
                        </a>
                        <button type="submit" 
                                class="px-6 py-3 bg-gradient-to-r from-pink-500 to-rose-400 text-white rounded-lg font-medium hover:shadow-lg transition-all flex items-center">
                            <i class="fas fa-heart mr-2"></i>Add to Wishlist
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Help Card -->
        <div class="mt-6 bg-purple-50 border border-purple-200 rounded-xl p-6">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <i class="fas fa-lightbulb text-purple-500 text-2xl"></i>
                </div>
                <div class="ml-4">
                    <h4 class="text-lg font-semibold text-purple-900 mb-2">Wishlist Management Tips</h4>
                    <ul class="text-sm text-purple-800 space-y-2">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-purple-500 mr-2 mt-0.5"></i>
                            <span>Wishlists help customers save products they're interested in</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-purple-500 mr-2 mt-0.5"></i>
                            <span>You can add products to customer wishlists on their behalf</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-purple-500 mr-2 mt-0.5"></i>
                            <span>Check for duplicate entries before adding new wishlist items</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-purple-500 mr-2 mt-0.5"></i>
                            <span>Use wishlist data to understand customer preferences and interests</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
    /* Focus states */
    select:focus {
        outline: none;
        border-color: #EC4899;
        box-shadow: 0 0 0 3px rgba(236, 72, 153, 0.1);
    }
    
    /* Smooth transitions */
    .transition-all {
        transition: all 0.3s ease;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const customerSelect = document.getElementById('customer-select');
        const productSelect = document.getElementById('product-select');
        const previewCustomer = document.getElementById('preview-customer');
        const previewProduct = document.getElementById('preview-product');

        // Update customer preview
        customerSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            previewCustomer.textContent = selectedOption.text !== '-- Select a customer --' 
                ? selectedOption.text 
                : 'Not selected';
        });

        // Update product preview
        productSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            previewProduct.textContent = selectedOption.text !== '-- Select a product --' 
                ? selectedOption.text 
                : 'Not selected';
        });
    });
</script>
@endpush