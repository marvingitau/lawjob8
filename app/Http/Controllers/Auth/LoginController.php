<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Laravel\LegacyUi\Auth\AuthenticatesUsers;

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
    // protected $redirectTo = RouteServiceProvider::HOME;
    public function redirectTo() {
        $role = Auth::user()->role;
        // dd($role);
        switch ($role) {
            case 'admin':
                return '/admin';
            break;
            case 'employer':
                $emp_session_id=Session::get('emp_session_id');
                if(empty($emp_session_id)){
                    $emp_session_id=Str::random(40);
                    Session::put('emp_session_id',$emp_session_id);
                }
                return '/employer';
            break;
            case 'candidate':
                $emp_session_id=Session::get('emp_session_id');
                if(empty($emp_session_id)){
                    $emp_session_id=Str::random(40);
                    Session::put('emp_session_id',$emp_session_id);
                }
                return '/candidate';
            break;

            default:
                return '/';
            break;
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // /**
    //  * Handle an authentication attempt.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function login(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'email' => ['required', 'email'],
    //         'password' => ['required'],
    //         'role'=>['required'],
    //     ]);
    //     // dd($credentials);
    //     if (Auth::attempt($credentials)) {
    //         $request->session()->regenerate();

    //         $this->redirectTo();
    //         // return redirect()->intended('dashboard');
    //     }

    //     return back()->withErrors([
    //         'email' => 'The provided credentials do not match our records.',
    //     ]);
    // }

    public function AdminLoginForm()
    {
        return view('auth.AdminLogin');
    }



}
