@extends('site.template.template')

@section('content')

<!--================ Hero sm banner start =================-->  
<section class="mb-30px">
    <div class="container">
        <h1 style="padding: 3vh">{{ $post->title }}</h1>
        <h2>Category: <a href="{{route('category', ['id' => $post->getCategory->id])}}">{{ $post->getCategory->title }}</a></h2>
        <img src="{{ asset($post->getAuthor->avatar) }}" alt="" style="width: 100px; height: 100px; border-radius: 50%">
        <h2>Author: <a href="{{route('author', ['id' => $post->getAuthor->id])}}">{{ $post->getAuthor->name }}</a></h2>
        <h2>Date: {{ $post->published_at }}</h2>
        <h2>Replies: {{ $post->countReplies() }}</h2>
        @if(Auth::check())
        @if($post->getAuthor->id == Auth::user()->id || Auth::user()->isAdmin())
            <a href="{{ route('post.delete', ['id' => $post->id]) }}" class="button button-contactForm">Delete</a>
        @endif
        @endif
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
        <hr>
                @foreach($replies as $reply)
                <div>
                    <img src="{{ asset($reply->getAuthor->avatar) }}" alt="" style="width: 100px; height: 100px; border-radius: 50%">
                    <a href="{{ route('author', ['id' => $reply->getAuthor->id]) }}"><h3 class="game-type"><i class="fa fa-folder-open-o"></i>{{ $reply->getAuthor->name }}
                        @if($reply->getAuthor->is_admin == 1)
                            <span style="color: #e04000">- Admin</span>
                        @endif
                        @if($reply->getAuthor->id == $post->getAuthor->id)
                            <span style="color: #e09000">- OP</span>
                        @endif
                    </h3></a>
                    <p>Date: {{ $reply->published_at }} | ID: {{ $reply->id }}</p>
                    <h4>{!!$reply->reply!!}</h4>
                </div>
                @if(Auth::check())
                @if ($reply->getAuthor->id == Auth::user()->id || Auth::user()->isAdmin())
                    <a href="{{ route('reply.delete', ['id' => $reply->id]) }}" class="button button-contactForm">Delete</a>
                @endif
                @endif
                <hr>
                @endforeach
    </div>

    <div class="container">
        <form action="{{ route('reply', ['post_id' => $post->id]) }}" method="post">
            @csrf
            <textarea name="reply" id="reply" rows="10" class="form-control" placeholder="Reply"></textarea>
            <br>
            <button type="submit" class="button button-contactForm">Reply</button>
        </form>
    </div>
</section>
<!--================ About end =================--> 

@endsection