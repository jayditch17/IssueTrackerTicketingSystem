<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
Route::get('/', 'TicketsController@index')->name('/');
// Route::get('/', function () {
//     return view('tickets/index');
// });
Route::resource('tickets', 'TicketsController');
Route::get('admin-home', 'TicketsController@homeAdmin')->name('admin-home');
Route::get('admin-users', 'TicketsController@adminUser')->name('admin-users');
Route::get('admin-tickets', 'TicketsController@adminTicket')->name('admin-tickets');
Route::get('admin-newt', 'TicketsController@newTicket')->name('admin-newt');
Route::post('store', 'TicketsController@store');
Route::post('storeAdm', 'TicketsController@storeAdm');
Route::post('storeUs', 'TicketsController@storeUs');
Route::post('storeMod', 'TicketsController@storeMod');

Route::get('moderator-home', 'TicketsController@moderatorHome')->name('moderator-home');
Route::get('moderator-tickets', 'TicketsController@moderatorTicket')->name('moderator-tickets');
Route::get('moderator-newt', 'TicketsController@newTicketCo')->name('moderator-newt');
Route::get('user-newt', 'TicketsController@newTicketUs')->name('user-newt');

Route::get('user-home', 'TicketsController@userHome')->name('user-home');
Route::get('ano-newt', 'TicketsController@newTicketAno')->name('ano-newt');

Route::get('site-register', 'TicketsController@siteRegister');
Route::post('site-register', 'TicketsController@siteRegisterPost');




Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

 Route::get('/redirect', 'TicketsController@redirect');
 Route::get('/callback', 'TicketsController@callback');

 Route::get('TicketsController@edit');
 Route::delete('delete/{id}', 'TicketsController@destroy');