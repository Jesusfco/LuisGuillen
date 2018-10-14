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
Route::get('/blog/{id}/getComment', 'VisitorController@getComment');
Route::post('/blog/{id}/newComment', 'VisitorController@newComment');
//VISITOR EVENTOS
Route::get('eventos', 'VisitorController@events');
Route::get('eventos/{id}', 'VisitorController@readEvent');
Route::post('eventos/{id}/newDoubt', 'VisitorController@newDoubt');
Route::post('eventos/{id}/destroyDoubt', 'VisitorController@destroyDoubt');
Route::get('eventos/{id}/getDoubts', 'VisitorController@getDoubts');
Route::get('eventos/{id}/myDoubts', 'VisitorController@myDoubts');
Route::get('aspecto-ayuda', 'VisitorController@help');
Route::get('lastUrl/LoginFacebook', 'VisitorController@saveLastUrlLoginFacebook');

// CORREO
Route::post('/mail', 'VisitorController@mail');

//FACEBOOK
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('login', 'LoginController@login');
Route::post('login', 'LoginController@signin');
Route::get('logout', 'LoginController@logout');
Route::get('app', 'LoginController@homeApp');

// RESET PASSWORDS
Route::get('/resetPassword', 'LoginController@resetPassword');
Route::post('/resetPassword', 'LoginController@sentTokenReset');
Route::get('/resetPassword/{token}', 'LoginController@resetPassword2');
Route::post('/resetPassword/{token}', 'LoginController@updatePassword');

Route::get('/app/blog', 'Auth\BlogController@index');
Route::get('/app/blog/create', 'Auth\BlogController@create');
Route::post('/app/blog/create', 'Auth\BlogController@store');
Route::get('/app/blog/update/{id}', 'Auth\BlogController@edit');
Route::post('/app/blog/update/{id}', 'Auth\BlogController@update');
Route::get('/app/blog/update/{id}/uploadPhotos', 'Auth\BlogController@uploadPhotoView');
Route::post('/app/blog/update/{id}/uploadPhotos', 'Auth\BlogController@uploadPhoto');
Route::get('/app/blog/destroy', 'Auth\BlogController@destroy');


// Eventos
Route::get('/app/events', 'Auth\EventsController@list');
Route::get('/app/events/create', 'Auth\EventsController@create');
Route::post('/app/events/create', 'Auth\EventsController@store');
Route::get('/app/events/update/{id}', 'Auth\EventsController@edit');
Route::post('/app/events/update/{id}', 'Auth\EventsController@update');
Route::get('/app/events/destroy/{id}', 'Auth\EventsController@delete');
Route::get('app/events/highlight/{id}', 'Auth\EventsController@highlight');

//Administraion de preguntas de evento
Route::get('/app/events/update/{id}/getQuestions', 'Auth\EventsController@getQuestions');
Route::post('/app/events/update/{id}/storeQuestion', 'Auth\EventsController@storeQuestion');
Route::post('/app/events/update/{id}/updateQuestion', 'Auth\EventsController@updateQuestion');
Route::post('/app/events/update/{id}/deleteQuestion', 'Auth\EventsController@deleteQuestion');

// USUARIOS
Route::get('/app/users', 'Auth\UsersController@list');
Route::get('/app/users/create', 'Auth\UsersController@create');
Route::post('/app/users/create', 'Auth\UsersController@store');
Route::get('/app/users/update/{id}', 'Auth\UsersController@edit');
Route::post('/app/users/update/{id}', 'Auth\UsersController@update');
Route::get('/app/users/destroy', 'Auth\UsersController@destroy');

// RECIBOS
Route::get('/app/receipts', 'Auth\ReceiptsController@list');
Route::get('/app/receipts/create', 'Auth\ReceiptsController@create');
Route::get('/app/receipts/create/{id}', 'Auth\ReceiptsController@createEvent');
Route::post('/app/receipts/create', 'Auth\ReceiptsController@store');
Route::get('/app/receipts/update/{id}', 'Auth\ReceiptsController@edit');
Route::post('/app/receipts/update/{id}', 'Auth\ReceiptsController@update');
Route::get('/app/receipts/destroy/{id}', 'Auth\ReceiptsController@destroy');


// RUTAS UTILICES AUTOSUGERENCIAS
Route::post('app/util/clientSugest', 'Auth\UsersController@clientSugest');
Route::post('app/util/eventSugest', 'Auth\EventsController@eventSugest');
