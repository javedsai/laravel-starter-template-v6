{{-- Form Validation Code for Displaying Errors --}}
@if($errors->any())
@foreach($errors->all() as $error)
	<div class="alert alert-danger" roles="alert"><p>
		{{ $error }}
	</p></div>
@endforeach
@endif

@if(session('successMsg'))
	<div class="alert alert-success" roles="alert">
		{{ session('successMsg') }}
	</div>
@endif

@if(session('unsuccessMsg'))
	<div class="alert alert-danger" roles="alert">
		{{ session('unsuccessMsg') }}
	</div>
@endif