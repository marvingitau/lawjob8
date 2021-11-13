<?php

namespace App\Http\Controllers\Employer;

use session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employer\Profile;

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
            ]
        );

        try {
            Profile::create($profile+['is_active'=>1,'user_id'=>auth()->user()->id]);


        } catch (\Throwable $th) {
            // QueryException
            //throw $th;
            session()->put('success','You profile already exist.');
            return back();
        }
        session()->put('success','Profile created successfully.');
        return back();

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
}
