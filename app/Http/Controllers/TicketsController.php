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

    public function userHome(){

    	$tickets = DB::select('SELECT * FROM tickets');

    	return view('tickets.subviews.user.home',['tickets'=>$tickets]);
    }
    public function newTicket(){

    	$tickets = DB::select('SELECT * FROM tickets');

    	return view('tickets.subviews.admin.newTicket',['tickets'=>$tickets]);
    }
    public function newTicketCo(){

    	$tickets = DB::select('SELECT * FROM tickets');

    	return view('tickets.subviews.admin.newTicket',['tickets'=>$tickets]);
    }
    public function newTicketUs(){

    	$tickets = DB::select('SELECT * FROM tickets');

    	return view('tickets.subviews.admin.newTicket',['tickets'=>$tickets]);
    }

    public function store(Request $req){
    	// print_r($req->input());
    	$ticket = new Tickets;
    	$ticket->project=$req->project;
    	$ticket->tracker=$req->tracker;
    	$ticket->subject=$req->subject;
    	$ticket->email=$req->email;
    	$ticket->description=$req->description;
    	$ticket->status=$req->status;
    	$ticket->priority=$req->priority;
    	$ticket->assignee=$req->assignee;
    	$ticket->save();
    	
    }
}
