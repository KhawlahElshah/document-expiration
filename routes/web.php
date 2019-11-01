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

Route::get('documents', 'DocumentController@index')->name('documents.index');
Route::get('categories/{category}/documents/create', 'DocumentController@create')->name('documents.create');
Route::post('categories/{category}/documents', 'DocumentController@store')->name('documents.store');
Route::get('categories', 'CategoryController@index')->name('categories.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');