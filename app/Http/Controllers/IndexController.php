<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\User;
use App\Models\Categories;

class IndexController extends Controller
{
    
    public function Index()
    {
        // get main categories and its first children
        $categories = Categories::where('parent_id', NULL)->with('children')->get();
        return view('Site.index', [
            'categories' => $categories,
        ]);
    }

    public function Search(Request $request){
        $request->validate([
            'search' => 'required',
        ]);
        $search = $request->search;
        $categories = Categories::where('title', 'like', '%'.$search.'%')->get();
        $posts = Posts::where('title', 'like', '%'.$search.'%')->get();
        $users = User::where('name', 'like', '%'.$search.'%')->get();
        return view('Site.search', [
            'categories' => $categories,
            'posts' => $posts,
            'users' => $users,
            'search' => $search,
        ]);
    }

}
