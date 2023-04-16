<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class AuthorController extends Controller
{
    public function AuthorIndex($id)
    {
        Paginator::useBootstrap();
        $posts = Posts::where('author_id', $id)->orderBy('id', 'desc')->paginate(25);
        $author = User::where('id', $id)->first();
        return view('Site.author', [
            'posts' => $posts,
            'author' => $author,
        ]);
    }
}
