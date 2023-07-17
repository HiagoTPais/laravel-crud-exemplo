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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', 'ContactsController@index')->middleware(['auth']);

Route::get('/create', 'ContactsController@create')->middleware(['auth']);

Route::post('/store', 'ContactsController@store')->middleware(['auth']);

Route::get('/delete/{id}', 'ContactsController@delete')->middleware(['auth']);

Route::get('/edit/{id}', 'ContactsController@edit')->middleware(['auth']);

Route::put('/update/{id}', 'ContactsController@update')->middleware(['auth']);


require __DIR__ . '/auth.php';
