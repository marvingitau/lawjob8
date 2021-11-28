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
            <a class="breadcrumb-item" href="{{route('backend.job.list')}}">Job List</a>
            <a class="breadcrumb-item">Applying Job</a>
            <span class="breadcrumb-item active"></span>
        </nav>
        {{-- End Bread Crump --}}
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
    <div class="jdetail-div rounded p-2" style="background-color: #fff;padding: 1.1rem 0rem;">
        <div class="container">
            @if ($singleJob)
                <div class="d-flex">

                    <h2 class="my-3">{{ $singleJob['title'] }}</h2>

                    <div class="form-group ml-auto">
                        {{-- <label for="">Tokens</label> --}}
                        <form action="{{route('backend.job.apply',$singleJob['id'])}}" method="post">
                            @csrf
                        <select class="form-control rounded-0" name="credit" id="country" required>
                            @if($creditList)
                            @foreach ($creditList as $credit)
                                 <option value="{{$credit['id']}}"> {{ \App\Models\Admin\JobAttributs::where('id',$credit['package'])->first()->name }} ({{ $credit['quantity'] }})</option>
                            @endforeach

                            @endif
                        </select>
                        <button type="submit" class="btn btn-primary rounded-0 my-2">Apply</button>
                    </form>

                    </div>
                </div>
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
