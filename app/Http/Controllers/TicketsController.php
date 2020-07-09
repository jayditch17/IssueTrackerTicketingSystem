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

    	$tickets = DB::table('tickets')->paginate(5);


    	return view('tickets.index',['tickets'=>$tickets]);
    }
    public function anoTicket(){
        $tickets = DB::table('tickets')->paginate(5);


        return view('tickets.tickets',['tickets'=>$tickets]);
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

    	$tickets = DB::table('tickets')->paginate(5);

    	return view('tickets.subviews.admin.adminTicket',['tickets'=>$tickets]);
    }

    public function moderatorTicket(){

    	$tickets = DB::table('tickets')->paginate(5);

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

    public function userTicket(){

        
        $tickets = DB::table('tickets')->paginate(5);

        return view('tickets.subviews.user.userTickets',['tickets'=>$tickets]);
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

    public function redirect(){
        return Socialite::driver('google')->redirect();
    }
    public function callback($provider){
            $getInfo = Socialite::driver('google')->user();
            $user = $this->createUser($getInfo,$provider);
            auth()->login($user);
            return redirect()->to('/home');

        //     if ($existingUser) {
        //         # code...
        //         Auth::loginUsingId($existingUser->id, true);
        //         return redirect()->to('/user-home');
        //     }else{
        //         $user = new User;
        //         $user->name = $googleUser->name;
        //         $user->email = $googleUser->email;
        //         $user->google_id = $googleUser->id;
        //         $user->password = md5(rand(1,10000));
        //         $user->save();
        //         Auth::loginUsingId($user->id, true);
        //     }
        //     return redirect()->to('/home');
        // }
        // catch(Exception $e){
        //     return 'error';
        // }
    }

    function createUser($getInfo, $provider){
        $user = User::where('provider_id', $getInfo->id)->first();
        if (!$user) {
            $user = User::create([
                'name' => $getInfo->name,
                'email' => $getInfo->email,
                'provider' => $provider,
                'provider_id' => $getInfo->id
            ]);
        }
        return $user;
    }
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //         'g-recaptcha-response' => new Captcha(),
    //     ]);
    // }
     public function siteRegister()
    {
        return view('tickets.newTicket');
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
       return view('tickets.subviews.admin.edit', ['tickets' => $tickets]);
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
   return view('tickets.subviews.admin.show',['tickets'=>$tickets]);
    }
    public function view($id){
   $tickets = DB::select('SELECT * FROM tickets where id=?', [$id]);
   return view('tickets.subviews.moderator.show',['tickets'=>$tickets]);
    }
    public function showUs($id){
   $tickets = DB::select('SELECT * FROM tickets where id=?', [$id]);
   return view('tickets.subviews.user.show',['tickets'=>$tickets]);
    }
    public function showAny($id){
   $tickets = DB::select('SELECT * FROM tickets where id=?', [$id]);
   return view('tickets.show',['tickets'=>$tickets]);
    }

    public function search(Request $req){
        $search =$req->get('search');
        $tickets = DB::table('tickets')->where('project', 'like', '%'.$search.'%')->paginate(5);
        if($tickets){
        return view('tickets.index', ['tickets' => $tickets]);
    }else{
        print('ticket not found');
    }
    }
}
