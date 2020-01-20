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
Route::get('/subjects','SubjectController@index');
Route::get('/remove/subject/{subject}','SubjectController@remove');
Route::get('/create/subject','SubjectController@create');
Route::post('/create/subject','SubjectController@store');
Route::get('/edit/subject/{subject}','SubjectController@edit');
Route::post('/edit/subject/{subject}','SubjectController@update');
Route::post('/search/subject','SubjectController@search');
