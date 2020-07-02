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

    public function homeAdmin(){

    	$tickets = DB::select('SELECT * FROM tickets');

    	return view('tickets.subviews.admin.home',['tickets'=>$tickets]);
    }
    public function adminUser(){

    	$tickets = DB::select('SELECT * FROM tickets');

    	return view('tickets.subviews.admin.adminUser',['tickets'=>$tickets]);
    }
    public function adminTicket(){

    	$tickets = DB::select('SELECT * FROM tickets');

    	return view('tickets.subviews.admin.adminTicket',['tickets'=>$tickets]);
    }

    public function moderatorTicket(){

    	$tickets = DB::select('SELECT * FROM tickets');

    	return view('tickets.subviews.moderator.moderatorTickets',['tickets'=>$tickets]);
    }
    public function moderatorHome(){

    	$tickets = DB::select('SELECT * FROM tickets');

    	return view('tickets.subviews.moderator.home',['tickets'=>$tickets]);
    }
}
