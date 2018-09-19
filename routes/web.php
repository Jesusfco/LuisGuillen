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

Route::get('/', 'VisitorController@index');
Route::get('/blog', 'VisitorController@blog');
Route::get('/blog/{id}', 'VisitorController@readBlog');
Route::get('aspecto-ayuda', 'VisitorController@help');

Route::post('/mail', 'VisitorController@mail');

Route::get('login', 'LoginController@login');
Route::post('login', 'LoginController@signin');

Route::get('/app/blog', 'Auth\BlogController@index');
Route::get('/app/blog/create', 'Auth\BlogController@create');
Route::post('/app/blog/create', 'Auth\BlogController@store');

Route::get('/app/blog/update/{id}', 'Auth\BlogController@edit');
Route::post('/app/blog/update/{id}', 'Auth\BlogController@update');

Route::get('/app/blog/update/{id}/uploadPhotos', 'Auth\BlogController@uploadPhotoView');
Route::post('/app/blog/update/{id}/uploadPhotos', 'Auth\BlogController@uploadPhoto');
Route::get('/app/blog/destroy', 'Auth\BlogController@destroy');

Route::get('/app/events', 'Auth\EventsController@list');
Route::get('/app/events/create', 'Auth\EventsController@create');
Route::post('/app/events/create', 'Auth\EventsController@store');
Route::get('/app/events/update/{id}', 'Auth\EventsController@edit');
Route::post('/app/events/update/{id}', 'Auth\EventsController@update');
Route::get('/app/events/destroy', 'Auth\EventsController@destroy');

