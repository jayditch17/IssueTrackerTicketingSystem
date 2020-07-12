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

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/', 'TicketsController@index')->name('/');
Route::get('/', 'TicketsController@index')->name('/');
// Route::get('/', function () {
//     return view('tickets/index');
// });
Route::resource('tickets', 'TicketsController');
Route::get('admin-home', 'TicketsController@homeAdmin')->name('admin-home');
Route::get('admin-users', 'TicketsController@adminUser')->name('admin-users');
//Route::get('admin-users', 'Admin\UsersController@update')->name('admin-users');
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
Route::get('user-tickets', 'TicketsController@userTicket')->name('user-tickets');
Route::get('ano-newt', 'TicketsController@newTicketAno')->name('ano-newt');

Route::get('site-register', 'TicketsController@siteRegister');
Route::post('site-register', 'TicketsController@siteRegisterPost');

Route::get('ano-tickets', 'TicketsController@anoTicket')->name('ano-tickets');
Route::get('logout', 'TicketsController@logout')->name('logout');

 Route::get('/redirect', 'TicketsController@redirectToGoogle');
 Route::get('/callback/google', 'TicketsController@handleGoogleCallback');
Auth::routes();


// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/admin', 'AdminController@index')->name('admin')->middleware('admin');
// Route::get('/moderator', 'ModeratorController@index')->name('moderator')->middleware('moderator');
// Route::get('/user', 'UserController@index')->name('user')->middleware('user');


 Route::get('TicketsController@edit');
 // Route::resource('view', 'TicketsController@view');
 Route::get('view/{id}', 'TicketsController@view');
 Route::get('showUs/{id}', 'TicketsController@showUs');
 Route::get('showAny/{id}', 'TicketsController@showAny');
 Route::delete('delete/{id}', 'TicketsController@destroy');


 Route::get('search','TicketsController@search' );


Auth::routes();


Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
	Route::resource('users', 'UsersController', ['except' => ['create', 'store']]);

});
