@extends('Backend.Candidate.layouts.auth')
@section('title', 'Dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(Session::has('message'))
                <div class="alert alert-success text-center" role="alert" >
                    {{Session::get('message')}}
                </div>
            @endif
            @if(Session::has('file'))
                <div class="alert alert-success text-center" role="alert" >
                    {{Session::get('file')}}
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
            {{-- Content Section --}}
            {{-- Bread Crump --}}
            <nav class="breadcrumb">
                <a class="breadcrumb-item" href="{{route('candidate.dashboard')}}">Home</a>
                <a class="breadcrumb-item" href="{{route('candidate.profile.create')}}">Profile-Create</a>
                <span class="breadcrumb-item active"></span>
            </nav>
            {{-- End Bread Crump --}}

            {{-- Form --}}
            <form action="{{route('candidate.profile.store')}}" method="post" id="prof-steps" enctype="multipart/form-data">
                @csrf
                <h3>PERSONAL INFORMATION</h3>
                <section class="cat-app-row">

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="fname">First Name</label>
                              <input type="text"
                                class="form-control" name="fname" id="fname" aria-describedby="helpId" placeholder="Firt Name" required value="{{old('fname')}}">
                            </div>

                            <div class="form-group">
                              <label for="">Phone</label>


                              <div class="d-flex">
                                <input type="text"
                                class="form-control w-25" name="" id="" aria-describedby="helpId" placeholder="+254" value="+254" disabled>

                            <input type="text"
                              class="form-control w-75" name="phone" id="phone" aria-describedby="helpId" placeholder="Enter 9 digits from +254" required>
                              </div>

                            </div>


                            <div class="form-group">
                              <label for="">Gender</label>
                              <select class="form-control" name="gender" id="gender" required>
                                <option value="male">MALE</option>
                                <option value="female">FEMALE</option>
                              </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lname">Last Name</label>
                                <input type="text"
                                  class="form-control" name="lname" id="lname" aria-describedby="helpId" placeholder="Last Name" required value="{{old('lname')}}">
                              </div>

                              <div class="form-group">
                                <label for="">DOB</label>
                                <input type="date"
                                  class="form-control" name="dob" id="dob" aria-describedby="helpId" placeholder="Date of Birth" required>
                              </div>
                        </div>


                    </div>
                </section>

                <h3>EDUCATION INFORMATION</h3>
                <section class="cat-app-row">

                    <h3 class="my-2">Higher Education</h3>
                    <div class="education-section" id="education-section">
                        <div class="row tr-increment">
                            <div class="col-md-4">
                                <div class="form-group">
                                  <label for="">School Name</label>
                                  <input type="text"
                                    class="form-control" name="institution" id="institution" aria-describedby="helpId" placeholder="Institution" required>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                      <label for="">Qualification</label>
                                      <select class="form-control" name="qualification_level_id" id="qualification_level_id" required>
                                        @php($edu_attr = \App\Models\Admin\JobAttributs::getAttr('education_qualification'))
                                        @if ($edu_attr)
                                            {{-- <option>Choose </option> --}}
                                            @foreach ($edu_attr as $jb)
                                                <option value="{{$jb['id']}}">{{$jb['name']}}</option>
                                            @endforeach
                                        @endif
                                      </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text"
                                      class="form-control" name="coursetitle" id="coursetitle" aria-describedby="helpId" placeholder="Course Name" required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                      <label for="">Start Year</label>
                                      <select class="form-control" name="start_year" id="start_year" required>
                                        <?php $y= years_menu()?>
                                        <option value=""></option>
                                        @foreach ($y as $item)
                                            <option value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                      </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Start Month</label>
                                    <select class="form-control" name="start_month" id="start_month" required>
                                        <?php $m=months_menu()?>
                                        <option value=""></option>
                                        @foreach ($m as $item)
                                            <option value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                      <label for="">End Year</label>
                                      <select class="form-control" name="end_year[]" id="end_year" required>
                                        <?php $y= years_menu()?>
                                        <option value=""></option>
                                        @foreach ($y as $item)
                                            <option value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                      </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">End Month</label>
                                    <select class="form-control" name="end_month" id="end_month">
                                        <?php $m= months_menu()?>
                                        <option value=""></option>
                                        @foreach ($m as $item)
                                            <option value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <textarea name="additional_colleges" id="additional_college" rows="10" cols="80" class="w-100" placeholder="Additional Education"></textarea>
                            </div>
                            {{-- <div class="col-md-2">
                                <div class="input-group-btn h-100">
                                    <button class="btn btn-success tr-btn-add w-100 h-100" type="button"><i class="fa fa-plus"></i> Add</button>
                                </div>
                            </div> --}}

                        </div>

                        {{-- <div class="row tr-clone hide d-none">
                            <div class="col-md-4">
                                <div class="form-group">
                                  <label for="">School Name</label>
                                  <input type="text"
                                    class="form-control" name="institution[]" id="institution" aria-describedby="helpId" placeholder="Institution" required>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                      <label for="">Qualification</label>
                                      <select class="form-control" name="qualification_level_id[]" id="qualification_level_id" required>
                                        @php($edu_attr = \App\Models\Admin\JobAttributs::getAttr('education_qualification'))
                                        @if ($edu_attr)
                                            @foreach ($edu_attr as $jb)
                                                <option value="{{$jb['id']}}">{{$jb['name']}}</option>
                                            @endforeach
                                        @endif
                                      </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text"
                                      class="form-control" name="coursetitle[]" id="coursetitle" aria-describedby="helpId" placeholder="Course Name" required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                      <label for="">Start Year</label>
                                      <select class="form-control" name="start_year[]" id="start_year" required>
                                        <?php $y= years_menu()?>
                                        @foreach ($y as $item)
                                            <option value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                      </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Start Month</label>
                                    <select class="form-control" name="start_month[]" id="start_month" required>
                                        <?php $m=months_menu()?>
                                        @foreach ($m as $item)
                                            <option value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                      <label for="">End Year</label>
                                      <select class="form-control" name="end_year[]" id="end_year" required>
                                        <?php $y= years_menu()?>
                                        <option value=""></option>
                                        @foreach ($y as $item)
                                            <option value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                      </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">End Month</label>
                                    <select class="form-control" name="end_month" id="end_month">
                                        <?php $m= months_menu()?>
                                        <option value=""></option>
                                        @foreach ($m as $item)
                                            <option value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-10">
                            </div>
                            <div class="col-md-2">
                                <div class="input-group-btn h-100">
                                    <button class="btn btn-danger tr-btn-rem w-100 h-100" type="button"><i class="fa fa-trash"></i> Remove</button>
                                </div>
                            </div>

                        </div> --}}
                    </div>

                    <h3 class="my-2">High School</h3>

                    <div class="highschool-education-section" id="highschool-education-section">
                        <div class="row tr-incremen2">
                            <div class="col-md-4">
                                <div class="form-group">
                                  <label for="">School Name</label>
                                  <input type="text"
                                    class="form-control" name="sec_institution" id="sec_institution" aria-describedby="helpId" placeholder="Institution" required>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                      <label for="">Qualification</label>
                                      <select class="form-control" name="sec_qualification_level_id" id="sec_qualification_level_id" required>
                                        @php($edu_attr = \App\Models\Admin\JobAttributs::getAttr('education_qualification'))
                                        @if ($edu_attr)

                                            @foreach ($edu_attr as $jb)
                                                <option value="{{$jb['id']}}">{{$jb['name']}}</option>
                                            @endforeach
                                        @endif
                                      </select>
                                </div>
                            </div>
                            <div class="col-md-4">

                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                      <label for="">Start Year</label>
                                      <select class="form-control" name="sec_start_year" id="sec_start_year" required>
                                        <?php $y= years_menu()?>
                                        <option></option>
                                        @foreach ($y as $item)
                                            <option value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                      </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Start Month</label>
                                    <select class="form-control" name="sec_start_month" id="sec_start_month" required>
                                        <?php $m=months_menu()?>
                                        <option></option>
                                        @foreach ($m as $item)
                                            <option value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                      <label for="">End Year</label>
                                      <select class="form-control" name="sec_end_year" id="sec_end_year" required>
                                        <?php $y= years_menu()?>
                                        <option></option>
                                        @foreach ($y as $item)
                                            <option value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                      </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">End Month</label>
                                    <select class="form-control" name="sec_end_month" id="sec_end_month" required>
                                        <?php $m= months_menu()?>
                                        <option></option>
                                        @foreach ($m as $item)
                                            <option value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <textarea name="additional_highschools" id="additional_highschool" rows="10" cols="80"  class="w-100" placeholder="Additional Education"></textarea>
                            </div>
                            {{-- <div class="col-md-2">
                                <div class="input-group-btn h-100">
                                    <button class="btn btn-success tr-btn-ad2 w-100 h-100" type="button"><i class="fa fa-plus"></i> Add</button>
                                </div>
                            </div> --}}

                        </div>

                        {{-- <div class="row tr-clon2 hide d-none">
                            <div class="col-md-4">
                                <div class="form-group">
                                  <label for="">School Name</label>
                                  <input type="text"
                                    class="form-control" name="sec_institution[]" id="sec_institution" aria-describedby="helpId" placeholder="Institution" required>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                      <label for="">KCSE Qualification</label>
                                      <select class="form-control" name="sec_qualification_level_id[]" id="sec_qualification_level_id" required>
                                        @php($edu_attr = \App\Models\Admin\JobAttributs::getAttr('education_qualification'))
                                        @if ($edu_attr)
                                            @foreach ($edu_attr as $jb)
                                                <option value="{{$jb['id']}}">{{$jb['name']}}</option>
                                            @endforeach
                                        @endif
                                      </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                      <label for="">Start Year</label>
                                      <select class="form-control" name="sec_start_year[]" id="sec_start_year" required>
                                        <?php $y= years_menu()?>
                                        @foreach ($y as $item)
                                            <option value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                      </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Start Month</label>
                                    <select class="form-control" name="sec_start_month[]" id="sec_start_month" required>
                                        <?php $m=months_menu()?>
                                        @foreach ($m as $item)
                                            <option value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                      <label for="">End Year</label>
                                      <select class="form-control" name="sec_end_year[]" id="sec_end_year" required>
                                        <?php $y= years_menu()?>
                                        <option value=""></option>
                                        @foreach ($y as $item)
                                            <option value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                      </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">End Month</label>
                                    <select class="form-control" name="sec_end_month[]" id="sec_end_month" required>
                                        <?php $m= months_menu()?>
                                        <option value=""></option>
                                        @foreach ($m as $item)
                                            <option value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-10">
                            </div>
                            <div class="col-md-2">
                                <div class="input-group-btn h-100">
                                    <button class="btn btn-danger tr-btn-re2 w-100 h-100" type="button"><i class="fa fa-trash"></i> Remove</button>
                                </div>
                            </div>

                        </div> --}}
                    </div>

                </section>

                <h3>EXPERIENCE</h3>
                <section class="cat-app-row">
                    <h3 class="my-2">Career Experience</h3>
                    <div class="experience-section" id="experience-section">
                        <div class="row exp-increment">
                            <div class="col-md-3">
                                <div class="form-group">
                                  <label for="">Employer</label>
                                  <input type="text"
                                    class="form-control" name="employer" id="employer" aria-describedby="helpId" placeholder="Employer" required>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Job Title</label>
                                    <input type="text"
                                      class="form-control" name="job_title" id="job_title" aria-describedby="helpId" placeholder="Title" required>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                      <label for="">Job Level</label>
                                      <select class="form-control" name="job_level" id="job_level" required>
                                        @php($exper_attr = \App\Models\Admin\JobAttributs::getAttr('job_level'))
                                        @if ($exper_attr)
                                            @foreach ($exper_attr as $jb)
                                                <option value="{{$jb['id']}}">{{$jb['name']}}</option>
                                            @endforeach
                                        @endif
                                      </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                      <label for="">Work Type</label>
                                      <select class="form-control" name="work_type" id="work_type" required>
                                        @php($exper_attr = \App\Models\Admin\JobAttributs::getAttr('work_type'))
                                        @if ($exper_attr)
                                            {{-- <option>Choose </option> --}}
                                            @foreach ($exper_attr as $jb)
                                                <option value="{{$jb['id']}}">{{$jb['name']}}</option>
                                            @endforeach
                                        @endif
                                      </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Monthly Salary</label>
                                    <input type="text"
                                      class="form-control" name="monthly_salary" id="monthly_salary" aria-describedby="helpId" placeholder="Salary(KSH)" required>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                      <label for="">Country</label>
                                      <select class="form-control" name="country" id="country" required>
                                        @php($exper_attr = \App\Models\Admin\JobAttributs::getAttr('country'))
                                        @if ($exper_attr)
                                            {{-- <option>Choose </option> --}}
                                            @foreach ($exper_attr as $jb)
                                                <option value="{{$jb['id']}}">{{$jb['name']}}</option>
                                            @endforeach
                                        @endif
                                      </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                      <label for="">Start Year</label>
                                      <select class="form-control" name="start_year" id="start_year" required>
                                        <?php $y= years_menu()?>
                                        <option value=""></option>
                                        @foreach ($y as $item)
                                            <option value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                      </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Start Month</label>
                                    <select class="form-control" name="start_month" id="start_month" required>
                                        <?php $m=months_menu()?>
                                        <option value=""></option>
                                        @foreach ($m as $item)
                                            <option value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                      <label for="">End Year</label>
                                      <select class="form-control" name="end_year" id="end_year" required>
                                        <?php $y= years_menu()?>
                                        <option value=""></option>
                                        @foreach ($y as $item)
                                            <option value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                      </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">End Month</label>
                                    <select class="form-control" name="end_month" id="end_month">
                                        <?php $m= months_menu()?>
                                        <option value=""></option>
                                        @foreach ($m as $item)
                                            <option value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <textarea name="extra_experience" id="job_responsibility" rows="10" cols="80" class="w-100" placeholder="Job Responsibility Summary"></textarea>
                            </div>
                            {{-- <div class="col-md-2">
                                <div class="input-group-btn h-100">
                                    <button class="btn btn-success exp-btn-add w-100 h-100" type="button"><i class="fa fa-plus"></i> Add</button>
                                </div>
                            </div> --}}

                        </div>

                        {{-- <div class="row exp-clone d-none">
                            <div class="col-md-3">
                                <div class="form-group">
                                  <label for="">Employer</label>
                                  <input type="text"
                                    class="form-control" name="employer[]" id="employer" aria-describedby="helpId" placeholder="Employer" required>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Job Title</label>
                                    <input type="text"
                                      class="form-control" name="job_title[]" id="job_title" aria-describedby="helpId" placeholder="Title" required>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                      <label for="">Job Level</label>
                                      <select class="form-control" name="job_level[]" id="job_level" required>
                                        @php($exper_attr = \App\Models\Admin\JobAttributs::getAttr('job_level'))
                                        @if ($exper_attr)
                                            @foreach ($exper_attr as $jb)
                                                <option value="{{$jb['id']}}">{{$jb['name']}}</option>
                                            @endforeach
                                        @endif
                                      </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                      <label for="">Work Type</label>
                                      <select class="form-control" name="work_type[]" id="work_type" required>
                                        @php($exper_attr = \App\Models\Admin\JobAttributs::getAttr('work_type'))
                                        @if ($exper_attr)
                                            @foreach ($exper_attr as $jb)
                                                <option value="{{$jb['id']}}">{{$jb['name']}}</option>
                                            @endforeach
                                        @endif
                                      </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Monthly Salary</label>
                                    <input type="text"
                                      class="form-control" name="monthly_salary[]" id="monthly_salary" aria-describedby="helpId" placeholder="Salary(KSH)" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                      <label for="">Country</label>
                                      <select class="form-control" name="country[]" id="country" required>
                                        @php($exper_attr = \App\Models\Admin\JobAttributs::getAttr('country'))
                                        @if ($exper_attr)
                                            @foreach ($exper_attr as $jb)
                                                <option value="{{$jb['id']}}">{{$jb['name']}}</option>
                                            @endforeach
                                        @endif
                                      </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                      <label for="">Start Year</label>
                                      <select class="form-control" name="start_year[]" id="start_year" required>
                                        <?php $y= years_menu()?>
                                        @foreach ($y as $item)
                                            <option value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                      </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Start Month</label>
                                    <select class="form-control" name="start_month[]" id="start_month" required>
                                        <?php $m=months_menu()?>
                                        @foreach ($m as $item)
                                            <option value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                      <label for="">End Year</label>
                                      <select class="form-control" name="end_year[]" id="end_year">
                                        <?php $y= years_menu()?>
                                        <option value=""></option>
                                        @foreach ($y as $item)
                                            <option value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                      </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">End Month</label>
                                    <select class="form-control" name="end_month" id="end_month">
                                        <?php $m= months_menu()?>
                                        @foreach ($m as $item)
                                            <option value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-10">
                                <textarea name="job_responsibility[]" id="job_responsibility" cols="" rows="3" class="w-100" placeholder="Job Responsibility"></textarea>
                            </div>
                            <div class="col-md-2">
                                <div class="input-group-btn h-100">
                                    <button class="btn btn-danger exp-btn-rem w-100 h-100" type="button"><i class="fa fa-trash"></i> Remove</button>
                                </div>
                            </div>

                        </div> --}}


                    </div>
                </section>

                <h3>SKILLS</h3>
                <section class="cat-app-row">
                    <h3 class="my-2">Career Skills</h3>
                    <div class="experience-section" id="experience-section">
                        <div class="row skill-increment">

                            <div class="col-md-8">
                                <input type="text" name="nameSkill[]" id="nameSkill"  class="w-100 h-100 rounded" placeholder="Job Skill(Max character 240)" maxlength="240">
                                {{-- <textarea name="nameSkill[]" id="nameSkill" cols="" rows="3" class="w-100 rounded" placeholder="Job Skill(Max character 240)" maxlength="240"></textarea> --}}
                            </div>
                            <div class="col-md-4">
                                <div class="input-group-btn h-100">
                                    <button class="btn btn-success skill-btn-add w-100 h-100" type="button"><i class="fa fa-plus"></i> Add</button>
                                </div>
                            </div>

                        </div>

                        <div class="row skill-clone d-none">

                            <div class="col-md-8">
                                <input type="text" name="nameSkill[]" id="nameSkill"  class="w-100 h-100 rounded" placeholder="Job Skill(Max character 240)" maxlength="240">
                                {{-- <textarea name="nameSkill[]" id="nameSkill" cols="" rows="3" class="w-100 rounded" placeholder="Job Skill(Max character 240)" maxlength="240" ></textarea> --}}
                            </div>

                            <div class="col-md-4">
                                <div class="input-group-btn h-100">
                                    <button class="btn btn-danger skill-btn-rem w-100 h-100" type="button"><i class="fa fa-trash"></i> Remove</button>
                                </div>
                            </div>

                        </div>


                    </div>

                    <h4 class="my-3">Optional Resume`</h4>
                    <input type="file" name="resume_name" id="resume_name">

                    <button type="submit" class="btn btn-primary w-100 mt-5">Submit</button>
                </section>


            </form>





        </div>
    </div>
</div>
@endsection

@section('jsblock')
<script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

<script>
    // Replace the <textarea id="editor1"> with a CKEditor 4
   // instance, using default configuration.



    $("#prof-steps").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        autoFocus: true,
        enableAllSteps:false,
        showFinishButtonAlways: false,
        // enableFinishButton: true,
        //     labels: {
        //         // previous: "<span class=\"icon icon-prev\"></span>Back",
        //         // next: "Next<span class=\"icon\"></span>",
        //         finish: "Submit",
        //         loading: "Loading..."
        //     }, //end labels
        onStepChanging: function(event, currentIndex, newIndex) {
            // Always allow going backward even if the current step contains invalid fields!
            if (currentIndex > newIndex) {
                return true;
            }
            var form = $(this);

            // Clean up if user went backward before
            if (currentIndex < newIndex) {
                // To remove error styles
                $(".body:eq(" + newIndex + ") label.error", form).remove();
                $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
            }

            // Disable validation on fields that are disabled or hidden.
            form.validate().settings.ignore = ":disabled,:hidden";

            // Start validation; Prevent going forward if false
            return form.valid();
        },
        onStepChanged: function(event, currentIndex, priorIndex) {
            // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
            if (currentIndex === 2 && priorIndex === 3) {
                $(this).steps("previous");
                return;
            }

            // Suppress (skip) "Warning" step if the user is old enough.
            if (currentIndex === 2 && Number($("#age").val()) >= 18) {
                $(this).steps("next");
            }
        },
        onFinishing: function(event, currentIndex) {
            var form = $(this);

            // Disable validation on fields that are disabled.
            // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
            form.validate().settings.ignore = ":disabled";

            // Start validation; Prevent form submission if false
            return form.valid();
        }
    })
    .validate({
        errorPlacement: function(error, element) {
            element.before(error);
        },
        // rules: {
        //     cvdocument: {
        //         required: true,
        //         extension: "docx|rtf|doc|pdf",
        //         filesize: 10,
        //     },

        //     confirmed: {
        //         required: true,
        //     },
        //     'mobile-phone': {
        //         phoneFormat:/^\+?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{6})$/
        //     }
        // },
        messages: {  // <-- you must declare messages inside of "messages" option
            cvdocument:{
                // required:"input type is required",
                extension:"Select valid input file format(PDF/DOCX)"
            }
        },


    });

    var vounter = 0;
    $(".tr-btn-add").click(function () {
        if (vounter < 10) {
        vounter++;
        var $html = $(".tr-clone").html();
        let $tr = document.createElement("div");
        $($tr).addClass("visible-clone row  mt-4");
        $($tr).append($html);
        $(".tr-increment").after($tr);
        } else {
        }
    });

    $("body").on("click", ".tr-btn-rem", function () {
        $(this).parents(".visible-clone").remove();
        vounter--;
    });

    var vounter2 = 0;
    $(".tr-btn-ad2").click(function () {
        if (vounter2 < 10) {
        vounter2++;
        var $html = $(".tr-clon2").html();
        let $tr = document.createElement("div");
        $($tr).addClass("visible-clon2 row  mt-4");
        $($tr).append($html);
        $(".tr-incremen2").after($tr);
        } else {
        }
    });

    $("body").on("click", ".tr-btn-re2", function () {
        $(this).parents(".visible-clon2").remove();
        vounter2--;
    });

    var vounter3 = 0;
    $(".exp-btn-add").click(function () {
        if (vounter3 < 10) {
        vounter3++;
        var $html = $(".exp-clone").html();
        let $tr = document.createElement("div");
        $($tr).addClass("visible-exp row  mt-4");
        $($tr).append($html);
        $(".exp-increment").after($tr);
        } else {
        }
    });

    $("body").on("click", ".exp-btn-rem", function () {
        $(this).parents(".visible-exp").remove();
        vounter3--;
    });

    var vounter4 = 0;
    $(".skill-btn-add").click(function () {
        if (vounter4 < 10) {
        vounter4++;
        var $html = $(".skill-clone").html();
        let $tr = document.createElement("div");
        $($tr).addClass("visible-skill row  mt-4");
        $($tr).append($html);
        $(".skill-increment").after($tr);
        } else {
        }
    });

    $("body").on("click", ".skill-btn-rem", function () {
        $(this).parents(".visible-skill").remove();
        vounter4--;
    });

    CKEDITOR.replace( 'job_responsibility' );
    CKEDITOR.replace( 'additional_highschool' );
    CKEDITOR.replace( 'additional_college' );

</script>
@endsection


