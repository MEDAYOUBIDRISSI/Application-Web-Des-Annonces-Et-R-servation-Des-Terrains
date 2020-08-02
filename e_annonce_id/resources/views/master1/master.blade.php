<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<!-- Mirrored from wpkixx.com/html/winku/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Aug 2019 19:57:56 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <!-- New code -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>

	<title>Winku Social Network Toolkit</title>
    <link rel="icon" href="{{asset('assets_1/images/fav.png')}}" type="image/png" sizes="16x16"> 
    
    <link rel="stylesheet" href="{{asset('assets_1/css/main.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets_1/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets_1/css/color.css')}}">
    <link rel="stylesheet" href="{{asset('assets_1/css/responsive.css')}}">

   
</head>

<body>
    
<div id="app" class="theme-layout">

        @yield("content")

</div>
    <script src="{{asset('assets_1/js/main.min.js')}}"></script>
	<script src="{{asset('assets_1/js/script.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
</body>	
<!-- Mirrored from wpkixx.com/html/winku/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Aug 2019 19:58:26 GMT -->
</html>