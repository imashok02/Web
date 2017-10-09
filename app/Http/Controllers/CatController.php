<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\User;

class CatController extends Controller
{
   
 public function single($category)
    {
        $category = Category::find($category);
        if($category !== null){
            $cards = $category->cards;
            return view('Categories.single',['cards' -> $cards]);
        }
	}   
}
