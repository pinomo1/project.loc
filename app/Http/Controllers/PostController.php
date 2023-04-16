<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Posts;
use App\Models\Replies;
use App\Models\User;
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

    public function PostReply(Request $request)
    {
        if (!auth()->check()) {
            return back()->withErrors(['auth'=>'You must be logged in to reply']);
        }
        $request->validate([
            'reply' => 'required',
        ]);
        Replies::create([
            'post_id' => $request->post_id,
            'author_id' => auth()->user()->id,
            'reply' => $request->reply,
            'published_at' => now(),
        ]);
        return back()->with('success', 'Reply added successfully');
    }

    public function ReplyDelete(Request $request){
        if (!auth()->check()) {
            return back()->withErrors(['auth'=>'You must be logged in to delete a reply']);
        }
        $reply = Replies::where('id', $request->id)->first();
        if ($reply->author_id == auth()->user()->id || auth()->user()->isAdmin()) {
            $reply->delete();
            return back()->with('success', 'Reply deleted successfully');
        } else {
            return back()->withErrors(['auth'=>'You do not have permission to delete this reply']);
        }
    }

    public function PostDelete(Request $request){
        if (!auth()->check()) {
            return back()->withErrors(['auth'=>'You must be logged in to delete a post']);
        }
        $post = Posts::where('id', $request->id)->first();
        if ($post->author_id == auth()->user()->id || auth()->user()->isAdmin()) {
            $post->delete();
            return redirect()->route('index')->with('success', 'Post deleted successfully');
        } else {
            return back()->withErrors(['auth'=>'You do not have permission to delete this post']);
        }
    }

    public function PostCreateIndex(Request $request)
    {
        if (!auth()->check()) {
            return back()->withErrors(['auth'=>'You must be logged in to create a post']);
        }
        // id in request is category id
        $category = Categories::where('id', $request->id)->first();
        return view('Site.post-create', [
            'category' => $category,
        ]);
    }

    public function PostCreatePost(Request $request)
    {
        if (!auth()->check()) {
            return back()->withErrors(['auth'=>'You must be logged in to create a post']);
        }
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'text' => 'required'
        ]);
        $postid = Posts::create([
            'title' => $request->title,
            'category_id' => $request->category,
            'author_id' => auth()->user()->id,
            'published_at' => now(),
        ])->id;
        Replies::create([
            'post_id' => $postid,
            'author_id' => auth()->user()->id,
            'reply' => $request->text,
            'published_at' => now(),
        ]);
        return redirect()->route('post', ['id' => $postid])->with('success', 'Post added successfully');
    }
}
