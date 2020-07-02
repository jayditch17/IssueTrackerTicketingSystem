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
Route::get('/', 'TicketsController@index');
// Route::get('/', function () {
//     return view('tickets/index');
// });
Route::get('admin-home', 'TicketsController@homeAdmin')->name('admin-home');
Route::get('admin-users', 'TicketsController@adminUser')->name('admin-users');
Route::get('admin-tickets', 'TicketsController@adminTicket')->name('admin-tickets');
Route::get('admin-newt', 'TicketsController@newTicket')->name('admin-newt');

Route::get('moderator-home', 'TicketsController@moderatorHome')->name('moderator-home');
Route::get('moderator-tickets', 'TicketsController@moderatorTicket')->name('moderator-tickets');

Route::get('user-home', 'TicketsController@userHome')->name('user-home');

