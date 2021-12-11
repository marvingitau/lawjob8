<?php

namespace App\Http\Controllers\Employer;

use Carbon\Carbon;
use App\Models\Applied;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Employer\JobPostings;

class EmployerDashboardController extends Controller
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
        $AppUserID = DB::table('applieds')->whereIn('job_id',$jobIDs)->count();
        $jCount=JobPostings::where('user_id',auth()->user()->id)->count();
        $total_chart = $this->chartData();

        return view('Backend.Employer.index',compact('jCount','AppUserID','total_chart'));
    }


    public function chartData(){
        $jobIDs = JobPostings::where('user_id',auth()->user()->id)->pluck('id')->toArray();
        $jobPosted = JobPostings::where('user_id',auth()->user()->id)->whereYear('created_at', '=', date('Y'))->get()->groupBy(function($d) {
            return $d->created_at->format('F');
        });
        $jobApplied = Applied::whereYear('created_at', '=', date('Y'))->whereIn('job_id',$jobIDs)->get()->groupBy(function($d) {
            return $d->created_at->format('F');
        });

        // $candidate = User::where('role','candidate')->whereYear('created_at', '=', date('Y'))->get()->groupBy(function($d) {
        //     return $d->created_at->format('F');
        // });

        // $orders = Order::whereYear('created_at', '=', date('Y'))->get()->groupBy(function($d) {
        //     return $d->created_at->format('F');
        // });

        // $employers= User::where('role','employer')->whereYear('created_at', '=', date('Y'))->get()->groupBy(function($d) {
        //     return $d->created_at->format('F');
        // });


        $monthly_chart =collect([]);
        foreach (month_arr() as $key => $value) {
            $monthly_chart->push([
                'month' => Carbon::parse(date('Y').'-'.$key)->format('Y-m'),
                'jobPosted' =>$jobPosted->has($value)?$jobPosted[$value]->count():0,
                'jobApplied' =>$jobApplied->has($value)?$jobApplied[$value]->count():0,
                // 'candidate' =>$candidate->has($value)?$candidate[$value]->count():0,
                // 'orders' =>$orders->has($value)?$orders[$value]->count():0,
                // 'employers' =>$employers->has($value)?$employers[$value]->count():0,
            ]);

        }
        return response()->json($monthly_chart->toArray())->content();
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
