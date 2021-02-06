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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/company/create', 'HomeController@store')->name('store');
Route::post('/company/{id}/update', 'HomeController@update')->name('update');
Route::get('/company/{id}/edit', 'HomeController@edit')->name('edit');
Route::get('/company/{id}/hapus', 'HomeController@destroy')->name('destroy');

Route::post('/employee/create', 'HomeController@add')->name('add');
Route::post('/employee/{id}/update', 'HomeController@updat')->name('updat');
Route::get('/employee/{id}/edit', 'HomeController@edits')->name('edits');
Route::get('/employee/{id}/hapus', 'HomeController@destroys')->name('destroys');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
