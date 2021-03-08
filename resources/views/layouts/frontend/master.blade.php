<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin/img/favicon.png') }}">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>@yield('title')</title>
	<!--
		CSS
		============================================= -->
	<link rel="stylesheet" href="{{ asset('frontend/css/linearicons.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/css/themify-icons.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/css/nouislider.min.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/css/ion.rangeSlider.css') }}" />
	<link rel="stylesheet" href="{{ asset('frontend/css/ion.rangeSlider.skinFlat.css') }}" />
	<link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}">
	<link rel="stylesheet" href="{{ asset('js/app.js') }}">
  
  @stack('css')
</head>

<body>

  @include('layouts.frontend.navbar')

  @yield('frontend-content')

  @include('layouts.frontend.footer')

	<script src="{{ asset('frontend/js/vendor/jquery-2.2.4.min.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="{{ asset('frontend/js/vendor/bootstrap.min.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.ajaxchimp.min.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.nice-select.min.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.sticky.js') }}"></script>
	<script src="{{ asset('frontend/js/nouislider.min.js') }}"></script>
	<script src="{{ asset('frontend/js/countdown.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="{{ asset('frontend/js/gmaps.min.js') }}"></script>
  <script src="{{ asset('frontend/js/main.js') }}"></script>
  
  @stack('js')
</body>

</html>