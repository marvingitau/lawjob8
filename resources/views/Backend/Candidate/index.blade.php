    @extends('Backend.Candidate.layouts.auth')
    @section('title', 'Dashboard')

    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

            @if(Session::has('message'))
                <div class="alert alert-success text-center" role="alert" >
                    {{Session::get('message')}}
                </div>
            @endif
            @if (count($errors) > 0)
            <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            </div>
            @endif





                {{-- <div class="card mt-4">

                    <div class="card-body d-none">
                        <form action="{{ route('aboutme.create') }}" method="post">
                            @csrf
                            <div class="form-group">
                              <label for="">About Me Testing Rln</label>
                              <textarea class="form-control" name="description" id="" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div> --}}

                 {{-- <div class="card mt-4">

                    <h5 class="card-title ml-4 mt-2">Work Experience Testing Rln</h5>
                    <div class="card-body d-none">
                        <form action="{{ route('experience.create') }}" method="post">
                            @csrf

                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="i-have-no-experience" id="" value="checkedValue">
                                I have no work experience
                              </label>
                            </div>

                            <div class="form-group">
                              <label for="">Employer</label>
                              <input type="text"
                                class="form-control" name="employer" id="" aria-describedby="helpId" placeholder="">
                            </div>

                            <div class="form-group">
                              <label for="">Job title</label>
                              <input type="text"
                                class="form-control" name="job_title" id="" aria-describedby="helpId" placeholder="">

                            </div>

                            <div class="form-group">
                              <label for="">Job Level</label>
                              <select class="form-control" name="job_level" id="">
                                <option value="">Select Type</option>
                                <option value="1">Granduate Trainee</option>
                                <option value="2">Volunteer/Internship</option>
                                <option value="3">Entry Level</option>
                                <option value="5">Mid  Level</option>
                                <option value="6">Senior Level</option>
                                <option value="7">Management Level</option>
                                <option value="8">Excutive Level</option>
                              </select>
                            </div>

                            <div class="form-group">
                              <label for="">Country</label>
                              <select class="form-control" name="country" id=""
                                    onfocus='this.size=10;'
                                    onblur='this.size=1;'
                                    onchange='this.size=1; this.blur();'
                                >
                                <option value="1">Kenya</option>
                                <option value="2">Albania</option>
                                <option value="3">Algeria</option>
                                <option value="4">American Samoa</option>

                              </select>
                            </div>

                            <div class="form-group">
                              <label for="">Monthly Salary</label>
                              <select class="form-control" name="monthly_salary" id="">
                                <option value="">Select Type</option>
                                <option value="1">Less Than 15000</option>
                                <option value="2">15000-30000</option>
                                <option value="3">30000-60000</option>
                              </select>
                            </div>

                            <div class="form-group">
                              <label for="">Work Type</label>
                              <select class="form-control" name="work_type" id="">
                                <option value="">Select Type</option>
                                <option value="1">Contract</option>
                                <option value="2">Full Time</option>
                                <option value="3">Internship & Graduate</option>
                                <option value="4">Part Time</option>
                              </select>
                            </div>

                            <div class="form-group">
                             <h5>start at</h5>
                              <label for="">Month</label>
                              <select class="form-control" name="start_month" id="">
                                <option value="">Select Type</option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">Martch</option>
                              </select>
                              <label for="">Year</label>
                              <select class="form-control" name="start_year" id="">
                                <option value="">Select Type</option>
                                <option value="1">2000</option>
                                <option value="2">2001</option>
                                <option value="3"> 2002</option>
                              </select>
                            </div>

                            <div class="form-group">
                             <h5>end at</h5>
                              <label for="">Month</label>
                              <select class="form-control" name="end_month" id="">
                                <option value="">Select Type</option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">Martch</option>
                              </select>
                              <label for="">Year</label>
                              <select class="form-control" name="end_year" id="">
                                <option value="">Select Type</option>
                                <option value="1">2000</option>
                                <option value="2">2001</option>
                                <option value="3"> 2002</option>
                              </select>
                            </div>

                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="is_current" id="" value="checkedValue" >
                                I currently work here
                              </label>
                            </div>


                            <div class="form-group">
                             <label for="">Job Responsibilities</label>
                              <textarea class="form-control" name="job_responsibility" id="" rows="3"></textarea>
                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div> --}}


                {{-- <div class="card mt-4">
                    <h4 class="card-title">Education Testing Rln</h4>
                    <div class="card-body  d-none">

                        <form action="{{ route('education.create') }}" method="POST">
                            @csrf
                            <div class="form-group">
                            <label for="">Name of Educational Institution/School/etc.</label>
                            <input type="text"
                                class="form-control" name="institution" id="" aria-describedby="helpId" placeholder="" value="{{ old('institution') }}">
                            </div>

                            <div class="form-group">
                              <label for="">Minimum Qualification</label>
                              <select class="form-control" name="qualification_level_id" id="qualification_level_id">
                                <option>Choose Option</option>
                                <option value="1">Phd</option>
                                <option value="2">HighSchool</option>
                                <option value="3">College</option>
                              </select>
                            </div>



                            <div class="form-group">
                             <h5>start at</h5>
                              <label for="">Month</label>
                              <select class="form-control" name="start_month" id="">
                                <option value="">Select Type</option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">Martch</option>
                              </select>
                              <label for="">Year</label>
                              <select class="form-control" name="start_year" id="">
                                <option value="">Select Type</option>
                                <option value="1">2000</option>
                                <option value="2">2001</option>
                                <option value="3"> 2002</option>
                              </select>
                            </div>

                            <div class="form-group">
                             <h5>end at</h5>
                              <label for="">Month</label>
                              <select class="form-control" name="end_month" id="">
                                <option value="">Select Type</option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">Martch</option>
                              </select>
                              <label for="">Year</label>
                              <select class="form-control" name="end_year" id="">
                                <option value="">Select Type</option>
                                <option value="1">2000</option>
                                <option value="2">2001</option>
                                <option value="3"> 2002</option>
                              </select>
                            </div>

                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="is_current" id="" value="checkedValue" >
                                am currently studing
                              </label>
                            </div>


                            <div class="form-group">
                             <label for="">Description</label>
                              <textarea class="form-control" name="description" id="" rows="3"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>

                        </form>


                    </div>
                </div> --}}

