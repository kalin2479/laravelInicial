@if( session('mensaje') )
	<div class="wrapper alert alert-{{ session('tipo') }} ">
		{{ session('mensaje') }}
	</div>
@endif

@if(count($errors) > 0)
	<div class="wrapper">
		<div class="alert alert-danger" role="alert">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>			
		</div>
	</div>
@endif