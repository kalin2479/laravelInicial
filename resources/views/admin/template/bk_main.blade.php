<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title','Default'){{ $prueba->title }}</title>
	<link rel="stylesheet" href="{{ asset('css/general.css') }}">
</head>
<body>
	@include('admin.template.partials.nav')
	<section>
		@yield('content')
	</section>
</body>
</html>