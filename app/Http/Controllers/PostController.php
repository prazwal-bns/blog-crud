<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function createPost(){
        $categories = Category::all();
        return view('posts.create',compact('categories'));
    }

    public function storePost(Request $request)
    {
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'category_id' => 'required|exists:categories,id'
    ]);

    // Check if there is an uploaded file
    $data = [
        'title' => $request->title,
        'content' => $request->content,
        'category_id' => $request->category_id,
        'user_id' => Auth::id(),
    ];

    // If image is uploaded, store it and add the image path to the data
    if ($request->hasFile('image_url')) {
        $file = $request->file('image_url');
        $path = $file->store('uploads', 'public'); // Store the image in the public disk
        $data['image_url'] = $path; // Add the path to the data array
    }

    Post::create($data);

    return redirect()->route('view.posts')
        ->with('success', 'Post Created Successfully !!');
}


    public function viewPosts(){
        // $posts = Post::latest()->get();
        $posts = Post::where('user_id', auth()->id())->latest()->get();
        return view('posts.view', compact('posts'));
    }

    // FOr editing and updaing post
    public function editPost($id){
        $post = Post::findOrFail($id);
        Gate::authorize('update',$post);
        $categories = Category::all();
        return view('posts.edit', compact('post','categories'));
    }

    public function updatePost(Request $request, $id){

        $validated = $request->validate([
          'title' => 'required|string|max:255',
          'content' => 'required|string',
          'category_id' => 'required',
          'image_url' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $post = Post::findOrFail($id);

        if ($request->hasFile('image_url')) {
            // Delete the old image if it exists
            if ($post->image_url) {
                Storage::disk('public')->delete($post->image_url);
            }

            // Store the new image
            $path = $request->file('image_url')->store('uploads', 'public');
            $post->image_url = $path;
        }

        // Update other fields
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('view.posts')
            ->with('success', 'Post updated successfully!');
    }




    // Delete Post
    public function deletePost($id){
        $post = Post::findOrFail($id);
        Gate::authorize('delete',$post);

        $post->delete();
        return redirect()->route('view.posts')
            ->with('success','Post Deleted Successfully !!');
    }

}
