@extends('layouts.pages')


@section('bootstrapcss')
@include('partials._bootstrapstylesheets')

{ !! Html::style('css/select2.min.css') !! }

@endsection



@section('content')

 <div id="content-wrap" class="styles">

    <div class="row narrow add-bottom text-center">

      <div class="col-twelve tab-full">

        <h1>Edit your card</h1>

        <p class="lead">

        {!! Form::model($card, ['route'=> ['cards.update', $card->id],'method'=>'PUT','type'=>'multipart/enctype']) !!}


    {{ Form::textarea('content',null, array('class'=>'form-control', 'placeholder'=>'SayMacha What you got?')) }}

       <input type="file" id="file2" class="custom-file-input" name="media">
    

  
 

     {!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}
      
      {!! Html::linkroute('cards.show','Cancel',array($card->id),array('class'=>'button')) !!}

    


  {!! Form::close() !!}
</p>         

      </div>

      </div>
      </div>



@endsection

@section('bootstrapjs')

    @include('partials._bootstrapjs')

    { !! Html::style('js/select2.min.js') !! }

@endsection


