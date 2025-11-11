@extends('layouts.admin.app')

@section('title', 'Product Images Management')

@section('header')
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-3xl font-bold text-gray-800" style="font-family: var(--font-display);">
                <i class="fas fa-images mr-2 text-teal-500"></i> Product Images
            </h2>
            <p class="mt-1 text-sm text-gray-600">Manage product gallery and display images</p>
        </div>
        <a href="{{ route('admin.product_images.create') }}" class="px-5 py-2.5 bg-gradient-to-r from-teal-500 to-cyan-400 text-white rounded-lg text-sm font-medium hover:shadow-lg transition-all flex items-center">
            <i class="fas fa-plus-circle mr-2"></i>Add New Image
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
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-gradient-to-br from-teal-500 to-teal-600 rounded-xl shadow-sm p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-teal-100 text-sm font-medium">Total Images</p>
                    <h3 class="text-3xl font-bold mt-2">{{ $images->total() }}</h3>
                </div>
                <div class="w-14 h-14 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                    <i class="fas fa-images text-2xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-amber-500 to-amber-600 rounded-xl shadow-sm p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-amber-100 text-sm font-medium">Primary Images</p>
                    <h3 class="text-3xl font-bold mt-2">{{ $images->where('is_primary', 1)->count() }}</h3>
                </div>
                <div class="w-14 h-14 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                    <i class="fas fa-star text-2xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-slate-500 to-slate-600 rounded-xl shadow-sm p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-100 text-sm font-medium">Secondary Images</p>
                    <h3 class="text-3xl font-bold mt-2">{{ $images->where('is_primary', 0)->count() }}</h3>
                </div>
                <div class="w-14 h-14 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                    <i class="fas fa-image text-2xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Images Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-800">All Product Images</h3>
                <div class="flex items-center space-x-2">
                    <input type="text" placeholder="Search images..." class="px-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-teal-500">
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
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">#</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Image</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Product</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Type</th>
                        <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($images as $key => $img)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm font-medium text-gray-900">{{ $images->firstItem() + $key }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="relative group">
                                    <img src="{{ asset('storage/' . $img->image_path) }}" 
                                         class="w-28 h-20 object-cover rounded-lg shadow-sm border border-gray-200 transition-transform group-hover:scale-105" 
                                         alt="Product Image">
                                    @if($img->is_primary)
                                        <div class="absolute top-1 right-1">
                                            <span class="inline-flex items-center justify-center w-6 h-6 bg-amber-500 rounded-full">
                                                <i class="fas fa-star text-white text-xs"></i>
                                            </span>
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-semibold text-gray-900">{{ $img->product->name ?? '—' }}</div>
                                <div class="text-xs text-gray-500">Product ID: {{ $img->product_id }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($img->is_primary)
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-amber-100 text-amber-800">
                                        <i class="fas fa-star text-amber-500 text-xs mr-1.5"></i>Primary
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                        <i class="fas fa-image text-gray-500 text-xs mr-1.5"></i>Secondary
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="flex items-center justify-center space-x-2">
                                    <a href="{{ route('admin.product_images.edit', $img->id) }}" 
                                       class="inline-flex items-center px-3 py-1.5 bg-yellow-50 text-yellow-700 rounded-lg hover:bg-yellow-100 transition-colors text-sm font-medium"
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.product_images.destroy', $img->id) }}" 
                                          method="POST" 
                                          class="inline-block"
                                          onsubmit="return confirm('Are you sure you want to delete this image for {{ $img->product->name ?? 'this product' }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="inline-flex items-center px-3 py-1.5 bg-red-50 text-red-700 rounded-lg hover:bg-red-100 transition-colors text-sm font-medium"
                                                title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                        <i class="fas fa-images text-gray-400 text-3xl"></i>
                                    </div>
                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">No product images found</h3>
                                    <p class="text-gray-500 mb-4">Start by uploading your first product image</p>
                                    <a href="{{ route('admin.product_images.create') }}" class="px-4 py-2 bg-gradient-to-r from-teal-500 to-cyan-400 text-white rounded-lg text-sm font-medium hover:shadow-lg transition-all">
                                        <i class="fas fa-plus-circle mr-2"></i>Add New Image
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($images->hasPages())
            <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                {{ $images->links() }}
            </div>
        @endif
    </div>
@endsection

@push('styles')
<style>
    /* Custom scrollbar for table */
    .overflow-x-auto::-webkit-scrollbar {
        height: 8px;
    }
    
    .overflow-x-auto::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    
    .overflow-x-auto::-webkit-scrollbar-thumb {
        background: #14B8A6;
        border-radius: 10px;
    }
    
    .overflow-x-auto::-webkit-scrollbar-thumb:hover {
        background: #0D9488;
    }

    /* Image hover effect */
    .group:hover img {
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
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