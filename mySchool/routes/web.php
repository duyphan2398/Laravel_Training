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

Route::resource('subjects', 'SubjectController');
Route::resource('teachers', 'TeacherController');
Route::post('subjects/search','SubjectController@search');
Route::get('get/api','SubjectController@getSubjects');

Route::get('users/avatar','UserController@createAvatar')->name('getAvatar');
Route::post('user/avatar',"UserController@storeAvatar")->name('postAvatar');
/*Route::get('laravel-send-email', 'EmailController@sendEMail');*/

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

