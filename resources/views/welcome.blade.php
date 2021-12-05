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
                    <form action="{{url('search')}}" method="POST" class="form row">
                        @csrf
                        <div class="col-lg-5">
                            <div class="form-group mb-3">
                            <div class="d-flex">
                                <label class="form-label">What</label>
                                <span class="ms-auto">e.g. Job title</span>
                            </div>
                            <div class="position-relative left-icon">
                                <input type="text" class="form-control" name="job_title" placeholder="Job title">
                                <i class="fas fa-search"></i>
                            </div>
                            </div>
                        </div>
                        {{-- <div class="col-lg-2">
                            <div class="form-group mb-3">
                            <div class="d-flex">
                                <label class="form-label">What</label>
                                <span class="ms-auto">e.g. Company </span>
                            </div>
                            <div class="position-relative left-icon">
                                <input type="text" class="form-control" name="job_company" placeholder="Company">
                                <i class="fas fa-search"></i>
                            </div>
                            </div>
                        </div> --}}

                        <div class="col-lg-5">
                            <div class="form-group mb-3">
                            <div class="d-flex">
                                <label class="form-label">Where</label>
                                <span class="ms-auto">e.g. city, county</span>
                            </div>
                            <div class="position-relative left-icon">
                                <div class="form-group">
                                  {{-- <label for="city"></label> --}}
                                  <select class="form-control" name="city" id="city" style="padding-left: 40px;
                                  height: 60px;
                                  -webkit-box-shadow: none;
                                  box-shadow: none;
                                  border: none;">
                                      <?php
                                      $cities=\App\Models\Admin\JobAttributs::getAttr('city')
                                      ?>
                                      @if ($cities)
                                      @foreach ($cities as $item)
                                        <option value="{{$item['id']}}">{{  $item['name']}}</option>
                                      @endforeach
                                      @else
                                      <option>N/A</option>
                                      @endif


                                  </select>
                                </div>
                                {{-- <input type="text" class="form-control location-input" name="job_location" placeholder="Location"> --}}
                                <i class="far fa-compass"></i>
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


    <!--=================================
    Category-style -->
    <section class="space-ptb">
        <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 mb-4 mb-lg-0">
            <div class="section-title">
                <h2 class="title">Choose your sector</h2>
                <p class="mb-0">I truly believe Augustine’s words are true and if you look at history you know it is true.</p>
            </div>
            <a class="btn btn-outline btn-lg" href="{{url('joblist')}}">View More Jobs</a>
            </div>
            <div class="col-lg-9 mt-0 mt-md-3 mt-lg-0">
            <div class="category-style text-center">
                {{-- <form action="{{route('jobSearchCat')}}" method="GET" style="width: 100%;
                display: flex;"> --}}
                    @csrf
                    @if ($jobCat)
                    @foreach ($jobCat as $item)
                        <?php
                        $jbCount=\App\Models\Employer\JobPostings::where('job_category',$item['id'])->count();
                        $icon=!is_null(\App\Models\Icons::where('job_cat',$item['id'])->first())?\App\Models\Icons::where('job_cat',$item['id'])->first()->icon:'balance'

                        ?>
                        {{-- <input type="hidden" name="job_category" value="{{$item['id']}}"> --}}
                        <a href="{{route('jobSearchCat',$item['id'])}}" class="category-item">
                        <div class="category-icon mb-4">
                            <i class="flaticon-{{$icon}}"></i>
                        </div>
                        <h6>{{$item['name']}}</h6>
                        <span class="mb-0">
                            {{$jbCount}} Open Position </span>
                        </a>
                    @endforeach
                    @endif

                {{-- </form> --}}

                {{-- <a href="#" class="category-item">
                <div class="category-icon mb-4">
                    <i class="flaticon-account"></i>
                </div>
                <h6>Criminal Law</h6>
                <span class="mb-0">301 Open Position </span>
                </a> --}}
                {{-- <a href="#" class="category-item">
                <div class="category-icon mb-4">
                    <i class="flaticon-conversation"></i>
                </div>
                <h6>Corporate Law</h6>
                <span class="mb-0">287 Open Position </span>
                </a>
                <a href="#" class="category-item">
                <div class="category-icon mb-4">
                    <i class="flaticon-money"></i>
                </div>
                <h6>International Law</h6>
                <span class="mb-0">542 Open Position </span>
                </a>
                <a href="#" class="category-item">
                <div class="category-icon mb-4">
                    <i class="flaticon-mortarboard"></i>
                </div>
                <h6>Commercial Law</h6>
                <span class="mb-0">785 Open Position </span>
                </a>
                <a href="#" class="category-item">
                <div class="category-icon mb-4">
                    <i class="flaticon-worker"></i>
                </div>
                <h6>Family Law</h6>
                <span class="mb-0">862 Open Position </span>
                </a>
                <a href="#" class="category-item">
                <div class="category-icon mb-4">
                    <i class="flaticon-businessman"></i>
                </div>
                <h6>Constitutional Law</h6>
                <span class="mb-0">423 Open Position </span>
                </a>
                <a href="#" class="category-item">
                <div class="category-icon mb-4">
                    <i class="flaticon-coding"></i>
                </div>
                <h6>Labor Law</h6>
                <span class="mb-0">253 Open Position </span>
                </a>
                <a href="#" class="category-item">
                <div class="category-icon mb-4">
                    <i class="flaticon-balance"></i>
                </div>
                <h6>Intellectual Property Law</h6>
                <span class="mb-0">689 Open Position </span>
                </a> --}}
            </div>
            </div>
        </div>
        </div>
    </section>
    <!--=================================
    Category-style -->

<!--=================================
Divider -->
<div class="container ">
    <div class="row">
      <div class="col-12">
        <hr class="m-0">
      </div>
    </div>
  </div>
  <!--=================================
  Divider -->


  <!--===============================


  Candidates & Companies -->
  <section class="space-pb">
    <div class="container">
      <div class="row">
        <!-- Featured Candidates -->
        <div class="col-lg-7 mb-4 mb-lg-0">
          <div class="section-title">
            <h2 class="title">Featured Candidates</h2>
            <p>We know this in our gut, but what can we do about it? How can we motivate ourselves?</p>
          </div>
          <div class="candidate-list">
            <div class="candidate-list-image">
              <img class="img-fluid" src="images/avatar/04.jpg" alt="" >
            </div>
            <div class="candidate-list-details">
              <div class="candidate-list-info">
                <div class="candidate-list-title">
                  <h5 class="mb-0"><a href="#">Walter Kibet</a></h5>
                </div>
                <div class="candidate-list-option">
                  <ul class="list-unstyled">
                    <li><i class="fas fa-filter pe-1"></i>Project Manager</li>
                    <li><i class="fas fa-map-marker-alt pe-1"></i>Nairobi, Kenya</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="candidate-list-favourite-time">
              <a class="candidate-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
              <span class="candidate-list-time order-1"><i class="far fa-clock pe-1"></i>6D ago</span>
            </div>
          </div>
          <div class="candidate-list">
            <div class="candidate-list-image">
              <img class="img-fluid" src="images/avatar/01.jpg" alt="" >
            </div>
            <div class="candidate-list-details">
              <div class="candidate-list-info">
                <div class="candidate-list-title">
                  <h5 class="mb-0"><a href="candidate-detail.html">Kevin Owino</a></h5>
                </div>
                <div class="candidate-list-option">
                  <ul class="list-unstyled">
                    <li><i class="fas fa-filter pe-1"></i>Web Designer</li>
                    <li><i class="fas fa-map-marker-alt pe-1"></i>Kiembeni, Mombasa</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="candidate-list-favourite-time">
              <a class="candidate-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
              <span class="candidate-list-time order-1"><i class="far fa-clock pe-1"></i>3D ago</span>
            </div>
          </div>
          <div class="candidate-list">
            <div class="candidate-list-image">
              <img class="img-fluid" src="images/avatar/05.jpg" alt="" >
            </div>
            <div class="candidate-list-details">
              <div class="candidate-list-info">
                <div class="candidate-list-title">
                  <h5 class="mb-0"><a href="candidate-detail.html">Mary Wambui</a></h5>
                </div>
                <div class="candidate-list-option">
                  <ul class="list-unstyled">
                    <li><i class="fas fa-filter pe-1"></i>Marketer</li>
                    <li><i class="fas fa-map-marker-alt pe-1"></i>Nairobi, Kenya</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="candidate-list-favourite-time">
              <a class="candidate-list-favourite order-2" href="#"><i class="far fa-heart"></i></a>
              <span class="candidate-list-time order-1"><i class="far fa-clock pe-1"></i>2D ago</span>
            </div>
          </div>
        </div>
        <div class="col-lg-1"></div>
        <!-- Top Companies -->
        <div class="col-lg-4">
          <div class="section-title">
            <h2 class="title">Top Companies</h2>
            <p>Here are some tips and methods for motivating yourself:</p>
          </div>
          <div class="owl-carousel owl-nav-bottom-center" data-nav-arrow="false" data-nav-dots="true" data-items="1" data-md-items="1" data-sm-items="2" data-xs-items="1" data-xx-items="1" data-space="15" data-autoheight="true">
            <div class="item">
              <div class="employers-grid">
                <div class="employers-list-logo">
                  <img class="img-fluid" src="images/svg/09.svg" alt="">
                </div>
                <div class="employers-list-details">
                  <div class="employers-list-info">
                    <div class="employers-list-title">
                      <h5 class="mb-0"><a href="employer-detail.html">Bright Sparks PLC</a></h5>
                    </div>
                    <div class="employers-list-option">
                      <ul class="list-unstyled">
                        <li><i class="fas fa-map-marker-alt pe-1"></i>Botchergate, Carlisle</li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="employers-list-position">
                  <a class="btn btn-sm btn-dark" href="#">17 Open position</a>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="employers-grid">
                <div class="employers-list-logo">
                  <img class="img-fluid" src="images/svg/10.svg" alt="">
                </div>
                <div class="employers-list-details">
                  <div class="employers-list-info">
                    <div class="employers-list-title">
                      <h5 class="mb-0"><a href="employer-detail.html">Fleet Improvements Pvt</a></h5>
                    </div>
                    <div class="employers-list-option">
                      <ul class="list-unstyled">
                        <li><i class="fas fa-map-marker-alt pe-1"></i>Green Lanes, London</li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="employers-list-position">
                  <a class="btn btn-sm btn-dark" href="#">20 Open position</a>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="employers-grid">
                <div class="employers-list-logo">
                  <img class="img-fluid" src="images/svg/08.svg" alt="">
                </div>
                <div class="employers-list-details">
                  <div class="employers-list-info">
                    <div class="employers-list-title">
                      <h5 class="mb-0"><a href="employer-detail.html">Suttons Financial Ltd</a></h5>
                    </div>
                    <div class="employers-list-option">
                      <ul class="list-unstyled">
                        <li><i class="fas fa-map-marker-alt pe-1"></i>Paris, Île-de-France</li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="employers-list-position">
                  <a class="btn btn-sm btn-dark" href="#">23 Open position</a>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="employers-grid">
                <div class="employers-list-logo">
                  <img class="img-fluid" src="images/svg/19.svg" alt="">
                </div>
                <div class="employers-list-details">
                  <div class="employers-list-info">
                    <div class="employers-list-title">
                      <h5 class="mb-0"><a href="employer-detail.html">Co-operative Funeralcare</a></h5>
                    </div>
                    <div class="employers-list-option">
                      <ul class="list-unstyled">
                        <li><i class="fas fa-map-marker-alt pe-1"></i>Lynch Lane, Weymouth</li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="employers-list-position">
                  <a class="btn btn-sm btn-dark" href="#">30 Open position</a>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="employers-grid">
                <div class="employers-list-logo">
                  <img class="img-fluid" src="images/svg/06.svg" alt="">
                </div>
                <div class="employers-list-details">
                  <div class="employers-list-info">
                    <div class="employers-list-title">
                      <h5 class="mb-0"><a href="employer-detail.html">Altenwerth and Hamill</a></h5>
                    </div>
                    <div class="employers-list-option">
                      <ul class="list-unstyled">
                        <li><i class="fas fa-map-marker-alt pe-1"></i>Taunton, London</li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="employers-list-position">
                  <a class="btn btn-sm btn-dark" href="#">35 Open position</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=================================
  Candidates & Companies -->

  <!--=================================
  Easiest Way to Use -->
  <section class="space-pb">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
          <div class="section-title center">
            <h2 class="title">Easiest Way to Use</h2>
            <p>Give yourself the power of responsibility. Remind yourself the only thing stopping you is yourself.</p>
          </div>
        </div>
      </div>
      <div class="row bg-holder-pattern mt-3 mt-md-4 me-md-0 ms-md-0" style="background-image: url('images/step/pattern-01.png');">
        <div class="col-md-4 mb-4 mb-md-0">
          <div class="feature-step text-center">
            <div class="feature-info-icon">
              <i class="flaticon-resume"></i>
            </div>
            <div class="feature-info-content pb-2 pb-md-0">
              <h5>Create Account</h5>
              <p class="mb-0">Create an account and access your saved settings on any device.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4 mb-md-0">
          <div class="feature-step text-center">
            <div class="feature-info-icon">
              <i class="flaticon-recruitment"></i>
            </div>
            <div class="feature-info-content pb-2 pb-md-0">
              <h5>Find Your Vacancy</h5>
              <p class="mb-0">Don't just find. Be found. Put your CV in front of great employers.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-0">
          <div class="feature-step text-center">
            <div class="feature-info-icon">
              <i class="flaticon-position"></i>
            </div>
            <div class="feature-info-content pb-2 pb-md-0">
              <h5>Get A Job</h5>
              <p class="mb-0">Your next career move starts here. Choose Job from thousands of companies</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=================================
  Easiest Way to Use -->

  <!--=================================
  Feature-info -->
  <section class="space-pb">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 mb-lg-0 mb-4">
          <div class="feature-info feature-info-02 p-4 p-md-5 bg-primary">
            <div class="feature-info-icon mb-3 text-dark">
              <i class="flaticon-team"></i>
            </div>
            <div class="feature-info-content ps-sm-4 ps-0">
              <h5 class="text-white">Looking For Job?</h5>
              <p class="text-white">Your next role could be with one of these top leading organizations.</p>
              <a href="{{ url('/joblist')}}">Apply now<i class="fas fa-long-arrow-alt-right"></i> </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="feature-info feature-info-02 p-4 p-md-5 bg-dark">
            <div class="feature-info-icon mb-3 text-primary">
              <i class="flaticon-job-3"></i>
            </div>
            <div class="feature-info-content ps-sm-4 ps-0">
              <h5 class="text-white">Are You Recruiting?</h5>
              <p class="text-white">Register.</p>
              <a href="{{ url('/register')}}">Post a job<i class="fas fa-long-arrow-alt-right"></i> </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=================================
  Feature-info -->

  <!--=================================
  Plans&and Packages -->
  <section class="space-pb">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-4 col-xl-3 mb-2 mb-md-4 mb-lg-0">
          <div class="section-title">
            <h2 class="title">Buy Our Plans and Packages</h2>
            <p>So, make the decision to move forward. Commit your decision to paper, just to bring it into focus. Then, go for it!</p>
          </div>
          <a class="btn btn-outline btn-lg" href="#">Try 1 month free</a>
        </div>
        <div class="col-lg-8 col-xl-9 pt-0 pt-md-3 pt-lg-0">
          <div class="row g-0">
            <div class="col-md-4 text-center">
              <div class="pricing-plan">
                <div class="pricing-price">
                  <span><sup>Ksh</sup><strong>0</strong>/month</span>
                  <h5 class="pricing-title">Free Forever</h5>
                </div>
                <ul class="list-unstyled pricing-list">
                  <li>Appear in general results</li>
                  <li>Accept mobile app </li>
                  <li>Manage candidates directly from your account</li>
                </ul>
                <a class="btn btn-outline" href="#">Post a Job</a>
              </div>
            </div>
            <div class="col-md-4 text-center">
              <div class="pricing-plan active">
                <div class="pricing-price">
                  <span><sup>Ksh</sup><strong>1100</strong>/day</span>
                  <h5 class="pricing-title">Sponsor Jobs</h5>
                </div>
                <ul class="list-unstyled pricing-list">
                  <li>Premium placement</li>
                  <li>PPC on your Job</li>
                  <li>Reach more candidates</li>
                  <li>Desktop, mobile and Job Alerts</li>
                </ul>
                <a class="btn btn-outline" href="#">Get Started</a>
              </div>
            </div>
            <div class="col-md-4 text-center">
              <div class="pricing-plan mb-0 mb-md-3">
                <div class="pricing-price">
                  <span><sup>Ksh</sup><strong>20000</strong>/month</span>
                  <h5 class="pricing-title">Premium Plan</h5>
                </div>
                <ul class="list-unstyled pricing-list">
                  <li>Job ad live for six-weeks</li>
                  <li>50 Feature Jobs </li>
                  <li>Premium placement </li>
                  <li>Desktop, mobile and Job Alerts</li>
                </ul>
                <a class="btn btn-outline" href="#">Select Plan</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=================================
  Plans&and Packages -->

  <!--=================================
  Why You Choose Job Among Other Job Site -->
  <section class="space-pb">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 mb-4 mb-md-5 mb-lg-0 pe-lg-5">
          <div class="row">
            <div class="col-sm-7">
              <img class="img-fluid w-100" src="images/new-images/tingey-injury-law-firm-L4YGuSg0fxs-unsplash.jpg" alt="">
            </div>
            <div class="col-sm-5 mt-sm-5 mt-9">
              <img class="img-fluid mb-sm-2 w-1002" margin-top:5px src="images/new-images/pexels-sora-shimazaki-5668777.jpg" alt="">
              <!--<div class=" mt-3">
                <a class="popup-icon popup-youtube bg-holder bg-overlay-black-80" href="https://www.youtube.com/watch?v=LgvseYYhqU0">
                  <i class="flaticon-play-button"></i>
                  <img class="img-fluid w-100" src="images/about/03.png" alt="">
                </a>
              </div>-->
            </div>
          </div>
        </div>
        <div class="col-lg-6 pt-2 pt-sm-3 pt-md-0">
          <div class="section-title">
            <h2 class="title">Why You Choose Job Among Other Job Site?</h2>
            <p>I truly believe Augustine’s words are true and if you look at history you know it is true. There are many people in the world with amazing talents. who realize only a small percentage of their potential. We all know people who live this truth.</p>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="d-flex mb-lg-5 mb-4">
                <i class="font-xlll text-primary flaticon-team"></i>
                <h6 class="ps-3 align-self-center mb-0">Best talented people</h6>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="d-flex mb-lg-5 mb-4">
                <i class="font-xlll text-primary flaticon-job-3"></i>
                <h6 class="ps-3 align-self-center mb-0">Easy to find candidate</h6>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="d-flex mb-md-0 mb-4">
                <i class="font-xlll text-primary flaticon-chat"></i>
                <h6 class="ps-3 align-self-center mb-0">Easy to communicate</h6>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="d-flex">
                <i class="font-xlll text-primary flaticon-job-2"></i>
                <h6 class="ps-3 align-self-center mb-0">Countrywide recruitment option</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection

