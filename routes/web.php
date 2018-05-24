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

/*Route::get('/project', function () {
    return view('project');
});*/

Route::get('/project', 'ProjectController@index')->name('allProjects');
Route::get('/projectDetails/{id}', 'ProjectDetailsController@edit');
Route::post('/project', 'ProjectController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
