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

Route::get('/', function () {
    return view('index');
});



Route::get('/admin-home', function () {
    return view('subview.pages.admin.home');
});

Route::get('/admin-newTicket', function () {
    return view('subview.pages.admin.newTicket');
});

Route::get('/admin-viewTicket', function () {
    return view('subview.pages.admin.viewTickets');
});
