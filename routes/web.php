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

Route::get('/about', 'PostsController@about');

Route::get('/actions', 'PostsController@actions');

Route::post('/actions', 'PostsController@actionTaken');

Route::get('/posts/create', 'PostsController@create');

Route::post('/posts', 'PostsController@store');

Route::get('/posts/{post}', 'PostsController@show');

Route::get('/signup', 'RegistrationController@create');

Route::post('/signup', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create');

Route::post('/login', 'SessionsController@store');

Route::get('/logout', 'SessionsController@destroy');

Route::get('/profile', 'ProfileController@index');

Route::post('/profile', 'ProfileController@updatePicture');

Route::get('/edit', 'ProfileController@create');

Route::post('/edit', 'ProfileController@store');

Route::get('/profile/{user}', 'ProfileController@show');

Route::get('/redirect', 'SocialAuthController@redirect');

Route::get('/callback', 'SocialAuthController@callback');


