<x-index>
    <div class="min-h-screen py-10 bg-gray-100">
        <div class="container max-w-4xl px-4 mx-auto">
            <div class="overflow-hidden bg-white rounded-lg shadow-lg">
                <!-- Blog Post Header -->
                <div class="relative">
                    <img
                        src="{{ Storage::url($post->image_url) }}"
                        alt="Blog Post Header Image"
                        class="object-cover w-full h-64"
                    />
                    <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50">
                        <h1 class="px-4 text-3xl font-bold text-center text-white md:text-4xl">
                            {{ $post->title }}
                        </h1>
                    </div>
                </div>


                <!-- Blog Post Content -->
                <div class="p-6">
                    <!-- Post Metadata -->
                    <div class="flex items-center mb-6 space-x-4 text-sm text-gray-500">
                        <span>
                            <i class="fas fa-user"></i> Posted by
                            <strong>{{ $post->user->name ?? 'Anonymous' }}</strong>
                        </span>
                        <span>
                            <i class="fas fa-calendar-alt"></i> {{ $post->created_at->format('F j, Y') }}
                        </span>
                        <span>
                            <i class="fas fa-tag"></i>
                            <span class="font-semibold text-blue-500">{{ $post->category->category_name ?? 'Uncategorized' }}</span>
                        </span>
                    </div>

                    <!-- Post Body -->
                    <div class="space-y-4 leading-relaxed text-gray-700">
                        {!! nl2br(e($post->content)) !!}
                    </div>
                </div>
            </div>

            @if (Auth::user()->id == $post->user_id)
            <div class="flex items-center justify-between my-4">
                <a href="{{ route('edit.post', $post->id) }}" class="px-4 py-2 text-white bg-purple-500 rounded-md hover:bg-blue-600">Edit Post</a>

            </div>
            @endif
        </div>
    </div>
</x-index>
