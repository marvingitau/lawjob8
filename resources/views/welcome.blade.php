@extends('layout.public')
@section('content')
    <!--=================================
    Banner -->
    <section class="banner bg-holder bg-overlay-black-30 text-white" style="background-image: url(images/bg/indexPage.jpg);">
        <div class="container">
            <div class="row">
            <div class="col-12 text-center position-relative">
                <h1 class="text-white mb-3">Drop <span class="text-primary"> Resume & Get </span> Your Desired Job</h1>
                <p class="lead mb-4 mb-lg-5 fw-normal">Find Jobs, Employment & Career Opportunities</p>
                <div class="job-search-field">
                <div class="job-search-item">
                    <form class="form row">
                    <div class="col-lg-5">
                        <div class="form-group mb-3">
                        <div class="d-flex">
                            <label class="form-label">What</label>
                            <span class="ms-auto">e.g. job, company, title</span>
                        </div>
                        <div class="position-relative left-icon">
                            <input type="text" class="form-control" name="job_title" placeholder="Job title, skill or company">
                            <i class="fas fa-search"></i>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group mb-3">
                        <div class="d-flex">
                            <label class="form-label">Where</label>
                            <span class="ms-auto">e.g. city, county or postcode</span>
                        </div>
                        <div class="position-relative left-icon">
                            <input type="text" class="form-control location-input" name="job_title" placeholder="Town, city or postcode">
                            <i class="far fa-compass"></i>
                            <a href="#">
                            <div class="detect">
                                <span class="d-none d-sm-block">Detect</span>
                                <i class="fas fa-crosshairs"></i>
                            </div>
                            </a>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-12">
                        <div class="form-group mb-3 form-action">
                        <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-search"></i> Find Jobs</button>
                        </div>
                    </div>
                    </form>
                </div>
                </div>
                <div class="job-tag mt-4">
                <ul class="justify-content-center">
                    <li class="text-primary">Trending Keywords :</li>
                    <li><a href="#">Automotive,</a></li>
                    <li><a href="#">Education,</a></li>
                    <li><a href="#">Health and Care Engineering</a></li>
                </ul>
                </div>
            </div>
            </div>
        </div>
    </section>
    <!--=================================
    Banner -->
@endsection

