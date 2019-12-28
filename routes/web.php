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
Route::get('/now', 'NowController@index')->name('now');
Route::get('/now/archive', 'NowController@archive')->name('now.archive');
Route::get('/files', 'UploadController@index')->name('files');

Auth::routes(['register' => false]);

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

    Route::get('blog/post/create', 'PostController@create')->name('post.create');
    Route::post('blog/post/store', 'PostController@store')->name('post.store');
    Route::get('blog/post/{id}/edit', 'PostController@edit')->name('post.edit');
    Route::post('blog/post/{id}/update', 'PostController@update')->name('post.update');
    Route::get('blog/post/{id}/publish', 'PostController@publish')->name('post.publish');
    Route::get('blog/post/{id}/unpublish', 'PostController@unpublish')->name('post.unpublish');
    Route::post('blog/post/{id}/delete', 'PostController@destroy')->name('post.delete');

    Route::get('now/create', 'NowController@create')->name('now.create');
    Route::post('now/store', 'NowController@store')->name('now.store');
    Route::get('now/{id}/edit', 'NowController@edit')->name('now.edit');
    Route::post('now/{id}/update', 'NowController@update')->name('now.update');
    Route::post('now/{id}/delete', 'NowController@destroy')->name('now.delete');

    Route::get('file/new', 'UploadController@create')->name('file.create');
    Route::post('file/store', 'UploadController@store')->name('file.store');
    Route::get('file/{id}/delete', 'UploadController@destroy')->name('file.delete');

});

Route::get('/blog', 'PostController@index')->name('blog');
Route::get('/blog/post/{title}', 'PostController@show')->name('post.show');
Route::get('/projects', 'ProjectController@index')->name('projects');
Route::get('projects/{title}', 'ProjectController@show')->name('projects.show');