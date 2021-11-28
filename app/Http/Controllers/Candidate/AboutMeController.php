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
    public function index(Request $request)
    {
        $uid = (auth()->user()->id);

        $aboutMe = DB::table('about_mes')->where('user_id',$uid)->first();
        $skills= DB::table('job_skills')->where('user_id',$uid)->get();
        $experiences = DB::table('work_experiences')->where('user_id',$uid)->first();
        $education = DB::table('education')->where('user_id',$uid)->first();
        $sec_education = DB::table('sec_education')->where('user_id',$uid)->first();
        $resumes = DB::table('resumes')->where('user_id',$uid)->get();
        if(is_null($aboutMe)||is_null($skills)||is_null($experiences)||is_null($education)||is_null($sec_education)||is_null($sec_education))
            return back()->with('message','Error with Profile');
        return view('Backend.Candidate.profile_view',compact(['aboutMe','skills','experiences','education','sec_education','resumes']));
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
          'fname' => 'required',
          'phone' => 'required',
          'gender' => 'required',
          'lname' => 'required',
          'dob' => 'required',
          'nameSkill' => 'required',
          'resume_name'=>'mimes:pdf|max:2048',
          //experiencce

          'employer'=>'required',
          'job_title'=>'required',
          'job_level'=>'required',
          'country'=>'required',
          'work_type'=>'required',
          'monthly_salary'=>'required',
          'start_year'=>'required',
          'start_month'=>'required',
          'end_year'=>'',
          'end_month'=>'',
          'job_responsibility'=>'',
          'extra_experience'=>'',

          //Higher Education
          'institution'=>'required',
          'qualification_level_id'=>'required',
          'coursetitle'=>'required',
          'start_month'=>'required',
          'start_year'=>'required',
          'end_month'=>'',
          'end_year'=>'',
          'additional_colleges'=>'',

          'sec_institution'=>'required',
          'sec_qualification_level_id'=>'required',
          'sec_start_year'=>'required',
          'sec_start_month'=>'required',
          'sec_end_year'=>'',
          'sec_end_month'=>'',
          'additional_highschools'=>'',
        ]);


        $aboutMe = AboutMe::updateOrCreate(
        [
          'user_id' => $uid,
        ],
        [
          'fname' => $validatedData['fname'],
          'phone' => $validatedData['phone'],
          'gender' => $validatedData['gender'],
          'lname' => $validatedData['lname'],
          'dob' => $validatedData['dob'],
        ]
        );


        if(1){
            // Skills

            try {
                if($request->filled('nameSkill')){
                    foreach ($validatedData['nameSkill'] as $key => $skill) {
                        if($skill !=''){
                            DB::table('job_skills')->insert([
                                'user_id'=>$uid,
                                'name'=>is_null($skill)?'clone':$skill
                            ]);
                        }
                    }
                }
            } catch (\Throwable $th) {
               return back()->with('message','Error with Skills');
            }



            //Experience

            try {
                if($request->filled('job_title')){
                    // $i=0;
                    // while($i<count($validatedData['job_title'])-1) {

                        DB::table('work_experiences')->insert([
                            'user_id'=>$uid,
                            'employer'=>is_null($validatedData['employer'])?'clone':$validatedData['employer'],
                            'job_title'=>is_null($validatedData['job_title'])?'clone':$validatedData['job_title'],
                            'job_level'=>is_null($validatedData['job_level'])?'clone':$validatedData['job_level'],
                            'country'=>is_null($validatedData['country'])?'clone':$validatedData['country'],
                            'monthly_salary'=>is_null($validatedData['monthly_salary'])?'clone':$validatedData['monthly_salary'],
                            'work_type'=>is_null($validatedData['work_type'])?'clone':$validatedData['work_type'],
                            'start_month'=>is_null($validatedData['start_month'])?'clone':$validatedData['start_month'],
                            'start_year'=>is_null($validatedData['start_year'])?'clone':$validatedData['start_year'],
                            'end_month'=>is_null($validatedData['end_month'])?'clone':$validatedData['end_month'],
                            'end_year'=>is_null($validatedData['end_year'])?'clone':$validatedData['end_year'],
                            'extra_experience'=>is_null($validatedData['extra_experience'])?'clone':$validatedData['extra_experience'],
                        ]);
                        // $i++;
                //     }
                }
            } catch (\Throwable $th) {
                return back()->with('message','Error with Experience'.$th);
            }




            //College Education

            try {
                if($request->filled('institution')){
                    // $i=0;
                    // while($i<count($validatedData['institution'])-1) {

                        DB::table('education')->insert([
                            'user_id'=>$uid,
                            'institution'=>is_null($validatedData['institution'])?'clone':$validatedData['institution'],
                            'qualification_level_id'=>is_null($validatedData['qualification_level_id'])?'clone':$validatedData['qualification_level_id'],
                            'coursetitle'=>is_null($validatedData['coursetitle'])?'clone':$validatedData['coursetitle'],
                            'start_month'=>is_null($validatedData['start_month'])?'clone':$validatedData['start_month'],
                            'start_year'=>is_null($validatedData['start_year'])?'clone':$validatedData['start_year'],
                            'end_month'=>is_null($validatedData['end_month'])?0:$validatedData['end_month'],
                            'end_year'=>is_null($validatedData['end_year'])?0:$validatedData['end_year'],
                            'additional_colleges'=>is_null($validatedData['additional_colleges'])?0:$validatedData['additional_colleges'],

                        ]);
                    //     $i++;
                    // }
                }
            } catch (\Throwable $th) {
                return back()->with('message','Error with Higher Education');
            }


            //High school
            try {
                if($request->filled('sec_institution')){
                    // $i=0;
                    // while($i<count($validatedData['sec_institution'])-1) {
                        DB::table('sec_education')->insert([
                            'user_id'=>$uid,
                            'sec_institution'=>is_null($validatedData['sec_institution'])?'clone':$validatedData['sec_institution'],
                            'sec_qualification_level_id'=>is_null($validatedData['sec_qualification_level_id'])?'clone':$validatedData['sec_qualification_level_id'],
                            'sec_start_year'=>is_null($validatedData['sec_start_year'])?'clone':$validatedData['sec_start_year'],
                            'sec_start_month'=>is_null($validatedData['sec_start_month'])?'clone':$validatedData['sec_start_month'],
                            'sec_end_year'=>is_null($validatedData['sec_end_year'])?0:$validatedData['sec_end_year'],
                            'sec_end_month'=>is_null($validatedData['sec_end_month'])?0:$validatedData['sec_end_month'],
                            'additional_highschools'=>is_null($validatedData['additional_highschools'])?0:$validatedData['additional_highschools'],
                        ]);
                    //     $i++;
                    // }
                }
            } catch (\Throwable $th) {
                return back()->with('message','Error with High Education');
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
    public function update(Request $request,$cat)
    {
        $uid = (auth()->user()->id);
        switch ($cat) {
            case 'skills':
                $validatedData = $request->validate([
                    'nameSkill' => 'required',
                ]);
                try {
                    if($request->filled('nameSkill')){
                        DB::table('job_skills')->where('user_id',$uid)->delete();
                        foreach ($validatedData['nameSkill'] as $key => $skill) {
                            if($skill !=''){
                                DB::table('job_skills')->insert([
                                    'user_id'=>$uid,
                                    'name'=>is_null($skill)?'clone':$skill
                                ]);
                            }
                        }
                    }
                    return back()->with('message','Skills Updated');
                } catch (\Throwable $th) {
                   return back()->with('message','Error with Skills');
                }

                break;

            case 'cv':
                $validatedData = $request->validate([
                    'resume_name'=>'mimes:pdf|max:2048',
                ]);
                try {
                    // Upload Resume file
                    if($request->has('resume_name')){
                        $fileName = $uid.'_'.time().'.'.$request->resume_name->extension();
                        if($obj = $request->resume_name->move(public_path('uploads'), $fileName)){
                            DB::table('resumes')->where('user_id',$uid)->delete();
                            DB::table('resumes')->insert([
                                'user_id'=>$uid,
                                'resume_name'=>$obj->getFileName(),
                                'path'=>$obj->getPathName(),
                            ]);

                        }
                    }
                    return back()->with('message','CV Updated');
                } catch (\Throwable $th) {
                    return back()->with('message','Error with CV');
                }

                break;

            case 'experience':
                //Experience
                $validatedData = $request->validate([
                    'employer'=>'required',
                    'job_title'=>'required',
                    'job_level'=>'required',
                    'country'=>'required',
                    'work_type'=>'required',
                    'monthly_salary'=>'required',
                    'start_year'=>'required',
                    'start_month'=>'required',
                    'end_year'=>'',
                    'end_month'=>'',
                    'job_responsibility'=>'',
                    'extra_experience'=>'',
                  ]);


                try {
                    if($request->filled('job_title')){
                            DB::table('work_experiences')->where('user_id',$uid)->update([
                                // 'user_id'=>$uid,
                                'employer'=>is_null($validatedData['employer'])?'clone':$validatedData['employer'],
                                'job_title'=>is_null($validatedData['job_title'])?'clone':$validatedData['job_title'],
                                'job_level'=>is_null($validatedData['job_level'])?'clone':$validatedData['job_level'],
                                'country'=>is_null($validatedData['country'])?'clone':$validatedData['country'],
                                'monthly_salary'=>is_null($validatedData['monthly_salary'])?'clone':$validatedData['monthly_salary'],
                                'work_type'=>is_null($validatedData['work_type'])?'clone':$validatedData['work_type'],
                                'start_month'=>is_null($validatedData['start_month'])?'clone':$validatedData['start_month'],
                                'start_year'=>is_null($validatedData['start_year'])?'clone':$validatedData['start_year'],
                                'end_month'=>is_null($validatedData['end_month'])?'clone':$validatedData['end_month'],
                                'end_year'=>is_null($validatedData['end_year'])?'clone':$validatedData['end_year'],
                                'extra_experience'=>is_null($validatedData['extra_experience'])?'clone':$validatedData['extra_experience'],
                            ]);
                    }
                    return back()->with('message','Experience Updated');
                } catch (\Throwable $th) {
                    return back()->with('message','Error with Experience');
                }

                break;

            case 'sec':
                //Experience
                $validatedData = $request->validate([
                    'sec_institution'=>'required',
                    'sec_qualification_level_id'=>'required',
                    'sec_start_year'=>'required',
                    'sec_start_month'=>'required',
                    'sec_end_year'=>'',
                    'sec_end_month'=>'',
                    'additional_highschools'=>'',
                    ]);

                try {
                    if($request->filled('sec_institution')){
                            DB::table('sec_education')->where('user_id',$uid)->update([
                                // 'user_id'=>$uid,
                                'sec_institution'=>is_null($validatedData['sec_institution'])?'clone':$validatedData['sec_institution'],
                                'sec_qualification_level_id'=>is_null($validatedData['sec_qualification_level_id'])?'clone':$validatedData['sec_qualification_level_id'],
                                'sec_start_year'=>is_null($validatedData['sec_start_year'])?'clone':$validatedData['sec_start_year'],
                                'sec_start_month'=>is_null($validatedData['sec_start_month'])?'clone':$validatedData['sec_start_month'],
                                'sec_end_year'=>is_null($validatedData['sec_end_year'])?0:$validatedData['sec_end_year'],
                                'sec_end_month'=>is_null($validatedData['sec_end_month'])?0:$validatedData['sec_end_month'],
                                'additional_highschools'=>is_null($validatedData['additional_highschools'])?0:$validatedData['additional_highschools'],
                            ]);
                    }
                    return back()->with('message','Secondary Sch Updated');
                } catch (\Throwable $th) {
                    return back()->with('message','Error with Secondary Sch'.$th);
                }
                break;

            case 'education':
                //Experience
                $validatedData = $request->validate([
                    'institution'=>'required',
                    'qualification_level_id'=>'required',
                    'coursetitle'=>'required',
                    'start_month'=>'required',
                    'start_year'=>'required',
                    'end_month'=>'',
                    'end_year'=>'',
                    'additional_colleges'=>'',
                ]);

                try {
                    if($request->filled('institution')){
                            DB::table('education')->where('user_id',$uid)->update([
                                // 'user_id'=>$uid,
                                'institution'=>is_null($validatedData['institution'])?'clone':$validatedData['institution'],
                                'qualification_level_id'=>is_null($validatedData['qualification_level_id'])?'clone':$validatedData['qualification_level_id'],
                                'coursetitle'=>is_null($validatedData['coursetitle'])?'clone':$validatedData['coursetitle'],
                                'start_month'=>is_null($validatedData['start_month'])?'clone':$validatedData['start_month'],
                                'start_year'=>is_null($validatedData['start_year'])?'clone':$validatedData['start_year'],
                                'end_month'=>is_null($validatedData['end_month'])?0:$validatedData['end_month'],
                                'end_year'=>is_null($validatedData['end_year'])?0:$validatedData['end_year'],
                                'additional_colleges'=>is_null($validatedData['additional_colleges'])?0:$validatedData['additional_colleges'],
                            ]);
                    }
                    return back()->with('message','Higher Education Updated');
                } catch (\Throwable $th) {
                    return back()->with('message','Error with Higher Education');
                }
                break;
            case 'personal':
                //Experience
                $validatedData = $request->validate([
                    'fname' => 'required',
                    'phone' => 'required',
                    'gender' => 'required',
                    'lname' => 'required',
                    'dob' => 'required',
                ]);

                try {
                    if($request->filled('fname')){
                        AboutMe::updateOrCreate(
                            [
                              'user_id' => $uid,
                            ],
                            [
                              'fname' => $validatedData['fname'],
                              'phone' => $validatedData['phone'],
                              'gender' => $validatedData['gender'],
                              'lname' => $validatedData['lname'],
                              'dob' => $validatedData['dob'],
                            ]
                        );
                    }
                    return back()->with('message','Personal Updated');
                } catch (\Throwable $th) {
                    return back()->with('message','Error with Personal');
                }
                break;
            default:
                # code...
                break;
        }
    }

    // Additional aspects for inclusion

    public function additional_inclusion(Request $request,$cat)
    {
        $uid = (auth()->user()->id);
        $validatedData = $request->validate([
            'nameSkill' => '',
          ]);
        switch ($cat) {
            case 'skills':
                try {
                    if($request->filled('nameSkill')){
                        foreach ($validatedData['nameSkill'] as $key => $skill) {
                            if($skill !=''){
                                DB::table('job_skills')->insert([
                                    'user_id'=>$uid,
                                    'name'=>is_null($skill)?'clone':$skill
                                ]);
                            }
                        }
                    }
                    return back()->with('message','Added Skills');
                } catch (\Throwable $th) {
                   return back()->with('message','Error with Skills');
                }

                break;

            default:
                # code...
                break;
        }
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
