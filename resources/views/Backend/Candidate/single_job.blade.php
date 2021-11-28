@extends('Backend.Candidate.layouts.auth')

@section('title',"Applied-Job")
@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-12 page-header">
            {{-- <div class="page-pretitle">Job</div> --}}
        </div>
    </div>
           {{-- Bread Crump --}}
        <nav class="breadcrumb">
            <a class="breadcrumb-item" href="{{route('candidate.dashboard')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('applied.jobs')}}">Applied Jobs List</a>
            <a class="breadcrumb-item">Applied Job</a>
            <span class="breadcrumb-item active"></span>
        </nav>
        {{-- End Bread Crump --}}
    <div class="jdetail-div rounded p-2" style="background-color: #fff;padding: 1.1rem 0rem;">
        <div class="container">
            @if ($singleJob)
                <h2 class="my-3">{{ $singleJob['title'] }}</h2>
                {{-- Job Summary --}}
                <h3 class="my-5">|&nbsp; Job Summary</h3>
                <div class="jsummary mb-4">
                    {!! $singleJob['job_summary']!!}
                </div>

                <h3 class="my-5">|&nbsp; Job Description</h3>
                <div class="jsummary mb-4">
                    {!! $singleJob['job_description']!!}
                </div>

                {{-- <h5 class="my-5">+ &nbsp; Send CV and Necesary Documents</h5>
                <div class="jsummary mb-4">
                    {{ \App\Models\User::where('id',$singleJob->user_id)->first()->userData->employer_hr_email}}
                </div> --}}


            @else
                <h1 class="text-center">Err</h1>
            @endif
          </div>

    </div>

</div>

@endsection
