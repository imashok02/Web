@extends('layouts.pages')

@section('content')

<section id="bricks" class="with-top-sep">

  <div class="row masonry">

      <!-- brick-wrapper -->
         <div class="bricks-wrapper">

          <div class="grid-sizer"></div>
       @foreach($peoples as $people)


          <article class="brick entry format-standard animate-this">

               
               <div class="entry-text">
                <div class="entry-header">

                  <div class="entry-meta">

                   <h1 class="entry-title"><a href="{{ url('/'.$people->username)}}">
                   {{ $people->name }}
                        
                  </div>

                  Follow



                  
                </div>
            
            </article> <!-- end article -->
@endforeach


         </div> <!-- end brick-wrapper --> 

    </div> <!-- end row -->

     </section> <!-- bricks -->




@endsection



      
