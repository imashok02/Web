@extends('layouts.pages')



@section('styles')

<link rel="stylesheet" type="text/css" href="'css/select2.css'">

@endsection



@section('content')
<div id="content-wrap" class="styles">

    <div class="row narrow add-bottom text-center">

      <div class="col-twelve tab-full">
    {!! Form::open(array('route'=>'questions.store')) !!}

    {{ Form::text('title',null, array('class'=>'respond', 'placeholder'=>'Your Question?')) }}
	{{ Form::textarea('decription',null, array('class'=>'form-control', 'placeholder'=>'Describe for better understanding!')) }}

	
	<select class="form-control" name="category_id">
		
		@foreach($categories as $category)
			<option value="{{$category->id}}">{{$category->name}}</option>

	</select>

		@endforeach


    {{ Form::submit('Ask Question',array('class'=>'btn btn-primary')) }}
    


	{!! Form::close() !!}

			
 

 </div>
 </div>
 </div>

               
 

@endsection

@section('scripts')

 <link rel="script" type="text/javascript" href="'js/select2.js'">

    <script type="text/javascript">
    	
    	$("#select2-multi").select2();

    </script>

  @endsection
