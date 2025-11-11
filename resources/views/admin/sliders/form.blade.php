<div class="space-y-6">
    <!-- Title & Subtitle Row -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                <i class="fas fa-heading text-purple-500 mr-2"></i>Title
                <span class="text-red-500">*</span>
            </label>
            <input type="text" 
                   name="title" 
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all" 
                   value="{{ old('title', $slider->title ?? '') }}" 
                   placeholder="Enter slider title"
                   required>
            @error('title')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                <i class="fas fa-text-width text-purple-500 mr-2"></i>Subtitle
            </label>
            <input type="text" 
                   name="subtitle" 
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                   value="{{ old('subtitle', $slider->subtitle ?? '') }}"
                   placeholder="Enter slider subtitle">
            @error('subtitle')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <!-- Description -->
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">
            <i class="fas fa-align-left text-purple-500 mr-2"></i>Description
        </label>
        <textarea name="description" 
                  rows="4" 
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all resize-none"
                  placeholder="Enter slider description (optional)">{{ old('description', $slider->description ?? '') }}</textarea>
        @error('description')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Button Text & Link Row -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                <i class="fas fa-mouse-pointer text-purple-500 mr-2"></i>Button Text
            </label>
            <input type="text" 
                   name="button_text" 
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                   value="{{ old('button_text', $slider->button_text ?? '') }}"
                   placeholder="e.g., Learn More, Shop Now">
            @error('button_text')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                <i class="fas fa-link text-purple-500 mr-2"></i>Button Link
            </label>
            <input type="text" 
                   name="button_link" 
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                   value="{{ old('button_link', $slider->button_link ?? '') }}"
                   placeholder="https://example.com">
            @error('button_link')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <!-- Order & Status Row -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                <i class="fas fa-sort-numeric-down text-purple-500 mr-2"></i>Display Order
            </label>
            <input type="number" 
                   name="order" 
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                   value="{{ old('order', $slider->order ?? 0) }}"
                   min="0"
                   placeholder="0">
            @error('order')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
            <p class="mt-1 text-xs text-gray-500">Lower numbers appear first</p>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                <i class="fas fa-toggle-on text-purple-500 mr-2"></i>Status
            </label>
            <select name="status" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all bg-white">
                <option value="1" {{ old('status', $slider->status ?? 1) == 1 ? 'selected' : '' }}>
                    ✓ Active
                </option>
                <option value="0" {{ old('status', $slider->status ?? 1) == 0 ? 'selected' : '' }}>
                    ✕ Inactive
                </option>
            </select>
            @error('status')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <!-- Image Upload -->
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">
            <i class="fas fa-image text-purple-500 mr-2"></i>Slider Image
            @if(!isset($slider))
                <span class="text-red-500">*</span>
            @endif
        </label>
        
        <div class="relative">
            <input type="file" 
                   name="image" 
                   id="image-input"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100"
                   accept="image/*"
                   {{ !isset($slider) ? 'required' : '' }}>
        </div>
        @error('image')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
        <p class="mt-1 text-xs text-gray-500">Recommended: 1920x1080px, Max: 2MB (JPG, PNG, WebP)</p>

        <!-- Current Image Preview -->
        @if(isset($slider) && $slider->image)
            <div class="mt-4">
                <p class="text-sm font-medium text-gray-700 mb-2">Current Image:</p>
                <div class="relative inline-block">
                    <img src="{{ asset('storage/' . $slider->image) }}" 
                         class="w-64 h-36 object-cover rounded-lg shadow-md border-2 border-gray-200" 
                         alt="Current slider image">
                    <div class="absolute top-2 right-2">
                        <span class="inline-flex items-center px-2 py-1 rounded-md text-xs font-medium bg-green-100 text-green-800">
                            <i class="fas fa-check-circle mr-1"></i>Current
                        </span>
                    </div>
                </div>
            </div>
        @endif

        <!-- New Image Preview -->
        <div id="image-preview" class="mt-4 hidden">
            <p class="text-sm font-medium text-gray-700 mb-2">New Image Preview:</p>
            <div class="relative inline-block">
                <img id="preview-img" 
                     class="w-64 h-36 object-cover rounded-lg shadow-md border-2 border-purple-200" 
                     alt="Preview">
                <div class="absolute top-2 right-2">
                    <span class="inline-flex items-center px-2 py-1 rounded-md text-xs font-medium bg-purple-100 text-purple-800">
                        <i class="fas fa-eye mr-1"></i>Preview
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200">
        <a href="{{ route('admin.sliders.index') }}" 
           class="px-6 py-3 bg-white border border-gray-300 text-gray-700 rounded-lg font-medium hover:bg-gray-50 transition-all flex items-center">
            <i class="fas fa-times mr-2"></i>Cancel
        </a>
        <button type="submit" 
                class="px-6 py-3 bg-gradient-to-r from-purple-500 to-pink-400 text-white rounded-lg font-medium hover:shadow-lg transition-all flex items-center">
            <i class="fas fa-save mr-2"></i>{{ isset($slider) ? 'Update Slider' : 'Create Slider' }}
        </button>
    </div>
</div>

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