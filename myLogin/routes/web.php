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
use  Illuminate\Routing\Controller;
use  App\Http\Controllers\LoginController;


Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('avatar', 'UserController@getUploadAvatar')->name('avatar');
    Route::post("avatar", 'UserController@postUploadAvatar');

    Route::get('export', 'ExcelController@export')->name('export');
    Route::get('import', 'ExcelController@getImportView');
    Route::post('import', 'ExcelController@postImportView')->name('import');
});





Route::get('login', 'LoginController@index')->name('login');
Route::post('login', 'LoginController@login');
Route::get('register', 'RegisterController@index')->name('register');
Route::post('register', 'RegisterController@register');
Route::get('logout','LoginController@logout')->name('logout');
Route::get('resetpassword', 'ResetPasswordController@getResetPassword')->name('resetpassword');
Route::post('resetpassword', 'ResetPasswordController@postResetPassword');
