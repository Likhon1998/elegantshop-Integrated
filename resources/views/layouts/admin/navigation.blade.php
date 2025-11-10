<nav class="bg-white border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <a href="{{ route('dashboard') }}" class="flex items-center text-xl font-semibold text-indigo-600">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="flex items-center space-x-4">
                <a href="#" class="text-gray-700 hover:text-indigo-600">Profile</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-gray-700 hover:text-red-500">Logout</button>
                </form>
            </div>
        </div>
    </div>
</nav>
