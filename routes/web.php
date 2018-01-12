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

Route::get('/exams', 'ExamController@index');
Route::get('/exams/create', 'ExamController@create');
Route::post('/exams', 'ExamController@store');
Route::get('/exams/{exam}', 'ExamController@show');
Route::get('/exams/{exam}/edit', 'ExamController@edit');
Route::patch('/exams/{exam}/update', 'ExamController@update');
Route::put('/exams', 'ExamController@delete');

Route::get('/exams/{exam}/questions', 'QuestionController@index');
Route::get('/exams/{exam}/questions/create', 'QuestionController@create');
Route::post('/exams/{exam}/questions', 'QuestionController@store');
Route::get('/exams/{exam}/questions/{question}', 'QuestionController@show');
Route::get('/exams/{exam}/questions/{question}/edit', 'QuestionController@edit');
Route::patch('/exams/{exam}/questions/{question}', 'QuestionController@update');
Route::put('/exams/{exam}/questions/{question}', 'QuestionController@delete');

Route::post('/exams/{exam}/questions/{question}/answers', 'AnswerController@store');