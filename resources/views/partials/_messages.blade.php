<!-- success Flash messages-->

@if (Session::has('Success'))

<div class="alert alert-info" role="alert">
	<strong>Great!</strong> {{Session::get('Success')}}
</div>	


@endif

<!-- Error Flash Messages-->
@if (count($errors) >0)

<div class="alert alert-info" role="alert">
 <STRONG>Errors!</STRONG>
 <ul>
@foreach($errors->all() as $error)

 <li>{{ $error }}</li>

@endforeach
</ul>

@endif