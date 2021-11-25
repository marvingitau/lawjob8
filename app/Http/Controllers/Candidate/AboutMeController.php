<?php

namespace App\Http\Controllers\Candidate;

use Illuminate\Http\Request;
use App\Models\Candidate\AboutMe;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AboutMeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.Candidate.profile_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uid = (auth()->user()->id);
        $validatedData = $request->validate([
        //   'fname' => 'required',
        //   'phone' => 'required',
        //   'gender' => 'required',
        //   'lname' => 'required',
        //   'dob' => 'required',
        //   'nameSkill' => 'required',
          'resume_name'=>'mimes:pdf,docx|max:2048',
          //experiencce

        //   'employer'=>'required',
        //   'job_title'=>'required',
        //   'job_level'=>'required',
        //   'country'=>'required',
        //   'work_type'=>'required',
        //   'monthly_salary'=>'required',
        //   'start_year'=>'required',
        //   'start_month'=>'required',
        //   'end_year'=>'',
        //   'end_month'=>'',
        //   'job_responsibility'=>'',

          //Higher Education
          'institution'=>'required',
          'qualification_level_id'=>'required',
          'coursetitle'=>'required',
          'start_month'=>'required',
          'start_year'=>'required',
          'end_month'=>'',
          'end_year'=>'',

          'sec_institution'=>'required',
          'sec_qualification_level_id'=>'required',
          'sec_start_year'=>'required',
          'sec_start_month'=>'required',
          'sec_end_year'=>'',
          'sec_end_month'=>'',
        ]);


        // $aboutMe = AboutMe::updateOrCreate(
        // [
        //   'user_id' => $uid,
        // ],
        // [
        //   'fname' => $validatedData['fname'],
        //   'phone' => $validatedData['phone'],
        //   'gender' => $validatedData['gender'],
        //   'lname' => $validatedData['lname'],
        //   'dob' => $validatedData['dob'],
        // ]
        // );


        if(1){
            // Skills
            /*
            if($request->filled('nameSkill')){
                foreach ($validatedData['nameSkill'] as $key => $skill) {
                    DB::table('job_skills')->insert([
                        'user_id'=>$uid,
                        'name'=>is_null($skill)?'clone':$skill
                    ]);
                }
            }


            //Experience

            if($request->filled('job_title')){
                $i=0;
                while($i<count($validatedData['job_title'])-1) {

                    DB::table('work_experiences')->insert([
                        'user_id'=>$uid,
                        'employer'=>is_null($validatedData['employer'][$i])?'clone':$validatedData['employer'][$i],
                        'job_title'=>is_null($validatedData['job_title'][$i])?'clone':$validatedData['job_title'][$i],
                        'job_level'=>is_null($validatedData['job_level'][$i])?'clone':$validatedData['job_level'][$i],
                        'country'=>is_null($validatedData['country'][$i])?'clone':$validatedData['country'][$i],
                        'monthly_salary'=>is_null($validatedData['monthly_salary'][$i])?'clone':$validatedData['monthly_salary'][$i],
                        'work_type'=>is_null($validatedData['work_type'][$i])?'clone':$validatedData['work_type'][$i],
                        'start_month'=>is_null($validatedData['start_month'][$i])?'clone':$validatedData['start_month'][$i],
                        'start_year'=>is_null($validatedData['start_year'][$i])?'clone':$validatedData['start_year'][$i],
                        'end_month'=>is_null($validatedData['end_month'][$i])?'clone':$validatedData['end_month'][$i],
                        'end_year'=>is_null($validatedData['end_year'][$i])?'clone':$validatedData['end_year'][$i],
                        'job_responsibility'=>is_null($validatedData['job_responsibility'][$i])?'clone':$validatedData['job_responsibility'][$i],
                    ]);
                    $i++;
                }
            }
            */

            //College Education

            if($request->filled('institution')){
                $i=0;
                while($i<count($validatedData['institution'])-1) {

                    DB::table('education')->insert([
                        'user_id'=>$uid,
                        'institution'=>is_null($validatedData['institution'][$i])?'clone':$validatedData['institution'][$i],
                        'qualification_level_id'=>is_null($validatedData['qualification_level_id'][$i])?'clone':$validatedData['qualification_level_id'][$i],
                        'coursetitle'=>is_null($validatedData['coursetitle'][$i])?'clone':$validatedData['coursetitle'][$i],
                        'start_month'=>is_null($validatedData['start_month'][$i])?'clone':$validatedData['start_month'][$i],
                        'start_year'=>is_null($validatedData['start_year'][$i])?'clone':$validatedData['start_year'][$i],
                        'end_month'=>is_null($validatedData['end_month'][$i])?0:$validatedData['end_month'][$i],
                        'end_year'=>is_null($validatedData['end_year'][$i])?0:$validatedData['end_year'][$i],

                    ]);
                    $i++;
                }
            }

            //High school
            if($request->filled('sec_institution')){
                $i=0;
                while($i<count($validatedData['sec_institution'])-1) {
                    DB::table('sec_education')->insert([
                        'user_id'=>$uid,
                        'sec_institution'=>is_null($validatedData['sec_institution'][$i])?'clone':$validatedData['sec_institution'][$i],
                        'sec_qualification_level_id'=>is_null($validatedData['sec_qualification_level_id'][$i])?'clone':$validatedData['sec_qualification_level_id'][$i],
                        'sec_start_year'=>is_null($validatedData['sec_start_year'][$i])?'clone':$validatedData['sec_start_year'][$i],
                        'sec_start_month'=>is_null($validatedData['sec_start_month'][$i])?'clone':$validatedData['sec_start_month'][$i],
                        'sec_end_year'=>is_null($validatedData['sec_end_year'][$i])?0:$validatedData['sec_end_year'][$i],
                        'sec_end_month'=>is_null($validatedData['sec_end_month'][$i])?0:$validatedData['sec_end_month'][$i],
                    ]);
                    $i++;
                }
            }




        }


        // Upload Resume file
        if($request->has('resume_name')){
            $fileName = $uid.'_'.time().'.'.$request->resume_name->extension();
            if($obj = $request->resume_name->move(public_path('uploads'), $fileName)){
                DB::table('resumes')->insert([
                    'user_id'=>$uid,
                    'resume_name'=>$obj->getFileName(),
                    'path'=>$obj->getPathName(),
                ]);

            }
        }else{
            $fileName = 'no file';
        }



        return back()->with('message','Data Uploaded')->with('file',$fileName);
        // return response()->json('About Me created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\AdminFolder\AboutMe  $aboutMe
     * @return \Illuminate\Http\Response
     */
    public function show(AboutMe $aboutMe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\AdminFolder\AboutMe  $aboutMe
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutMe $aboutMe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\AdminFolder\AboutMe  $aboutMe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AboutMe $aboutMe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\AdminFolder\AboutMe  $aboutMe
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutMe $aboutMe)
    {
        //
    }
}
