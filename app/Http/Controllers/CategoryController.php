<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function createCategory(){
        return view('categories.create');
    }

    public function viewCategories(){
        $categories = Category::with('user')->latest()->get();
        return view('categories.view', compact('categories'));
    }

    public function storeCategory(Request $request){
        $validated = $request->validate([
            'category_name' => 'required|string|max:30',
        ]);

        $validated['user_id'] = Auth::id();

        // dd($validated);

        Category::create($validated);

        return redirect()->route('view.categories')
            ->with('success','Category Created Successfully !!');
    }


    public function editCategory($id){
        $category = Category::findOrFail($id);
        Gate::authorize('update', $category);
        return view('categories.edit',compact('category'));
    }

    public function updateCategory(Request $request, $id){
        $validated = $request->validate([
            'category_name' => 'required'
        ]);

        $category = Category::findOrFail($id);
        Gate::authorize('update', $category);
        $category->update($validated);

        return redirect()->route('view.categories')
            ->with('success','Category Updated Successfully !!');

    }

    public function deleteCategory($id){
        $category = Category::findOrFail($id);
        Gate::authorize('delete', $category);
        $category->delete();

        return redirect()->route('view.categories')
            ->with('success','Category Deleted Successfully !!');

    }
}
