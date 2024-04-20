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
