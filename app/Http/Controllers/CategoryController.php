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
}
