<?php

namespace App\Http\Controllers\Employer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Employer\JobPostings;

class AppliedJobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uid = auth()->user()->id;
        $jobIDs = JobPostings::where('user_id',$uid)->pluck('id')->toArray();

        $AppUserID = DB::table('applieds')->whereIn('job_id',$jobIDs)->get()->toArray();
        return view('Backend.Employer.application_list',compact('AppUserID'));
    }

    public function viewCandidate(Request $request,$id)
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
        return view('Backend.Employer.candidate_profile',compact(['aboutMe','skills','experiences','education','sec_education','resumes']));
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
}
