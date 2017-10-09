<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function card()
    {
    	return $this->belongsTo('App\Card');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
   
}
