<x-index>
    <div class="flex justify-center min-h-screen bg-gray-100">
    <div class="min-h-screen py-8 bg-gray-100 ">
        <div class="container mx-auto">
            <!-- Success and Error Messages -->
            @if(session('success'))
                <div class="p-4 mb-4 text-green-500 bg-green-100 border border-green-200 rounded-md">
                    {{ session('success') }}
                </div>
            @elseif(session('error'))
                <div class="p-4 mb-4 text-red-500 bg-red-100 border border-red-200 rounded-md">
                    {{ session('error') }}
                </div>
            @endif

            <div class="flex items-center justify-between mb-6">
                <a href="{{ route('create.post') }}" class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">Add New Post</a>
            </div>

            @if(count($posts) > 0)
                <h2 class="text-3xl font-bold text-gray-800">All Posts</h2>
                <div class="overflow-x-auto bg-white rounded-lg shadow-md">
                    <table class="min-w-full table-auto">
                        <thead>
                            <tr class="text-left bg-gray-200">
                                <th class="px-6 py-3 text-sm font-medium text-gray-700">Post Title</th>
                                <th class="px-6 py-3 text-sm font-medium text-gray-700">Category</th>
                                <th class="px-6 py-3 text-sm font-medium text-gray-700">Author</th>
                                <th class="px-6 py-3 text-sm font-medium text-gray-700">Content</th>
                                <th class="px-6 py-3 text-sm font-medium text-gray-700">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Loop through posts -->
                            @foreach ($posts as $post)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-800"><a href="{{ route('view.post',$post->id) }}">{{ $post->title }}</a></td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $post->category->category_name ?? 'None'}}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $post->user->name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ Str::limit($post->content, 50) }}</td>
                                <td class="flex items-center px-6 py-4 space-x-2 text-sm text-gray-700">
                                    <!-- Edit Button -->
                                    <a
                                        href="{{ route('edit.post', $post->id) }}"
                                        class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">
                                        Edit
                                    </a>

                                    <!-- Delete Button -->
                                    <form
                                        action="{{ route('post.delete', $post->id) }}"
                                        method="POST"
                                        class="inline"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            onclick="return confirmDelete('{{ $post->title }}')"
                                            type="submit"
                                            class="px-4 py-2 text-white bg-red-500 rounded-md hover:bg-red-600">
                                            Delete
                                        </button>
                                    </form>

                                    <!-- View Post Button -->
                                    <a
                                        href="{{ route('view.post', $post->id) }}"
                                        class="px-4 py-2 text-white bg-purple-500 rounded-md hover:bg-purple-600">
                                        View Post
                                    </a>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <script>
                        function confirmDelete(title){
                            const confirmation = confirm(`Are you sure you want to delete:  ${title}`);
                            return confirmation;
                        }
                    </script>
                </div>
            @else
                <h2 class="mb-6 text-3xl font-bold text-center text-gray-800">No Posts Found</h2>
            @endif
        </div>
    </div>
    </div>
</x-index>
