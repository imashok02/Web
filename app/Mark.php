<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
   public function questions()
   {
   	return $this->belongsToMany('App\Question');
   }
}
