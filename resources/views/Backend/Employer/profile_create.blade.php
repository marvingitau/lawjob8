
@extends('Backend.Employer.layouts.auth')

@section('title',"Profile Creation")
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <div class="page-pretitle">Create/Update Profile</div>
        </div>
    </div>

    @if(Session::has('success'))
    <div class="alert alert-success text-center" role="alert" >
        {{Session::get('success')}}
    </div>
@endif

    <div class="box box-primary">
        <div class="box-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="system-tab" data-toggle="tab" href="#hr" role="tab" aria-controls="hr" aria-selected="false">Personal Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">Company Profile</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active show" id="hr" role="tabpanel" aria-labelledby="general-tab">
                    <div class="col-md-6">
                        <form action="{{ route('hr.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="first_name" class="form-control-label">First Name</label>
                                <input type="text"
                                    class="form-control" name="first_name" id="first_name" value="{{$hrData->first_name}}">

                            </div>

                            <div class="form-group">
                                <label for="last_name" class="form-control-label">Last Name</label>
                                <input type="text"
                                    class="form-control" name="last_name" id="last_name" value="{{$hrData->last_name}}">

                            </div>

                            <div class="form-group">
                                <label for="phone" class="form-control-label">Phone</label>
                                <div class="d-flex">
                                    <input type="text" class="form-control w-25" name="code" id="code" value="+254" disabled>
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="e.g 712345678" value="{{$hrData->phone}}" >
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="POBox" class="form-control-label">P.O box</label>
                                <input type="text"
                                    class="form-control" name="POBox" id="POBox" value="{{$hrData->POBox}}">

                            </div>

                            <div class="form-group">
                                <label for="employer_hr_name" class="form-control-label">HR Name</label>
                                <input type="text" name="employer_hr_name" class="form-control" id="employer_hr_name" value="{{$hrData->employer_hr_name}}">
                            </div>
                            <div class="form-group">
                                <label for="employer_hr_email" class="form-control-label">HR Email Address</label>

                                <input type="text"
                                    class="form-control" name="employer_hr_email" id="employer_hr_email" value="{{$hrData->employer_hr_email}}">

                            </div>


                            <div class="form-group text-right">
                                <button class="btn btn-success" type="submit"><i class="fas fa-check"></i> Save</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="general" role="tabpanel" aria-labelledby="general-tab">

                        <form action="{{ route('profile.store')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="site-title" class="form-control-label">Company Name</label>
                                        <input type="text" name="company_name" class="form-control" value="{{$profile->company_name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="site-description" class="form-control-label">Physical Address</label>

                                        <input type="text"
                                            class="form-control" name="location" id="" value="{{$profile->location}}">

                                    </div>
                                    <div class="form-group">
                                        <label for="site-description" class="form-control-label">Website (optional)</label>

                                        <input type="text" class="form-control" name="website" id="" value="{{$profile->website}}">

                                    </div>
                                    <div class="form-group">
                                        <label for="site-description" class="form-control-label">Postal Address</label>

                                        <input type="text" class="form-control" name="postal_address" id="" value="{{$profile->postal_address}}">

                                    </div>
                                    <div class="form-group">
                                    <label for="">Company Description</label>
                                    <textarea class="form-control" name="company_description" id="" rows="3">{{$profile->company_description}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="site-description" class="form-control-label">Years in service </label>

                                        <input type="text" class="form-control" name="year_in_service" id="" value="{{$profile->year_in_service}}">

                                    </div>

                                    <div class="form-group">
                                        <label for="">Professional groups</label>
                                        <textarea class="form-control" name="professional_group" id="professional_gro" rows="3">{{$profile->professional_group}}</textarea>
                                    </div>
                                    <div class="form-group text-right">
                                        <button class="btn btn-success" type="submit"><i class="fas fa-check"></i> Save</button>
                                    </div>
                                </div>


                            </div>

                        </form>

                </div>

            </div>
        </div>
    </div>

</div>

@endsection

@section('jsblock')
<script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    {{-- <script src="{{asset('backend/assets/js/dashboard-charts.js')}}"></script> --}}
<script>
       CKEDITOR.replace( 'professional_gro' );
</script>
@endsection

