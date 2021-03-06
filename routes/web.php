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

Route::get('/', 'CategoryController@recursive');
Route::get('/recursive', 'CategoryController@recursive');
Route::get('/iterative', 'CategoryController@iterative');
Route::post('/category', 'CategoryController@store')->name('category.store');