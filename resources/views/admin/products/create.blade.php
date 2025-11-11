@extends('layouts.admin.app')

@section('title', 'Add New Product')

@section('header')
    {{-- Header Section: Title and Back Button --}}
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-3xl font-bold text-gray-800" style="font-family: var(--font-display);">
                <i class="fas fa-plus-circle text-pink-500 mr-2"></i> Add New Product
            </h2>
            <p class="mt-1 text-sm text-gray-600">Create and add a new product to your store inventory.</p>
        </div>
        <a href="{{ route('admin.products.index') }}" class="px-5 py-2.5 bg-gray-100 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-200 transition-all flex items-center shadow-sm">
            <i class="fas fa-arrow-left mr-2"></i>Back to Product List
        </a>
    </div>
@endsection

@section('content')
    <div class="max-w-4xl mx-auto"> {{-- Added max width for better form presentation on large screens --}}
        <div class="bg-white shadow-xl rounded-xl p-8 border border-gray-200">
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf

                {{-- Basic Product Information Section --}}
                <div class="space-y-6">
                    <h3 class="text-xl font-semibold text-gray-800 border-b pb-2 mb-4 flex items-center">
                        <i class="fas fa-info-circle text-purple-500 mr-3"></i> Basic Details
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Product Name --}}
                        <div>
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Product Name <span class="text-red-500">*</span></label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                class="w-full px-4 py-2 border @error('name') border-red-500 @else border-gray-300 @enderror rounded-lg shadow-sm focus:ring-2 focus:ring-pink-400 focus:border-pink-400 placeholder-gray-400 transition duration-150 ease-in-out"
                                placeholder="e.g., Premium Leather Wallet">
                            @error('name')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Category --}}
                        <div>
                            <label for="category_id" class="block text-sm font-semibold text-gray-700 mb-1">Category <span class="text-red-500">*</span></label>
                            <select id="category_id" name="category_id" required
                                class="w-full px-4 py-2 border @error('category_id') border-red-500 @else border-gray-300 @enderror rounded-lg shadow-sm focus:ring-2 focus:ring-pink-400 focus:border-pink-400 transition duration-150 ease-in-out">
                                <option value="" disabled selected>-- Select a Category --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Price --}}
                        <div>
                            <label for="price" class="block text-sm font-semibold text-gray-700 mb-1">Price ($) <span class="text-red-500">*</span></label>
                            <input type="number" id="price" name="price" value="{{ old('price') }}" min="0" step="0.01" required
                                class="w-full px-4 py-2 border @error('price') border-red-500 @else border-gray-300 @enderror rounded-lg shadow-sm focus:ring-2 focus:ring-pink-400 focus:border-pink-400 placeholder-gray-400 transition duration-150 ease-in-out"
                                placeholder="e.g., 49.99">
                            @error('price')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Discount Price --}}
                        <div>
                            <label for="discount_price" class="block text-sm font-semibold text-gray-700 mb-1">Discount Price ($)</label>
                            <input type="number" id="discount_price" name="discount_price" value="{{ old('discount_price') }}" min="0" step="0.01"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-pink-400 focus:border-pink-400 placeholder-gray-400 transition duration-150 ease-in-out"
                                placeholder="Optional (e.g., 39.99)">
                            @error('discount_price')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Description --}}
                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-semibold text-gray-700 mb-1">Description</label>
                        <textarea id="description" name="description" rows="5"
                            class="w-full px-4 py-2 border @error('description') border-red-500 @else border-gray-300 @enderror rounded-lg shadow-sm focus:ring-2 focus:ring-pink-400 focus:border-pink-400 placeholder-gray-400 transition duration-150 ease-in-out"
                            placeholder="Write a detailed description about this product...">{{ old('description') }}</textarea>
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
                        {{-- Status --}}
                        <div>
                            <label for="status" class="block text-sm font-semibold text-gray-700 mb-1">Status</label>
                            <select id="status" name="status"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-pink-400 focus:border-pink-400 transition duration-150 ease-in-out">
                                <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>Active (Visible on store)</option>
                                <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive (Hidden from store)</option>
                            </select>
                        </div>

                        {{-- Featured --}}
                        <div>
                            <label for="is_featured" class="block text-sm font-semibold text-gray-700 mb-1">Featured Product</label>
                            <select id="is_featured" name="is_featured"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-pink-400 focus:border-pink-400 transition duration-150 ease-in-out">
                                <option value="0" {{ old('is_featured', 0) == 0 ? 'selected' : '' }}>No (Standard product)</option>
                                <option value="1" {{ old('is_featured') == 1 ? 'selected' : '' }}>Yes (Highlight on homepage/special sections)</option>
                            </select>
                        </div>
                    </div>
                </div>

                
                
                {{-- Image Upload Section --}}
                <div class="space-y-4">
                    <h3 class="text-xl font-semibold text-gray-800 border-b pb-2 mb-4 flex items-center">
                        <i class="fas fa-image text-purple-500 mr-3"></i> Product Image
                    </h3>
                    
                    <div>
                        <label for="image" class="block text-sm font-semibold text-gray-700 mb-1">Upload Image (Max: 2MB, JPG/PNG)</label>
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
                        <i class="fas fa-save mr-2"></i>Save Product
                    </button>
                    <a href="{{ route('admin.products.index') }}" class="px-6 py-2.5 bg-gray-200 text-gray-700 rounded-lg font-medium hover:bg-gray-300 transition-all flex items-center shadow-md">
                        <i class="fas fa-times-circle mr-2"></i>Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection