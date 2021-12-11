@extends('layout.public')
@section('content')

<!--=================================
banner -->
<section class="header-inner header-inner-big bg-holder text-white" style="background-image: url({{ asset('images/bg/law.jpg')}} );">
    <div class="container">
        <div class="row">
        <div class="col-12">
            <div class="job-search-field">
            <div class="job-search-item">
                <form class="form row">
                <div class="col-lg-5">
                    {{-- <div class="form-group left-icon mb-3">
                    <input type="text" class="form-control" name="job_title" placeholder="What?">
                    <i class="fas fa-search"></i>
                </div> --}}
                </div>
                <div class="col-lg-5">
                    <h2 class="text-white">Job Detail</h2>
                    {{-- <div class="form-group left-icon mb-3">
                    <input type="text" class="form-control" name="job_title" placeholder="Where?">
                    <i class="fas fa-search"></i> </div> --}}
                </div>
                <div class="col-lg-2 col-sm-12">
                    <div class="form-group form-action">
                    {{-- <button type="submit" class="btn btn-primary mt-0"><i class="fas fa-search-location"></i> Find Job</button> --}}
                    </div>
                </div>
                </form>
            </div>
            </div>
        </div>
        </div>
    </div>
</section>
<!--=================================
banner -->
<div class="jdetail-div" style="background-color: #f0f0f0;padding: 1.1rem 0rem;">

    <div class="container">
        @if(Session::has('message'))
        <div class="alert alert-success text-center" role="alert">
            <strong>Alert! &nbsp;</strong>{{Session::get('message')}}
        </div>
       @endif
       @if(Session::has('danger'))
       <div class="alert alert-danger text-center" role="alert">
           <strong>Alert! &nbsp;</strong>{{Session::get('danger')}}
       </div>
      @endif
        @if ($singleJob)
            <div class="d-flex">
                <h2 class="my-3">{{ !is_null($singleJob)?$singleJob['title']:'' }}</h2>
                @if (Auth::check())
                    <a name="" id="" class="btn btn-primary" style="padding: 25px 25px !important;margin-left: auto;" href="{{ route('apply.job',!is_null($singleJob)?$singleJob['id']:'')}}" role="button">Apply <i class="fa fa-upload" aria-hidden="true"></i></a>
                @else

                @endif
            </div>
            {{-- Job Summary --}}
            <h3 class="my-5">|&nbsp; Job Summary</h3>
            <div class="jsummary mb-4">
                {!! !is_null($singleJob)?$singleJob['job_summary']:''!!}
            </div>

            <h3 class="my-5">|&nbsp; Job Description</h3>
            <div class="jsummary mb-4">
                {!! $singleJob['job_description']!!}
            </div>

            {{-- <h5 class="my-5">+ &nbsp; For Query</h5>
            <div class="jsummary mb-4">
                {{ !is_null(\App\Models\User::where('id',$singleJob->user_id)->first())?\App\Models\User::where('id',$singleJob->user_id)->first()->userData->employer_hr_email:''}}
            </div> --}}


        @else
            <h1 class="text-center">Err</h1>
        @endif
      </div>

</div>

@endsection
