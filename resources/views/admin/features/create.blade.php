@extends('layouts.admin.app')

@section('title', 'Add New Feature')

@section('header')
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-3xl font-bold text-gray-800" style="font-family: var(--font-display);">
                <i class="fas fa-plus-circle mr-2 text-blue-500"></i> Add New Feature
            </h2>
            <p class="mt-1 text-sm text-gray-600">Create a new feature to showcase on your website</p>
        </div>
        <a href="{{ route('admin.features.index') }}" class="px-5 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition-all flex items-center shadow-sm">
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
        <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-blue-50 to-cyan-50">
            <h3 class="text-lg font-semibold text-gray-800">
                <i class="fas fa-info-circle mr-2 text-blue-500"></i>Feature Details
            </h3>
            <p class="text-sm text-gray-600 mt-1">Fill in the information below to create a new feature</p>
        </div>

        <form action="{{ route('admin.features.store') }}" method="POST" class="p-6">
            @csrf
            @include('admin.features.form')
        </form>
    </div>

    <!-- Icon Reference Card -->
    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Bootstrap Icons -->
        <div class="bg-gradient-to-br from-purple-50 to-purple-100 border border-purple-200 rounded-xl p-6">
            <div class="flex items-center mb-4">
                <div class="w-10 h-10 bg-purple-500 rounded-lg flex items-center justify-center mr-3">
                    <i class="bi bi-bootstrap text-white text-xl"></i>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-purple-900">Bootstrap Icons</h4>
                    <p class="text-sm text-purple-700">Popular icon library</p>
                </div>
            </div>
            <div class="space-y-2">
                <div class="bg-white rounded-lg p-3 flex items-center justify-between">
                    <div class="flex items-center">
                        <i class="bi bi-lightning-charge text-purple-600 text-xl mr-3"></i>
                        <code class="text-sm text-gray-700">bi bi-lightning-charge</code>
                    </div>
                </div>
                <div class="bg-white rounded-lg p-3 flex items-center justify-between">
                    <div class="flex items-center">
                        <i class="bi bi-shield-check text-purple-600 text-xl mr-3"></i>
                        <code class="text-sm text-gray-700">bi bi-shield-check</code>
                    </div>
                </div>
                <div class="bg-white rounded-lg p-3 flex items-center justify-between">
                    <div class="flex items-center">
                        <i class="bi bi-graph-up text-purple-600 text-xl mr-3"></i>
                        <code class="text-sm text-gray-700">bi bi-graph-up</code>
                    </div>
                </div>
            </div>
            <a href="https://icons.getbootstrap.com/" target="_blank" class="mt-4 inline-flex items-center text-sm text-purple-700 font-medium hover:text-purple-900">
                Browse all icons <i class="fas fa-external-link-alt ml-2 text-xs"></i>
            </a>
        </div>

        <!-- FontAwesome Icons -->
        <div class="bg-gradient-to-br from-blue-50 to-blue-100 border border-blue-200 rounded-xl p-6">
            <div class="flex items-center mb-4">
                <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center mr-3">
                    <i class="fas fa-font-awesome text-white text-xl"></i>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-blue-900">FontAwesome Icons</h4>
                    <p class="text-sm text-blue-700">Extensive icon collection</p>
                </div>
            </div>
            <div class="space-y-2">
                <div class="bg-white rounded-lg p-3 flex items-center justify-between">
                    <div class="flex items-center">
                        <i class="fas fa-rocket text-blue-600 text-xl mr-3"></i>
                        <code class="text-sm text-gray-700">fas fa-rocket</code>
                    </div>
                </div>
                <div class="bg-white rounded-lg p-3 flex items-center justify-between">
                    <div class="flex items-center">
                        <i class="fas fa-star text-blue-600 text-xl mr-3"></i>
                        <code class="text-sm text-gray-700">fas fa-star</code>
                    </div>
                </div>
                <div class="bg-white rounded-lg p-3 flex items-center justify-between">
                    <div class="flex items-center">
                        <i class="fas fa-heart text-blue-600 text-xl mr-3"></i>
                        <code class="text-sm text-gray-700">fas fa-heart</code>
                    </div>
                </div>
            </div>
            <a href="https://fontawesome.com/icons" target="_blank" class="mt-4 inline-flex items-center text-sm text-blue-700 font-medium hover:text-blue-900">
                Browse all icons <i class="fas fa-external-link-alt ml-2 text-xs"></i>
            </a>
        </div>
    </div>

    <!-- Tips Card -->
    <div class="mt-6 bg-green-50 border border-green-200 rounded-xl p-6">
        <div class="flex items-start">
            <div class="flex-shrink-0">
                <i class="fas fa-lightbulb text-green-500 text-2xl"></i>
            </div>
            <div class="ml-4">
                <h4 class="text-lg font-semibold text-green-900 mb-2">Tips for Effective Features</h4>
                <ul class="text-sm text-green-800 space-y-2">
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mr-2 mt-0.5"></i>
                        <span>Choose icons that clearly represent the feature's purpose</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mr-2 mt-0.5"></i>
                        <span>Keep titles concise - aim for 2-4 words maximum</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mr-2 mt-0.5"></i>
                        <span>Write descriptions that highlight benefits, not just features</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mr-2 mt-0.5"></i>
                        <span>Test icon preview to ensure it displays correctly</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
    /* Focus states */
    input:focus, textarea:focus, select:focus {
        outline: none;
        border-color: #3B82F6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }
    
    /* Smooth transitions */
    .transition-all {
        transition: all 0.3s ease;
    }
</style>
@endpush