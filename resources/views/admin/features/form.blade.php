<div class="space-y-6">
    <!-- Icon & Title Row -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                <i class="fas fa-icons text-blue-500 mr-2"></i>Icon Class
            </label>
            <div class="relative">
                <input type="text" 
                       name="icon" 
                       id="icon-input"
                       class="w-full px-4 py-3 pl-12 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" 
                       value="{{ old('icon', $feature->icon ?? '') }}" 
                       placeholder="e.g., bi bi-lightning-charge or fas fa-star">
                <div class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400">
                    <i id="icon-preview" class="{{ old('icon', $feature->icon ?? 'fas fa-question') }} text-lg"></i>
                </div>
            </div>
            @error('icon')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
            <p class="mt-1 text-xs text-gray-500">
                Bootstrap Icons: <code class="text-blue-600">bi bi-star</code> | 
                FontAwesome: <code class="text-blue-600">fas fa-heart</code>
            </p>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                <i class="fas fa-heading text-blue-500 mr-2"></i>Title
                <span class="text-red-500">*</span>
            </label>
            <input type="text" 
                   name="title" 
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" 
                   value="{{ old('title', $feature->title ?? '') }}" 
                   placeholder="Enter feature title"
                   required>
            @error('title')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <!-- Description -->
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">
            <i class="fas fa-align-left text-blue-500 mr-2"></i>Description
        </label>
        <textarea name="description" 
                  rows="4" 
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all resize-none"
                  placeholder="Describe this feature in detail...">{{ old('description', $feature->description ?? '') }}</textarea>
        @error('description')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Status -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                <i class="fas fa-toggle-on text-blue-500 mr-2"></i>Status
            </label>
            <select name="status" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all bg-white">
                <option value="1" {{ old('status', $feature->status ?? 1) == 1 ? 'selected' : '' }}>
                    ✓ Active
                </option>
                <option value="0" {{ old('status', $feature->status ?? 1) == 0 ? 'selected' : '' }}>
                    ✕ Inactive
                </option>
            </select>
            @error('status')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Preview Card -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                <i class="fas fa-eye text-blue-500 mr-2"></i>Live Preview
            </label>
            <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 bg-gray-50 h-full flex items-center justify-center">
                <div class="text-center">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-2">
                        <i id="preview-icon" class="{{ old('icon', $feature->icon ?? 'fas fa-star') }} text-blue-600 text-xl"></i>
                    </div>
                    <p id="preview-title" class="font-semibold text-gray-900 text-sm">
                        {{ old('title', $feature->title ?? 'Feature Title') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200">
        <a href="{{ route('admin.features.index') }}" 
           class="px-6 py-3 bg-white border border-gray-300 text-gray-700 rounded-lg font-medium hover:bg-gray-50 transition-all flex items-center">
            <i class="fas fa-times mr-2"></i>Cancel
        </a>
        <button type="submit" 
                class="px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg font-medium hover:shadow-lg transition-all flex items-center">
            <i class="fas fa-save mr-2"></i>{{ isset($feature) ? 'Update Feature' : 'Create Feature' }}
        </button>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Icon preview functionality
        const iconInput = document.getElementById('icon-input');
        const iconPreview = document.getElementById('icon-preview');
        const previewIcon = document.getElementById('preview-icon');
        
        if (iconInput) {
            iconInput.addEventListener('input', function(e) {
                const iconClass = e.target.value || 'fas fa-question';
                
                // Update both preview locations
                iconPreview.className = iconClass + ' text-lg';
                previewIcon.className = iconClass + ' text-blue-600 text-xl';
            });
        }

        // Title preview functionality
        const titleInput = document.querySelector('input[name="title"]');
        const previewTitle = document.getElementById('preview-title');
        
        if (titleInput) {
            titleInput.addEventListener('input', function(e) {
                previewTitle.textContent = e.target.value || 'Feature Title';
            });
        }
    });
</script>
@endpush