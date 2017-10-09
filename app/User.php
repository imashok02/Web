<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Scout\Searchable;
use App\Traits\Friendable;


class User extends Authenticatable
{
    use Notifiable;

    use Friendable;
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function cards()
    {
        return $this->hasMany('App\Card');
    }

     public function questions()
    {
        return $this->hasMany('App\Question');
    }


     public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }

     public function likes()
   {
      return $this->hasMany('App\Like');
   }

    public function following()
    {
        return $this->belongsToMany('App\User', 'followers', 'follower_user_id', 'user_id')->withTimestamps();
    }
    /**
     * Does current user following this user?
     */
    public function isFollowing(User $user)
    {
        return !is_null($this->following()->where('user_id', $user->id)->first());
    }
    /**
     * The followers that belong to the user.
     */
    public function followers()
    {
        return $this->belongsToMany('App\User', 'followers', 'user_id', 'follower_user_id')->withTimestamps();
    }


    public function timeline()
{
    $following = $this->following()->with(['cards' => function ($query) {
        $query->orderBy('created_at', 'desc');
    }])->get();

    // By default, the tweets will group by user.
    // [User1 => [Tweet1, Tweet2], User2 => [Tweet1]]
    //
    // The timeline needs the tweets without grouping.
    // Flatten the collection.
    $timeline = $following->flatMap(function ($values) {
        return $values->cards;
    });

    // Sort descending by the creation date
    $sorted = $timeline->sortByDesc(function ($card) {
        return $card->created_at;
    });

    return $sorted->values()->all();
}
}
