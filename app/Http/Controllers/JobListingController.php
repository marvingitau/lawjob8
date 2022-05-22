<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employer\JobPostings;

class JobListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jPosting = JobPostings::all();
        return view('job-listing',compact('jPosting'));
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
        $singleJob =  JobPostings::findOrFail($id);
        if(auth()->check()){
            return view('job-details',compact('singleJob'));
        }else{
            return redirect()->to('/login');
        }
    }

    public function search(Request $request)
    {

        $jPosting1=JobPostings::query()
        ->where('title', 'LIKE', "%{$request->input('job_title')}%")
        ->Where('city', 'LIKE', "%{$request->input('city')}%")
        ->get();
        return view('searchResult',compact('jPosting1'));
    }

    public function searchCat(Request $request,$id)
    {

        $jPosting1=JobPostings::query()
        ->where('job_category', 'LIKE', "%{$id}%")
        // ->Where('city', 'LIKE', "%{$request->input('city')}%")
        ->get();
        return view('searchResult',compact('jPosting1'));
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
