@extends('layouts.admin.app')

@section('title', 'Add New Product Image')

@section('header')
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-3xl font-bold text-gray-800" style="font-family: var(--font-display);">
                <i class="fas fa-cloud-upload-alt mr-2 text-teal-500"></i> Add New Product Image
            </h2>
            <p class="mt-1 text-sm text-gray-600">Upload a new image to product gallery</p>
        </div>
        <a href="{{ route('admin.product_images.index') }}" class="px-5 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition-all flex items-center shadow-sm">
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
            <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-teal-50 to-cyan-50">
                <h3 class="text-lg font-semibold text-gray-800">
                    <i class="fas fa-info-circle mr-2 text-teal-500"></i>Image Upload Details
                </h3>
                <p class="text-sm text-gray-600 mt-1">Associate an image with a specific product</p>
            </div>

            <form action="{{ route('admin.product_images.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf
                
                <div class="space-y-6">
                    <!-- Product Selection -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-box text-teal-500 mr-2"></i>Select Product
                            <span class="text-red-500">*</span>
                        </label>
                        <select name="product_id" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all bg-white @error('product_id') border-red-500 @enderror"
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
                        <p class="mt-1 text-xs text-gray-500">Choose which product this image belongs to</p>
                    </div>

                    <!-- Image Upload -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-image text-teal-500 mr-2"></i>Product Image
                            <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="file" 
                                   name="image_path"
                                   id="image-input"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100 @error('image_path') border-red-500 @enderror"
                                   accept="image/*"
                                   required>
                        </div>
                        @error('image_path')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Accepted: JPG, PNG, WebP | Max: 2MB | Recommended: 800x800px</p>

                        <!-- Image Preview -->
                        <div id="image-preview" class="mt-4 hidden">
                            <p class="text-sm font-medium text-gray-700 mb-2">Image Preview:</p>
                            <div class="relative inline-block">
                                <img id="preview-img" 
                                     class="w-64 h-48 object-cover rounded-lg shadow-md border-2 border-teal-200" 
                                     alt="Preview">
                                <div class="absolute top-2 right-2">
                                    <span class="inline-flex items-center px-2 py-1 rounded-md text-xs font-medium bg-teal-100 text-teal-800">
                                        <i class="fas fa-eye mr-1"></i>Preview
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Primary Image Switch -->
                    <div class="bg-gradient-to-r from-amber-50 to-yellow-50 border border-amber-200 rounded-lg p-4">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input type="checkbox" 
                                       name="is_primary" 
                                       id="is_primary" 
                                       value="1"
                                       {{ old('is_primary') ? 'checked' : '' }}
                                       class="w-5 h-5 text-amber-600 bg-white border-amber-300 rounded focus:ring-amber-500 focus:ring-2 cursor-pointer">
                            </div>
                            <div class="ml-3">
                                <label for="is_primary" class="font-semibold text-gray-900 cursor-pointer flex items-center">
                                    <i class="fas fa-star text-amber-500 mr-2"></i>
                                    Set as Primary Image
                                </label>
                                <p class="text-sm text-gray-700 mt-1">
                                    If checked, this will be the main display image for the product. Any existing primary image will be set to secondary.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200">
                        <a href="{{ route('admin.product_images.index') }}" 
                           class="px-6 py-3 bg-white border border-gray-300 text-gray-700 rounded-lg font-medium hover:bg-gray-50 transition-all flex items-center">
                            <i class="fas fa-times mr-2"></i>Cancel
                        </a>
                        <button type="submit" 
                                class="px-6 py-3 bg-gradient-to-r from-teal-500 to-cyan-400 text-white rounded-lg font-medium hover:shadow-lg transition-all flex items-center">
                            <i class="fas fa-cloud-upload-alt mr-2"></i>Upload Image
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
                    <h4 class="text-lg font-semibold text-blue-900 mb-2">Image Upload Tips</h4>
                    <ul class="text-sm text-blue-800 space-y-2">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-blue-500 mr-2 mt-0.5"></i>
                            <span>Use high-quality images with good lighting and clear product details</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-blue-500 mr-2 mt-0.5"></i>
                            <span>Square images (1:1 ratio) work best for consistent gallery display</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-blue-500 mr-2 mt-0.5"></i>
                            <span>Primary images are shown first in product galleries and listings</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-blue-500 mr-2 mt-0.5"></i>
                            <span>You can upload multiple images per product for a complete gallery</span>
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
    input:focus, select:focus {
        outline: none;
        border-color: #14B8A6;
        box-shadow: 0 0 0 3px rgba(20, 184, 166, 0.1);
    }
    
    /* Smooth transitions */
    .transition-all {
        transition: all 0.3s ease;
    }
</style>
@endpush

@push('scripts')
<script>
    // Image preview functionality
    document.addEventListener('DOMContentLoaded', function() {
        const imageInput = document.getElementById('image-input');
        const imagePreview = document.getElementById('image-preview');
        const previewImg = document.getElementById('preview-img');

        if (imageInput) {
            imageInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                
                if (file) {
                    const reader = new FileReader();
                    
                    reader.onload = function(e) {
                        previewImg.src = e.target.result;
                        imagePreview.classList.remove('hidden');
                    };
                    
                    reader.readAsDataURL(file);
                } else {
                    imagePreview.classList.add('hidden');
                }
            });
        }
    });
</script>
@endpush