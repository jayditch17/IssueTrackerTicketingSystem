<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo(){
        if (Auth::User()->hasRole('admin')) {
            # code...
            $this->redirectTo = route('admin-home');
            return $this->redirectTo;
        }else if (Auth::User()->hasRole('moderator')) {
            # code...
            $this->redirectTo = route('moderator-home');
            return $this->redirectTo;
        }
        else if (Auth::User()->hasRole('user')) {
            # code...
            $this->redirectTo = route('user-home');
            return $this->redirectTo;
        }
        $this->redirectTo=route('/');
        return $this->redirectTo;
    }
}
