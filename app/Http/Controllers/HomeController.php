<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Question;
use App\Card;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $categories = Category::all();
       
       $cards =  Card::with('user')->get()->sortByDesc('id');
        $questions =  Question::with('user')->get()->sortByDesc('id');
        
       
        $categories = Category::all();

        return view('home')->withCards($cards)->withUser($user)->withCategories($categories)->withQuestions($questions);
    }
}


 