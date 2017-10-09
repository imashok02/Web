<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;
use Image;

class ExploreController extends Controller
{
    public function explore()
    {


    	$medias = Card::all();
    	
    	
    	return view('Explore.media')->withMedias($medias);
    }
}
