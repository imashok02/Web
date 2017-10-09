<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>
@include('partials._head')
<body id="top">

    <!-- header 
   ================================================== -->
   @include('partials._header')


   <!-- masonry
   ================================================== -->
  

            @yield('content')

         

  

   
   <!-- footer
   ================================================== -->


    @include('partials._footer')

  @include('partials._preloader')

   <!-- Java Script
   ================================================== --> 

   @include('partials._scripts')
  

</body>

</html>