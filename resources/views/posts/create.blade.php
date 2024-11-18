<x-index>
    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-2xl p-8 bg-white rounded-lg shadow-md">
            <h2 class="mb-6 text-2xl font-bold text-center text-gray-800">Create a New Post</h2>
            <form action="{{ route('store.post') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
                @csrf

                <!-- Title Field -->
                <div>
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-700">Post Title</label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                    class="w-full px-4 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter the post title"
                        required
                    >
                </div>

                <!-- Category Field -->
                <div>
                    <label for="category_id" class="block mb-2 text-sm font-medium text-gray-700">Category</label>
                    <select
                        id="category_id"
                        name="category_id"
                        class="w-full px-4 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500"
                        required
                    >
                        <option value="" disabled selected>Select a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Image Field --}}
                <div>
                    <label for="image" class="block mb-2 text-sm font-medium text-gray-700">Post Image</label>
                    <input
                        type="file"
                        id="image"
                        name="image_url"
                        class="w-full px-4 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500"
                        onchange="previewImage(event)"
                    >
                </div>

                <div class="mt-4">
                    <label for="image" class="block mb-2 text-sm font-medium text-gray-700">Current Image</label>
                    <div class="mb-2">
                        <!-- Display the current image -->
                        <img
                            id="current-image"
                            src=""
                            alt="No Image"
                            class="object-cover w-32 h-32 rounded-md"
                        >
                    </div>
                </div>

                <script>
                    function previewImage(event) {
                        const imageInput = event.target;
                        const currentImage = document.getElementById('current-image');

                        // Check if a file was selected
                        if (imageInput.files && imageInput.files[0]) {
                            const reader = new FileReader();

                            // Update the image source when the file is loaded
                            reader.onload = function (e) {
                                currentImage.src = e.target.result;
                            };

                            // Read the selected file
                            reader.readAsDataURL(imageInput.files[0]);
                        } else {
                            // If no file is selected, clear the image preview
                            currentImage.src = 'No Image Selected';
                        }
                    }
                </script>


                <!-- Content Field -->
                <div>
                    <label for="content" class="block mb-2 text-sm font-medium text-gray-700">Content</label>
                    <textarea
                        id="content"
                        name="content"
                        rows="20"
                        class="w-full px-4 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Write your post content here..."
                        required
                    ></textarea>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button
                        type="submit"
                        class="px-6 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600"
                    >
                        Submit Post
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-index>
