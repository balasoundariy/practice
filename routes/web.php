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
Route::get('/', '\App\Http\Controllers\HomeController@index')->name('home');
Route::post('/login', '\App\Http\Controllers\UserController@login')->name('login');
Route::post('/register', '\App\Http\Controllers\UserController@register')->name('register');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', '\App\Http\Controllers\UserController@logout')->name('logout');
    Route::get('/ticket', '\App\Http\Controllers\TicketController@showTickets')->name('ticket');
    Route::get('/ticket-details/{price}', '\App\Http\Controllers\TicketController@ticketDetails')->name('ticket_details');
    Route::post('/summary', '\App\Http\Controllers\TicketController@summary')->name('summary');
    Route::get('/payment', '\App\Http\Controllers\TicketController@makePayment')->name('payment');
});
Route::group(['middleware' => 'admin'], function () {
    Route::get('/orders-history', '\App\Http\Controllers\AdminController@getOrdersHistory')->name('get_orders');
    Route::get('/ticket-list', '\App\Http\Controllers\AdminController@showList')->name('show');
    Route::get('/ticket-add', '\App\Http\Controllers\AdminController@add')->name('add');
    Route::get('/ticket-edit/{ticket_id}', '\App\Http\Controllers\AdminController@edit')->name('edit');
    Route::post('/ticket-store', '\App\Http\Controllers\AdminController@store')->name('store');
    Route::post('/ticket-update', '\App\Http\Controllers\AdminController@update')->name('update');
    Route::get('/ticket-delete/{ticket_id}', '\App\Http\Controllers\AdminController@delete')->name('delete');
    Route::get('/export/{type}', '\App\Http\Controllers\AdminController@export')->name('export');
});
