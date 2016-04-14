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
Route::get('tools', ['as' => 'tools', 'uses' => 'ToolsController@index']);

Route::post('annotations/sync',  ['as' => 'annotations.sync',  'uses' => 'AnnotationController@sync']);
Route::get('annotations/{date}', ['as' => 'annotations.index', 'uses' => 'AnnotationController@index']);
