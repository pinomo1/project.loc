<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Posts;
use App\Models\Replies;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class PostController extends Controller
{
    public function PostIndex($id)
    {
        Paginator::useBootstrap();
        $post = Posts::where('id', $id)->first();
        $replies = Replies::where('post_id', $id)->orderBy('id', 'asc')->paginate(25);
        $category = Categories::where('id', $post->category_id)->first();
        return view('Site.post', [
            'post' => $post,
            'replies' => $replies,
            'category' => $category,
        ]);
    }
}
