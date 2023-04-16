@extends('site.template.template')

@section('content')

<!--================ Hero sm banner start =================-->  
<section class="mb-30px">
    <div class="container">
        <h1 style="color: black; padding: 2vh">{{ $about->title }}</h1>
    </div>
</section>
<!--================ Hero sm banner end =================--> 

<!--================ About start =================--> 
<section class="mb-30px">

    <div class="container">
        <div class="row">
            <div class="col-lg-12" style="color: black; padding: 2vh; padding-left: 4vh; font-size: 2.5vh">
                {!! $about->text !!}
            </div>
        </div>
    </div>

</section>
<!--================ About end =================--> 

@endsection