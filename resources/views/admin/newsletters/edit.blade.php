@extends('layouts.admin.app')

@section('title', 'Edit Subscriber')

@section('header')
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-3xl font-bold text-gray-800" style="font-family: var(--font-display);">
                <i class="fas fa-user-edit mr-2 text-indigo-500"></i> Edit Subscriber
            </h2>
            <p class="mt-1 text-sm text-gray-600">Update newsletter subscription details</p>
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

        <!-- Subscriber Info Card -->
        <div class="bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl shadow-sm p-6 mb-6 text-white">
            <div class="flex items-center">
                <div class="flex-shrink-0 w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center text-2xl font-bold">
                    {{ strtoupper(substr($newsletter->email, 0, 1)) }}
                </div>
                <div class="ml-4">
                    <h3 class="text-xl font-semibold">{{ $newsletter->email }}</h3>
                    <p class="text-indigo-100 text-sm mt-1">
                        <i class="far fa-clock mr-1"></i>
                        Subscribed on {{ $newsletter->created_at->format('d M, Y') }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Main Form Card -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gradient-to-r from-indigo-500 to-purple-500 px-6 py-4">
                <h3 class="text-lg font-semibold text-white flex items-center">
                    <i class="fas fa-edit mr-2"></i>Update Subscriber Information
                </h3>
            </div>

            <form action="{{ route('admin.newsletters.update', $newsletter->id) }}" method="POST" class="p-6">
                @csrf
                @method('PUT')

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
                           value="{{ old('email', $newsletter->email) }}"
                           required>
                    <p class="mt-2 text-sm text-gray-500">
                        <i class="fas fa-info-circle mr-1"></i>Update the subscriber's email address
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
                                   {{ old('status', $newsletter->status) ? 'checked' : '' }}>
                            <div class="w-14 h-7 bg-gray-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-gradient-to-r peer-checked:from-emerald-500 peer-checked:to-emerald-600"></div>
                            <span class="ms-3 text-sm">
                                <span class="font-semibold text-gray-900">Active Subscription</span>
                                <span class="block text-gray-500 text-xs mt-1">Toggle to change the subscription status</span>
                            </span>
                        </label>
                    </div>
                </div>

                <!-- Current Status Display -->
                <div class="mb-6">
                    <div class="bg-gradient-to-br from-blue-50 to-indigo-50 border-l-4 border-indigo-500 rounded-lg p-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-info-circle text-indigo-500 text-xl"></i>
                                </div>
                                <div class="ml-3">
                                    <h4 class="text-sm font-semibold text-indigo-900 mb-1">Current Status</h4>
                                    <p class="text-sm text-indigo-700">
                                        This subscriber is currently 
                                        @if($newsletter->status)
                                            <span class="font-semibold text-emerald-600">active</span> and will receive newsletters
                                        @else
                                            <span class="font-semibold text-gray-600">inactive</span> and won't receive newsletters
                                        @endif
                                    </p>
                                </div>
                            </div>
                            @if($newsletter->status)
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                                    <i class="fas fa-check-circle mr-1"></i>Active
                                </span>
                            @else
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-800">
                                    <i class="fas fa-pause-circle mr-1"></i>Inactive
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                    <button type="button" 
                            onclick="openDeleteModal({{ $newsletter->id }}, '{{ $newsletter->email }}')"
                            class="px-6 py-2.5 bg-red-50 text-red-700 rounded-lg text-sm font-medium hover:bg-red-100 transition-colors">
                        <i class="fas fa-trash-alt mr-2"></i>Delete Subscriber
                    </button>
                    <div class="flex items-center space-x-3">
                        <a href="{{ route('admin.newsletters.index') }}" class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-200 transition-colors">
                            <i class="fas fa-times mr-2"></i>Cancel
                        </a>
                        <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-emerald-500 to-emerald-600 text-white rounded-lg text-sm font-medium hover:shadow-lg transition-all">
                            <i class="fas fa-save mr-2"></i>Update Subscriber
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Activity Timeline -->
        <div class="mt-6 bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gray-50 px-6 py-3 border-b border-gray-200">
                <h4 class="font-semibold text-gray-800 flex items-center">
                    <i class="fas fa-history text-indigo-500 mr-2"></i>Activity Timeline
                </h4>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-indigo-400 to-purple-500 rounded-full flex items-center justify-center">
                            <i class="fas fa-user-plus text-white text-sm"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-semibold text-gray-900">Subscribed</p>
                            <p class="text-sm text-gray-500">{{ $newsletter->created_at->format('d M, Y \a\t h:i A') }}</p>
                        </div>
                    </div>
                    @if($newsletter->updated_at != $newsletter->created_at)
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full flex items-center justify-center">
                                <i class="fas fa-edit text-white text-sm"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-semibold text-gray-900">Last Updated</p>
                                <p class="text-sm text-gray-500">{{ $newsletter->updated_at->format('d M, Y \a\t h:i A') }}</p>
                            </div>
                        </div>
                    @endif
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
                    <p class="text-sm text-gray-500 text-center mb-4">Are you sure you want to delete this subscriber? This action cannot be undone.</p>
                    <div class="bg-gray-50 rounded-lg p-3">
                        <p class="text-sm"><strong>Email:</strong> <span id="modalSubscriberEmail"></span></p>
                    </div>
                </div>
                <div class="flex items-center gap-3 px-4 py-3">
                    <button onclick="closeDeleteModal()" class="flex-1 px-4 py-2 bg-gray-100 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-200 transition-colors">
                        Cancel
                    </button>
                    <form id="deleteForm" method="POST" class="flex-1">
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

@push('scripts')
<script>
    // Delete modal functions
    function openDeleteModal(id, email) {
        document.getElementById('modalSubscriberEmail').textContent = email;
        document.getElementById('deleteForm').action = `/admin/newsletters/${id}`;
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }

    // Close modal on outside click
    document.getElementById('deleteModal')?.addEventListener('click', function(e) {
        if (e.target === this) closeDeleteModal();
    });
</script>
@endpush