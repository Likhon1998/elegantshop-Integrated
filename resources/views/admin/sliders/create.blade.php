@extends('layouts.admin.app')

@section('title', 'Add New Slider')

@section('header')
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-3xl font-bold text-gray-800" style="font-family: var(--font-display);">
                <i class="fas fa-plus-circle mr-2 text-purple-500"></i> Add New Slider
            </h2>
            <p class="mt-1 text-sm text-gray-600">Create a new slider for your website carousel</p>
        </div>
        <a href="{{ route('admin.sliders.index') }}" class="px-5 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition-all flex items-center shadow-sm">
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
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-purple-50 to-pink-50">
            <h3 class="text-lg font-semibold text-gray-800">
                <i class="fas fa-info-circle mr-2 text-purple-500"></i>Slider Information
            </h3>
            <p class="text-sm text-gray-600 mt-1">Fill in the details below to create a new slider</p>
        </div>

        <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            @include('admin.sliders.form', ['slider' => null])
        </form>
    </div>

    <!-- Help Card -->
    <div class="mt-6 bg-blue-50 border border-blue-200 rounded-xl p-6">
        <div class="flex items-start">
            <div class="flex-shrink-0">
                <i class="fas fa-lightbulb text-blue-500 text-2xl"></i>
            </div>
            <div class="ml-4">
                <h4 class="text-lg font-semibold text-blue-900 mb-2">Tips for Great Sliders</h4>
                <ul class="text-sm text-blue-800 space-y-2">
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-blue-500 mr-2 mt-0.5"></i>
                        <span>Use high-quality images with a minimum resolution of 1920x1080 pixels</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-blue-500 mr-2 mt-0.5"></i>
                        <span>Keep titles short and impactful (3-7 words work best)</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-blue-500 mr-2 mt-0.5"></i>
                        <span>Use the order field to control which slider appears first</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-blue-500 mr-2 mt-0.5"></i>
                        <span>Set status to active only when you're ready to display the slider</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
    /* File input styling */
    input[type="file"] {
        transition: all 0.3s ease;
    }
    
    input[type="file"]:hover {
        border-color: #9370DB;
    }
    
    /* Focus states */
    input:focus, textarea:focus, select:focus {
        outline: none;
        border-color: #9370DB;
        box-shadow: 0 0 0 3px rgba(147, 112, 219, 0.1);
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
        const imageInput = document.querySelector('input[type="file"][name="image"]');
        
        if (imageInput) {
            imageInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    // You can add image preview logic here if needed
                    console.log('Image selected:', file.name);
                }
            });
        }
    });
</script>
@endpush