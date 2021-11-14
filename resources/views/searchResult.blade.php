@extends('layout.public')
@section('content')

<!--=================================
banner -->
<section class="header-inner header-inner-big bg-holder text-white" style="background-image: url(images/bg/law.jpg);">
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
                    <h2 class="text-white">Job List</h2>
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

  <div class="container">
    <table class="table table-bordered my-md-4" id="jobList" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Name</th>
                <th>Company</th>
                <th>Location</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Company</th>
                <th>Location</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </tfoot>
        <tbody>
            @if($jPosting1)
                @foreach ($jPosting1 as $jpost)
                <tr>
                    <td>{{$jpost->title }}</td>
                    <td>{{ !is_null(App\Models\User::where('id',$jpost->user_id)->first())?App\Models\User::where('id',$jpost->user_id)->first()->profile->company_name:'' }}</td>
                    <td>{{ !is_null(App\Models\User::where('id',$jpost->user_id)->first())?App\Models\User::where('id',$jpost->user_id)->first()->profile->location:'' }}</td>
                    <td>{{ !is_null(App\Models\UserData::where('user_id',$jpost->user_id)->first())?App\Models\UserData::where('user_id',$jpost->user_id)->first()->employer_hr_email:'' }}</td>
                    <td>
                        <a name="delete" id="" class="btn btn-primary" href="{{ route('jobSpecific',$jpost->id)}}" role="button">View <i class="fa fa-eye" aria-hidden="true"></i></a>
                    </td>
                </tr>
                @endforeach
            @else

            @endif
        </tbody>
    </table>
  </div>

@endsection
