<?php

namespace App\Http\Controllers\Employer;

use Illuminate\Http\Request;
use App\Models\Employer\Order;
use App\Models\Admin\JobAttributs;
use App\Http\Controllers\Controller;
use App\Models\Employer\JobPostings;

class JobPostingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // job list
        $employer = auth()->user();
        // JobPostings
        $jobs= JobPostings::where('user_id',$employer->id)->get();

        return view('Backend.Employer.job_list',compact('jobs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usr = auth()->user();
        $jobAttrib = JobAttributs::getAttr('work_type');
        $jobAttribCountry = JobAttributs::getAttr('country');
        $jobAttribCity = JobAttributs::getAttr('city');
        $jobAttribSalary = JobAttributs::getAttr('monthly_salary');
        $jobCategory = JobAttributs::getAttr('job_category');
        // $jobAttribPackage = JobAttributs::getAttr('package');
        // dd($jobCategory);

        $creditList = Order::where('user_id',$usr->id)->where('quantity','>',0)->where('order_verify','>',0)->get();
        // dd($creditList);

        return view('Backend.Employer.create_job',compact(['jobAttrib','jobAttribCountry','jobAttribCity','creditList','jobAttribSalary','jobCategory']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $req = $request->validate([
            'job_type'=>'required',
            'title'=>'required',
            'country'=>'required',
            'city'=>'required',
            'job_summary'=>'required',
            'job_description'=>'required',
            'credit'=>'required',
            'monthly_salary'=>'',
            'job_category'=>'required',
            'icon'=>''
        ]);

        $order_id  = $req['credit'];

        $ord = Order::where('package',$order_id)->first();
        // $ord = Order::findOrFail($order_id);
        $decrease = $ord->increment('quantity','-1');

        if($decrease){
            $res = JobPostings::create($req+['expiry_date'=>$ord->expiry_date,'user_id'=>auth()->user()->id]);
            if($res->wasRecentlyCreated)
            {
                // session()->put('success','Job Posting SUCCESS.');
                // return back();
                return back()->with('success','Job Posting Succes');
                // return redirect('employer');

            }else{
                Order::findOrFail($order_id)->increment('quantity','1');
                $res->delete();
                // session()->put('danger','Job Posting FAILED.');
                return back();
                // return redirect('employer');
            }

        }else{
            Order::findOrFail($order_id)->increment('quantity','-1');
            // session()->put('danger','Failed to Decreament.');
            return back()->with('danger','Failed to Decreament.');
            // return redirect('employer');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\EmployerFolder\JobPostings  $jobPostings
     * @return \Illuminate\Http\Response
     */
    public function show(JobPostings $jobPostings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\EmployerFolder\JobPostings  $jobPostings
     * @return \Illuminate\Http\Response
     */
    public function edit(JobPostings $jobPostings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\EmployerFolder\JobPostings  $jobPostings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobPostings $jobPostings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\EmployerFolder\JobPostings  $jobPostings
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobPostings $jobPostings,$id)
    {
        $candIDs = JobPostings::where('id',$id)->delete();
        return back();
    }
}
