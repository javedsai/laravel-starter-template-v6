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