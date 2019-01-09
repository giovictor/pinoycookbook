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
Route::get('dish/{dish}', 'DishesController@show')->name('dish');
Route::get('contribute', 'DishesController@create')->name('contribute');
Route::post('contribute', 'DishesController@store')->name('contribute');
Route::get('edit/{dish}', 'DishesController@edit')->name('edit');
Route::put('edit/{dish}', 'DishesController@update')->name('edit');
Route::delete('delete/{dish}', 'DishesController@destroy')->name('delete');
Route::get('dish-type/{dish}', 'DishTypesController@showDishByDishTypes')->name('dish-type');
Route::get('pending-dishes', 'DishesController@showPendingDishes')->name('pending-dishes');
Route::post('approve-dish/{dish}', 'DishesController@approveDish')->name('approve-dish');
Auth::routes();

