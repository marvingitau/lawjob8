<?php

namespace App\Http\Controllers\Employer;

use session;
use Illuminate\Http\Request;
use App\Models\Employer\Profile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = auth()->user()->profile;
        $hrData = auth()->user()->userData;
        // dd($hrData);
        return view('Backend.Employer.profile',compact('profile','hrData'));
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
        // $obj= $request->isMethod('put') ? Profile::findOrFail($request->article_id) : new Profile;
        $profile = $request->validate(
            [
            // 'user_id'=>auth()->user()->id,
            'company_name'=>'',
            'location'=>'',
            'website'=>'',
            'postal_address'=>'',
            'company_description'=>'',
            // 'is_active'=>1,
            'professional_group'=>'',
            'year_in_service'=>''
            ]
        );

        try {
            Profile::create($profile+['is_active'=>1,'user_id'=>auth()->user()->id]);


        } catch (\Throwable $th) {

            Profile::where('user_id',auth()->user()->id)->update($profile);
            return back()->with('success','You profile already exist, Updated.');
        }
        // session()->put('success','Profile created successfully.');
        return back()->with('success','Profile created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\EmployerFolder\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\EmployerFolder\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\EmployerFolder\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\EmployerFolder\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }

    public function createProfile(Request $request)
    {
        $profile = auth()->user()->profile;
        $hrData = auth()->user()->userData;

        return view('Backend.Employer.profile_create',compact('profile','hrData'));
    }

    public function changePassword(Request $request)
    {
        $usr = auth()->user();
        $data=$request->validate(
            [
                'old'=>'required',
                'password'=>'required',
                'password_confirm'=>'required'
            ]
            );

            if($request['password_confirm'] != $request['password']){
                return back()->with('message','Password missmatch');
            }

            if (Hash::check($data['old'], $usr->password)) {
                $usr->fill([
                 'password' => Hash::make($data['password'])
                 ])->save();
                return back()->with('message','Password changed');
            }

            return back()->with('message','Bad Old Password');

    }
}
