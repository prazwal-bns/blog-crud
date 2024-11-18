<x-index>
    <div class="flex justify-center min-h-screen bg-gray-100">
        <div class="min-h-screen pt-10 bg-gradient-to-r from-gray-800 via-gray-700 to-gray-900">
        <div class="container px-4 mx-auto">
            <h1 class="mb-10 text-4xl font-bold text-center text-white">All Blog Posts</h1>
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($posts as $post)
                    <!-- Blog Card -->
                    <div class="overflow-hidden transition duration-300 transform bg-white rounded-lg shadow-md hover:scale-105">
                        <!-- Blog Header -->
                        <div class="p-6">
                            <!-- Title -->
                            <h2 class="text-2xl font-semibold text-gray-800 truncate hover:text-indigo-600">
                                <a href="{{ route('view.post', $post->id) }}">{{ $post->title }}</a>
                            </h2>
                            <!-- Author -->
                            <p class="mt-2 text-sm text-gray-500">
                                By: <span class="font-medium text-purple-700">{{ $post->user->name }}</span>
                            </p>
                            <!-- Category -->
                            <p class="mt-2 text-sm text-blue-500">
                                Category: <span class="font-medium text-blue-700">{{ $post->category->category_name }}</span>
                            </p>
                        </div>
                        <!-- Blog Footer -->
                        <div class="flex items-center justify-between px-6 py-4 bg-gray-100">
                            <a
                                href="{{ route('view.post', $post->id) }}"
                                class="font-medium text-indigo-600 hover:text-indigo-800 hover:underline">
                                Read More →
                            </a>
                            <p class="text-sm text-gray-500">
                                Posted on: {{ $post->created_at->format('F d, Y') }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
</x-index>
