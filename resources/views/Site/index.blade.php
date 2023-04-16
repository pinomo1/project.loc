@extends('site.template.template')

@section('content')

<!--================ Hero sm banner start =================-->  
<section class="mb-30px">
    <div class="container">
        <h1 style="padding: 3vh">Main page</h1>
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
                    <th><h2>Main categories</h2></th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($categories as $category)
                <tr>
                    <th>
                        <a href="{{ route('category', ['id' => $category->id]) }}"><h3 class="game-type"><i class="fa fa-folder-open-o"></i>{{ $category->title }}</h3></a>
                        @foreach($category->children as $child)
                        <span><a href="{{ route('category', ['id' => $child->id])}}">{{ $child->title }}</a>, </span>
                        @endforeach
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</section>
<!--================ About end =================--> 

@endsection