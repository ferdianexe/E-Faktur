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
Route::get('/data', function () {
    return view('data');
});
Route::get('/data/create', function () {
    return view('data-create');
});
Route::get('/invoices/create', function () {
    return view('invoices-create');
});
Route::get('/invoices', function () {
    return view('invoices');
});

