<?php

namespace App\Http\Controllers\Candidate;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Employer\Order;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Employer\JobPostings;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get the applied job per user
        $uid = (auth()->user()->id);
        $applied_jobs_arr = DB::table('applieds')->where('user_id',$uid)->pluck('job_id')->toArray();
        $jobs = DB::table('job_postings')->whereIn('id',$applied_jobs_arr)->get();

        return view('Backend.Candidate.job_list',compact('jobs'));

    }

    public function AppliedJob(Request $request, $id)
    {
        $singleJob =  JobPostings::findOrFail($id);
        return view('Backend.Candidate.single_job',compact('singleJob'));
    }

    public function ApplyJob(Request $request,$id)
    {
        $uid = auth()->user()->id;
        try {
            $ord = Order::where('user_id',$uid)->where('order_verify',1)->where('expiry_date','>',Carbon::now())->first();
            $decrease = $ord->increment('quantity','-1');
            // dd($ord->quantity);
            if($ord->quantity>=0){
                $appliedAmount = DB::table('applieds')->where('user_id',$uid)->where('job_id',$id)->count();
                if($appliedAmount <= 0){
                DB::table('applieds')->insert(
                    [
                        'user_id'=> $uid,
                        'job_id'=> $id,
                        'created_at'=>Carbon::now(),
                        'updated_at'=>Carbon::now(),
                    ]
                );

                return back()->with('message','Successfully Applied for the Job.');
                }else{
                    return back()->with('message','Job is Applied');
                }
            }else{
                return back()->with('danger','Failed, No more Tokens');
            }
        } catch (\Throwable $th) {
            return back()->with('danger','Failed, No more Tokens,Order Some.');
        }

    }

    public function jobList(Request $request)
    {
        // Get the job
        $jobs = DB::table('job_postings')->get();
        return view('Backend.Candidate.apply_job',compact('jobs'));
    }

    public function JobView(Request $request,$id)
    {
        $uid = auth()->user()->id;
        $singleJob = JobPostings::findOrFail($id);
        $creditList = Order::where('user_id',$uid)->where('quantity','>',0)->where('order_verify','>',0)->get();
        return view('Backend.Candidate.job_view',compact('singleJob','creditList'));
    }

    public function JobApply(Request $request,$id)
    {
        $data = $request->validate([
            'credit'=>''
        ]);
        $uid = auth()->user()->id;
        try {
            $ord = Order::where('user_id',$uid)->where('id',$data['credit'])->first();
            $decrease = $ord->increment('quantity','-1');
            if($ord->quantity>=0){
                $appliedAmount = DB::table('applieds')->where('user_id',$uid)->where('job_id',$id)->count();
                if($appliedAmount <= 0){
                DB::table('applieds')->insert(
                    [
                        'user_id'=> $uid,
                        'job_id'=> $id,
                        'created_at'=>Carbon::now(),
                        'updated_at'=>Carbon::now(),
                    ]
                );

                return back()->with('message','Successfully Applied for the Job.');
                }else{
                    return back()->with('message','Job is Applied');
                }
            }else{
                return back()->with('danger','Failed, No more Tokens');
            }
        }catch(\Throwable $th){
            return back()->with('danger','Failed Backend JobApp');
        }
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
