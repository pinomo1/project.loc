@extends('site.template.template')

@section('content')

<!--================ Hero sm banner start =================-->  
<section class="mb-30px">
    <div class="container">
        <h1 style="padding: 3vh">{{ $post->title }}</h1>
        <h2><a href="{{route('category', ['id' => $post->getCategory->id])}}">{{ $post->getCategory->title }}</a></h2>
        <h2><a href="{{route('author', ['id' => $post->getAuthor->id])}}">{{ $post->getAuthor->name }}</a></h2>
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
                @foreach($replies as $reply)
                <div>
                    <a href="{{ route('author', ['id' => $reply->getAuthor->id]) }}"><h3 class="game-type"><i class="fa fa-folder-open-o"></i>{{ $reply->getAuthor->name }}
                        @if($reply->getAuthor->is_admin == 1)
                            <span style="color: #e09000">- Admin</span>
                        @endif
                        @if($reply->getAuthor->id == $post->getAuthor->id)
                            <span style="color: #e09000">- OP</span>
                        @endif
                    </h3></a>
                    <p>Date: {{ $reply->published_at }} | ID: {{ $reply->id }}</p>
                    <p>{!!$reply->reply!!}</p>
                </div>
                <br><br>
                @endforeach
    </div>

</section>
<!--================ About end =================--> 

@endsection