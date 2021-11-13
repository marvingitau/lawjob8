@extends('Backend.Employer.layouts.auth')

@section('title',"Employer-Jobs")
@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-12 page-header">
            <div class="page-pretitle">Job List</div>
        </div>
    </div>
    <table class="table table-bordered" id="jobList" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>City</th>
                <th>Expiry date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>City</th>
                <th>Expiry date</th>
                <th>Salary</th>
            </tr>
        </tfoot>
        <tbody>
            @if($jobs)
                @foreach ($jobs as $job)
                <tr>
                    <td>{{$job->title }}</td>
                    <td>{{ \App\Models\Admin\JobAttributs::where('id',$job->job_type)->first()->name }}</td>
                    <td>{{ \App\Models\Admin\JobAttributs::where('id',$job->city)->first()->name }}</td>
                    <td>{{$job->expiry_date }}</td>
                    <td>{{ number_format($job->monthly_salary, 2, '.', ',') }}</td>

                </tr>
                @endforeach
            @else

            @endif
        </tbody>
    </table>

</div>

@endsection



