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
Route::get('/home/get_computerassignment', 'ComputerassignmentController@get_all')->name('get_computerassignment');

//Ajax
Route::post('/home/id_computer', 'ComputerassignmentController@get_hours');
