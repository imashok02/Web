@extends('layouts.pages')

@section('content')

 
 
         
 <section id="bricks" class="with-top-sep">

  <div class="row masonry">

      <!-- brick-wrapper -->
         <div class="bricks-wrapper">

          <div class="grid-sizer"></div>
        
          @foreach($medias as $media)

          @if($media->media == true)

          <article class="brick entry format-standard animate-this">

               <div class="entry-thumb">
               
                  <a href="{{url('/cards/' .$media->id)}}" class="thumb-link">
                  <img src="{{ asset('/media/' .$media->media )}}">
                        
                  </a>
               
               </div>

               <div class="entry-text">
                <div class="entry-header">
{{ $media->user->name}}
    

                 <small></small> 
                  
                </div>
            
            
             
               </div>


            </article> <!-- end article -->

            @endif
            @endforeach
            
        

         </div> <!-- end brick-wrapper --> 

    </div> <!-- end row -->

     </section> <!-- bricks -->





   

  @endsection
