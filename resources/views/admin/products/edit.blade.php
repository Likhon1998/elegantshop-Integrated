@extends('layouts.admin.app')

@section('title', 'Edit Product: ' . $product->name)

@section('header')
    {{-- Header Section: Title and Back Button --}}
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-3xl font-bold text-gray-800" style="font-family: var(--font-display);">
                <i class="fas fa-edit text-yellow-500 mr-2"></i> Edit Product: {{ $product->name }}
            </h2>
            <p class="mt-1 text-sm text-gray-600">Update the details and visibility settings for this product.</p>
        </div>
        <a href="{{ route('admin.products.index') }}" class="px-5 py-2.5 bg-gray-100 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-200 transition-all flex items-center shadow-sm">
            <i class="fas fa-arrow-left mr-2"></i>Back to Product List
        </a>
    </div>
@endsection

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="bg-white shadow-xl rounded-xl p-8 border border-gray-200">
            {{-- Form is updated to use the PATCH/PUT method and specific product route --}}
            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf
                @method('PUT') {{-- Use PUT or PATCH method for updates --}}

                {{-- Basic Product Information Section --}}
                <div class="space-y-6">
                    <h3 class="text-xl font-semibold text-gray-800 border-b pb-2 mb-4 flex items-center">
                        <i class="fas fa-info-circle text-purple-500 mr-3"></i> Basic Details
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Product Name (Pre-populated) --}}
                        <div>
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Product Name <span class="text-red-500">*</span></label>
                            <input type="text" id="name" name="name" required
                                {{-- Use old() OR the existing product value --}}
                                value="{{ old('name', $product->name) }}"
                                class="w-full px-4 py-2 border @error('name') border-red-500 @else border-gray-300 @enderror rounded-lg shadow-sm focus:ring-2 focus:ring-pink-400 focus:border-pink-400 placeholder-gray-400 transition duration-150 ease-in-out"
                                placeholder="e.g., Premium Leather Wallet">
                            @error('name')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Category (Pre-selected) --}}
                        <div>
                            <label for="category_id" class="block text-sm font-semibold text-gray-700 mb-1">Category <span class="text-red-500">*</span></label>
                            <select id="category_id" name="category_id" required
                                class="w-full px-4 py-2 border @error('category_id') border-red-500 @else border-gray-300 @enderror rounded-lg shadow-sm focus:ring-2 focus:ring-pink-400 focus:border-pink-400 transition duration-150 ease-in-out">
                                <option value="" disabled>-- Select a Category --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" 
                                        {{-- Check for old input, then check existing product category_id --}}
                                        {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Price (Pre-populated) --}}
                        <div>
                            <label for="price" class="block text-sm font-semibold text-gray-700 mb-1">Price ($) <span class="text-red-500">*</span></label>
                            <input type="number" id="price" name="price" min="0" step="0.01" required
                                value="{{ old('price', $product->price) }}"
                                class="w-full px-4 py-2 border @error('price') border-red-500 @else border-gray-300 @enderror rounded-lg shadow-sm focus:ring-2 focus:ring-pink-400 focus:border-pink-400 placeholder-gray-400 transition duration-150 ease-in-out"
                                placeholder="e.g., 49.99">
                            @error('price')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Discount Price (Pre-populated) --}}
                        <div>
                            <label for="discount_price" class="block text-sm font-semibold text-gray-700 mb-1">Discount Price ($)</label>
                            <input type="number" id="discount_price" name="discount_price" min="0" step="0.01"
                                value="{{ old('discount_price', $product->discount_price) }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-pink-400 focus:border-pink-400 placeholder-gray-400 transition duration-150 ease-in-out"
                                placeholder="Optional (e.g., 39.99)">
                            @error('discount_price')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Description (Pre-populated) --}}
                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-semibold text-gray-700 mb-1">Description</label>
                        <textarea id="description" name="description" rows="5"
                            class="w-full px-4 py-2 border @error('description') border-red-500 @else border-gray-300 @enderror rounded-lg shadow-sm focus:ring-2 focus:ring-pink-400 focus:border-pink-400 placeholder-gray-400 transition duration-150 ease-in-out"
                            placeholder="Write a detailed description about this product...">{{ old('description', $product->description) }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

    

                {{-- Status and Visibility Section --}}
                <div class="space-y-6">
                    <h3 class="text-xl font-semibold text-gray-800 border-b pb-2 mb-4 flex items-center">
                        <i class="fas fa-eye text-purple-500 mr-3"></i> Visibility & Promotion
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Status (Pre-selected) --}}
                        <div>
                            <label for="status" class="block text-sm font-semibold text-gray-700 mb-1">Status</label>
                            <select id="status" name="status"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-pink-400 focus:border-pink-400 transition duration-150 ease-in-out">
                                <option value="1" {{ old('status', $product->status) == 1 ? 'selected' : '' }}>Active (Visible on store)</option>
                                <option value="0" {{ old('status', $product->status) == 0 ? 'selected' : '' }}>Inactive (Hidden from store)</option>
                            </select>
                        </div>

                        {{-- Featured (Pre-selected) --}}
                        <div>
                            <label for="is_featured" class="block text-sm font-semibold text-gray-700 mb-1">Featured Product</label>
                            <select id="is_featured" name="is_featured"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-pink-400 focus:border-pink-400 transition duration-150 ease-in-out">
                                <option value="0" {{ old('is_featured', $product->is_featured) == 0 ? 'selected' : '' }}>No (Standard product)</option>
                                <option value="1" {{ old('is_featured', $product->is_featured) == 1 ? 'selected' : '' }}>Yes (Highlight on homepage/special sections)</option>
                            </select>
                        </div>
                    </div>
                </div>

         
                {{-- Image Upload Section --}}
                <div class="space-y-4">
                    <h3 class="text-xl font-semibold text-gray-800 border-b pb-2 mb-4 flex items-center">
                        <i class="fas fa-image text-purple-500 mr-3"></i> Product Image
                    </h3>
                    
                    @if($product->image)
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Current Image</label>
                            <img src="{{ asset('storage/' . $product->image) }}" alt="Current Product Image" class="w-32 h-24 object-cover rounded-lg shadow-md border border-gray-200">
                            <p class="mt-2 text-xs text-gray-500">Uploading a new file will replace this image.</p>
                        </div>
                    @endif

                    <div>
                        <label for="image" class="block text-sm font-semibold text-gray-700 mb-1">Upload New Image (Optional)</label>
                        <input type="file" id="image" name="image"
                            class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-gradient-to-r file:from-purple-500 file:to-pink-400 file:text-white hover:file:opacity-90 transition duration-150 ease-in-out">
                        @error('image')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex justify-end space-x-3 pt-6 border-t pt-4">
                    <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-purple-500 to-pink-400 text-white rounded-lg font-medium hover:from-purple-600 hover:to-pink-500 shadow-md hover:shadow-lg transition-all flex items-center">
                        <i class="fas fa-sync-alt mr-2"></i>Update Product
                    </button>
                    <a href="{{ route('admin.products.index') }}" class="px-6 py-2.5 bg-gray-200 text-gray-700 rounded-lg font-medium hover:bg-gray-300 transition-all flex items-center shadow-md">
                        <i class="fas fa-times-circle mr-2"></i>Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection