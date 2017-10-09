@if( Auth::user())
<header class="short-header">   

    <div class="gradient-block"></div>  

    <div class="row header-content">

      <div class="logo">
           <a href="/">Author</a>
        </div>

      <nav id="main-nav-wrap">
        <ul class="main-navigation sf-menu">
          <li class="{{ Request::is('/') ? 'active' : ''}}"><a href="/" title="">Home</a></li>                 
          <li class="has-children">
            <a href="/questions" title="">Questions</a>
            <ul class="sub-menu">
                  <li><a href="questions">Questions Feed</a></li>
                  <li><a href="categories">Categories</a></li>
                                   
               </ul>
          </li>
          <li class="has-children">
            <a href="/cards" title="">Cards</a>
            <ul class="sub-menu">
                  <li><a href="single-video.html">Cards Feed</a></li>
                 
                  
               </ul>
          </li>

          <li class="has-children">
            <a href="/explore" title="">Explore</a>
            <ul class="sub-menu">
                  <li><a href="/images">Images</a></li>
                  <li><a href="/videos">Videos</a></li>
                  <li><a href="/music">music</a></li>
                  
               </ul>



          <li><a href="/notifications" title="">Notifs</a></li>
          

          <li><a href="style-guide.html" title="">Styles</a></li>
          <li class="has-children">
            <a href="single-standard.html" title="">{{ Auth::user()->name }}</a>
            <ul class="sub-menu">
                  <li><a href="/{{ Auth::user()->username}}">Profile</a></li>
                   <li><a href="/trusts">Trusts</a></li>
                   <li><a href="/myquestions">Your Questions</a></li>
                  <li><a href="mycards">Your Cards</a></li>
                  <li><a href="myanswers">Your Answers</a></li>
                  <li><a href="mymedia">Your Media</a></li>
                  <li><a href="{{ route('logout') }}">Logout</a></li>
                  
               </ul>
          </li>                    
        </ul>
      </nav> <!-- end main-nav-wrap -->

      <div class="search-wrap" id="search">
        
        <form role="search" method="get" class="search-form" action="/search">
          <label>
            <span class="hide-content">Search for:</span>
            <input type="search" class="search-field" placeholder="Type Your Keywords" value="" name="q" title="Search for:" autocomplete="off">
          </label>
          <input type="submit" class="search-submit" value="Search">
        </form>

        <a href="#" id="close-search" class="close-btn">Close</a>

      </div> <!-- end search wrap --> 

      <div class="triggers">
        <a class="search-trigger" href="#"><i class="fa fa-search"></i></a>
        <a class="menu-toggle" href="#"><span>Menu</span></a>
      </div> <!-- end triggers -->  
      
    </div>        
    
   </header> <!-- end header -->



   @else

   <header class="short-header">   

    <div class="gradient-block"></div>  

    <div class="row header-content">

      <div class="logo">
           <a href="/">Author</a>
        </div>

        <div class="search-wrap">
        
        <form role="search" method="get" class="search-form" action="#">
          <label>
            <span class="hide-content">Search for:</span>
            <input type="search" class="search-field" placeholder="Type Your Keywords" value="" name="s" title="Search for:" autocomplete="off">
          </label>
          <input type="submit" class="search-submit" value="Search">
        </form>

        <a href="#" id="close-search" class="close-btn">Close</a>

      </div> <!-- end search wrap --> 

      <div class="triggers">
        <a class="search-trigger" href="#"><i class="fa fa-search"></i></a>
        <a class="menu-toggle" href="#"><span>Menu</span></a>
      </div> <!-- end triggers -->  
      
    </div>        
    
   </header> <!-- end header -->

   @endif