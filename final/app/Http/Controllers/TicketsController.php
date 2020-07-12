<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Tickets;
use App\User;
use DB;
use Socialite;
use Auth;
use App\Rules\Captcha;
use Exception;
class TicketsController extends Controller
{
    
    public function index(){

    	$tickets = DB::table('tickets')->paginate(5);


    	return view('index',['tickets'=>$tickets]);
    }
    public function anoTicket(){
        $tickets = DB::table('tickets')->paginate(5);


        return view('tickets',['tickets'=>$tickets]);
    }

    public function homeAdmin(){

    	$tickets = DB::select('SELECT * FROM tickets');

    	return view('admin.home',['tickets'=>$tickets]);
    }
    public function adminUser(){

    	// $tickets = DB::select('SELECT * FROM tickets');
        $users = DB::select('SELECT * FROM users');
        return view('admin.adminUser',['users'=>$users]);
    	// return view('tickets.subviews.admin.adminUser',['tickets'=>$tickets]);
    }
    public function adminTicket(){

    	$tickets = DB::table('tickets')->paginate(5);

    	return view('admin.adminTicket',['tickets'=>$tickets]);
    }

    public function moderatorTicket(){

    	$tickets = DB::table('tickets')->paginate(5);

    	return view('moderator.moderatorTickets',['tickets'=>$tickets]);
    }
    public function moderatorHome(){

    	$tickets = DB::select('SELECT * FROM tickets');

    	return view('moderator.home',['tickets'=>$tickets]);
    }

    public function userHome(){

    	$tickets = DB::select('SELECT * FROM tickets');

    	return view('user.home',['tickets'=>$tickets]);
    }

    public function userTicket(){

        
        $tickets = DB::table('tickets')->paginate(5);

        return view('user.userTickets',['tickets'=>$tickets]);
    }
    public function newTicket(){

    	$tickets = DB::select('SELECT * FROM tickets');

    	return view('admin.newTicket',['tickets'=>$tickets]);
    }
    public function newTicketCo(){

    	$tickets = DB::select('SELECT * FROM tickets');

    	return view('moderator.newTicket',['tickets'=>$tickets]);
    }
    public function newTicketUs(){

    	$tickets = DB::select('SELECT * FROM tickets');

    	return view('user.newTicket',['tickets'=>$tickets]);
    }

    public function newTicketAno(){

        $tickets = DB::select('SELECT * FROM tickets');

        return view('newTicket',['tickets'=>$tickets]);
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
        return redirect()->to('/');
    	
    }
    public function storeUs(Request $req){
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
        return redirect()->to('/user-home');
        
    }
    public function storeMod(Request $req){
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
        return redirect()->to('/moderator-home');
        
    }
    public function storeAdm(Request $req){
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
        return redirect()->to('/admin-home');
        
    }

    use AuthenticatesUsers;
    protected $redirectTo = '/user-home';
    // public function __construct() {
    //     $this->middleware('guest')->except('logout');
    // }
    public function redirectToGoogle() {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback() { 
        //$role = DB::select('SELECT * FROM users where role==user');
        try {
            $user = Socialite::driver('google')->user();
            //$role = DB::select('SELECT * FROM users');
            $finduser = User::where('google_id', $user->id)->first();

            if ($finduser) {
                Auth::login($finduser);
                return redirect('/user-home');
            }else {
                $newUser = User::create(['name' => $user->name, 'email' => $user->email, 'password'=>$user->password, 'google_id' => $user->id]);
                Auth::login($newUser);
                return redirect('/user-home');
            }
        }
        catch(Exception $e) {
            return redirect('tickets/');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->to('/');
    }
    
     public function siteRegister()
    {
        return view('newTicket');
    }
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function siteRegisterPost(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|same:password_confirmation',
            'password_confirmation' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);
   
        print('done');
    }

    
    public function edit($id){
       
       $tickets = DB::select('SELECT * FROM tickets where id = ?',[$id]);
       return view('admin.edit', ['tickets' => $tickets]);
    }

    public function update(Request $request, $id){
        $project=$request->get('project');
        $tracker=$request->get('tracker');
        $subject=$request->get('subject');
        $email=$request->get('email');
        $description=$request->get('description');
        $status=$request->get('status');
        $priority=$request->get('priority');
        $assignee=$request->get('assignee');
        $tickets = DB::update('UPDATE tickets set project=?, tracker=?, subject=?, email=?, description=?, status=?, priority=?, assignee=? WHERE id=?', [$project, $tracker, $subject, $email, $description, $status, $priority, $assignee, $id]);
        if ($tickets) {
            # code...
            $red = redirect('admin-tickets')->with('success', 'Data updated');
        }else{
            $red = redirect('admin-tickets')->with('fail', 'Data not updated');
        }
        return $red;
    }

    public function destroy($id){
        $tickets = DB::delete('DELETE from tickets where id=?', [$id]);
        $red =redirect('admin-tickets');
     return $red;
    }

    public function show($id){
   $tickets = DB::select('SELECT * FROM tickets where id=?', [$id]);
   return view('admin.show',['tickets'=>$tickets]);
    }
    public function view($id){
   $tickets = DB::select('SELECT * FROM tickets where id=?', [$id]);
   return view('moderator.show',['tickets'=>$tickets]);
    }
    public function showUs($id){
   $tickets = DB::select('SELECT * FROM tickets where id=?', [$id]);
   return view('user.show',['tickets'=>$tickets]);
    }
    public function showAny($id){
   $tickets = DB::select('SELECT * FROM tickets where id=?', [$id]);
   return view('show',['tickets'=>$tickets]);
    }

    public function search(Request $req){
        $search =$req->get('search');
        $tickets = DB::table('tickets')->where('project', 'like', '%'.$search.'%')->paginate(5);
        if($tickets){
        return view('index', ['tickets' => $tickets]);
    }else{
        print('ticket not found');
    }
    }
}
