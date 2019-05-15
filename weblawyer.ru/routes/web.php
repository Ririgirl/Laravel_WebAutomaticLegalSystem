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

Route::get('/home', 'HomeController@index')->name('home'); //главная страниц с задачами
Route::get('/home/task/{id}', 'HomeController@seetask'); //подробности задачи
Route::get('/home/task_done', 'HomeController@seetaskdone'); //реализованные задачи
Route::get('/home/search', 'HomeController@search'); //поиск задачи

