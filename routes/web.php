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

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::resource('questions', 'QuestionController', ['only' =>
    ['index', 'create', 'show', 'store']
]);
Route::resource('answers', 'AnswerController', ['only' =>
    ['store']
]);
Route::resource('upvote', 'UpvoteController', ['only' =>
    ['store']
]);
