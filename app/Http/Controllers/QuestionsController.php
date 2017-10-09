<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Question;
use App\Mark;
use App\Category;
use Session;
use App\User;
use App\Like;


class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $user = User::all();
       $pop = Auth::user();
        $questions =  Question::with('user')->get()->sortByDesc('id');
        $categories = Category::all();
       
        //$categories = Category::orderBy('name')->get();

        return view('questions.index')->withQuestions($questions)->withUser($user)->withCategories($categories)->withPop($pop);
    }

    /**
     * Show the form for creating a new resource.
     *s
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        $categories = Category::all(); 
        return view('questions.create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,array(
            'title'=>'required|max:255',
            
            
            ));

        $Question = new Question;
        $Question->user_id = Auth::user()->id;
        $Question->title = $request->title;
        $Question->description =  $request->description;
        $Question->category_id =$request->category_id;
        $Question->slug = str_slug($request->title,'-');
    
    
       
        $Question->save();
       
       // $Question->marks()->sync($request->marks,false);


        Session::flash('Success', 'Thanks for your Question. Your Question has been Sticked!');

        return redirect()->route('questions.show', [$Question->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         
          $user = User::all();
        $question = Question::find($id);
        $categories =Category::with('questions')->get();
       
        //return $question;
        return view('questions.show')->withQuestion($question)->withUser($user)->withCategories($categories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $user = User::all();
        $question = Question::find($id);
        $categories =Category::all();
        $cats = array();
         foreach ($categories as $category) {
             $cats[$category->id] = $category->name;
         }
       
        //return $question;
        return view('questions.edit')->withQuestion($question)->withUser($user)->withCategories($cats);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $Question = Question::find($id);


          $this->validate($request,array(
        'title'=>'required|max:255'
          ));
      

        $Question =Question::find($id);

        $Question->user_id = Auth::user()->id;
        $Question->title = $request->title;
        $Question->category_id =$request->category_id;
        $Question->slug = str_slug($request->title,'-');
    
    
       
        $Question->save();
       
       // $Question->marks()->sync($request->marks,false);


        Session::flash('Success',' Your Question has been Updated!');

        return redirect()->route('questions.show', [$Question->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function postlike(Request $request)
    {
        
        $question_id = $request->question_id;
       
        $update = false;
        $question = Question::find($question_id);

        if (!$question)
        {
            return null;

        }

        $user = Auth::user();
        $like = $user->likes()->where('question_id',$question_id)->first();

        if($like)
        {
            $already_like = $like->like;
            $update= true;

            if($already_like = $is_like)
            {
                $like->delete();
                return null;
            }
        }else
        {
            $like = new Like;
        }

        $like->like = $is_like;
        $like->user_id = $user;
        $like->question_id = $question;

        if($update)
        {
            $like->update();

        }else
        {
            $like->save();
        }
        return null;
    }


}
