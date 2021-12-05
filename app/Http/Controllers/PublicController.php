<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\VerifyUser;
use Illuminate\Http\Request;
use App\Models\Admin\JobAttributs;

class PublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobCat= JobAttributs::getAttr('job_category');
        // dd($jobCat);
        return view('welcome',compact('jobCat'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function about()
    {
        return view('about');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    public function verifyUser($token)
    {
        $verifyUser = VerifyUser::where('token', $token)->first();

        if(isset($verifyUser)){
            $user = $verifyUser->user;
            if(!$user->verified) {
            $verifyUser->user->email_verified_at = Carbon::now();
            $verifyUser->user->save();
            $status = "Your e-mail is verified. You can now login.";
            } else {
            $status = "Your e-mail is already verified. You can now login.";
            }
        } else {

            return redirect('/login')->with('warning', "Sorry your email cannot be identified.");
        }
        return redirect('/login')->with('status', $status);
    }
}
