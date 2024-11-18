<x-index>
    <div class="flex justify-center min-h-screen pt-6 bg-gray-100">

        <div class="w-full max-w-5xl">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-3xl font-bold text-gray-800">All Categories</h2>
                <a href="{{ route('create.category') }}" class="px-6 py-2 text-sm font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600">Add Category</a>
            </div>

            @if(count($categories) > 0)
                <div class="overflow-x-auto bg-white rounded-lg shadow-md">
                    <table class="min-w-full table-auto">
                        <thead class="bg-gray-200">
                            <tr class="text-left">
                                <th class="px-6 py-3 text-sm font-medium text-gray-700">Category Name</th>
                                <th class="px-6 py-3 text-sm font-medium text-gray-700">Added By</th>
                                <th class="px-6 py-3 text-sm font-medium text-gray-700">Number of Posts</th>
                                <th class="px-6 py-3 text-sm font-medium text-gray-700">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-6 py-4 text-sm text-gray-800">{{ $category->category_name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-800">{{ $category->user->name ?? '.' }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-700">{{ $category->posts->count() }}</td>
                                    <td class="flex items-center px-6 py-4 space-x-2 text-sm text-gray-700">
                                        <!-- Edit Button -->
                                        <a
                                            href="{{ route('edit.category', $category->id) }}"
                                            class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">
                                            Edit
                                        </a>
                                        <!-- Delete Button -->
                                        <form
                                            action="{{ route('delete.category', $category->id) }}"
                                            method="POST"
                                            class="inline"
                                        >
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                onclick="return confirmDelete('{{ $category->category_name }}')"
                                                type="submit"
                                                class="px-4 py-2 text-white bg-red-500 rounded-md hover:bg-red-600">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <h2 class="mb-6 text-3xl font-bold text-center text-gray-800">No Categories Found</h2>
            @endif
        </div>
    </div>

    <script>
    function confirmDelete(categoryName) {
        const confirmation = confirm(`Are you sure you want to delete category: ${categoryName} ??`);
        return confirmation;
    }
    </script>
    </div>
</x-index>
