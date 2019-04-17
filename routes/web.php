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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Formulaire --création
Route::post('/home', 'VisitorController@create')->name('create_user');
Route::post('/home/computerassignment', 'ComputerassignmentController@create')->name('computerassignment');

//Récupère les ordinateur attribuer
Route::get('/home/all_assignment', 'ComputerassignmentController@all_assignment')->name('all_assignment');

//Annule l'ordinateur attribuer a un Visiteur
Route::get('home/{computerassignment_id}/delete', 'ComputerassignmentController@cancel');

//Ajax
Route::post('/home/id_computer', 'ComputerassignmentController@get_hours');

