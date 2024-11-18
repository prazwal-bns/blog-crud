<nav class="bg-white shadow-md">
    <div class="container flex items-center justify-between px-6 py-4 mx-auto">
        <!-- Logo -->
        <a href="/" class="text-2xl font-bold text-blue-600">
            MyBlog
        </a>

        <!-- Links -->
        <div class="flex space-x-6">
            <a
                href="{{ route('dashboard') }}"
                class="px-3 py-2 rounded-md text-sm font-medium transition
                {{ request()->routeIs('dashboard') ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-blue-100 hover:text-blue-600' }}">
                Dashboard
            </a>

            <a
                href="{{ route('view.posts') }}"
                class="px-3 py-2 rounded-md text-sm font-medium transition
                {{ request()->routeIs('view.posts') ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-blue-100 hover:text-blue-600' }}">
                My Blog Posts
            </a>

            <a
                href="{{ route('view.all.posts') }}"
                class="px-3 py-2 rounded-md text-sm font-medium transition
                {{ request()->routeIs('view.all.posts') ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-blue-100 hover:text-blue-600' }}">
                View All Blog Posts
            </a>

            <a
                href="{{ route('view.categories') }}"
                class="px-3 py-2 rounded-md text-sm font-medium transition
                {{ request()->routeIs('view.categories') ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-blue-100 hover:text-blue-600' }}">
                Post Category
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="px-3 py-2 rounded-md text-sm font-medium transition
                {{ request()->routeIs('logout') ? 'bg-red-600 text-white' : 'text-gray-700 hover:bg-blue-100 hover:text-blue-600' }}">
                Logout
            </button>
            </form>
        </div>

    </div>
</nav>
