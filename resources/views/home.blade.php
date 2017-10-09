<!DOCTYPE html>
<html lang="en">
  @include('partials._head')
  <body>

    <!-- Header
    ================================================= -->
    @include('partials._header')
    <!--Header End-->

    <div id="page-contents">
  <section id="bricks" class="with-top-sep">



  <div class="row masonry">


      <!-- brick-wrapper -->
         <div class="bricks-wrapper">

          <div class="grid-sizer"></div>
         
          @foreach($cards as $card) 
          <article class="brick entry format-standard animate-this">

               <div class="entry-thumb">
                @if($card->media==true)
                  <a href="{{url('/cards/' .$card->id)}}" class="thumb-link">
                  
                    <img src="{{ asset('media/' .$card->media )}}" alt="building">             
                  </a>
                @endif
               </div>

               <div class="entry-text">
                <div class="entry-header">

    

                 Ashok Sekar<small> {{ date('M j Y, h:i a',strtotime($card->updated_at) ) }}</small> 
                  
                </div>
            <div class="entry-excerpt">
              {{$card->content}}
               
            </div>
             {{ $card->comments()->count() }} Comments<br>
              {!! Html::linkroute('cards.show','More',array($card->id))!!}
               </div>


            </article> <!-- end article -->


            @endforeach
           
         </div> <!-- end brick-wrapper --> 

    </div> <!-- end row -->

     </section> <!-- bricks -->


        
          


      </div>
      </div>
      </div>
      </div>



    <!-- Footer
   
    <!--preloader-->
    <div id="spinner-wrapper">
      <div class="spinner"></div>
    </div>
    
    <!-- Scripts
    ================================================= -->
    @include('partials._scripts')
  </body>
</html>





