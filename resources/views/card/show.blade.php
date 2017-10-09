@extends('layouts.pages')

@section('content')
  
<section id="content-wrap" class="blog-single">
    <div class="row">
      <div class="col-twelve">

        <article class="format-standard"> 

        @if($card->media==true)

          <div class="content-media">
            <div class="post-thumb">
            <a href="{{url('/cards/' .$card->id)}}" class="thumb-link">
              <img src="{{ asset('media/' .$card->media )}}"> 
              </a>
            </div>  
          </div>

          @endif

          <div class="primary-content">

             

            <ul class="entry-meta">
              <small>September 06, 2016</small>          
              <li class="cat"><a href=""></a>        
            </ul>           

            <p class="lead">{{ $card->content }}</p>  `
            </li>

            </ul>
            </div>

     <div class="row">

     @if(Auth::user()->id == $card->user_id)

        <div class="col-six tab-full">


                  {!! Html::linkroute('cards.edit','Edit',array($card->id))!!}


      
                 
                  {!! Form::open( ['route'=> ['cards.destroy', $card->id], 'method'=> 'DELETE' ] ) !!}
                  

                  {{ Form::submit('Delete',array('class'=>'link')) }}

                  {!! Form::close() !!}
              

          
        </div>
        @endif

        <div class="col-six tab-full">

          
         <p class="drop-cap">{{ $card->comments()->count() }} Comments </a>

        </p>

       
      </div>           

    </div> <!-- end row -->

<div class="respond">


                     {{ Form::open(['route' =>['comments.store', $card->id], 'method'=>'POST'])}}

                      {{ Form::text('comment',null, ['placeholder'=>'Your Comment'])}}

                      {{ form::submit('Comment', ['class'=>'btn btn-sm btn-primary']) }}

                      {{ Form::close() }}

                      </div>
                      </div>
                      </article>
                      
                      </div>
                      </section>
@endsection


