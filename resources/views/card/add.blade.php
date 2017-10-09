@extends('layouts.pages')



@section('styles')

<link rel="stylesheet" type="text/css" href="'css/select2.css'">

@endsection



@section('content')

@include('partials._messages')


   <div id="content-wrap" class="styles">

    <div class="row narrow add-bottom text-center">

      <div class="col-twelve tab-full">

        <h1>Throw your Card!</h1>

        <p class="lead">
          
            {!! Form::open(array('route'=>'cards.store','files'=>true)) !!}

    {{ Form::textarea('content',null, array('class'=>'form-control', 'placeholder'=>'SayMacha What you got?')) }}

  

     {{ Form::file('media') }}

  
  

    {{ Form::submit('Stick',array('class'=>'btn btn-primary')) }}
    


  {!! Form::close() !!}


        </p>         

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



 	