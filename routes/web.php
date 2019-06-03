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

Auth::routes(['register' => false]);


Route::middleware('auth')->group(function () {
    
    Route::get('/admin', 'HomeController@index')->name('admin');

    Route::get('projects/create', 'ProjectController@create')->name('projects.create');
    Route::post('projects/store', 'ProjectController@store')->name('projects.store');
    Route::get('projects/{id}/edit', 'ProjectController@edit')->name('projects.edit');
    Route::post('projects/{id}/update', 'ProjectController@update')->name('projects.update');
    Route::post('projects/{id}/delete', 'ProjectController@destroy')->name('projects.delete');

});

Route::get('/projects', 'ProjectController@index')->name('projects.index');
Route::get('projects/{id}', 'ProjectController@show')->name('projects.show');