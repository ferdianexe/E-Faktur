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
    return view('menu');
});
Route::get('/menu', function () {
    return view('menu');
});
Route::get('/data','DataMasterController@index');
Route::post('/data/create','DataMasterController@store');
Route::get('/data/create', function () {
    return view('data-create');
});
Route::get('/data/edit/{id}', 'DataMasterController@edit')->name('data.edit');
Route::post('/data/edit/{id}','DataMasterController@update')->name('data.update');
Route::delete('/data/delete/{id}','DataMasterController@destroy')->name('data.delete');
Route::get('/invoices/create', function () {
    return view('invoices-create');
});
Route::get('/invoices','PurchaseInvoiceController@index');
Route::post('/invoices/create','PurchaseInvoiceController@store');

