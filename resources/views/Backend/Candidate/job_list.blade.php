@extends('Backend.Candidate.layouts.auth')

@section('title',"Applied-Jobs")
@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-12 page-header">
            {{-- <div class="page-pretitle">Job List</div> --}}
        </div>
    </div>
            {{-- Bread Crump --}}
            <nav class="breadcrumb">
                <a class="breadcrumb-item" href="{{route('candidate.dashboard')}}">Home</a>
                <a class="breadcrumb-item">Applied Jobs</a>
                <span class="breadcrumb-item active"></span>
            </nav>
            {{-- End Bread Crump --}}
    <table class="table table-bordered" id="jobList" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>City</th>
                {{-- <th>Expiry date</th> --}}
                <th>Salary</th>
                <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>City</th>
                {{-- <th>Expiry date</th> --}}
                <th>Salary</th>
                <th>Action</th>
            </tr>
        </tfoot>
        <tbody>
            @if($jobs)
                @foreach ($jobs as $job)
                <tr>
                    <td>{{$job->title }}</td>
                    <td>{{ \App\Models\Admin\JobAttributs::where('id',$job->job_type)->first()->name }}</td>
                    <td>{{ \App\Models\Admin\JobAttributs::where('id',$job->city)->first()->name }}</td>
                    {{-- <td>{{$job->expiry_date }}</td> --}}
                    <td>{{ number_format($job->monthly_salary, 2, '.', ',') }}</td>
                    <td>
                        <a name="" id="" class="btn btn-primary" href="{{route('applied.job',$job->id)}}" role="button"><i class="fa fa-eye"> View </i></a>
                          </td>

                </tr>
                @endforeach
            @else

            @endif
        </tbody>
    </table>

</div>

@endsection



