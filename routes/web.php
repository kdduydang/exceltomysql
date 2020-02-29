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

Route::get('/', 'ImportController@getImport');
Route::post('/titlesheet', 'ImportController@postTitleSheet')->name('title_sheet');
Route::post('/contentsheet', 'ImportController@postContentSheet')->name('content_sheet');
Route::post('/total_money_month', 'ImportController@postTotalMoneyMonth')->name('total_money_month');
Route::post('/total_money_year', 'ImportController@postTotalMoneyYear')->name('total_money_year');
