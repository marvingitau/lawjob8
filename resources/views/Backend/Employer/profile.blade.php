
@extends('Backend.Employer.layouts.auth')

@section('title',"Profile Creation")
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <div class="page-pretitle">Profile</div>
        </div>
    </div>
    @if (!empty($profile))
    <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="icon-big text-center">
                                <i class="teal fas fa-building"></i>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="detail">
                                <p class="detail-subtitle">Company Name</p>
                                <span class="number">{{ $profile->company_name }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="icon-big text-center">
                                <i class="teal fas fa-box"></i>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="detail">
                                <p class="detail-subtitle">PO Box</p>
                                <span class="number">{{ $profile->postal_address }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="icon-big text-center">
                                <i class="teal fas fa-map-marker-alt"></i>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="detail">
                                <p class="detail-subtitle">Company location</p>
                                <span class="number">{{ $profile->location }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="icon-big text-center">
                                <i class="teal fas fa-globe-africa"></i>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="detail">
                                <p class="detail-subtitle">Website</p>
                                <span class="number">{{ $profile->website }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
         <div class="col-sm-6 col-md-6 col-lg-6 mt-3">
             <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="icon-big text-center">
                                <i class="teal  fas fa-envelope-open-text"></i>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="detail">
                                <p class="detail-subtitle">Company Description</p>
                                <span class="number">{{ $profile->company_description}}</span>
                            </div>
                        </div>
                    </div>

                </div>
             </div>
         </div>




    </div>
    @else
    <div class="row">
        <div class="col-md-4 offset-md-2">
            <h3>No Data</h3>
        </div>
    </div>
    @endif

    <div class="row">
        <div class="col-md-12 page-header">
            <div class="page-pretitle">HR Profile</div>
        </div>
    </div>
    @if (!empty($hrData))
    <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="icon-big text-center">
                                <i class="teal fab fa-creative-commons-by"></i>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="detail">
                                <p class="detail-subtitle">HR Name</p>
                                <span class="number">{{ $hrData->employer_hr_name }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="icon-big text-center">
                                <i class="teal fa fa-at"></i>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="detail">
                                <p class="detail-subtitle">HR Address</p>
                                <span class="number">{{ $hrData->employer_hr_email }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-md-4 offset-md-2">
            <h3>No Data</h3>
        </div>
    </div>
    @endif


</div>

@endsection

@section('jsblock')

    {{-- <script src="{{asset('backend/assets/js/dashboard-charts.js')}}"></script> --}}
@endsection

