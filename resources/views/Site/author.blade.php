@extends('site.template.template')

@section('content')

<!--================ Hero sm banner start =================-->  
<section class="mb-30px">
    <div class="container">
        <br>
        <img src="{{ asset($author->avatar) }}" alt="" style="width: 100px; height: 100px; border-radius: 50%">
        @if(Auth::check())
        @if($author->id == Auth::user()->id || Auth::user()->isAdmin())
            <a href="{{ route('author.resetpfp', ['id' => $author->id]) }}" class="button button-contactForm">Reset profile picture</a>
        @endif
        @endif
        <h1 style="padding: 3vh">{{ $author->name }}</h1>
        @if($author->isAdmin())
            <h3>Admin</h3>
        @endif
        <h5>Posts: {{ $author->countPosts() }}</h5>
        <h5>Registered {{ $author->created_at->diffForHumans() }}</h5>
    </div>
</section>
<!--================ Hero sm banner end =================--> 

<style>
    a{
        color: #1f4e7c;
    }
    a:hover{
        color: #e09000;
    }
    h3{
        font-weight: 700;
    }
    span{
        font-weight: 500
    }
</style>

<!--================ About start =================--> 
<section class="mb-30px">

    <div class="container">
        <table class="game-tabls table table-inverse">
            <thead>
                <tr>
                    <th><h2>Posts</h2></th>
                    <th><h3>Replies</h3></th>
                    <th><h3>Category</h3></th>
                    @if(Auth::check())
                    @if($author->id == Auth::user()->id || Auth::user()->isAdmin())
                        <th><h3>Delete</h3></th>
                    @endif
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <th>
                        <a href="{{ route('post', ['id' => $post->id]) }}"><h3 class="game-type"><i class="fa fa-folder-open-o"></i>{{ $post->title }}</h3></a>
                        <span>Date: {{ $post->published_at }}</span>
                    </th>
                    <th>{{ $post->countReplies() }}</th>
                    <th><a href="{{ route('category', ['id' => $post->getCategory->id])}}">{{ $post->getCategory->title }}</a></th>
                    @if(Auth::check())
                    @if($author->id == Auth::user()->id || Auth::user()->isAdmin())
                        <th><a href="{{ route('post.delete', ['id' => $post->id]) }}" class="button button-contactForm">Delete</a></th>
                    @endif
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</section>
<!--================ About end =================--> 

@endsection