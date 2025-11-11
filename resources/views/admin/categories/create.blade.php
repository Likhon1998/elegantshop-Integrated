@extends('layouts.admin.app')

@section('title', 'Add New Category')

@section('header')
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-3xl font-bold text-gray-800" style="font-family: var(--font-display);">
                <i class="fas fa-plus-circle mr-2 text-purple-500"></i> Add New Category
            </h2>
            <p class="mt-1 text-sm text-gray-600">Create a new product category for your store</p>
        </div>
        <a href="{{ route('admin.categories.index') }}" class="px-5 py-2.5 bg-gray-200 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-300 transition-all flex items-center shadow-md">
            <i class="fas fa-arrow-left mr-2"></i> Back to Categories
        </a>
    </div>
@endsection

@section('content')
    <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden p-8">
        <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="space-y-6">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Category Name Field -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Category Name <span class="text-red-500">*</span></label>
                        <input type="text" 
                               name="name" 
                               id="name" 
                               value="{{ old('name') }}" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-purple-500 @error('name') border-red-500 @enderror" 
                               placeholder="e.g., Electronics, Fashion, Books"
                               required>
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status Field (Select Dropdown) -->
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <select name="status" id="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-purple-500 @error('status') border-red-500 @enderror">
                            <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Category Image Upload Field -->
                <div class="mt-4">
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Category Image</label>
                    <input type="file" 
                           name="image" 
                           id="image" 
                           class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100 cursor-pointer @error('image') border-red-500 @enderror">
                    @error('image')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Submit and Cancel Buttons -->
            <div class="pt-8 flex justify-end space-x-4">
                <a href="{{ route('admin.categories.index') }}" class="px-6 py-2.5 bg-gray-200 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-300 transition-all flex items-center shadow-md">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-purple-500 to-pink-400 text-white rounded-lg text-sm font-medium hover:shadow-lg hover:from-purple-600 hover:to-pink-500 transition-all flex items-center shadow-md">
                    <i class="fas fa-save mr-2"></i> Save Category
                </button>
            </div>
            
        </form>
    </div>
@endsection