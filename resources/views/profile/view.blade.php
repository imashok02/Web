@extends('layouts.pages')

@section('content')



<div class="container">
  <div class="row">
    <div class="col">
      @if (Auth::check())
    @if ($is_edit_profile)
    <a href="#" class="navbar-btn navbar-right">
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



    <div class="col-7">
      <img src="/user_avatars/defaultimage.png" style="width: 150px; height: 150px; border-radius: 50%">
       <a href="{{ url('/' . $user->username) }}">
                    <h4><strong>{{ $user->name or 'Full Name' }}</strong></h4>
                </a>
                <a href="{{ url('/' . $user->username) }}">
                    <small>&#64;{{ $user->username or 'username' }}</small>
                </a>
    </div>
    <div class="col">
      Status Here
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col">
          Easy Link: <b>Saymacha.in/ashok</b><br>
           Email:<br>
     Facebook:<br>
     Twitter:<br>
     Phone No:<br>
     Website:<br>
    </div>
    <div class="col-7">

      <H3>Bio</H3>
    </div>
    <div class="col">
      <h5>Area Of Knowledge</h5>
    </div>
  </div>
  <hr>

  <div class="row">

   @if ($is_edit_profile)
                <li class="{{ !Route::currentRouteNamed('following') ?: 'active' }}">
                    <a href="{{ url('/following') }}" class="text-center">
                        <div class="text-uppercase">Following</div>
                        <div>{{ $following_count }}</div>
                    </a>
                </li>
                @endif
                <li class="{{ !Route::currentRouteNamed('followers') ?: 'active' }}">
                    <a href="{{ url('/' . $user->username . '/followers') }}" class="text-center">
                        <div class="text-uppercase">Followers</div>
                        <div>{{ $followers_count }}</div>
                    </a>
                </li>
  <div class="col">No. Of Questions Asked</div>
  <div class="col">No. Of Answers Given</div>
  <div class="col">No. Of Questions Received</div>
  <div class="col">SayMacha Overall </div>
</div>
<hr>

<div class="row">
  <div class="col-4">
     Email:<br>
     Facebook:<br>
     Twitter:<br>
     Phone No:<br>
     Website:<br>
     </div>
  <div class="col-8">
     @foreach($cards as $card)
{{$card->content}}

     @endforeach
     </div>
</div>
</div>


@endsection
