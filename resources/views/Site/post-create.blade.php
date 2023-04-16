@extends('site.template.template')

@section('content')

<!--================ Hero sm banner start =================-->  
<section class="mb-30px">
    <div class="container">
        <h1 style="padding: 3vh">Create post</h1>
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
        <form action="{{ route('post.create.post', ['category' => $category->id]) }}" method="post">
            @csrf
            <textarea name="title" id="title" rows="1" class="form-control" placeholder="Title"></textarea>
            <br>
            <textarea name="text" id="text" rows="10" class="form-control" placeholder="Content"></textarea>
            <br>
            <button type="submit" class="button button-contactForm">Create post</button>
        </form>
    </div>
</section>
<!--================ About end =================--> 

@endsection