@extends('layouts.admin.app')

@section('title', 'Dashboard')

@section('header')
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-3xl font-bold text-gray-800" style="font-family: var(--font-display);">
                {{ __('Dashboard') }}
            </h2>
            <p class="mt-1 text-sm text-gray-600">Welcome back, {{ Auth::user()->name ?? 'Admin' }}! Here's what's happening today.</p>
        </div>
        <div class="flex items-center space-x-3">
            <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                <i class="fas fa-download mr-2"></i>Export Report
            </button>
            <button class="px-4 py-2 bg-gradient-to-r from-purple-500 to-pink-400 text-white rounded-lg text-sm font-medium hover:shadow-lg transition-all">
                <i class="fas fa-plus mr-2"></i>Add New
            </button>
        </div>
    </div>
@endsection

@section('content')
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Users -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Users</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-2">2,543</h3>
                    <p class="text-sm text-green-600 mt-2">
                        <i class="fas fa-arrow-up mr-1"></i>12% from last month
                    </p>
                </div>
                <div class="w-14 h-14 bg-gradient-to-br from-blue-400 to-blue-500 rounded-lg flex items-center justify-center">
                    <i class="fas fa-users text-white text-2xl"></i>
                </div>
            </div>
        </div>

        <!-- Total Revenue -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Revenue</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-2">$45,231</h3>
                    <p class="text-sm text-green-600 mt-2">
                        <i class="fas fa-arrow-up mr-1"></i>8% from last month
                    </p>
                </div>
                <div class="w-14 h-14 bg-gradient-to-br from-green-400 to-green-500 rounded-lg flex items-center justify-center">
                    <i class="fas fa-dollar-sign text-white text-2xl"></i>
                </div>
            </div>
        </div>

        <!-- Total Orders -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Orders</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-2">1,234</h3>
                    <p class="text-sm text-red-600 mt-2">
                        <i class="fas fa-arrow-down mr-1"></i>3% from last month
                    </p>
                </div>
                <div class="w-14 h-14 bg-gradient-to-br from-purple-400 to-purple-500 rounded-lg flex items-center justify-center">
                    <i class="fas fa-shopping-cart text-white text-2xl"></i>
                </div>
            </div>
        </div>

        <!-- Pending Tasks -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Pending Tasks</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-2">24</h3>
                    <p class="text-sm text-yellow-600 mt-2">
                        <i class="fas fa-clock mr-1"></i>6 due today
                    </p>
                </div>
                <div class="w-14 h-14 bg-gradient-to-br from-orange-400 to-orange-500 rounded-lg flex items-center justify-center">
                    <i class="fas fa-tasks text-white text-2xl"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- Chart Section -->
        <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-gray-800">Revenue Overview</h3>
                <select class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-purple-500">
                    <option>Last 7 days</option>
                    <option>Last 30 days</option>
                    <option>Last 3 months</option>
                    <option>Last year</option>
                </select>
            </div>
            <div class="h-64 flex items-center justify-center bg-gradient-to-br from-purple-50 to-pink-50 rounded-lg">
                <div class="text-center">
                    <i class="fas fa-chart-line text-6xl text-purple-300 mb-4"></i>
                    <p class="text-gray-500">Chart visualization goes here</p>
                    <p class="text-sm text-gray-400 mt-2">Integrate with Chart.js or similar</p>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Quick Actions</h3>
            <div class="space-y-3">
                <button class="w-full flex items-center px-4 py-3 bg-gradient-to-r from-purple-50 to-pink-50 rounded-lg hover:shadow-md transition-all group">
                    <div class="w-10 h-10 bg-purple-500 rounded-lg flex items-center justify-center mr-3 group-hover:scale-110 transition-transform">
                        <i class="fas fa-user-plus text-white"></i>
                    </div>
                    <span class="text-sm font-medium text-gray-700">Add New User</span>
                </button>

                <button class="w-full flex items-center px-4 py-3 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-lg hover:shadow-md transition-all group">
                    <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center mr-3 group-hover:scale-110 transition-transform">
                        <i class="fas fa-box text-white"></i>
                    </div>
                    <span class="text-sm font-medium text-gray-700">Add Product</span>
                </button>

                <button class="w-full flex items-center px-4 py-3 bg-gradient-to-r from-green-50 to-emerald-50 rounded-lg hover:shadow-md transition-all group">
                    <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center mr-3 group-hover:scale-110 transition-transform">
                        <i class="fas fa-file-invoice text-white"></i>
                    </div>
                    <span class="text-sm font-medium text-gray-700">Create Invoice</span>
                </button>

                <button class="w-full flex items-center px-4 py-3 bg-gradient-to-r from-orange-50 to-amber-50 rounded-lg hover:shadow-md transition-all group">
                    <div class="w-10 h-10 bg-orange-500 rounded-lg flex items-center justify-center mr-3 group-hover:scale-110 transition-transform">
                        <i class="fas fa-envelope text-white"></i>
                    </div>
                    <span class="text-sm font-medium text-gray-700">Send Message</span>
                </button>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Orders -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-gray-800">Recent Orders</h3>
                <a href="#" class="text-sm text-purple-600 hover:text-purple-700 font-medium">View All</a>
            </div>
            <div class="space-y-4">
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-shopping-bag text-purple-600"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-800">Order #1234</p>
                            <p class="text-xs text-gray-500">John Doe • 2 hours ago</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-semibold text-gray-800">$234.00</p>
                        <span class="inline-block px-2 py-1 text-xs font-medium text-green-700 bg-green-100 rounded-full">Completed</span>
                    </div>
                </div>

                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-shopping-bag text-blue-600"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-800">Order #1235</p>
                            <p class="text-xs text-gray-500">Jane Smith • 5 hours ago</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-semibold text-gray-800">$567.00</p>
                        <span class="inline-block px-2 py-1 text-xs font-medium text-yellow-700 bg-yellow-100 rounded-full">Pending</span>
                    </div>
                </div>

                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-shopping-bag text-green-600"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-800">Order #1236</p>
                            <p class="text-xs text-gray-500">Mike Johnson • 1 day ago</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-semibold text-gray-800">$123.00</p>
                        <span class="inline-block px-2 py-1 text-xs font-medium text-green-700 bg-green-100 rounded-full">Completed</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-gray-800">Recent Activity</h3>
                <a href="#" class="text-sm text-purple-600 hover:text-purple-700 font-medium">View All</a>
            </div>
            <div class="space-y-4">
                <div class="flex items-start">
                    <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center mr-3 mt-1">
                        <i class="fas fa-user text-purple-600 text-xs"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm text-gray-800"><span class="font-medium">Sarah Wilson</span> created a new account</p>
                        <p class="text-xs text-gray-500 mt-1">5 minutes ago</p>
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-3 mt-1">
                        <i class="fas fa-check text-green-600 text-xs"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm text-gray-800"><span class="font-medium">Order #1234</span> was completed</p>
                        <p class="text-xs text-gray-500 mt-1">2 hours ago</p>
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3 mt-1">
                        <i class="fas fa-box text-blue-600 text-xs"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm text-gray-800"><span class="font-medium">New product</span> added to inventory</p>
                        <p class="text-xs text-gray-500 mt-1">4 hours ago</p>
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="w-8 h-8 bg-orange-100 rounded-full flex items-center justify-center mr-3 mt-1">
                        <i class="fas fa-exclamation text-orange-600 text-xs"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm text-gray-800"><span class="font-medium">Low stock alert</span> for Product XYZ</p>
                        <p class="text-xs text-gray-500 mt-1">6 hours ago</p>
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center mr-3 mt-1">
                        <i class="fas fa-ban text-red-600 text-xs"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm text-gray-800"><span class="font-medium">Order #1230</span> was cancelled</p>
                        <p class="text-xs text-gray-500 mt-1">1 day ago</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection