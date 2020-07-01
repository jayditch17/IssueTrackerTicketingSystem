<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tickets;
use DB;

class TicketController extends Controller
{
    public function index(){

    	$tickets = DB::table('tickets_db')->get();
    	return view('tickets.index', compact('tickets'));
    }
}
