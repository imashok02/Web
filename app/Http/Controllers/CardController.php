<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;
use Auth;
use Session;
use App\Category;
use App\Mark;
use Carbon\Carbon;
use Image;
use Storage;
use App\User;
use App\Comment;



class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
        $Card->user_id = Auth::user();
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        $user = User::all();
        $pop = Auth::user();
        $cards =  Card::with('user')->get()->sortByDesc('id');
       
        $categories = Category::all();

        return view('card.index')->withCards($cards)->withUser($user)->withCategories($categories)->withPop($pop);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function create()
    {
       $marks = Mark::all();
       $categories = Category::all();
       return view('card.add')->withCategories($categories)->withMarks($marks);
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
            'content'=>'required|max:255',
            'media'=>'sometimes|image'
            ));

        $card = new card;
        $card->user_id = Auth::user()->id;
        $card->content = $request->content;
        
    
        if($request->hasFile('media'))
        {
             $media = $request->file('media');

            $filename = time() . '.' . $media->getClientOriginalExtension();
            $location = public_path('media/' . $filename);

            Image::make($media)->resize(700,700)->save($location);

            $card->media = $filename;


        }

        $card->save();
       
        $card->marks()->sync($request->marks,false);


        Session::flash('Success', 'Thanks for your card. Your card has been Sticked!');

        return redirect()->route('cards.show', [$card->id]);
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
        $card = Card::find($id);
       
        //return $card;
        return view('card.show')->withCard($card)->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marks = Mark::find($id);
        $card = Card::find($id);

        return view('card.edit')->withCard($card)->withMarks($marks);
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
          $this->validate($request,array(

            'content'=>'required',
            'category_id'=>'sometimes',
            'media'=>'sometimes'
            
            ));
          $card = Card::find($id);

          $card->content = $request->content;


            if($request->media)
            {
                 $media = $request->file('media');

                $filename = time() . '.' . $media->getClientOriginalExtension();
                $location = public_path('media/' . $filename);

                Image::make($media)->resize(800,400)->save($location);

                $oldmedia = $card->media;

                    //updated image

                $card->media = $filename;

                //delete the old one

                Storage::delete($oldmedia);

            }



          $card->save();

        Session::flash('Success', 'Nice! Your card has been Updated and Sticked!');

        return redirect()->route('cards.show', $card->id);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id 
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $card = card::find($id);
        $card->marks()->detach();

        $card->delete();

        Session::flash('Success', 'Your card is Deleted');

        return redirect('/');
    }
}
 