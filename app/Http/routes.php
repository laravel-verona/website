<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('annotations/update',function()
{
    Artisan::queue('lmv:clone');
    return redirect('/');
});
Route::get('annotations/{date}', ['as' => 'annotations.index', 'uses' => 'AnnotationController@index']);

