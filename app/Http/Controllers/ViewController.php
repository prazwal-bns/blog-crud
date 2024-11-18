<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    // public function viewPost($id){
    //     $post = Post::findOrFail($id);
    //     return view('posts.blog_view',compact('post'));
    // }

    public function viewPost($id) {
        $post = Post::with(['user', 'category'])->findOrFail($id); // Eager-load relationships so that query will be minimized in blog-view page
        return view('posts.blog_view', compact('post'));
    }

    public function viewAllPosts(){
        $posts = Post::with(['user','category'])->latest()->get();
        return view('posts.all_blog_posts',compact('posts'));
    }


}
