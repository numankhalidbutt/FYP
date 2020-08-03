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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'PagesController@home')->name('home');
Route::get('about','PagesController@about');
Route::get('contact_us','PagesController@contact_us');
Route::get('hotel','PagesController@hotels');
Route::get('hotel_events','PagesController@events');


Route::resource('users','UserController');
Route::resource('event_categories','EventCategoriesController');
Route::resource('events','EventsController');
Route::resource('facilities','FacilitiesController');
Route::resource('hotels','HotelsController');
Route::view('dashboard','admin/index')->middleware('auth');
Route::get('change_user_role/{user}','UserController@change_role');
Route::get('change_user_status/{user}','UserController@change_status');
Route::post('search_hotel','HotelsController@search_hotel');
Route::post('ajaxCall','HotelsController@ajaxCall');

Route::middleware(['auth'])->group(function (){

	Route::resource('reviews','ReviewsController');
	Route::get('hotel/{hotel}/review/{review}','HotelsController@hotel_review');

});


Route::get('test',function(){

    if(\Auth::user() && ( 0 >= \App\Reviews::select(DB::raw('count(reviews.id) as count'))
   ->join('hotels','hotels.id','=','reviews.hotel_id')->where('reviews.user_id',\Auth::user()->id)->where('hotels.id',17)->get()[0]->count)  )
    	return \App\Reviews::select(DB::raw('count(reviews.id) as count'))
   ->join('hotels','hotels.id','=','reviews.hotel_id')->where('reviews.user_id',\Auth::user()->id)->where('hotels.id',11)->get()[0]->count;
    else
    	return 'false';


});

