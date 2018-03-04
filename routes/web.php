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

Route::get('/', 'PostsController@index')->name('home');

Route::get('/home', 'PostsController@index')->name('home');

Route::get('/about', 'PostsController@about');

Route::get('/bluewave', 'PostsController@bluewave');

Route::get('/privacy', 'PostsController@privacy');

Route::get('/ceos', 'PostsController@ceos');

Route::get('/actions', 'PostsController@actions');

Route::post('/actions', 'PostsController@actionTaken');

Route::get('/archive', 'PostsController@archive');

Route::get('/json', 'PostsController@json');

Route::get('/bricks', 'PostsController@bricks');

Route::get('/archive/search/{query}', function ($query) {
	return App\Post::search($query)->get();

});



Route::get('/assemble', 'AssembleController@create');


Route::get('/posts/{post}/{slug}', 'PostsController@show');

Route::get('/logout', 'SessionsController@destroy');

Route::get('/reps', 'RepsController@index');

Route::get('/house', 'RepsController@all');

Route::get('/governors', 'RepsController@governors');

Route::get('/reps/create', 'RepsController@create');

Route::get('/reps/profile/{id}', 'RepsController@rep');

Route::get('/house/{name}', 'RepsController@house');

Route::get('/reps/{name}', 'RepsController@rep');

Route::get('/governors/{name}', 'RepsController@governor');


Route::get('ajax',function(){
   return view('posts.message');
});
Route::post('/getmsg','PostsController@actionTaken');



    Route::get('login/facebook', 'RegistrationController@redirectToProvider');

	Route::get('login/facebook/callback', 'RegistrationController@handleProviderCallback');

	Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');

	Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');

	Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

	Route::post('password/reset', 'Auth\ResetPasswordController@reset');

	Route::get('/signup', 'RegistrationController@create');

	Route::post('/signup', 'RegistrationController@store');

	Route::get('/login', 'SessionsController@create');

	Route::post('/login', 'SessionsController@store');



Route::group( ['middleware' => 'auth' ], function()
	{

	Route::get('/edit', 'ProfileController@create');

	Route::post('/profile', 'ProfileController@store');

	Route::get('/profile/{user}', 'ProfileController@show');

	Route::get('/profile', 'ProfileController@index');

	Route::get('/create', 'CreateController@create');

	Route::get('/admin', 'CreateController@admin');

	Route::post('/delete', 'CreateController@delete');

	Route::get('/update/{post}/{slug}', 'CreateController@update');

	Route::post('/posts', 'CreateController@store');

	});

Route::get('/health', function () {
    return response('Healthy', 200)
                  ->header('Content-Type', 'text/plain');
});
Route::get('/data', function () {
    return view('json.data');
});




