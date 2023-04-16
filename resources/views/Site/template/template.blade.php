<!DOCTYPE html>

<html lang="en">

<head>
	<!-- Meta Data -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Best forum</title>

	<!-- Fav Icon -->
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/fav-icons/apple-touch-icon.png') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/fav-icons/favicon-32x32.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/fav-icons/favicon-16x16.png') }}">
	<meta name="theme-color" content="#3d0e03">

    @section('style')
	<!-- Dependency Styles -->
	<link rel="stylesheet" href="{{ asset('dependencies/bootstrap/css/bootstrap.min.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ asset('dependencies/font-awesome/css/font-awesome.min.css') }}" type="text/css">

	<!-- Site Stylesheet -->
	<link rel="stylesheet" href="{{ asset('dependencies/swiper/swiper.min.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ asset('dependencies/wow/css/animate.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ asset('dependencies/magnific-popup/magnific-popup.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ asset('dependencies/jquery-animated-headlines/css/jquery.animatedheadline.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ asset('assets/css/woocommerce.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ asset('dependencies/jquery-ui/css/jquery-ui.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ asset('dependencies/slick-carousel/css/slick.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ asset('assets/css/app.css') }}" type="text/css">

	<!-- Google Web Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    @show
</head>

<body class="forum-page" data-style="default">
    @include('site.template.header')

	@if($errors->any())
        <div class="container">
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        </div>
    @endif

	@if(session()->has('success'))
        <div class="container">
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        </div>
    @endif

    @section('content')

    @show

    @include('site.template.footer')

    @section('script')
    <script src="{{ asset('dependencies/popper.js/popper.min.js') }}"></script>
	<script src="{{ asset('dependencies/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('dependencies/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('dependencies/swiper/js/swiper.min.js') }}"></script>
	<script src="{{ asset('dependencies/swiperRunner/swiperRunner.min.js') }}"></script>
	<script src="{{ asset('dependencies/slick-carousel/js/slick.min.js') }}"></script>
	<script src="{{ asset('dependencies/magnific-popup/js/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ asset('dependencies/jquery-ui/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('dependencies/jquery-animated-headlines/js/jquery.animatedheadline.min.js') }}"></script>
	<script src="{{ asset('dependencies/jquery.countdown/jquery.countdown.min.js') }}"></script>
	<script src="{{ asset('dependencies/countUp.js/js/countUp.min.js') }}"></script>
	<script src="{{ asset('dependencies/jquery.appear.bas2k/jquery.appear.js') }}"></script>
	<script src="{{ asset('dependencies/jquery.ripples/jquery.ripples.js') }}"></script>
	<script src="{{ asset('dependencies/wow/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    @show
</body>