<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/',function()
{
	return "WELCOME TO LARAVEL";
});

Route::get('/authtest',array('before'=> 'auth.basic',function()
{
	return View::make('hello');
}));


/* Version 1
/* functionality of showing and storing.
*/
Route::group(array('prefix'=>'api/v1','before'=>'auth.basic'),function()
{
	Route::resource('url','UrlController');
});

/* Version 2 
/* functionality of update and destroy.
*/
Route::group(array('prefix'=>'api/v2','before'=>'auth.basic'),function()
{
	Route::resource('url','UrlControllerV2');
});

Route::get('/registration',function()
{
	return View::make('registration');
});
 
Route::post('registration',['uses'=>'UserController@create']);