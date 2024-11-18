<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::controller(PostController::class)->group(function(){
    // view post
    Route::get('/view-posts', 'viewPosts')->name('view.posts');

    // create and store post
    Route::get('/create-post', 'createPost')->name('create.post');
    Route::post('/store-post', 'storePost')->name('store.post');

    //edit post and upadate
    Route::get('/edit-post/{id}', 'editPost')->name('edit.post');
    Route::put('/update-post/{id}', 'updatePost')->name('update.post');


    // Delete Post
    Route::delete('/delete-post/{id}', 'deletePost')->name('post.delete');

});


Route::get('/view-post/{id}',[ViewController::class, 'viewPost'])->name('view.post');
Route::get('/view/all/posts',[ViewController::class, 'viewAllPosts'])->name('view.all.posts');

Route::controller(CategoryController::class)->group(function(){
    // view category
    Route::get('/view-categories', 'viewCategories')->name('view.categories');

    // create and store category
    Route::get('/create-category', 'createCategory')->name('create.category');
    Route::post('/store-category', 'storeCategory')->name('store.category');

    //edit Category and upadate
    Route::get('/edit-category/{id}', 'editCategory')->name('edit.category');
    Route::put('/update-category/{id}', 'updateCategory')->name('update.category');


    // // Delete Category
    Route::delete('/delete-category/{id}', 'deleteCategory')->name('delete.category');
});




require __DIR__.'/auth.php';
