@extends('Backend.Employer.layouts.auth')

@section('title',"Employer-Dasboard")
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <div class="page-pretitle">Overview</div>
            <h2 class="page-title">Dashboard</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="icon-big text-center">
                                <i class="teal  fas fa-home"></i>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <a href="{{route('job.application')}}">
                            <div class="detail">
                                <p class="detail-subtitle">Go Home</p>
                                <span class="number">Home Page</span>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="footer">
                        <hr />
                        <div class="stats">
                            <i class="fas fa-calendar"></i> For this Site
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
                                <i class="olive fas fa-money-bill-alt"></i>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="detail">
                                <p class="detail-subtitle">Posted Job</p>
                                <span class="number">{{ $jCount }} </span>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <hr />
                        <div class="stats">
                            <i class="fas fa-calendar"></i> For this Month
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
                                <i class="orange fas fa-envelope"></i>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="detail">
                                <p class="detail-subtitle">Support</p>
                                <span class="number">24 Hrs</span>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <hr />
                        <div class="stats">
                            <i class="fas fa-envelope-open-text"></i> For this week
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
                                <i class="olive fas fa-user"></i>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <a href="{{route('job.application')}}">
                                <div class="detail">
                                    <p class="detail-subtitle">Job Application</p>
                                    <span class="number">{{$AppUserID}}</span>
                                </div>
                            </a>

                        </div>
                    </div>
                    <div class="footer">
                        <hr />
                        <div class="stats">
                            <i class="fas fa-envelope-open-text"></i> For this system
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection



