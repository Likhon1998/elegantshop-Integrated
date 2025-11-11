@extends('layouts.admin.app')

@section('title', 'Add New Subscriber')

@section('header')
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-3xl font-bold text-gray-800" style="font-family: var(--font-display);">
                <i class="fas fa-user-plus mr-2 text-indigo-500"></i> Add New Subscriber
            </h2>
            <p class="mt-1 text-sm text-gray-600">Create a new newsletter subscription</p>
        </div>
        <a href="{{ route('admin.newsletters.index') }}" class="px-5 py-2.5 bg-gray-100 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-200 transition-all flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>Back to List
        </a>
    </div>
@endsection

@section('content')
    <div class="max-w-3xl mx-auto">
        <!-- Error Messages -->
        @if($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 rounded-lg p-4 mb-6">
                <div class="flex items-start">
                    <i class="fas fa-exclamation-circle text-red-500 text-xl mr-3 mt-0.5"></i>
                    <div class="flex-1">
                        <h3 class="text-red-800 font-semibold mb-2">Please fix the following errors:</h3>
                        <ul class="list-disc list-inside text-red-700 text-sm space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <!-- Main Form Card -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gradient-to-r from-indigo-500 to-purple-500 px-6 py-4">
                <h3 class="text-lg font-semibold text-white flex items-center">
                    <i class="fas fa-clipboard-list mr-2"></i>Subscriber Information
                </h3>
            </div>

            <form action="{{ route('admin.newsletters.store') }}" method="POST" class="p-6">
                @csrf

                <!-- Email Field -->
                <div class="mb-6">
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-envelope text-indigo-500 mr-2"></i>Email Address
                        <span class="text-red-500">*</span>
                    </label>
                    <input type="email" 
                           name="email" 
                           id="email"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all @error('email') border-red-500 @enderror" 
                           placeholder="subscriber@example.com"
                           value="{{ old('email') }}"
                           required>
                    <p class="mt-2 text-sm text-gray-500">
                        <i class="fas fa-info-circle mr-1"></i>Enter a valid email address for the subscriber
                    </p>
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status Field -->
                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-3">
                        <i class="fas fa-toggle-on text-indigo-500 mr-2"></i>Subscription Status
                    </label>
                    <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-lg p-4 border border-gray-200">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" 
                                   name="status" 
                                   id="status"
                                   value="1" 
                                   class="sr-only peer"
                                   {{ old('status', true) ? 'checked' : '' }}>
                            <div class="w-14 h-7 bg-gray-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-gradient-to-r peer-checked:from-emerald-500 peer-checked:to-emerald-600"></div>
                            <span class="ms-3 text-sm">
                                <span class="font-semibold text-gray-900">Active Subscription</span>
                                <span class="block text-gray-500 text-xs mt-1">Toggle to set the subscription status</span>
                            </span>
                        </label>
                    </div>
                </div>

                <!-- Info Box -->
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 border-l-4 border-indigo-500 rounded-lg p-4 mb-6">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <i class="fas fa-lightbulb text-indigo-500 text-2xl"></i>
                        </div>
                        <div class="ml-3">
                            <h4 class="text-sm font-semibold text-indigo-900 mb-1">Quick Tip</h4>
                            <p class="text-sm text-indigo-700">
                                Active subscribers will receive all newsletter communications. You can change the status at any time from the edit page.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.newsletters.index') }}" class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-200 transition-colors">
                        <i class="fas fa-times mr-2"></i>Cancel
                    </a>
                    <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-emerald-500 to-emerald-600 text-white rounded-lg text-sm font-medium hover:shadow-lg transition-all">
                        <i class="fas fa-check-circle mr-2"></i>Save Subscriber
                    </button>
                </div>
            </form>
        </div>

        <!-- Help Card -->
        <div class="mt-6 bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gray-50 px-6 py-3 border-b border-gray-200">
                <h4 class="font-semibold text-gray-800 flex items-center">
                    <i class="fas fa-question-circle text-indigo-500 mr-2"></i>Need Help?
                </h4>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-green-400 to-emerald-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-check text-white"></i>
                        </div>
                        <div>
                            <h5 class="font-semibold text-gray-900 text-sm mb-1">Valid Email Format</h5>
                            <p class="text-sm text-gray-600">Ensure the email address is properly formatted</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-indigo-400 to-purple-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-shield-alt text-white"></i>
                        </div>
                        <div>
                            <h5 class="font-semibold text-gray-900 text-sm mb-1">Privacy Protected</h5>
                            <p class="text-sm text-gray-600">All subscriber data is securely stored</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
    input:focus {
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
    }
    
    .peer:checked ~ div {
        background: linear-gradient(to right, #10b981, #059669);
    }
</style>
@endpush