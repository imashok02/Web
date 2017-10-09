<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;
use App\Comment;
use App\Question;
use App\User;
use Auth;

class ProfileController extends Controller
{
    
	     public function show($username)
    {

        $cards = User::find(Auth::id())->cards;

    	$user = User::where('username', $username)->firstOrFail();
        $followers_count =  $user->followers()->count();
        $following_count =  $user->following()->count();
    	$is_edit_profile = false;
    	$is_following = false;
    	if (Auth::check()) {
			$is_edit_profile = (Auth::id() == $user->id);
            $me = Auth::user();
            $following_count = $is_edit_profile ? $me->following()->count() : 0;
			$is_following = !$is_edit_profile && $me->isFollowing($user);
    	}
        return view('profile.index', [
            'user' => $user,
            'followers_count' => $followers_count,
            'is_edit_profile' => $is_edit_profile,
            'following_count' => $following_count,
            'is_following' => $is_following,
            'profile.view' => $cards
            ]);
    }



    public function following()
    {
        $me = Auth::user();
        $followers_count = $me->followers()->count();
        $following_count = $me->following()->count();
        $list = $me->following()->orderBy('username')->get();
        $is_edit_profile = true;
        $is_following = false;
        return view('profile.following', [
            'user' => $me,
            'followers_count' => $followers_count,
            'is_edit_profile' => $is_edit_profile,
            'following_count' => $following_count,
            'is_following' => $is_following,
            'list' => $list,
            ]);
    }


    
    public function followers($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $followers_count =  $user->followers()->count();
        $following_count =  $user->following()->count();
        $list = $user->followers()->orderBy('username')->get();
        $is_edit_profile = false;
    {
        $user = User::where('username', $username)->firstOrFail();
        $followers_count =  $user->followers()->count();
        $following_count =  $user->following()->count();
        $list = $user->followers()->orderBy('username')->get();
        $is_edit_profile = false;
        $is_following = false;
        if (Auth::check()) {
            $is_edit_profile = (Auth::id() == $user->id);
            $me = Auth::user();
            $following_count = $is_edit_profile ? $me->following()->count() : 0;
            $is_following = !$is_edit_profile && $me->isFollowing($user);
        }
        return view('profile.followers', [
            'user' => $user,
            'followers_count' => $followers_count,
            'is_edit_profile' => $is_edit_profile,
            'following_count' => $following_count,
            'is_following' => $is_following,
            'list' => $list,
            ]);
    }
}

}


