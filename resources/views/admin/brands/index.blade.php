@extends('layouts.admin.app')

@section('title', 'Brands Management')

@section('header')
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-3xl font-bold text-gray-800" style="font-family: var(--font-display);">
                <i class="fas fa-certificate mr-2 text-indigo-500"></i> Brands Management
            </h2>
            <p class="mt-1 text-sm text-gray-600">Manage product brands and manufacturers</p>
        </div>
        <a href="{{ route('admin.brands.create') }}" class="px-5 py-2.5 bg-gradient-to-r from-indigo-500 to-purple-400 text-white rounded-lg text-sm font-medium hover:shadow-lg transition-all flex items-center">
            <i class="fas fa-plus-circle mr-2"></i>Add Brand
        </a>
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

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
        <div class="bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-xl shadow-sm p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-indigo-100 text-sm font-medium">Total Brands</p>
                    <h3 class="text-3xl font-bold mt-2">{{ $brands->total() }}</h3>
                </div>
                <div class="w-14 h-14 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                    <i class="fas fa-certificate text-2xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl shadow-sm p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-purple-100 text-sm font-medium">With Logos</p>
                    <h3 class="text-3xl font-bold mt-2">{{ $brands->whereNotNull('logo')->count() }}</h3>
                </div>
                <div class="w-14 h-14 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                    <i class="fas fa-image text-2xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-pink-500 to-pink-600 rounded-xl shadow-sm p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-pink-100 text-sm font-medium">Active Brands</p>
                    <h3 class="text-3xl font-bold mt-2">{{ $brands->count() }}</h3>
                </div>
                <div class="w-14 h-14 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                    <i class="fas fa-check-circle text-2xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-cyan-500 to-cyan-600 rounded-xl shadow-sm p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-cyan-100 text-sm font-medium">This Page</p>
                    <h3 class="text-3xl font-bold mt-2">{{ $brands->count() }}</h3>
                </div>
                <div class="w-14 h-14 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                    <i class="fas fa-list text-2xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Brands Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-800">All Brands</h3>
                <div class="flex items-center space-x-2">
                    <input type="text" placeholder="Search brands..." class="px-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg text-sm hover:bg-gray-200 transition-colors">
                        <i class="fas fa-filter mr-2"></i>Filter
                    </button>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Logo</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Brand Name</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Slug</th>
                        <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($brands as $brand)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm font-medium text-gray-900">#{{ $loop->iteration }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($brand->logo)
                                    <div class="relative group">
                                        <img src="{{ asset('storage/'.$brand->logo) }}" 
                                             alt="{{ $brand->name }}" 
                                             class="w-16 h-16 object-contain rounded-lg border-2 border-gray-200 cursor-pointer hover:border-indigo-400 transition-all bg-white p-1"
                                             onclick="showImageModal('{{ asset('storage/'.$brand->logo) }}', '{{ $brand->name }}')">
                                        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 rounded-lg transition-all flex items-center justify-center">
                                            <i class="fas fa-search-plus text-white opacity-0 group-hover:opacity-100 transition-opacity"></i>
                                        </div>
                                    </div>
                                @else
                                    <div class="w-16 h-16 bg-gradient-to-br from-indigo-100 to-purple-100 rounded-lg flex items-center justify-center border border-gray-200">
                                        <i class="fas fa-image text-gray-400 text-xl"></i>
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-gradient-to-br from-indigo-400 to-purple-600 rounded-full flex items-center justify-center text-white font-semibold text-sm mr-3">
                                        {{ strtoupper(substr($brand->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="text-sm font-semibold text-gray-900">{{ $brand->name }}</div>
                                        @if($brand->products_count ?? 0 > 0)
                                            <div class="text-xs text-gray-500">{{ $brand->products_count }} products</div>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-indigo-50 text-indigo-700">
                                    <i class="fas fa-link mr-1"></i>{{ $brand->slug }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="flex items-center justify-center space-x-2">
                                    <a href="{{ route('admin.brands.edit', $brand->id) }}" 
                                       class="inline-flex items-center px-3 py-1.5 bg-yellow-50 text-yellow-700 rounded-lg hover:bg-yellow-100 transition-colors text-sm font-medium"
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button"
                                            onclick="openDeleteModal({{ $brand->id }}, '{{ $brand->name }}')"
                                            class="inline-flex items-center px-3 py-1.5 bg-red-50 text-red-700 rounded-lg hover:bg-red-100 transition-colors text-sm font-medium"
                                            title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                        <i class="fas fa-certificate text-gray-400 text-3xl"></i>
                                    </div>
                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">No brands found</h3>
                                    <p class="text-gray-500 mb-4">Create your first brand to get started</p>
                                    <a href="{{ route('admin.brands.create') }}" class="px-4 py-2 bg-gradient-to-r from-indigo-500 to-purple-400 text-white rounded-lg text-sm font-medium hover:shadow-lg transition-all">
                                        <i class="fas fa-plus-circle mr-2"></i>Add Brand
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($brands->hasPages())
            <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                {{ $brands->links() }}
            </div>
        @endif
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
                        <p class="text-sm"><strong>Brand:</strong> <span id="modalBrandName"></span></p>
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

    <!-- Image Preview Modal -->
    <div id="imageModal" class="hidden fixed inset-0 bg-black bg-opacity-75 overflow-y-auto h-full w-full z-50" onclick="closeImageModal()">
        <div class="relative top-20 mx-auto p-5 w-auto max-w-2xl">
            <div class="bg-white rounded-xl overflow-hidden">
                <div class="flex items-center justify-between p-4 border-b">
                    <h3 class="text-lg font-semibold" id="modalImageTitle">Brand Logo</h3>
                    <button onclick="closeImageModal()" class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                <div class="p-8 bg-gray-50">
                    <img id="modalImage" src="" alt="Brand Logo" class="w-full h-auto max-h-96 object-contain">
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
    .overflow-x-auto::-webkit-scrollbar {
        height: 8px;
    }
    
    .overflow-x-auto::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    
    .overflow-x-auto::-webkit-scrollbar-thumb {
        background: #6366F1;
        border-radius: 10px;
    }
    
    .overflow-x-auto::-webkit-scrollbar-thumb:hover {
        background: #4F46E5;
    }
</style>
@endpush

@push('scripts')
<script>
    // Auto-hide success messages
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

    // Delete modal functions
    function openDeleteModal(id, name) {
        document.getElementById('modalBrandName').textContent = name;
        document.getElementById('deleteForm').action = `/admin/brands/${id}`;
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }

    // Image preview modal
    function showImageModal(imageSrc, brandName) {
        document.getElementById('modalImage').src = imageSrc;
        document.getElementById('modalImageTitle').textContent = brandName + ' Logo';
        document.getElementById('imageModal').classList.remove('hidden');
    }

    function closeImageModal() {
        document.getElementById('imageModal').classList.add('hidden');
    }

    // Close modals on outside click
    document.getElementById('deleteModal')?.addEventListener('click', function(e) {
        if (e.target === this) closeDeleteModal();
    });
</script>
@endpush