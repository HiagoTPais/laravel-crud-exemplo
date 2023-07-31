<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', 'ContactsController@index');

    Route::get('/create', 'ContactsController@create');

    Route::post('/store', 'ContactsController@store');

    Route::get('/delete/{id}', 'ContactsController@delete');

    Route::get('/edit/{id}', 'ContactsController@edit');

    Route::put('/update/{id}', 'ContactsController@update');
    

    Route::get('/news', 'NewsController@index');

    Route::get('/create-news', 'NewsController@create');

    Route::post('/store-news', 'NewsController@store');

    Route::get('/delete-news/{id}', 'NewsController@delete');

    Route::get('/edit-news/{id}', 'NewsController@edit');

    Route::get('/view-news/{id}', 'NewsController@view');

    Route::put('/update-news/{id}', 'NewsController@update');

    Route::get('/home', 'HomeController@index');
});

require __DIR__ . '/auth.php';
