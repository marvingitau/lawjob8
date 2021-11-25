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

                {{-- <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                     candidate {{ auth()->user() }}
                        {{  Auth::guard()->user() }}
                    </div>
                </div> --}}

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
    </div>
    @endsection
