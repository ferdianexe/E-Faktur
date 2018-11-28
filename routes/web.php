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

$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', function () {
    return view('menu');
})->middleware('auth');
Route::get('/', function () {
    return view('menu');
})->middleware('auth');
Route::get('/menu', function () {
    return view('menu');
})->middleware('auth');
Route::get('/debt', 'hutangController@index')->middleware('auth');
Route::get('/data','DataMasterController@index')->middleware('auth');
Route::post('/data/create','DataMasterController@store')->middleware('auth');
Route::get('/data/create', function () {
    return view('data-create');
})->middleware('auth');
Route::get('/data/edit/{id}', 'DataMasterController@edit')->name('data.edit')->middleware('auth');
Route::post('/data/edit/{id}','DataMasterController@update')->name('data.update')->middleware('auth');
Route::delete('/data/delete/{id}','DataMasterController@destroy')->name('data.delete')->middleware('auth');
Route::get('/invoices/create','PurchaseInvoiceController@create')->middleware('auth');
Route::get('/invoices','PurchaseInvoiceController@index')->middleware('auth');
Route::get('/invoices/view/{id}','PurchaseInvoiceController@show')->name('invoices.show')->middleware('auth');
Route::post('/invoices/create/{banyak}','PurchaseInvoiceController@store')->middleware('auth');
Route::get('/invoices/edit/{id}', 'PurchaseInvoiceController@edit')->name('invoices.edit')->middleware('auth');
Route::post('/invoices/edit/{id}','PurchaseInvoiceController@update')->name('invoices.update')->middleware('auth');
Route::delete('/invoices/delete/{id}','PurchaseInvoiceController@destroy')->name('invoices.delete')->middleware('auth');
Route::get('/invoices/export/{id}','PurchaseInvoiceController@exporttoPDF')->name('invoices.export')->middleware('auth');

