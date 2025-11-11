@extends('layouts.admin.app')

@section('title', 'Add New Review')

@section('header')
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-3xl font-bold text-gray-800" style="font-family: var(--font-display);">
                <i class="fas fa-plus-circle mr-2 text-yellow-500"></i> Add New Review
            </h2>
            <p class="mt-1 text-sm text-gray-600">Create a new customer review and rating</p>
        </div>
        <a href="{{ route('admin.reviews.index') }}" class="px-5 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition-all flex items-center shadow-sm">
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
            <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-yellow-50 to-orange-50">
                <h3 class="text-lg font-semibold text-gray-800">
                    <i class="fas fa-info-circle mr-2 text-yellow-500"></i>Review Details
                </h3>
                <p class="text-sm text-gray-600 mt-1">Fill in the information below to create a new review</p>
            </div>

            <form action="{{ route('admin.reviews.store') }}" method="POST" class="p-6">
                @csrf
                
                <div class="space-y-6">
                    <!-- Product & Customer Row -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Product Selection -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-box text-yellow-500 mr-2"></i>Product
                                <span class="text-red-500">*</span>
                            </label>
                            <select name="product_id" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition-all bg-white @error('product_id') border-red-500 @enderror"
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
                        </div>

                        <!-- Customer Selection -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-user text-yellow-500 mr-2"></i>Customer
                            </label>
                            <select name="customer_id" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition-all bg-white @error('customer_id') border-red-500 @enderror">
                                <option value="">Guest (Anonymous)</option>
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                                        {{ $customer->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('customer_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-xs text-gray-500">Leave as Guest for anonymous reviews</p>
                        </div>
                    </div>

                    <!-- Rating Selection -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-star text-yellow-500 mr-2"></i>Rating
                            <span class="text-red-500">*</span>
                        </label>
                        <div class="flex items-center space-x-4">
                            <input type="number" 
                                   name="rating" 
                                   id="rating-input"
                                   min="1" 
                                   max="5" 
                                   value="{{ old('rating', 5) }}"
                                   class="w-24 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition-all @error('rating') border-red-500 @enderror"
                                   required>
                            <div id="star-display" class="flex items-center space-x-1">
                                <!-- Stars will be rendered by JavaScript -->
                            </div>
                        </div>
                        @error('rating')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Rate from 1 (poor) to 5 (excellent)</p>
                    </div>

                    <!-- Comment -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-comment text-yellow-500 mr-2"></i>Review Comment
                        </label>
                        <textarea name="comment" 
                                  rows="5" 
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition-all resize-none @error('comment') border-red-500 @enderror"
                                  placeholder="Write the customer's review here...">{{ old('comment') }}</textarea>
                        @error('comment')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Optional: Add detailed feedback from the customer</p>
                    </div>

                    <!-- Status Toggle -->
                    <div class="bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-lg p-4">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input type="checkbox" 
                                       name="status" 
                                       id="status" 
                                       value="1"
                                       {{ old('status', true) ? 'checked' : '' }}
                                       class="w-5 h-5 text-green-600 bg-white border-green-300 rounded focus:ring-green-500 focus:ring-2 cursor-pointer">
                            </div>
                            <div class="ml-3">
                                <label for="status" class="font-semibold text-gray-900 cursor-pointer flex items-center">
                                    <i class="fas fa-eye text-green-500 mr-2"></i>
                                    Make Review Visible
                                </label>
                                <p class="text-sm text-gray-700 mt-1">
                                    If checked, this review will be visible to customers on the website. Uncheck to hide it.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200">
                        <a href="{{ route('admin.reviews.index') }}" 
                           class="px-6 py-3 bg-white border border-gray-300 text-gray-700 rounded-lg font-medium hover:bg-gray-50 transition-all flex items-center">
                            <i class="fas fa-times mr-2"></i>Cancel
                        </a>
                        <button type="submit" 
                                class="px-6 py-3 bg-gradient-to-r from-yellow-500 to-orange-400 text-white rounded-lg font-medium hover:shadow-lg transition-all flex items-center">
                            <i class="fas fa-save mr-2"></i>Create Review
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Help Card -->
        <div class="mt-6 bg-blue-50 border border-blue-200 rounded-xl p-6">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <i class="fas fa-lightbulb text-blue-500 text-2xl"></i>
                </div>
                <div class="ml-4">
                    <h4 class="text-lg font-semibold text-blue-900 mb-2">Review Management Tips</h4>
                    <ul class="text-sm text-blue-800 space-y-2">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-blue-500 mr-2 mt-0.5"></i>
                            <span>Always verify review authenticity before making it visible</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-blue-500 mr-2 mt-0.5"></i>
                            <span>Guest reviews can be useful for showcasing general feedback</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-blue-500 mr-2 mt-0.5"></i>
                            <span>Higher ratings (4-5 stars) help build customer trust</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-blue-500 mr-2 mt-0.5"></i>
                            <span>Detailed comments provide more value than just star ratings</span>
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
    input:focus, select:focus, textarea:focus {
        outline: none;
        border-color: #F59E0B;
        box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.1);
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
        const ratingInput = document.getElementById('rating-input');
        const starDisplay = document.getElementById('star-display');

        function updateStars(rating) {
            starDisplay.innerHTML = '';
            for (let i = 1; i <= 5; i++) {
                const star = document.createElement('i');
                star.className = i <= rating ? 'fas fa-star text-yellow-400 text-2xl' : 'far fa-star text-gray-300 text-2xl';
                starDisplay.appendChild(star);
            }
        }

        // Initialize stars
        updateStars(ratingInput.value || 5);

        // Update stars on input change
        ratingInput.addEventListener('input', function() {
            const rating = Math.max(1, Math.min(5, parseInt(this.value) || 1));
            this.value = rating;
            updateStars(rating);
        });
    });
</script>
@endpush