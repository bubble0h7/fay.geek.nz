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

Route::get('/', 'HomeController@welcome')->name('welcome');
Route::get('/home', 'HomeController@welcome')->name('home');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/contact', 'HomeController@contact')->name('contact');

Auth::routes(['register' => true]);

Route::middleware('auth')->group(function () {
    
    Route::get('/admin', 'HomeController@index')->name('admin');

    Route::get('/profile', 'HomeController@profile')->name('profile');
    Route::post('/profile/update', 'HomeController@updateProfile')->name('profile.update');
    Route::post('/profile/deleteImage/{id}', 'HomeController@deleteProfileImage')->name('profile.image.delete');

    Route::get('projects/create', 'ProjectController@create')->name('projects.create');
    Route::post('projects/store', 'ProjectController@store')->name('projects.store');
    Route::get('projects/{id}/edit', 'ProjectController@edit')->name('projects.edit');
    Route::post('projects/{id}/update', 'ProjectController@update')->name('projects.update');
    Route::post('projects/{id}/delete', 'ProjectController@destroy')->name('projects.delete');

});

Route::get('/projects', 'ProjectController@index')->name('projects');
Route::get('projects/{id}', 'ProjectController@show')->name('projects.show');
