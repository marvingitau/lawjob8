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
        //job posted
        $jobIDs = JobPostings::where('user_id',$uid)->pluck('id')->toArray();
        //lookn users who have applied the job
        $AppUserID = DB::table('applieds')->whereIn('job_id',$jobIDs)->get()->toArray();

        return view('Backend.Employer.application_list',compact('AppUserID'));
    }

    public function downloadtargetApplicantCSV(Request $request){
        $uid = auth()->user()->id;
        //job posted
        $jobIDs = JobPostings::where('user_id',$uid)->pluck('id')->toArray();
        //lookn users who have applied the job
        $AppUserID = DB::table('applieds')->whereIn('job_id',$jobIDs)->get()->toArray();

        $pathcsv = base_path('../assets/backend/image/candidate/csv/');

        $headers = [
        "Content-type"        => "text/csv",
        "Content-Disposition" => "attachment; filename=".auth()->user()->name."_data.csv", // <- name of file
        "Pragma"              => "no-cache",
        "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
        "Expires"             => "0",
        ];
        $columns  = ['First Name', 'Last Name', 'DOB','Phone','Gender','Job','Previous Job','Employer','Start Year','End Year',
        ];
        $callback = function () use ($AppUserID, $columns) {
            $file = fopen('php://output', 'w'); //<-here. name of file is written in headers
            fputcsv($file, $columns);
            foreach ($AppUserID as $user) {
                $data= DB::table('applieds')->join('job_postings','applieds.job_id','=','job_postings.id')->join('about_mes','applieds.user_id','=','about_mes.user_id')->join('work_experiences','applieds.user_id','=','work_experiences.user_id')->where('applieds.job_id',$user->job_id)->first();
                fputcsv($file,
                [
                    $data->fname,$data->lname,$data->dob,$data->phone,$data->gender,$data->title,$data->job_title,$data->employer,
                    $data->start_year,$data->end_year
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
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
