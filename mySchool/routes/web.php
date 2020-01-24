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


Route::group(['prefix'=>'subject'], function (){
    Route::get('','SubjectController@index')->name('index');
    Route::get('/remove/{subject}','SubjectController@remove');
    Route::get('/create','SubjectController@create');
    Route::post('/create','SubjectController@store');
    Route::get('/edit/{subject}','SubjectController@edit');
    Route::post('/edit/{subject}','SubjectController@update');
    Route::post('/search','SubjectController@search');
    Route::get('/api','SubjectController@apiIndex');
    Route::get('/detail/{id}','SubjectController@detail')->middleware('checkId');
});



Route::get('teacher',function (){
    $teachers = \App\Subject::find(1)->teacher;
    dd($teachers);
}); /*  1 nhieu */ /* mon nay teacher nao day */

Route::get('student',function (){
    $subjects = \App\Student::find(1)->subject;
    $students = \App\Subject::find(1)->student;
    dd([$subjects,$students]);
}); /*  nhieu nhieu */ /* student nay hoc nhung mon nao - mon nay nhung hs nao hoc */



Route::get('student/teachers',function (){
    $teachers = \App\Student::find(1)->teacher;
    dd($teachers);
}); /*  hasManyThough student hoc nhieu mon hoc ... co nhieu teacher .. -> v teacher cua hs do la ai */
/*????*/




