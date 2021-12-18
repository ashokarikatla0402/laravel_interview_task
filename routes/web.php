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

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');

    /*
     * customers list
     */

    Route::get('/customers', 'CustomerController@index')->name('customers');

    /*
     * create customer page
     */
    Route::get('/customers/create', 'CustomerController@create');
    /*
     * store customer data
     */
    Route::post('/customers/store', 'CustomerController@store');
    /*
     * delete the customer
     *
     */
    Route::get('/customers/delete/{id}', 'CustomerController@destroy');
    /*
     * edit cusotmer page
     */
    Route::get('/customers/edit/{id}', 'CustomerController@edit');
    /*
     * update cusotmer data
     */
    Route::patch('/customers/update', 'CustomerController@update');
});