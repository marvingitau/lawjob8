<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Applied;
use Illuminate\Http\Request;
use App\Models\Employer\Order;
use App\Http\Controllers\Controller;
use App\Models\Employer\JobPostings;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employers= User::where('role','employer')->count();
        $orders = Order::all()->count();
        $candidate=User::where('role','candidate')->count();;
        $jobPosted=JobPostings::all()->count();;
        $jobApplied=Applied::all()->count();

        $total_chart = $this->chartData();
        return view('Backend.Admin.home',compact('employers','orders','candidate','jobPosted','jobApplied','total_chart'));
    }


    public function chartData(){
        $jobPosted = JobPostings::whereYear('created_at', '=', date('Y'))->get()->groupBy(function($d) {
            return $d->created_at->format('F');
        });
        $jobApplied = Applied::whereYear('created_at', '=', date('Y'))->get()->groupBy(function($d) {
            return $d->created_at->format('F');
        });

        $candidate = User::where('role','candidate')->whereYear('created_at', '=', date('Y'))->get()->groupBy(function($d) {
            return $d->created_at->format('F');
        });

        $orders = Order::whereYear('created_at', '=', date('Y'))->get()->groupBy(function($d) {
            return $d->created_at->format('F');
        });

        $employers= User::where('role','employer')->whereYear('created_at', '=', date('Y'))->get()->groupBy(function($d) {
            return $d->created_at->format('F');
        });


        $monthly_chart =collect([]);
        foreach (month_arr() as $key => $value) {
            $monthly_chart->push([
                'month' => Carbon::parse(date('Y').'-'.$key)->format('Y-m'),
                'jobPosted' =>$jobPosted->has($value)?$jobPosted[$value]->count():0,
                'candidate' =>$candidate->has($value)?$candidate[$value]->count():0,
                'orders' =>$orders->has($value)?$orders[$value]->count():0,
                'jobApplied' =>$jobApplied->has($value)?$jobApplied[$value]->count():0,
                'employers' =>$employers->has($value)?$employers[$value]->count():0,
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
