@extends('layouts.admin.app')

@section('title', 'Add New Brand')

@section('header')
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-3xl font-bold text-gray-800" style="font-family: var(--font-display);">
                <i class="fas fa-plus-square mr-2 text-indigo-500"></i> Add New Brand
            </h2>
            <p class="mt-1 text-sm text-gray-600">Create a new product brand</p>
        </div>
        <a href="{{ route('admin.brands.index') }}" class="px-5 py-2.5 bg-gray-100 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-200 transition-all flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>Back to Brands
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
            <form action="{{ route('admin.brands.store') }}" method="POST" enctype="multipart/form-data" id="brandForm">
                @csrf

                <!-- Basic Information -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-6">
                    <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-indigo-50 to-purple-50">
                        <h3 class="text-lg font-semibold text-gray-800">
                            <i class="fas fa-info-circle mr-2 text-indigo-500"></i>Brand Information
                        </h3>
                    </div>
                    <div class="p-6 space-y-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-tag mr-2 text-indigo-500"></i>Brand Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   name="name" 
                                   id="name"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all @error('name') border-red-500 @enderror"
                                   value="{{ old('name') }}"
                                   placeholder="e.g., Nike, Apple, Samsung"
                                   required>
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-xs text-gray-500">
                                <i class="fas fa-info-circle mr-1"></i>The brand name will be displayed on products
                            </p>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-link mr-2 text-indigo-500"></i>Slug
                            </label>
                            <input type="text" 
                                   name="slug" 
                                   id="slug"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-50 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all"
                                   value="{{ old('slug') }}"
                                   placeholder="Auto-generated from name"
                                   readonly>
                            <p class="mt-1 text-xs text-gray-500">
                                <i class="fas fa-magic mr-1"></i>Automatically generated from brand name
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Brand Logo -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-6">
                    <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-indigo-50 to-purple-50">
                        <h3 class="text-lg font-semibold text-gray-800">
                            <i class="fas fa-image mr-2 text-indigo-500"></i>Brand Logo
                        </h3>
                    </div>
                    <div class="p-6">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Upload Logo
                        </label>
                        <div class="mt-2">
                            <div class="flex items-center justify-center w-full">
                                <label class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition-colors">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <i class="fas fa-cloud-upload-alt text-gray-400 text-4xl mb-3"></i>
                                        <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500">PNG, JPG, SVG or WEBP (MAX. 2MB)</p>
                                        <p class="text-xs text-gray-400 mt-1">Recommended: Square image (500x500px)</p>
                                    </div>
                                    <input type="file" 
                                           name="logo" 
                                           class="hidden" 
                                           accept="image/*"
                                           onchange="previewImage(event)">
                                </label>
                            </div>
                            <div id="imagePreview" class="mt-4 hidden">
                                <p class="text-sm font-semibold text-gray-700 mb-2">Preview:</p>
                                <div class="flex items-center justify-center bg-gray-50 rounded-lg p-4 border-2 border-indigo-200">
                                    <img id="preview" src="" alt="Preview" class="max-h-48 object-contain">
                                </div>
                            </div>
                        </div>
                        @error('logo')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-3">
                    <button type="submit" class="flex-1 px-6 py-3 bg-gradient-to-r from-indigo-500 to-purple-500 text-white rounded-lg font-medium hover:shadow-lg transition-all flex items-center justify-center">
                        <i class="fas fa-check-circle mr-2"></i>Save Brand
                    </button>
                    <a href="{{ route('admin.brands.index') }}" class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg font-medium hover:bg-gray-200 transition-colors flex items-center justify-center">
                        <i class="fas fa-times-circle mr-2"></i>Cancel
                    </a>
                </div>
            </form>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <!-- Brand Preview -->
            <div class="bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl shadow-sm p-6 text-white mb-6">
                <h3 class="text-lg font-semibold mb-4 flex items-center">
                    <i class="fas fa-eye mr-2"></i>Brand Preview
                </h3>
                <div class="bg-white bg-opacity-20 rounded-lg p-4 backdrop-blur-sm">
                    <div class="text-center mb-3">
                        <div id="logoPreviewCard" class="w-24 h-24 mx-auto bg-white rounded-lg flex items-center justify-center mb-3">
                            <i class="fas fa-certificate text-gray-300 text-3xl"></i>
                        </div>
                        <p class="text-lg font-bold" id="namePreview">Brand Name</p>
                        <p class="text-xs text-indigo-100 mt-1" id="slugPreview">brand-slug</p>
                    </div>
                </div>
            </div>

            <!-- Stats Card -->
            <div class="bg-white rounded-xl shadow-sm border border-indigo-200 overflow-hidden mb-6">
                <div class="px-6 py-4 bg-gradient-to-r from-indigo-50 to-purple-50 border-b border-indigo-200">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                        <i class="fas fa-chart-bar mr-2 text-indigo-500"></i>Brand Stats
                    </h3>
                </div>
                <div class="p-6 space-y-3 text-sm">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Total Products</span>
                        <span class="text-gray-900 font-semibold">0</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Status</span>
                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                            <i class="fas fa-circle mr-1 text-xs"></i>New
                        </span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Has Logo</span>
                        <span class="text-red-600 font-semibold" id="hasLogoIndicator">
                            <i class="fas fa-times-circle mr-1"></i>No
                        </span>
                    </div>
                </div>
            </div>

            <!-- Help Card -->
            <div class="bg-white rounded-xl shadow-sm border border-indigo-200 overflow-hidden">
                <div class="px-6 py-4 bg-gradient-to-r from-indigo-50 to-purple-50 border-b border-indigo-200">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                        <i class="fas fa-lightbulb mr-2 text-yellow-500"></i>Tips
                    </h3>
                </div>
                <div class="p-6">
                    <ul class="space-y-3 text-sm text-gray-600">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mr-2 mt-0.5"></i>
                            <span>Use a square logo for best results</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mr-2 mt-0.5"></i>
                            <span>PNG format with transparent background works best</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mr-2 mt-0.5"></i>
                            <span>Brand name should be unique and memorable</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mr-2 mt-0.5"></i>
                            <span>Slug is automatically generated from name</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mr-2 mt-0.5"></i>
                            <span>You can add logo later if not available now</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
// Auto-generate slug from name
document.getElementById('name').addEventListener('input', function(e) {
    const name = e.target.value;
    const slug = name.toLowerCase()
        .replace(/[^\w\s-]/g, '')
        .replace(/\s+/g, '-')
        .replace(/--+/g, '-')
        .trim();
    document.getElementById('slug').value = slug;
    
    // Update preview
    document.getElementById('namePreview').textContent = name || 'Brand Name';
    document.getElementById('slugPreview').textContent = slug || 'brand-slug';
});

// Image preview
function previewImage(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview').src = e.target.result;
            document.getElementById('imagePreview').classList.remove('hidden');
            
            // Update logo preview in card
            const logoPreview = document.getElementById('logoPreviewCard');
            logoPreview.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-contain p-2">`;
            
            // Update indicator
            document.getElementById('hasLogoIndicator').innerHTML = '<i class="fas fa-check-circle mr-1"></i>Yes';
            document.getElementById('hasLogoIndicator').className = 'text-green-600 font-semibold';
        }
        reader.readAsDataURL(file);
    }
}
</script>
@endpush