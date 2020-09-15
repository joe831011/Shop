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

// Route::get('/', function () {
//     return view('home');
//     // return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('home', 'HomeController@index');
//
Route::get('product_lists', 'ProductListController@index')->name('product_lists.index');
Route::get('product_lists/create', 'ProductListController@create')->name('product_lists.create');
Route::post('product_lists', 'ProductListController@store')->name('product_lists.store');
Route::get('product_lists/{id}/edit', 'ProductListController@edit')->name('product_lists.edit');
Route::patch('product_lists/{id}', 'ProductListController@update')->name('product_lists.update');
Route::delete('product_lists/{id}', 'ProductListController@destroy')->name('product_lists.destroy');

Route::get('categories', 'CategoryController@index')->name('categories.index');
Route::get('categories/create', 'CategoryController@create')->name('categories.create');
Route::post('categories', 'CategoryController@store')->name('categories.store');
Route::get('categories/{id}/edit', 'CategoryController@edit')->name('categories.edit');
Route::patch('categories/{id}', 'CategoryController@update')->name('categories.update');
Route::delete('categories/{id}', 'CategoryController@destroy')->name('categories.destroy');

