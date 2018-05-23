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


Route::get('/', 'DishesController@index')->name('homepage');

Route::get('dish/{id}', 'DishesController@show')->name('dish');

Route::get('contribute', 'DishesController@create')->name('contribute');

Route::post('contribute', 'DishesController@store')->name('contribute');

Route::get('edit/{id}', 'DishesController@edit')->name('edit');

Route::put('edit/{id}', 'DishesController@update')->name('edit');

Route::delete('delete/{id}', 'DishesController@destroy')->name('delete');

Route::get('dish-type/{id}', 'DishTypesController@showDishByDishTypes')->name('dish-type');

Route::get('pending-dishes', 'DishesController@showPendingDishes')->name('pending-dishes');

Route::post('approve-dish/{id}', 'DishesController@approveDish')->name('approve-dish');

Auth::routes();
