@extends('layouts.pages')



@section('styles')

<link rel="stylesheet" type="text/css" href="'css/select2.css'">

@endsection



@section('content')

<div id="content-wrap" class="styles">

    <div class="row narrow add-bottom text-center">

      <div class="col-twelve tab-full">

        <h1>Edit your Question</h1> 
  
    {!! Form::model($question,array('route'=>['questions.update',$question->id],'method'=>'PUT')) !!}

    {{ Form::text('title',null, array('class'=>'form-control', 'placeholder'=>'Your Question?')) }}

    {{ Form::textarea('decription',null, array('class'=>'form-control', 'placeholder'=>'Describe for better understanding!')) }}


 {{ Form::select('category_id',$categories,null,['class'=>'form-control'])}}
		

    {{ Form::submit('Update Question',array('class'=>'btn btn-primary')) }}
    


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
