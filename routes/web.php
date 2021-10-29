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
// Login
Route::group(['prefix' => 'login'], function() {
    Route::get('/', [ 'as' => 'login', 'uses' => 'LoginController@index']);
    Route::post('/process', 'LoginController@login')->name('login.process');
    Route::get('/signout', 'LoginController@signOut')->name('login.signout')->middleware('auth');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', 'ProductController@index');
    Route::get('/add', 'ProductController@create');
    Route::post('/store', 'ProductController@store')->name("store");;
    Route::get('/edit/{id}', 'ProductController@edit');
    Route::post('/update/{id}', 'ProductController@update')->name("update");
    Route::get('/delete/{id}', 'ProductController@destroy')->name("delete");
    
});

Route::group(['prefix' => 'users', 'middleware' => 'auth'], function() {
    Route::get('/','UsersController@index');
    Route::get('/add','UsersController@create');
    Route::post('/store', 'UsersController@store')->name("users.store");;
});


// Route::resource('/', ProductController::class);