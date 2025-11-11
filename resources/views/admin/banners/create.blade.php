@extends('layouts.admin.app')

@section('title', 'Add New Banner')

@section('header')
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-3xl font-bold text-gray-800" style="font-family: var(--font-display);">
                <i class="fas fa-plus-square mr-2 text-purple-500"></i> Add New Banner
            </h2>
            <p class="mt-1 text-sm text-gray-600">Create a new promotional banner</p>
        </div>
        <a href="{{ route('admin.banners.index') }}" class="px-5 py-2.5 bg-gray-100 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-200 transition-all flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>Back to Banners
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
            <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data" id="bannerForm">
                @csrf

                <!-- Basic Information -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-6">
                    <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-purple-50 to-pink-50">
                        <h3 class="text-lg font-semibold text-gray-800">
                            <i class="fas fa-info-circle mr-2 text-purple-500"></i>Basic Information
                        </h3>
                    </div>
                    <div class="p-6 space-y-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-heading mr-2 text-purple-500"></i>Title
                            </label>
                            <input type="text" 
                                   name="title" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all @error('title') border-red-500 @enderror"
                                   value="{{ old('title') }}"
                                   placeholder="Enter banner title">
                            @error('title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-text-height mr-2 text-purple-500"></i>Subtitle
                            </label>
                            <input type="text" 
                                   name="subtitle" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all @error('subtitle') border-red-500 @enderror"
                                   value="{{ old('subtitle') }}"
                                   placeholder="Enter banner subtitle">
                            @error('subtitle')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-align-left mr-2 text-purple-500"></i>Description
                            </label>
                            <textarea name="description" 
                                      rows="4" 
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all @error('description') border-red-500 @enderror"
                                      placeholder="Enter banner description">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Banner Image -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-6">
                    <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-purple-50 to-pink-50">
                        <h3 class="text-lg font-semibold text-gray-800">
                            <i class="fas fa-image mr-2 text-purple-500"></i>Banner Image
                        </h3>
                    </div>
                    <div class="p-6">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Upload Image <span class="text-red-500">*</span>
                        </label>
                        <div class="mt-2">
                            <div class="flex items-center justify-center w-full">
                                <label class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition-colors">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <i class="fas fa-cloud-upload-alt text-gray-400 text-4xl mb-3"></i>
                                        <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500">PNG, JPG or WEBP (MAX. 2MB)</p>
                                    </div>
                                    <input type="file" 
                                           name="image" 
                                           class="hidden" 
                                           accept="image/*"
                                           onchange="previewImage(event)">
                                </label>
                            </div>
                            <div id="imagePreview" class="mt-4 hidden">
                                <img id="preview" src="" alt="Preview" class="w-full h-64 object-cover rounded-lg border-2 border-purple-200">
                            </div>
                        </div>
                        @error('image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Call to Action -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-6">
                    <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-purple-50 to-pink-50">
                        <h3 class="text-lg font-semibold text-gray-800">
                            <i class="fas fa-mouse-pointer mr-2 text-purple-500"></i>Call to Action
                        </h3>
                    </div>
                    <div class="p-6 space-y-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-font mr-2 text-purple-500"></i>Button Text
                            </label>
                            <input type="text" 
                                   name="button_text" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                                   value="{{ old('button_text') }}"
                                   placeholder="e.g., Shop Now, Learn More">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-link mr-2 text-purple-500"></i>Button Link
                            </label>
                            <input type="text" 
                                   name="button_link" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                                   value="{{ old('button_link') }}"
                                   placeholder="e.g., /products or https://example.com">
                        </div>
                    </div>
                </div>

                <!-- Settings -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-6">
                    <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-purple-50 to-pink-50">
                        <h3 class="text-lg font-semibold text-gray-800">
                            <i class="fas fa-cog mr-2 text-purple-500"></i>Settings
                        </h3>
                    </div>
                    <div class="p-6 space-y-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-sort-numeric-up mr-2 text-purple-500"></i>Display Order
                            </label>
                            <input type="number" 
                                   name="order" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                                   value="{{ old('order', 0) }}"
                                   min="0">
                            <p class="mt-1 text-xs text-gray-500">Lower numbers appear first</p>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" 
                                   name="status" 
                                   value="1" 
                                   id="status"
                                   class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500"
                                   {{ old('status', true) ? 'checked' : '' }}>
                            <label for="status" class="ml-2 text-sm font-medium text-gray-700">
                                <i class="fas fa-toggle-on mr-2 text-purple-500"></i>Active (Show on website)
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-3">
                    <button type="submit" class="flex-1 px-6 py-3 bg-gradient-to-r from-purple-500 to-pink-500 text-white rounded-lg font-medium hover:shadow-lg transition-all flex items-center justify-center">
                        <i class="fas fa-check-circle mr-2"></i>Save Banner
                    </button>
                    <a href="{{ route('admin.banners.index') }}" class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg font-medium hover:bg-gray-200 transition-colors flex items-center justify-center">
                        <i class="fas fa-times-circle mr-2"></i>Cancel
                    </a>
                </div>
            </form>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <!-- Preview Card -->
            <div class="bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl shadow-sm p-6 text-white mb-6">
                <h3 class="text-lg font-semibold mb-4 flex items-center">
                    <i class="fas fa-eye mr-2"></i>Banner Preview
                </h3>
                <div class="bg-white bg-opacity-20 rounded-lg p-4 backdrop-blur-sm">
                    <p class="text-sm text-purple-100 mb-2">Banner will appear on:</p>
                    <ul class="text-sm space-y-1">
                        <li><i class="fas fa-check-circle mr-2"></i>Homepage Hero Section</li>
                        <li><i class="fas fa-check-circle mr-2"></i>Promotional Banners</li>
                        <li><i class="fas fa-check-circle mr-2"></i>Category Pages</li>
                    </ul>
                </div>
            </div>

            <!-- Help Card -->
            <div class="bg-white rounded-xl shadow-sm border border-purple-200 overflow-hidden">
                <div class="px-6 py-4 bg-gradient-to-r from-purple-50 to-pink-50 border-b border-purple-200">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                        <i class="fas fa-lightbulb mr-2 text-yellow-500"></i>Tips
                    </h3>
                </div>
                <div class="p-6">
                    <ul class="space-y-3 text-sm text-gray-600">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mr-2 mt-0.5"></i>
                            <span>Use high-quality images (1920x600px recommended)</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mr-2 mt-0.5"></i>
                            <span>Keep titles short and compelling</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mr-2 mt-0.5"></i>
                            <span>Add clear call-to-action buttons</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mr-2 mt-0.5"></i>
                            <span>Use order numbers to control display sequence</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mr-2 mt-0.5"></i>
                            <span>Test banners on mobile devices</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
function previewImage(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview').src = e.target.result;
            document.getElementById('imagePreview').classList.remove('hidden');
        }
        reader.readAsDataURL(file);
    }
}
</script>
@endpush