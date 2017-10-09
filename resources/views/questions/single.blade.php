@extends('layouts.pages')
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=your_API_key"></script>
<script>
tinymce.init({ selector:'textarea'});
</script>

@section('content')

<div id="content-wrap" class="styles">

    <div class="row narrow add-bottom text-center">

      <div class="col-twelve tab-full">


        <p class="lead">{{ $question->title }}</p>         

      </div>

      </div>


<div class="row">

        <div class="col-six tab-full">

          
          <p>
      @if($question->category_id == true)   Category: {{$question->category->name}}<br> @endif

                  @if(Auth::user()->id  == $question->user_id)

                      {!! Html::linkroute('questions.edit','Edit',array($question->id))!!}
                      
                     
                        {!! Form::open( ['route'=> ['questions.destroy', $question->id], 'method'=> 'DELETE' ] ) !!}
                        

                        {{ Form::submit('Delete',array('class'=>'link')) }}

                        {!! Form::close() !!}

                    @endif  
        </p>


        </div>

        <div class="col-six tab-full">

          

          <p class="drop-cap">{{$question->answers()->count()}}  answers
        </p>

        

      </div>           

    </div> <!-- end row -->

    <div class="row">

 <div class="col-twelve tab-full">

 @foreach($question->answers as $answer)         

                           
 <strong>{{ $question->user->name}}</strong> <small>Says</small>
   
 {{$answer->answers}}</br><hr>




 @endforeach

                              {{ Form::open(['route' =>['answers.store', $question->id], 'method'=>'POST'])}}

              {{ Form::textarea('answers',null, ['class'=>'form-control','placeholder'=>'Your Answer','rows'=>'3'])}}

              {{ form::submit('Answer', ['class'=>'btn btn-sm btn-primary']) }}

            {{ Form::close() }}





 </div>
 </div>
 </div>

 

   
@endsection


