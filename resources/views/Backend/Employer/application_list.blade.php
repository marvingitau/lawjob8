@extends('Backend.Employer.layouts.auth')

@section('title',"Candidate List")
@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-12 page-header">
            <div class="page-pretitle">Job Applicants</div>
        </div>
    </div>
    <table class="table table-bordered" id="jobList" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>DOB</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Job</th>
                <th>Action</th>

            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>DOB</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Job</th>
                <th>Action</th>
            </tr>
        </tfoot>
        <tbody>
            @if($AppUserID)
                @foreach ($AppUserID as $user)
                {{-- DB::table('about_mes')->where('user_id',$user->user_id)->get() --}}
                @php( $data= DB::table('applieds')->join('job_postings','applieds.job_id','=','job_postings.id')->join('about_mes','applieds.user_id','=','about_mes.user_id')->where('applieds.job_id',$user->job_id)->first())


                @if ($data)
                {{-- @foreach ($userData as $data) --}}
                <tr>
                    <td>{{$data->fname}}</td>
                    <td>{{$data->lname}}</td>
                    <td>{{$data->dob}}</td>
                    <td>{{$data->phone}}</td>
                    <td>{{$data->gender}}</td>
                    <td>{{$data->title}}</td>
                    <td><a name="" id="" class="btn btn-primary" href="{{route('application.view.candidate',$data->user_id)}}" role="button"><i class="fa fa-eye"> View </i></a>
                    </td>


                </tr>
                {{-- @endforeach --}}

                @endif
                @endforeach
            @else

            @endif
        </tbody>
    </table>

</div>

@endsection



