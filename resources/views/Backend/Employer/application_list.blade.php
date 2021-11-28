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
                <th>Action</th>
            </tr>
        </tfoot>
        <tbody>
            @if($AppUserID)
                @foreach ($AppUserID as $user)
                @php( $userData= DB::table('about_mes')->where('user_id',$user->user_id)->first())
                @if ($userData)
                <tr>
                    <td>{{$userData->fname}}</td>
                    <td>{{$userData->lname}}</td>
                    <td>{{$userData->dob}}</td>
                    <td>{{$userData->phone}}</td>
                    <td>{{$userData->gender}}</td>
                    <td><a name="" id="" class="btn btn-primary" href="{{route('application.view.candidate',$user->user_id)}}" role="button"><i class="fa fa-eye"> View </i></a>
                    </td>


                </tr>
                @endif
                @endforeach
            @else

            @endif
        </tbody>
    </table>

</div>

@endsection



