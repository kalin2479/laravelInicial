<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>{{ $prueba->title }}</title>
	<link rel="stylesheet" href="{{ asset('css/general.css') }}">
</head>
<body>
	<h1>
		{{ $prueba->title }}
	</h1>
	<br>
	<p>
		{{ $prueba->content }}
	</p>
	<h2>
		{{ $prueba->user->name }} | {{ $prueba->category->name }}	
	</h2>

	<ul>
		@foreach($prueba->tags as $tag)
			<li>
				{{ $tag->name }}
			</li>
		@endforeach
	</ul>	
</body>
</html>

