<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Mail\verifyMail;
use App\Models\VerifyUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Laravel\LegacyUi\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    public function redirectTo() {
        $role = Auth::user()->role;
        switch ($role) {
            case 'admin':
                return '/admin';
            break;
            case 'employer':
                return '/employer';
            break;
            case 'candidate':
                return '/candidate';
            break;

            default:
                return '/login';
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'role'=>['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // protected function create(array $data)
    // {
    //     $userID=User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'role'=>$data['role'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    //     $verifyUser = VerifyUser::create([
    //         'user_id' => $userID->id,
    //         'token' => sha1(time())
    //       ]);
    //     \Mail::to($userID->email)->send(new verifyMail($userID));
    //     return back()->with('message','Email Verification Needed.');
    // }

    /**

     * Handle a registration request for the application.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse

     *
     */

     public function register(Request $request)
     {
        $data = $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:6', 'confirmed'],
                'role'=>['required'],
            ]
            );
        $userID=User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role'=>$data['role'],
            'password' => Hash::make($data['password']),
        ]);
        $verifyUser = VerifyUser::create([
            'user_id' => $userID->id,
            'token' => sha1(time())
          ]);
        \Mail::to($userID->email)->send(new verifyMail($userID));
        return back()->with('message','Email Verification Needed.');
     }
}
