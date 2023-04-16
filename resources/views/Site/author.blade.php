@extends('site.template.template')

@section('content')

<!--================ Hero sm banner start =================-->  
<section class="mb-30px">
    <div class="container">
        <h1 style="padding: 3vh">{{ $author->name }}</h1>
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
                    <th><h3>Author</h3></th>
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
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</section>
<!--================ About end =================--> 

@endsection