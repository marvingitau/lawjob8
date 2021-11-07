<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\JobAttributs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Image;

class JobAttributsController extends Controller
{

    private $except = [];
    /**
     * @var JobAttributs
     */

    private $attribute;

    public function __construct(JobAttributs $attribute)
    {
        $this->attribute = $attribute;
        $this->except =$attribute->types();

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type)
    {
        if(!$this->except->has($type))abort(401);
        $attributes = $this->attribute->where('type',$type)->paginate(20);
        // $functionalArea = $this->attribute->where('type','functional_area')->get();
        $pt = $this->except[$type];
        return view('Admin.jobAttribs.index',compact('attributes','type','pt'));
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
    public function store(Request $request,$type)
    {
        if(!$this->except->has($type))abort(401);
        $this->validate($request,[
           'name'=>'required|max:191'
        ]);
        $attribute = new  $this->attribute;
        // if(in_array($type,['functional_area'])){
        //     $this->validate($request,[
        //         'image'=>[new MimeCheckRules(['png','jpg'])]
        //     ]);
        //     if($request->has('image')){
        //         $path = 'assets/backend/image/attribs/';

        //         $attribute->image = $type.time().'.'.$request->image->getClientOriginalExtension();
        //         Image::make($request->image)->save($path.$attribute->image);
        //     }
        // }
        $attribute->name = $request->name;
        $attribute->type = $type;
        $attribute->status = $request->status?1:0;
        $attribute->save();
        return back()->with('success','Save successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JobAttributs  $jobAttributs
     * @return \Illuminate\Http\Response
     */
    public function show(JobAttributs $jobAttributs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JobAttributs  $jobAttributs
     * @return \Illuminate\Http\Response
     */
    public function edit(JobAttributs $jobAttributs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JobAttributs  $jobAttributs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobAttributs $jobAttributs,$type,$id)
    {
        $this->validate($request,[
           'name'=>'required|max:191'
        ]);
        if($this->except->has($type) && $attribute=$this->attribute->where('type',$type)->where('id',$id)->first()){
            if(in_array($type,['functional_area'])){
                $this->validate($request,[
                    'image'=>[new MimeCheckRules(['png','jpg'])]
                ]);
                if($request->has('image')){
                    $path = 'assets/backend/image/attr/';
                    @unlink($path.$attribute->image);
                    $attribute->image = $type.time().'.'.$request->image->getClientOriginalExtension();
                    // Image::make($request->image)->save($path.$attribute->image);
                }
            }
            $attribute->name = $request->name;
            $attribute->status = $request->status?1:0;
            $attribute->save();

            return back()->with('success','Update successful');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JobAttributs  $jobAttributs
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobAttributs $jobAttributs,$type,$id)
    {
         if($this->except->has($type) && $attribute=$this->attribute->where('type',$type)->where('id',$id)->first()){
            $name=$attribute->name;
             if(in_array($type,['functional_area'])){
                 $path = 'assets/backend/image/attr/';
                 @unlink($path.$attribute->image);
             }
             if($type == "functional_area"){
                return back()->with('success',"Please don't edit/Delete this page. ");
            }
             $attribute->forceDelete();
             return back()->with('success','Delete successful');
         }

    }
}
