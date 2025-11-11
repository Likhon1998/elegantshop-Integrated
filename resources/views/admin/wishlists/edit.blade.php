@extends('layouts.admin.app')

@section('title', 'Edit Wishlist')

@section('header')
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-3xl font-bold text-gray-800" style="font-family: var(--font-display);">
                <i class="fas fa-edit mr-2 text-pink-500"></i> Edit Wishlist
            </h2>
            <p class="mt-1 text-sm text-gray-600">Update wishlist item details</p>
        </div>
        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.wishlists.index') }}" class="px-5 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition-all flex items-center shadow-sm">
                <i class="fas fa-arrow-left mr-2"></i>Back to List
            </a>
        </div>
    </div>
@endsection

@section('content')
    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-green-50 border-l-4 border-green-500 rounded-lg p-4 mb-6">
            <div class="flex items-center">
                <i class="fas fa-check-circle text-green-500 text-xl mr-3"></i>
                <p class="text-green-800 font-medium">{{ session('success') }}</p>
            </div>
        </div>
    @endif

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

    <!-- Wishlist Info Card -->
    <div class="max-w-3xl mx-auto">
        <div class="bg-gradient-to-r from-pink-50 to-rose-50 border border-pink-200 rounded-xl p-6 mb-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="w-16 h-16 bg-gradient-to-br from-pink-400 to-rose-600 rounded-xl shadow-md flex items-center justify-center">
                        <i class="fas fa-heart text-white text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-900">{{ $wishlist->customer->name ?? 'Unknown Customer' }}</h3>
                        <p class="text-sm text-gray-600 mt-1">
                            <i class="fas fa-box mr-1"></i>{{ $wishlist->product->name ?? 'Unknown Product' }}
                        </p>
                        <p class="text-xs text-gray-500 mt-1">
                            <i class="fas fa-calendar mr-1"></i>Added {{ $wishlist->created_at->diffForHumans() }}
                        </p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-xs text-gray-500">Wishlist ID</p>
                    <p class="text-sm font-semibold text-gray-900">#{{ $wishlist->id }}</p>
                </div>
            </div>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-pink-50 to-rose-50">
                <h3 class="text-lg font-semibold text-gray-800">
                    <i class="fas fa-info-circle mr-2 text-pink-500"></i>Update Wishlist Details
                </h3>
                <p class="text-sm text-gray-600 mt-1">Modify customer or product association</p>
            </div>

            <form action="{{ route('admin.wishlists.update', $wishlist->id) }}" method="POST" class="p-6">
                @csrf
                @method('PUT')
                
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
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}" {{ old('customer_id', $wishlist->customer_id) == $customer->id ? 'selected' : '' }}>
                                        {{ $customer->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('customer_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-xs text-gray-500">Change which customer owns this wishlist</p>
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
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" {{ old('product_id', $wishlist->product_id) == $product->id ? 'selected' : '' }}>
                                        {{ $product->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('product_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-xs text-gray-500">Change which product is in this wishlist</p>
                        </div>
                    </div>

                    <!-- Preview Card -->
                    <div class="bg-gradient-to-r from-pink-50 to-rose-50 border-2 border-dashed border-pink-200 rounded-xl p-6">
                        <h4 class="text-sm font-semibold text-gray-700 mb-3 flex items-center">
                            <i class="fas fa-eye mr-2 text-pink-500"></i>Updated Preview
                        </h4>
                        <div class="flex items-center space-x-4">
                            <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center border-2 border-pink-300 shadow-sm">
                                <i class="fas fa-heart text-pink-500 text-2xl"></i>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center space-x-2 mb-2">
                                    <span class="text-sm font-medium text-gray-700">Customer:</span>
                                    <span id="preview-customer" class="text-sm text-gray-900 font-semibold">{{ $wishlist->customer->name ?? 'Not selected' }}</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="text-sm font-medium text-gray-700">Product:</span>
                                    <span id="preview-product" class="text-sm text-gray-900 font-semibold">{{ $wishlist->product->name ?? 'Not selected' }}</span>
                                </div>
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
                            <i class="fas fa-save mr-2"></i>Update Wishlist
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Quick Actions Card -->
        <div class="mt-6 bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h4 class="text-lg font-semibold text-gray-800 mb-4">
                <i class="fas fa-bolt mr-2 text-yellow-500"></i>Quick Actions
            </h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Delete Wishlist -->
                <form action="{{ route('admin.wishlists.destroy', $wishlist->id) }}" 
                      method="POST" 
                      class="w-full"
                      onsubmit="return confirm('Are you sure you want to remove this item from the wishlist? This action cannot be undone.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full px-4 py-3 bg-red-50 text-red-700 rounded-lg hover:bg-red-100 transition-all flex items-center justify-center font-medium">
                        <i class="fas fa-trash mr-2"></i>Delete Wishlist Item
                    </button>
                </form>

                <!-- View All Wishlists -->
                <a href="{{ route('admin.wishlists.index') }}" class="w-full px-4 py-3 bg-gray-50 text-gray-700 rounded-lg hover:bg-gray-100 transition-all flex items-center justify-center font-medium">
                    <i class="fas fa-eye mr-2"></i>View All Wishlists
                </a>
            </div>
        </div>

        <!-- Wishlist Info -->
        <div class="mt-6 bg-gray-50 border border-gray-200 rounded-xl p-6">
            <h4 class="text-sm font-semibold text-gray-700 mb-3">
                <i class="fas fa-info-circle mr-2 text-gray-500"></i>Wishlist Information
            </h4>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="flex items-start space-x-3">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 bg-pink-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-calendar-plus text-pink-600"></i>
                        </div>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-900">Date Added</p>
                        <p class="text-xs text-gray-500 mt-0.5">{{ $wishlist->created_at->format('M d, Y \a\t h:i A') }}</p>
                        <p class="text-xs text-gray-400 mt-0.5">{{ $wishlist->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                <div class="flex items-start space-x-3">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-edit text-blue-600"></i>
                        </div>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-900">Last Modified</p>
                        <p class="text-xs text-gray-500 mt-0.5">{{ $wishlist->updated_at->format('M d, Y \a\t h:i A') }}</p>
                        <p class="text-xs text-gray-400 mt-0.5">{{ $wishlist->updated_at->diffForHumans() }}</p>
                    </div>
                </div>
                <div class="flex items-start space-x-3">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-hashtag text-purple-600"></i>
                        </div>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-900">Wishlist ID</p>
                        <p class="text-xs text-gray-500 mt-0.5">#{{ $wishlist->id }}</p>
                        <p class="text-xs text-gray-400 mt-0.5">Unique identifier</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
    /* Smooth transitions */
    .transition-all {
        transition: all 0.3s ease;
    }
    
    /* Focus states */
    select:focus {
        outline: none;
        border-color: #EC4899;
        box-shadow: 0 0 0 3px rgba(236, 72, 153, 0.1);
    }
    
    /* Hover effects for action buttons */
    button:hover, a:hover {
        transform: translateY(-1px);
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
            previewCustomer.textContent = selectedOption.text;
        });

        // Update product preview
        productSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            previewProduct.textContent = selectedOption.text;
        });

        // Auto-hide success messages after 5 seconds
        const successAlert = document.querySelector('.bg-green-50');
        if (successAlert) {
            setTimeout(() => {
                successAlert.style.transition = 'opacity 0.5s ease';
                successAlert.style.opacity = '0';
                setTimeout(() => successAlert.remove(), 500);
            }, 5000);
        }
    });
</script>
@endpush