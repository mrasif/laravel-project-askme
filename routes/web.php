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

Route::middleware(['auth'])->group(function(){
  Route::resource('questions','QuestionsController');
  Route::resource('answers','AnswersController');
  Route::resource('roles','RolesController');
  Route::resource('likes','LikesController');
  Route::post('likes/likeit', 'LikesController@likeit')->name('likes.likeit');
  Route::resource('users','UsersController');
});
