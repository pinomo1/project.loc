@extends('site.template.template')

@section('content')

<style>
    p{
        color: black;
        font-size: 1.2rem;
    }

    h3{
        color: black;
        font-size: 2rem;
    }
</style>

<!--================ Hero sm banner start =================-->  
<section class="mb-30px">
    <div class="container">
        <h1 style="color: black; padding: 2vh">FAQ</h1>
    </div>
</section>
<!--================ Hero sm banner end =================--> 

<!--================ About start =================--> 
<section class="mb-30px">

    <div class="container">
        @foreach ($faqs as $faq)
            <div class="row">
                <div class="col-md-12">
                    <h3 style="color: black; padding-top: 3vh">{{ $faq->question }}</h3>
                    <p style="color: black;">{!! $faq->answer !!}</p>
                </div>
            </div>
        @endforeach
    </div>

</section>
<!--================ About end =================--> 

@endsection