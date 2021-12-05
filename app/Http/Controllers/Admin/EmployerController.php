<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // view all the employer
        $employerData = User::where('role','employer')->get();
        return view('Backend.Admin.Employer.index',compact('employerData'));
    }

    public function indexCanditate()
    {
        // view all the employer
        $candIDs = User::where('role','candidate')->pluck('id')->toArray();
        $candidates = DB::table('about_mes')->whereIn('user_id',$candIDs)->get();
        return view('Backend.Admin.Candidate.index',compact('candidates'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //create a new employer
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //store employer data
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = User::where('id',$id)->first()->profile;
        $hrData = User::where('id',$id)->first()->userData;
        $approved=User::where('id',$id)->first()->approved;


        return view('Backend.Admin.Employer.profile_view',compact('profile','hrData','approved'));
    }

    public function showCandidate($id)
    {
        $uid =$id;

        $aboutMe = DB::table('about_mes')->where('user_id',$uid)->first();
        $skills= DB::table('job_skills')->where('user_id',$uid)->get();
        $experiences = DB::table('work_experiences')->where('user_id',$uid)->first();
        $education = DB::table('education')->where('user_id',$uid)->first();
        $sec_education = DB::table('sec_education')->where('user_id',$uid)->first();
        $resumes = DB::table('resumes')->where('user_id',$uid)->get();
        if(is_null($aboutMe)||is_null($skills)||is_null($experiences)||is_null($education)||is_null($sec_education)||is_null($sec_education))
            return back()->with('message','Error with Profile');
        return view('Backend.Admin.Candidate.candidate_profile',compact(['aboutMe','skills','experiences','education','sec_education','resumes']));
    }

    public function approve($id)
    {
        $usr=User::where('id',$id)->first();
        $usr->approved=1;
        $usr->save();
        return back()->with('message','User Enabled');
    }


    public function disable($id)
    {
        $usr=User::where('id',$id)->first();
        $usr->approved=0;
        $usr->save();
        return back()->with('message','User Disabled');
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
        $candIDs = User::where('id',$id)->delete();
        return back();
    }
    public function destroyCandidate($id)
    {
        $candIDs = User::where('id',$id)->delete();
        return back();
    }


}
