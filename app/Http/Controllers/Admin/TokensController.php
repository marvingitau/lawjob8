<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Tokens;
use Illuminate\Http\Request;
use App\Models\Admin\JobAttributs;
use App\Http\Controllers\Controller;

class TokensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $allTokens = Tokens::all();
    //    $attribs=JobAttributs::getAttr('package')->where('id',8)[0]->name;
    //    dd($attribs);
       return view('Backend.Admin.Employer.tokens',compact('allTokens'));
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
        $data = $request->validate(
            [
                'package'=>'required',
                'days'=>'required',
                'product_name'=>'required',
                'price'=>'required'
            ]
            );
        Tokens::create($data);
        return back()->with('message','Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Tokens  $tokens
     * @return \Illuminate\Http\Response
     */
    public function show(Tokens $tokens)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Tokens  $tokens
     * @return \Illuminate\Http\Response
     */
    public function edit(Tokens $tokens)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Tokens  $tokens
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tokens $tokens)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Tokens  $tokens
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tokens $tokens,$id)
    {
        Tokens::findOrFail($id)->delete();
        return back()->with('message','Deleted Successfully');
    }
}
