<?php
use File as Fl;
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
use App\photo_gallery;
use App\User;
use Auth as au;

Route::get('/', 'UserController@index');


Route::get('/gallery', function(){
	$pics = photo_gallery::all();
	//dd($pics);
	return view('gallery', ['data' => $pics]);
});
Route::get('/home', 'UserController@index');
Auth::routes();



Route::get('/profile', 'HomeController@index')->name('profile');

Route::get('/activities/{id}','CommonController@go_act')->where(['id'=>'[0-9]+']);

Route::get('/activities' ,'CommonController@go_act');


Route::post('/save-comment', 'AjaxController@saveComment');

Route::post('/update-comment', 'AjaxController@updateComment');
Route::post('/del-comment', 'AjaxController@delComment');

Route::group(['middleware' => 'auth'],function(){
	Route::post('/saveprofile', 'CommonController@saveProfile');
	
});


// admin routes

Route::get('admin','AdminController@index');

Route::post('admin/dashboard', [
	'uses' => 'AdminController@login',
	'as'   => 'admin.login'
]);

Route::group(['middleware' => 'auth'], function(){	

	Route::get('/dashboard', function() {
		if(au::User()->admin) {
			return view('auth.admindashboard');		
		}
		
	})->name('home');

});


Route::group(['middleware' => 'auth'],function(){
	Route::get('admin/gallery', 'AdminController@activity');
});

Route::group(['middleware' => 'auth'],function(){
	Route::post('admin/gallery', 'AdminController@saveActivity');
});

Route::group(['middleware' => 'auth'],function(){
	// Routing for gallery
	Route::get('admin/savegallery', function() {
		if(au::User()->admin) {
			return view('auth.gallery',['checked' => 1]);
		}	
	});

	Route::post('admin/savegallery', 'AdminController@saveGalleryImage');

	Route::get('admin/viewgallery', 'AdminController@view_gallery');
	Route::get('admin/deletepic/{id}', 'AdminController@delpic');	

	// Routing for activity
	Route::get('admin/postactivity', function(){
		if(au::User()->admin) {
			return view('auth.activity', ['act_checked' => 1]);
		}	
	});

	Route::post('admin/saveactivity', 'AdminController@save_activity');

	Route::get('admin/viewactivity', 'AdminController@view_activity');

	Route::get('admin/delact/{id}', 'AdminController@delete_activity');
	
	// Routing for events
	Route::get('admin/saveevent', function(){
		if(au::User()->admin) {
			return view('auth.saveevent',['event_checked' => 1]);
		}		
	});
	Route::post('admin/saveevent', 'AdminController@saveEvent');
	Route::get('/admin/viewevent', 'AdminController@viewEvent');
	Route::get('/admin/viewevent/{id}', 'AdminController@delEvent');
	
});
// admin route ends
Route::get('/viewprofile/{id}', 'CommonController@viewProfile');

Route::get('verifyemailfirst', 'Auth\RegisterController@verifyEmailFirst')->name('verifyEmailFirst');

Route::get('verify/{email}/{verifyToken}', 'Auth\RegisterController@sendEmailDone')->name('sendEmailDone');

Route::get('admin/savevideo', 'AdminController@show_video_form');
Route::post('admin/savevideo', 'AdminController@save_video');	
Route::get('admin/delvideo', 'AdminController@list_video');
Route::get('admin/delvideo/{id}', 'AdminController@del_video');

// Route for video gallery
Route::get('/videogallery','UserController@video_gallery');