{{--
                <div class="card mt-4">
                    <h4 class="card-title">Job Skills Test</h4>
                    <div class="card-body d-none">
                        <form action="{{ route('skill.create')}}" method="POST">
                            @csrf
                            <div class="form-group">
                              <label for="">Skill</label>
                              <input type="text"
                                class="form-control" name="name" id="job-seeker-skills-title" aria-describedby="helpId" placeholder="">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div> --}}

                {{-- Add Certificate or Award  --}}
{{--
                <div class="card mt-4">
                    <h4 class="card-title">Add Certificate or Award Test</h4>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                              <label for="">Title</label>
                              <input type="text"
                                class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Human Resource">
                            </div>

                            <div class="form-group">
                              <label for="">Type</label>
                              <select class="form-control" name="type" id="type">
                                <option>Choose</option>
                                <option value="award">Award</option>
                                <option value="certificate">Certificate</option>
                              </select>
                            </div>

                            <div class="form-group">
                              <label for="">Year</label>
                              <select class="form-control" name="year" id="year">
                                <option>Choose</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                              </select>
                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div> --}}

                {{-- CV  --}}

                {{-- <div class="card mt-4">
                        <h4 class="card-title">CV test</h4>

                    <div class="card-body d-none">
                        <form action="{{ route('resume.create') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                              <label for="">Name</label>
                              <input type="text"
                                class="form-control" name="resume_name" id="" aria-describedby="helpId" placeholder="" required>
                              <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>

                            <div class="form-group">
                              <input type="file" class="form-control-file" name="resume_file" id="file-upload-input" placeholder="" aria-describedby="fileHelpId" required>

                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div> --}}
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
                                <div class="detail">
                                    <a href="{{url('/')}}" target="_self" rel="noopener noreferrer">
                                    <p class="detail-subtitle">Go Home</p>
                                    <span class="number">Home Page</span>
                                </a>
                                </div>
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
                                    <i class="orange fas fa-user"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="detail">
                                    <p class="detail-subtitle">Profile Created</p>
                                    @if ($user_profile_exists>0)
                                    <span class="number">YES</span>
                                    @else
                                    <span class="number text-danger"> <b>NO</b> </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <i class="fas fa-envelope-open-text"></i> For the system
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
                                    <i class="indigo fas fa-shopping-cart"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <a href="{{route('candidate.view.cart')}}" target="_self" rel="noopener noreferrer">
                                <div class="detail">
                                    <p class="detail-subtitle">Access cart</p>
                                    <span class="number">Cart Access</span>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <i class="fas fa-envelope-open-text"></i> For this site
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
                                    <i class="olive fas fa-briefcase"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <a href="{{route('candidate.view.cart')}}" target="_self" rel="noopener noreferrer">
                                <div class="detail">
                                    <p class="detail-subtitle">Applied Jobs</p>
                                    <span class="number">{{$appliedAmount}}</span>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <i class="fas fa-envelope-open-text"></i> For this site
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
                                    <i class="violet fas fa-user-cog"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <a href="{{route('candidate.settings')}}">
                                    <div class="detail">
                                        <p class="detail-subtitle">Settings</p>
                                        <span class="number">Account</span>
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

            <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="icon-big text-center">
                                    <i class="violet fas fa-user-plus"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <a href="{{route('candidate.profile.create')}}">
                                    <div class="detail">
                                        <p class="detail-subtitle">Profile</p>
                                        <span class="number">Create</span>
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

            <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="icon-big text-center">
                                    <i class="violet fas fa-user-check"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <a href="{{route('candidate.profile')}}">
                                    <div class="detail">
                                        <p class="detail-subtitle">Profile</p>
                                        <span class="number">Update</span>
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

            <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="icon-big text-center">
                                    <i class="orange fas fa-mail-bulk"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <a href="{{route('backend.job.list')}}">
                                    <div class="detail">
                                        <p class="detail-subtitle">Apply</p>
                                        <span class="number">Job</span>
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

            <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="icon-big text-center">
                                    <i class="teal fas fa-credit-card"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <a href="{{route('candidate.order.forms')}}">
                                    <div class="detail">
                                        <p class="detail-subtitle">Create</p>
                                        <span class="number">Credit</span>
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
