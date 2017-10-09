@extends('layouts.pages')


@section('content')


 <section id="bricks" class="with-top-sep">

  <div class="row masonry">

      <!-- brick-wrapper -->
         <div class="bricks-wrapper">

          <div class="grid-sizer"></div>
         @foreach($questions as $Question)
          <article class="brick entry format-standard animate-this">

               
               <div class="entry-text">
                <div class="entry-header">

                  <div class="entry-meta">

                   <h1 class="entry-title"><a href="single-standard.html"><strong>{{$Question->title}}</strong></a></h1>
                  <small>Asked by {{ $Question->user->name}} on {{ date('M j Y, h:i a',strtotime($Question->updated_at) ) }}</small><br>
                    <span class="cat-links">
                      <a href="#">Category</a>                       
                    </span>     
                  </div>


                  
                </div>
            <div class="entry-excerpt">
              {!!Html::linkroute('question.single','Read',array($Question->slug))!!} 
            </div>
              {{ $Question->answers()->count() }} Answers

            </article> <!-- end article -->

            @endforeach
        

         </div> <!-- end brick-wrapper --> 

    </div> <!-- end row -->

     </section> <!-- bricks -->





  @endsection

