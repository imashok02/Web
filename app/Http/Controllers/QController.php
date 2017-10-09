<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\User;

class QController extends Controller
{
	public function single($slug)

{

          $user = User::all();
		$question = Question::where('slug', '=', $slug)->first();

		return view('questions.single')->withquestion($question);

	}   
}
