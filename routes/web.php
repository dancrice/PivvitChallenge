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

Route::get('offerings', [
    'as' => 'getOfferings',
    'uses' => 'PurchaseController@create'
]);

Route::post('purchases', [
    'as' => 'savePusrchase',
    'uses' => 'PurchaseController@save',
]);

Route::get('purchases', [
    'as' => 'getPurchase',
    'uses' => 'PurchaseController@getPurchase',
]);
