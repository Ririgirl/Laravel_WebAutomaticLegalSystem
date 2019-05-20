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
Route::get('/home/update_task/{id}','HomeController@updatetask');//вносим изменения в задачу
Route::post('/home/update_task/save/{id}', 'HomeController@updatetasksave');//сохранение измененией данных о задаче
Route::get('/home/createnewtask','HomeController@createnewtask');//форма для создания ново задачи
Route::post('/home/createnewtask/save', 'HomeController@savenewtask');//добавление новой задачи
Route::get('/acts','ActsController@seeacts');//открытие вкладки дела и просмотр последних 
Route::get('/acts/search','ActsController@search');//поиск дела
