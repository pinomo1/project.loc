<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class CategoryController extends Controller
{
    public function CategoryIndex($id)
    {
        Paginator::useBootstrap();
        $posts = Posts::where('category_id', $id)->orderBy('id', 'desc')->paginate(25);
        $subcategories = Categories::where('parent_id', $id)->get();
        $category = Categories::where('id', $id)->first();
        return view('Site.category', [
            'posts' => $posts,
            'subcategories' => $subcategories,
            'category' => $category,
        ]);
    }

    public function CategoryCreateIndex(Request $request)
    {
        if (!auth()->check()) {
            return back()->withErrors(['auth'=>'You must be logged in to create a post']);
        }
        if (!auth()->user()->isAdmin()) {
            return back()->with('error', 'You are not allowed to do this');
        }
        $parent_category = NULL;
        if ($request->id != 0 && $request->id != NULL) {
            $parent_category = Categories::where('id', $request->id)->first();
        }
        return view('Site.category-create', [
            'parent_category' => $parent_category,
        ]);
    }

    public function CategoryCreatePost(Request $request)
    {
        if (!auth()->check()) {
            return back()->withErrors(['auth'=>'You must be logged in to create a post']);
        }
        if (!auth()->user()->isAdmin()) {
            return back()->with('error', 'You are not allowed to do this');
        }
        $request->validate([
            'name' => 'required',
            'parent_id' => 'integer',
        ]);
        $parent_id = NULL;
        if ($request->parent_id != 0 && $request->parent_id != NULL) {
            $parent_id = $request->parent_id;
        }
        $categoryid = Categories::create([
            'title' => $request->name,
            'parent_id' => $parent_id,
        ])->id;
        return redirect()->route('category', ['id' => $categoryid])->with('success', 'Category added successfully');
    }
}
