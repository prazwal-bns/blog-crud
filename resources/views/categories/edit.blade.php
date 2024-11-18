<x-index>
    <div class="min-h-screen py-8 bg-gray-100">
        <div class="container mx-auto">
            <h2 class="mb-6 text-3xl font-bold text-center text-gray-800">Edit Category</h2>

            <div class="p-8 mx-5 bg-white rounded-lg shadow-md g">
                <form action="{{ route('update.category', $category->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Category Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Category Name</label>
                        <input
                            type="text"
                            id="name"
                            name="category_name"
                            class="w-full px-4 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter category name"
                            value="{{ $category->category_name }}"
                            required
                        >
                        @error('name')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button
                            type="submit"
                            class="px-6 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600"
                        >
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-index>
