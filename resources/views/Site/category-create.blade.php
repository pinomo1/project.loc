@extends('site.template.template')

@section('content')

<!--================ Hero sm banner start =================-->  
<section class="mb-30px">
    <div class="container">
        <h1 style="padding: 3vh">Create category</h1>
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
        @if($parent_category != null)
        <form action="{{ route('category.create.post', ['parent_id' => $parent_category->id]) }}" method="post">
            @csrf
            <h3>Parent category: {{ $parent_category->title }}</h3>
            <textarea name="name" id="name" rows="1" class="form-control" placeholder="Name"></textarea>
            <br>
            <button type="submit" class="button button-contactForm">Create category</button>
        </form>
        @else
        <form action="{{ route('category.create.post', ['parent_id' => 0]) }}" method="post">
            @csrf
            <textarea name="name" id="name" rows="1" class="form-control" placeholder="Name"></textarea>
            <br>
            <button type="submit" class="button button-contactForm">Create category</button>
        </form>
        @endif
    </div>
</section>
<!--================ About end =================--> 

@endsection