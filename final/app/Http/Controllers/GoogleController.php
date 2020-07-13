<?php
namespace App\Http\Controllers;
  
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Socialite;
use Auth;
use Exception;
use App\User;
use App\Role;
use Illuminate\Http\Request;
  
class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
      
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
         try {
    
             $user = Socialite::driver('google')->user();
     		//dd($user);
            $finduser = User::where('google_id', $user->id)->first();
     
            if($finduser){
     
                Auth::login($finduser);
    
                return redirect('/user-home');
     
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    // 'password' => encrypt('123456dummy')
                    'password'=>Hash::make('dummy')
                    //'password' => Hash::make($user['password'])
                    //'password' => $user->password
                ]);
                $role = Role::select('id')->where('name', 'user')->first();
                $newUser->roles()->attach($role);
    
                Auth::login($newUser);
     
                return redirect('/user-home');
            }
    
        } catch (Thowable $e) {
            dd($e->getMessage());
            //report($e);
        }

    }
}