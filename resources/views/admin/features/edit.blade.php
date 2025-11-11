@extends('layouts.admin.app')

@section('title', 'Edit Feature')

@section('header')
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-3xl font-bold text-gray-800" style="font-family: var(--font-display);">
                <i class="fas fa-edit mr-2 text-blue-500"></i> Edit Feature
            </h2>
            <p class="mt-1 text-sm text-gray-600">Update feature information and settings</p>
        </div>
        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.features.index') }}" class="px-5 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition-all flex items-center shadow-sm">
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

    <!-- Feature Info Card -->
    <div class="bg-gradient-to-r from-blue-50 to-cyan-50 border border-blue-200 rounded-xl p-6 mb-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div class="w-16 h-16 bg-white rounded-xl shadow-md flex items-center justify-center border-2 border-blue-200">
                    <i class="{{ $feature->icon ?? 'fas fa-star' }} text-blue-600 text-2xl"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-900">{{ $feature->title }}</h3>
                    <p class="text-sm text-gray-600 mt-1 max-w-md">{{ Str::limit($feature->description, 80) }}</p>
                    <div class="flex items-center space-x-3 mt-2">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $feature->status ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                            <i class="fas fa-circle text-xs mr-1.5 {{ $feature->status ? 'text-green-500' : 'text-gray-500' }}"></i>
                            {{ $feature->status ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="text-right">
                <p class="text-xs text-gray-500">Feature ID</p>
                <p class="text-sm font-semibold text-gray-900">#{{ $feature->id }}</p>
            </div>
        </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-blue-50 to-cyan-50">
            <h3 class="text-lg font-semibold text-gray-800">
                <i class="fas fa-info-circle mr-2 text-blue-500"></i>Feature Details
            </h3>
            <p class="text-sm text-gray-600 mt-1">Update the feature information below</p>
        </div>

        <form action="{{ route('admin.features.update', $feature->id) }}" method="POST" class="p-6">
            @csrf
            @method('PUT')
            @include('admin.features.form', ['feature' => $feature])
        </form>
    </div>

    <!-- Quick Actions Card -->
    <div class="mt-6 bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <h4 class="text-lg font-semibold text-gray-800 mb-4">
            <i class="fas fa-bolt mr-2 text-yellow-500"></i>Quick Actions
        </h4>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- Toggle Status -->
            <form action="{{ route('admin.features.update', $feature->id) }}" method="POST" class="w-full">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="{{ $feature->status ? 0 : 1 }}">
                <input type="hidden" name="title" value="{{ $feature->title }}">
                <input type="hidden" name="icon" value="{{ $feature->icon }}">
                <button type="submit" class="w-full px-4 py-3 bg-blue-50 text-blue-700 rounded-lg hover:bg-blue-100 transition-all flex items-center justify-center font-medium">
                    <i class="fas fa-toggle-{{ $feature->status ? 'off' : 'on' }} mr-2"></i>
                    {{ $feature->status ? 'Deactivate' : 'Activate' }} Feature
                </button>
            </form>

            <!-- Delete Feature -->
            <form action="{{ route('admin.features.destroy', $feature->id) }}" 
                  method="POST" 
                  class="w-full"
                  onsubmit="return confirm('Are you sure you want to delete this feature? This action cannot be undone.')">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-full px-4 py-3 bg-red-50 text-red-700 rounded-lg hover:bg-red-100 transition-all flex items-center justify-center font-medium">
                    <i class="fas fa-trash mr-2"></i>Delete Feature
                </button>
            </form>

            <!-- View All Features -->
            <a href="{{ route('admin.features.index') }}" class="w-full px-4 py-3 bg-gray-50 text-gray-700 rounded-lg hover:bg-gray-100 transition-all flex items-center justify-center font-medium">
                <i class="fas fa-eye mr-2"></i>View All Features
            </a>
        </div>
    </div>

    <!-- Icon Reference Card -->
    <div class="mt-6 bg-gradient-to-br from-indigo-50 to-purple-50 border border-indigo-200 rounded-xl p-6">
        <div class="flex items-start">
            <div class="flex-shrink-0">
                <div class="w-12 h-12 bg-indigo-500 rounded-lg flex items-center justify-center">
                    <i class="fas fa-palette text-white text-xl"></i>
                </div>
            </div>
            <div class="ml-4 flex-1">
                <h4 class="text-lg font-semibold text-indigo-900 mb-2">Need Different Icons?</h4>
                <p class="text-sm text-indigo-800 mb-3">Browse thousands of icons from popular libraries:</p>
                <div class="flex flex-wrap gap-3">
                    <a href="https://icons.getbootstrap.com/" target="_blank" class="inline-flex items-center px-4 py-2 bg-white text-indigo-700 rounded-lg hover:shadow-md transition-all text-sm font-medium">
                        <i class="bi bi-bootstrap mr-2"></i>Bootstrap Icons
                        <i class="fas fa-external-link-alt ml-2 text-xs"></i>
                    </a>
                    <a href="https://fontawesome.com/icons" target="_blank" class="inline-flex items-center px-4 py-2 bg-white text-indigo-700 rounded-lg hover:shadow-md transition-all text-sm font-medium">
                        <i class="fas fa-font-awesome mr-2"></i>FontAwesome
                        <i class="fas fa-external-link-alt ml-2 text-xs"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modification History -->
    @if($feature->updated_at)
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
                        <p class="text-xs text-gray-500 mt-0.5">{{ $feature->created_at->format('M d, Y \a\t h:i A') }}</p>
                        <p class="text-xs text-gray-400 mt-0.5">{{ $feature->created_at->diffForHumans() }}</p>
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
                        <p class="text-xs text-gray-500 mt-0.5">{{ $feature->updated_at->format('M d, Y \a\t h:i A') }}</p>
                        <p class="text-xs text-gray-400 mt-0.5">{{ $feature->updated_at->diffForHumans() }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@push('styles')
<style>
    /* Smooth transitions */
    .transition-all {
        transition: all 0.3s ease;
    }
    
    /* Focus states */
    input:focus, textarea:focus, select:focus {
        outline: none;
        border-color: #3B82F6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }
    
    /* Hover effects for action buttons */
    button:hover, a:hover {
        transform: translateY(-1px);
    }
</style>
@endpush

@push('scripts')
<script>
    // Auto-hide success messages after 5 seconds
    document.addEventListener('DOMContentLoaded', function() {
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