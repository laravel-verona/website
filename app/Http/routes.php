<?php

use App\Repository\AnnotationRepository;

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

Route::get('/', ['as' => 'home', function () {
    return view('home');
}]);

Route::get('annotations', ['as' => 'annotations.index', function (AnnotationRepository $annotationRepo) {
    $readme = $annotationRepo->readme();
    $annotations = $annotationRepo->all();
    return view('annotations.index', compact('readme', 'annotations'));
}]);

Route::get('annotations/show/{name}', ['as' => 'annotations.show', function (AnnotationRepository $annotationRepo, $name) {
    $annotation = $annotationRepo->find($name);
    $annotations = $annotationRepo->all();

    return view('annotations.show', compact('name', 'annotation', 'annotations'));
}]);
