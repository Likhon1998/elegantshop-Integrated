@extends('layouts.admin.app')

@section('title', 'Edit Review')

@section('header')
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-3xl font-bold text-gray-800" style="font-family: var(--font-display);">
                <i class="fas fa-edit mr-2 text-yellow-500"></i> Edit Review
            </h2>
            <p class="mt-1 text-sm text-gray-600">Update review information and rating</p>
        </div>
        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.reviews.index') }}" class="px-5 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition-all flex items-center shadow-sm">
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

    <!-- Review Info Card -->
    <div class="max-w-3xl mx-auto">
        <div class="bg-gradient-to-r from-yellow-50 to-orange-50 border border-yellow-200 rounded-xl p-6 mb-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="w-16 h-16 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-xl shadow-md flex items-center justify-center">
                        <i class="fas fa-star text-white text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-900">{{ $review->product->name ?? 'Unknown Product' }}</h3>
                        <div class="flex items-center mt-1">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $review->rating)
                                    <i class="fas fa-star text-yellow-500 text-sm"></i>
                                @else
                                    <i class="far fa-star text-gray-400 text-sm"></i>
                                @endif
                            @endfor
                            <span class="ml-2 text-sm font-semibold text-gray-700">{{ $review->rating }}.0</span>
                        </div>
                        <p class="text-sm text-gray-600 mt-1">
                            <i class="fas fa-user mr-1"></i>{{ $review->customer->name ?? 'Guest' }}
                        </p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-xs text-gray-500">Review ID</p>
                    <p class="text-sm font-semibold text-gray-900">#{{ $review->id }}</p>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium mt-2 {{ $review->status ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                        <i class="fas fa-{{ $review->status ? 'eye' : 'eye-slash' }} text-xs mr-1"></i>
                        {{ $review->status ? 'Visible' : 'Hidden' }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-yellow-50 to-orange-50">
                <h3 class="text-lg font-semibold text-gray-800">
                    <i class="fas fa-info-circle mr-2 text-yellow-500"></i>Update Review Details
                </h3>
                <p class="text-sm text-gray-600 mt-1">Modify the review information below</p>
            </div>

            <form action="{{ route('admin.reviews.update', $review->id) }}" method="POST" class="p-6">
                @csrf
                @method('PUT')
                
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
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" {{ old('product_id', $review->product_id) == $product->id ? 'selected' : '' }}>
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
                                    <option value="{{ $customer->id }}" {{ old('customer_id', $review->customer_id) == $customer->id ? 'selected' : '' }}>
                                        {{ $customer->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('customer_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
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
                                   value="{{ old('rating', $review->rating) }}"
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
                                  placeholder="Write the customer's review here...">{{ old('comment', $review->comment) }}</textarea>
                        @error('comment')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status Toggle -->
                    <div class="bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-lg p-4">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input type="checkbox" 
                                       name="status" 
                                       id="status" 
                                       value="1"
                                       {{ old('status', $review->status) ? 'checked' : '' }}
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
                            <i class="fas fa-save mr-2"></i>Update Review
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
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Toggle Status -->
                <form action="{{ route('admin.reviews.update', $review->id) }}" method="POST" class="w-full">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="{{ $review->status ? 0 : 1 }}">
                    <input type="hidden" name="product_id" value="{{ $review->product_id }}">
                    <input type="hidden" name="rating" value="{{ $review->rating }}">
                    <button type="submit" class="w-full px-4 py-3 bg-blue-50 text-blue-700 rounded-lg hover:bg-blue-100 transition-all flex items-center justify-center font-medium">
                        <i class="fas fa-toggle-{{ $review->status ? 'off' : 'on' }} mr-2"></i>
                        {{ $review->status ? 'Hide' : 'Show' }} Review
                    </button>
                </form>

                <!-- Delete Review -->
                <form action="{{ route('admin.reviews.destroy', $review->id) }}" 
                      method="POST" 
                      class="w-full"
                      onsubmit="return confirm('Are you sure you want to delete this review? This action cannot be undone.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full px-4 py-3 bg-red-50 text-red-700 rounded-lg hover:bg-red-100 transition-all flex items-center justify-center font-medium">
                        <i class="fas fa-trash mr-2"></i>Delete Review
                    </button>
                </form>

                <!-- View All Reviews -->
                <a href="{{ route('admin.reviews.index') }}" class="w-full px-4 py-3 bg-gray-50 text-gray-700 rounded-lg hover:bg-gray-100 transition-all flex items-center justify-center font-medium">
                    <i class="fas fa-eye mr-2"></i>View All Reviews
                </a>
            </div>
        </div>

        <!-- Modification History -->
        @if($review->updated_at)
            <div class="mt-6 bg-gray-50 border border-gray-200 rounded-xl p-6">
                <h4 class="text-sm font-semibold text-gray-700 mb-3">
                    <i class="fas fa-history mr-2 text-gray-500"></i>Modification History
                </h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-plus text-green-600"></i>
                            </div>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900">Created</p>
                            <p class="text-xs text-gray-500 mt-0.5">{{ $review->created_at->format('M d, Y \a\t h:i A') }}</p>
                            <p class="text-xs text-gray-400 mt-0.5">{{ $review->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-edit text-blue-600"></i>
                            </div>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900">Last Updated</p>
                            <p class="text-xs text-gray-500 mt-0.5">{{ $review->updated_at->format('M d, Y \a\t h:i A') }}</p>
                            <p class="text-xs text-gray-400 mt-0.5">{{ $review->updated_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@push('styles')
<style>
    /* Smooth transitions */
    .transition-all {
        transition: all 0.3s ease;
    }
    
    /* Focus states */
    input:focus, select:focus, textarea:focus {
        outline: none;
        border-color: #F59E0B;
        box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.1);
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