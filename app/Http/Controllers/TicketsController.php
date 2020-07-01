<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tickets;
use DB;
class TicketsController extends Controller
{
    
    public function index(){

    	$tickets = DB::select('SELECT * FROM tickets');

    	return view('tickets.index',['tickets'=>$tickets]);
    }
}
