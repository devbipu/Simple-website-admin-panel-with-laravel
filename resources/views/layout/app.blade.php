<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>@yield('site-title')</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('css/custom.css')}}">
</head>
<body>
	<header class="container-fluid">
		@include('layout.menu')
	</header>

	<section>
		@yield('content')
	</section>


	@include('layout.footer')

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="{{asset('/js/custom.js')}}"></script>
</body>
</html>