<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tickets;
use DB;
use Socialite;
use Auth;
use App\Rules\Captcha;
// Exception $e;
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

    	// $tickets = DB::select('SELECT * FROM tickets');
        $users = DB::select('SELECT * FROM users');
        return view('tickets.subviews.admin.adminUser',['users'=>$users]);
    	// return view('tickets.subviews.admin.adminUser',['tickets'=>$tickets]);
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

    	return view('tickets.subviews.moderator.newTicket',['tickets'=>$tickets]);
    }
    public function newTicketUs(){

    	$tickets = DB::select('SELECT * FROM tickets');

    	return view('tickets.subviews.user.newTicket',['tickets'=>$tickets]);
    }

    public function newTicketAno(){

        $tickets = DB::select('SELECT * FROM tickets');

        return view('tickets.newTicket',['tickets'=>$tickets]);
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

    public function redirect(){
        return Socialite::driver('google')->redirect();
    }
    public function callback(){
        try{
            $googleUser = Socialite::driver('google')->user();
            $existUser = User::where('email', $googleUser->email)->first();

            if ($existingUser) {
                # code...
                Auth::loginUsingId($existingUser->id, true);
            }else{
                $user = new User;
                $user->name = $googleUser->name;
                $user->email = $googleUser->email;
                $user->google_id = $googleUser->id;
                $user->password = md5(rand(1,10000));
                $user->save();
                Auth::loginUsingId($user->id, true);
            }
            return redirect()->to('/home');
        }
        catch(Exception $e){
            return 'error';
        }
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'g-recaptcha-response' => new Captcha(),
        ]);
    }
}
