@extends('layouts.pages')


@section('content')


 <div id="content-wrap" class="styles">

    <div class="row narrow add-bottom text-center">

      <div class="col-twelve tab-full">

       <h5><a href="{{ url('/'.$user->username) }}" class="text-white">
                <img src="/user_avatars/defaultimage.png" style="width: 150px; height: 150px; border-radius: 50%">
       <a href="{{ url('/' . $user->username) }}">
                    <h4><strong>{{ $user->name or 'Full Name' }}</strong></h4>
                </a>


                 @if ($is_edit_profile)
                <li style="list-style: none" class="{{ !Route::currentRouteNamed('following') ?: 'active' }}">
                    <a href="{{ url('/following') }}" class="text-center">
                       
                        <div>{{ $following_count }} Following</div>
                    </a>
                </li>
                @endif

                 <li style="list-style: none" class="{{ !Route::currentRouteNamed('followers') ?: 'active' }}">
                    <a href="{{ url('/' . $user->username . '/followers') }}" class="text-center">
                        <div >{{ $followers_count }} Followers</div>
                        

                         </a>
                         </li>
                         </a>
                         </h5>


 <div class="col-six tab-full">

                         <ul style="list-style: none">
              <li><i class="icon ion-ios-paper"></i><div><a href="newsfeed.html">Knowledge In</a></div></li>
              <li><i class="icon ion-ios-people"></i><div><a href="newsfeed-people-nearby.html">Trusts & Followers</a></div></li>
              <li><i class="icon ion-ios-people-outline"></i><div><a href="newsfeed-friends.html">Contact</a></div></li>
              <li><i class="icon ion-chatboxes"></i><div><a href="newsfeed-messages.html">About</a></div></li>
              <li><i class="icon ion-images"></i><div><a href="newsfeed-images.html">Questions</a></div></li>
              <li><i class="icon ion-ios-videocam"></i><div><a href="newsfeed-videos.html">Answers</a></div></li>
              <li><i class="icon ion-ios-videocam"></i><div><a href="newsfeed-videos.html">SayMacha Review</a></div></li>
             
            </ul>


              </div>

        </div>
        </div>



       

             @if (Auth::check())
                                @if ($is_edit_profile)
                                <a href="{{ route('profile.edit')}}" class="navbar-btn navbar-right">
                                    <button type="button" class="btn btn-default">Edit Profile</button>
                                </a>
                                @elseif (!$is_following )
                                <a href="{{ url('/follows/' . $user->username) }}" class="navbar-btn navbar-right">
                                    <button type="button" class="btn btn-default">Follow</button>
                                </a>
                                @else
                                <a href="{{ url('/unfollows/' . $user->username) }}" class="navbar-btn navbar-right">
                                    <button type="button" class="btn btn-default">Unfollow</button>
                                </a>
                                @endif
                            @endif

      
        </div>
      

           


                            
                             


@endsection


   

               
