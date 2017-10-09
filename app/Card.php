<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
      protected $fillable = [
            'user_id', 'content',
        ];

   public function user()
   {
    return $this->belongsTo('App\User');
   }
   
   
   public function marks()
   {
   		return $this->belongsToMany('App\Mark');
   }

   public function comments()
  {
  	 return $this->hasMany('App\Comment');
  }

  public function category()
  {
    return $this->belongsTo('App\Category');
  }
}
