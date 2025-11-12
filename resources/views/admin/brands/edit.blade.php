@extends('layouts.admin.app')

@section('title', 'Edit Brand')

@section('header')
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-3xl font-bold text-gray-800" style="font-family: var(--font-display);">
                <i class="fas fa-edit mr-2 text-indigo-500"></i> Edit Brand
            </h2>
            <p class="mt-1 text-sm text-gray-600">Update brand information and logo</p>
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
            <form action="{{ route('admin.brands.update', $brand->id) }}" method="POST" enctype="multipart/form-data" id="brandForm">
                @csrf
                @method('PUT')

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
                                   value="{{ old('name', $brand->name) }}"
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
                                   value="{{ old('slug', $brand->slug) }}"
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
                        <!-- Current Logo -->
                        @if($brand->logo)
                            <div class="mb-4">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Current Logo</label>
                                <div class="relative group inline-block">
                                    <div class="w-48 h-48 bg-gray-50 rounded-lg border-2 border-indigo-200 flex items-center justify-center p-4">
                                        <img src="{{ asset('storage/'.$brand->logo) }}" 
                                             alt="{{ $brand->name }}" 
                                             class="max-w-full max-h-full object-contain">
                                    </div>
                                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 rounded-lg transition-all flex items-center justify-center">
                                        <button type="button" 
                                                onclick="document.getElementById('removeLogoCheckbox').checked = !document.getElementById('removeLogoCheckbox').checked; toggleRemoveButton()"
                                                class="opacity-0 group-hover:opacity-100 px-4 py-2 bg-white text-gray-700 rounded-lg font-medium hover:bg-red-50 hover:text-red-700 transition-all">
                                            <i class="fas fa-trash mr-2"></i>Remove Logo
                                        </button>
                                    </div>
                                </div>
                                <div class="mt-2 flex items-center">
                                    <input type="checkbox" 
                                           name="remove_logo" 
                                           id="removeLogoCheckbox"
                                           value="1"
                                           class="w-4 h-4 text-red-600 border-gray-300 rounded focus:ring-red-500"
                                           onchange="toggleRemoveButton()">
                                    <label for="removeLogoCheckbox" class="ml-2 text-sm text-gray-600">
                                        Remove current logo
                                    </label>
                                </div>
                            </div>
                        @else
                            <p class="text-sm text-gray-500 mb-4">
                                <i class="fas fa-info-circle mr-2"></i>No logo currently uploaded
                            </p>
                        @endif

                        <!-- Upload New Logo -->
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            {{ $brand->logo ? 'Upload New Logo' : 'Upload Logo' }}
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
                                <p class="text-sm font-semibold text-gray-700 mb-2">New Logo Preview:</p>
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
                        <i class="fas fa-check-circle mr-2"></i>Update Brand
                    </button>
                    <a href="{{ route('admin.brands.index') }}" class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg font-medium hover:bg-gray-200 transition-colors flex items-center justify-center">
                        <i class="fas fa-times-circle mr-2"></i>Cancel
                    </a>
                    <button type="button" onclick="openDeleteModal()" class="px-6 py-3 bg-red-50 text-red-600 rounded-lg font-medium hover:bg-red-100 transition-colors flex items-center justify-center">
                        <i class="fas fa-trash mr-2"></i>Delete
                    </button>
                </div>
            </form>

            <!-- Brand Information -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 mt-6 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                        <i class="fas fa-info-circle mr-2 text-indigo-500"></i>Brand Information
                    </h3>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div class="bg-gray-50 rounded-lg p-4">
                            <p class="text-gray-600 mb-1">Created</p>
                            <p class="font-semibold text-gray-900">{{ $brand->created_at->format('d M Y, h:i A') }}</p>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-4">
                            <p class="text-gray-600 mb-1">Last Updated</p>
                            <p class="font-semibold text-gray-900">{{ $brand->updated_at->format('d M Y, h:i A') }}</p>
                        </div>
                    </div>
                </div>
            </div>
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
                        <div id="logoPreviewCard" class="w-24 h-24 mx-auto bg-white rounded-lg flex items-center justify-center mb-3 p-2">
                            @if($brand->logo)
                                <img src="{{ asset('storage/'.$brand->logo) }}" alt="{{ $brand->name }}" class="max-w-full max-h-full object-contain">
                            @else
                                <i class="fas fa-certificate text-gray-300 text-3xl"></i>
                            @endif
                        </div>
                        <p class="text-lg font-bold" id="namePreview">{{ $brand->name }}</p>
                        <p class="text-xs text-indigo-100 mt-1" id="slugPreview">{{ $brand->slug }}</p>
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
                        <span class="text-gray-900 font-semibold">{{ $brand->products_count ?? 0 }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Status</span>
                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                            <i class="fas fa-circle mr-1 text-xs"></i>Active
                        </span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Has Logo</span>
                        @if($brand->logo)
                            <span class="text-green-600 font-semibold" id="hasLogoIndicator">
                                <i class="fas fa-check-circle mr-1"></i>Yes
                            </span>
                        @else
                            <span class="text-red-600 font-semibold" id="hasLogoIndicator">
                                <i class="fas fa-times-circle mr-1"></i>No
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-xl shadow-sm border border-indigo-200 overflow-hidden mb-6">
                <div class="px-6 py-4 bg-gradient-to-r from-indigo-50 to-purple-50 border-b border-indigo-200">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                        <i class="fas fa-bolt mr-2 text-indigo-500"></i>Quick Actions
                    </h3>
                </div>
                <div class="p-6 space-y-3">
                    <a href="#" class="flex items-center justify-between px-4 py-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors text-sm">
                        <span class="text-gray-700 font-medium">
                            <i class="fas fa-box mr-2 text-indigo-500"></i>View Products
                        </span>
                        <i class="fas fa-arrow-right text-gray-400"></i>
                    </a>
                    <a href="#" class="flex items-center justify-between px-4 py-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors text-sm">
                        <span class="text-gray-700 font-medium">
                            <i class="fas fa-plus mr-2 text-indigo-500"></i>Add Product
                        </span>
                        <i class="fas fa-arrow-right text-gray-400"></i>
                    </a>
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
                            <span>Changes are saved immediately</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mr-2 mt-0.5"></i>
                            <span>Upload new logo to replace current one</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mr-2 mt-0.5"></i>
                            <span>Slug is auto-updated when name changes</span>
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
                    <p class="text-sm text-gray-500 text-center mb-4">Are you sure you want to delete this brand?</p>
                    <div class="bg-gray-50 rounded-lg p-3">
                        <p class="text-sm"><strong>Brand:</strong> {{ $brand->name }}</p>
                        @if($brand->products_count ?? 0 > 0)
                            <p class="text-sm mt-1 text-red-600"><strong>Warning:</strong> This brand has {{ $brand->products_count }} associated products!</p>
                        @endif
                    </div>
                </div>
                <div class="flex items-center gap-3 px-4 py-3">
                    <button onclick="closeDeleteModal()" class="flex-1 px-4 py-2 bg-gray-100 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-200 transition-colors">
                        Cancel
                    </button>
                    <form action="{{ route('admin.brands.destroy', $brand->id) }}" method="POST" class="flex-1">
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
    document.getElementById('namePreview').textContent = name || '{{ $brand->name }}';
    document.getElementById('slugPreview').textContent = slug || '{{ $brand->slug }}';
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
            logoPreview.innerHTML = `<img src="${e.target.result}" class="max-w-full max-h-full object-contain">`;
            
            // Update indicator
            document.getElementById('hasLogoIndicator').innerHTML = '<i class="fas fa-check-circle mr-1"></i>Yes';
            document.getElementById('hasLogoIndicator').className = 'text-green-600 font-semibold';
        }
        reader.readAsDataURL(file);
    }
}

// Toggle remove button state
function toggleRemoveButton() {
    const checkbox = document.getElementById('removeLogoCheckbox');
    const indicator = document.getElementById('hasLogoIndicator');
    
    if (checkbox.checked) {
        indicator.innerHTML = '<i class="fas fa-times-circle mr-1"></i>Will be removed';
        indicator.className = 'text-orange-600 font-semibold';
    } else {
        indicator.innerHTML = '<i class="fas fa-check-circle mr-1"></i>Yes';
        indicator.className = 'text-green-600 font-semibold';
    }
}

// Delete modal functions
function openDeleteModal() {
    document.getElementById('deleteModal').classList.remove('hidden');
}

function closeDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
}

document.getElementById('deleteModal')?.addEventListener('click', function(e) {
    if (e.target === this) closeDeleteModal();
});
</script>
@endpush