<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/check', function()
{
	return \App\User::find(5)-> add_friend(2);
});





Route::group(['middleware'=>['auth']], function(){

	//marks Controller

	Route::resource('/marks', 'MarkController',['except'=>['create']]);

	//Answer route for questions

	Route::post('/answers/{question_id}', ['uses'=>'AnswersController@store', 'as'=>'answers.store']);

	//Questions Routes     

	Route::resource('/questions', 'QuestionsController');

	//comments for cards

	Route::post('/comments/{card_id}', ['uses'=>'CommentsController@store', 'as'=>'comments.store']);

	//Categories resource route

	Route::get('/categories/{category}', 'CategoryController@show');

	Route::resource('/categories', 'CategoryController',['except'=>['create']]);
			
	//card resource controller

	Route::resource('/cards', 'CardController');


			
	//Home Routes	

	Route::get('/home', 'HomeController@index')->name('home');

	Route::get('/', 'HomeController@index');
});

//Auth Routes

	Auth::routes();
	Route::get('/logout', 'Auth\LoginController@logout');


	 Route::get('/search', [
    'as' => 'search',
    'uses' => 'SearchController@search'
]);

	 Route::get('/explore', 'ExploreController@explore');




	//User Profile routes

	 Route::get('/people' ,'PeopleController@people');

	Route::get('/following', 'ProfileController@following')->name('following');

	Route::get('/{username}', 'ProfileController@show')->name('profile');

	Route::get('/{username}/followers', 'ProfileController@followers')->name('followers');

	

	Route::get('/profile/edit', 'ProfileController@edit')->name('profile.edit');

	// Question single slug route

	Route::get('question/{slug}', ['as' => 'question.single', 'uses' => 'QController@single'])->where('slug', '[\w\d\-\_\.]+');


	//User Follows


	 Route::get('/follows/{username}', 'UserController@follows');

	 Route::get('/unfollows/{username}', 'UserController@unfollows');





 



  


