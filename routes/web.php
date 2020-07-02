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
Route::get('admin-home', 'TicketsController@homeAdmin');
Route::get('admin-users', 'TicketsController@adminUser');
Route::get('admin-tickets', 'TicketsController@adminTicket');

