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
                <a class="breadcrumb-item" href="{{route('candidate.profile.create')}}">Profile-View/Update</a>
                <span class="breadcrumb-item active"></span>
            </nav>
            {{-- End Bread Crump --}}

            <div class="box box-primary">
                <div class="box-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="system-tab" data-toggle="tab" href="#personal" role="tab" aria-controls="hr" aria-selected="false">Personal Data</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " id="general-tab" data-toggle="tab" href="#ducation" role="tab" aria-controls="general" aria-selected="true">Higher Education</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " id="general-tab" data-toggle="tab" href="#secducation" role="tab" aria-controls="general" aria-selected="true">Secondary Education</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " id="general-tab" data-toggle="tab" href="#xperiens" role="tab" aria-controls="general" aria-selected="true">Experience</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " id="general-tab" data-toggle="tab" href="#sqeel" role="tab" aria-controls="general" aria-selected="true">Skills</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="personal" role="tabpanel" aria-labelledby="general-tab">
                            <form action="{{route('candidate.profile.update','personal')}}" method="post">
                                @csrf
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="fname">First Name</label>
                                          <input type="text"
                                            class="form-control" name="fname" id="fname" aria-describedby="helpId" placeholder="Firt Name" required value="{{$aboutMe->fname}}">
                                        </div>

                                        <div class="form-group">
                                          <label for="">Phone</label>
                                          <div class="d-flex">
                                            <input type="text"
                                            class="form-control w-25" name="" id="" aria-describedby="helpId" placeholder="+254" value="+254" disabled>
                                            <input type="text"
                                            class="form-control" name="phone" id="phone" aria-describedby="helpId" placeholder="Enter Phone" required value="{{$aboutMe->phone}}">
                                          </div>

                                        </div>


                                        <div class="form-group">
                                          <label for="">Gender</label>
                                          <select class="form-control" name="gender" id="gender" required>
                                            <option value="male" {{$aboutMe->gender=='male'?'selected':''}}>MALE</option>
                                            <option value="female" {{$aboutMe->gender=='female'?'selected':''}}>FEMALE</option>
                                          </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lname">Last Name</label>
                                            <input type="text"
                                              class="form-control" name="lname" id="lname" aria-describedby="helpId" placeholder="Last Name" required value="{{$aboutMe->lname}}">
                                          </div>

                                          <div class="form-group">
                                            <label for="">DOB</label>
                                            <input type="date"
                                              class="form-control" name="dob" id="dob" aria-describedby="helpId" placeholder="Date of Birth" required value="{{$aboutMe->dob}}">
                                          </div>
                                    </div>


                                </div>
                                <button type="submit" class="btn btn-primary">Update Bio</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="ducation" role="tabpanel" aria-labelledby="general-tab">
                            <form action="{{route('candidate.profile.update','education')}}" method="post">
                                @csrf
                                <h3 class="my-2">Higher Education</h3>
                                <div class="education-section" id="education-section">
                                    <div class="row tr-increment">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                              <label for="">School Name</label>
                                              <input type="text"
                                                class="form-control" name="institution" id="institution" aria-describedby="helpId" placeholder="Institution" required value="{{$education->institution}}">

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
                                                            <option value="{{$jb['id']}}" {{$education->qualification_level_id==$jb['id']?'selected':''}}>{{$jb['name']}}</option>
                                                        @endforeach
                                                    @endif
                                                  </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Title</label>
                                                <input type="text"
                                                  class="form-control" name="coursetitle" id="coursetitle" aria-describedby="helpId" placeholder="Course Name" required value="{{$education->coursetitle}}">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                  <label for="">Start Year</label>
                                                  <select class="form-control" name="start_year" id="start_year" required>
                                                    <?php $y= years_menu()?>
                                                    <option value=""></option>
                                                    @foreach ($y as $item)
                                                        <option value="{{$item}}" {{$education->start_year==$item?'selected':''}}>{{$item}}</option>
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
                                                        <option value="{{$item}}" {{$education->start_month==$item?'selected':''}}>{{$item}}</option>
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
                                                        <option value="{{$item}}" {{$education->end_year==$item?'selected':''}}>{{$item}}</option>
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
                                                        <option value="{{$item}}" {{$education->end_month==$item?'selected':''}}>{{$item}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <textarea name="additional_colleges" id="additional_college" rows="10" cols="80" class="w-100" placeholder="Additional Education">{{$education->additional_colleges}}</textarea>
                                        </div>
                                    </div>


                                </div>
                                <button type="submit" class="btn btn-primary">Update Education</button>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="secducation" role="tabpanel" aria-labelledby="general-tab">
                            <form action="{{route('candidate.profile.update','sec')}}" method="post">
                                @csrf
                                <h3 class="my-2">High School</h3>
                                <div class="highschool-education-section" id="highschool-education-section">
                                    <div class="row tr-incremen2">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                              <label for="">School Name</label>
                                              <input type="text"
                                                class="form-control" name="sec_institution" id="sec_institution" aria-describedby="helpId" placeholder="Institution" required value="{{$sec_education->sec_institution}}">

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                  <label for="">Qualification</label>
                                                  <select class="form-control" name="sec_qualification_level_id" id="sec_qualification_level_id" required>
                                                    @php($edu_attr = \App\Models\Admin\JobAttributs::getAttr('education_qualification'))
                                                    @if ($edu_attr)

                                                        @foreach ($edu_attr as $jb)
                                                            <option value="{{$jb['id']}}" {{$sec_education->sec_qualification_level_id == $jb['id']?'selected':''}}>{{$jb['name']}}</option>
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
                                                        <option value="{{$item}}" {{$sec_education->sec_start_year == $item?'selected':''}}>{{$item}}</option>
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
                                                        <option value="{{$item}}" {{$sec_education->sec_start_month == $item?'selected':''}}>{{$item}}</option>
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
                                                        <option value="{{$item}}" {{$sec_education->sec_end_year == $item?'selected':''}} >{{$item}}</option>
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
                                                        <option value="{{$item}}" {{$sec_education->sec_end_month == $item?'selected':''}}>{{$item}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <textarea name="additional_highschools" id="additional_highschool" rows="10" cols="80"  class="w-100" placeholder="Additional Education">{{$sec_education->additional_highschools}}</textarea>
                                        </div>

                                    </div>

                                </div>
                                <button type="submit" class="btn btn-primary">Secondary Submit</button>
                            </form>

                        </div>

                        <div class="tab-pane fade" id="xperiens" role="tabpanel" aria-labelledby="general-tab">
                            <form action="{{route('candidate.profile.update','experience')}}" method="post">
                                @csrf
                                <section class="cat-app-row">
                                    <h3 class="my-2">Career Experience</h3>
                                    <div class="experience-section" id="experience-section">
                                        <div class="row exp-increment">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                  <label for="">Employer</label>
                                                  <input type="text"
                                                    class="form-control" name="employer" id="employer" aria-describedby="helpId" placeholder="Employer" required value="{{$experiences->employer}}">

                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Job Title</label>
                                                    <input type="text"
                                                      class="form-control" name="job_title" id="job_title" aria-describedby="helpId" placeholder="Title" required value="{{$experiences->job_title}}">
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                      <label for="">Job Level</label>
                                                      <select class="form-control" name="job_level" id="job_level" required>
                                                        @php($exper_attr = \App\Models\Admin\JobAttributs::getAttr('job_level'))
                                                        @if ($exper_attr)
                                                            @foreach ($exper_attr as $jb)
                                                                <option value="{{$jb['id']}}" {{$experiences->job_level==$jb['id']?'selected':''}}>{{$jb['name']}}</option>
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
                                                                <option value="{{$jb['id']}}" {{$experiences->work_type==$jb['id']?'selected':''}}>{{$jb['name']}}</option>
                                                            @endforeach
                                                        @endif
                                                      </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">Monthly Salary</label>
                                                    <input type="text"
                                                      class="form-control" name="monthly_salary" id="monthly_salary" aria-describedby="helpId" placeholder="Salary(KSH)" required value="{{$experiences->monthly_salary}}">
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
                                                                <option value="{{$jb['id']}}" {{$experiences->country==$jb['id']?'selected':''}}>{{$jb['name']}}</option>
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
                                                            <option value="{{$item}}"{{$experiences->start_year==$item?'selected':''}} >{{$item}}</option>
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
                                                            <option value="{{$item}}" {{$experiences->start_month==$item?'selected':''}}>{{$item}}</option>
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
                                                            <option value="{{$item}}" {{$experiences->end_year==$item?'selected':''}}>{{$item}}</option>
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
                                                            <option value="{{$item}}" {{$experiences->end_month==$item?'selected':''}}>{{$item}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <textarea name="extra_experience" id="job_responsibility" rows="10" cols="80" class="w-100" placeholder="Job Responsibility Summary">{{$experiences->extra_experience}}</textarea>
                                            </div>

                                        </div>

                                    </div>
                                </section>
                                <button type="submit" class="btn btn-primary">Experience Submit</button>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="sqeel" role="tabpanel" aria-labelledby="general-tab">
                            @php($cat='skills')

                            <form action="{{route('candidate.profile.update','skills')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <h3 class="my-2">Career Skills</h3>
                                <div class="experience-section" id="experience-section">
                                    <div class="row">
                                        @if($skills)
                                            @foreach ($skills as $key=>$item)
                                                {{-- <div class="col-md-1"><i>Del</i>  </div> --}}
                                                <div class="col-md-12 my-1">
                                                    <input type="text" name="nameSkill[]" id="{{$item->id}}" class="form-control w-100 h-100 rounded" placeholder="Job Skill(Max character 240)" maxlength="240" value="{{$item->name}}">
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary my-4">Update Skills</button>
                            </form>
                            <p>

                                <button class="btn btn-outline-dark" type="button" data-toggle="collapse" data-target="#contentId" aria-expanded="false"
                                        aria-controls="contentId">
                                    More Skills
                                </button>
                            </p>
                            <div class="collapse" id="contentId">
                                <h3>SKILLS</h3>
                                <section class="cat-app-row">
                                    <form action="{{route('candidate.profile.new','skills')}}" method="post">
                                        @csrf
                                    <div class="experience-section" id="experience-section">
                                        <div class="row skill-increment">

                                            <div class="col-md-8">
                                                <input type="text" name="nameSkill[]" id="nameSkill"  class="form-control w-100 h-100 rounded" placeholder="Job Skill(Max character 240)" maxlength="240">
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
                                                <input type="text" name="nameSkill[]" id="nameSkill"  class="form-control w-100 h-100 rounded" placeholder="Job Skill(Max character 240)" maxlength="240">
                                                {{-- <textarea name="nameSkill[]" id="nameSkill" cols="" rows="3" class="w-100 rounded" placeholder="Job Skill(Max character 240)" maxlength="240" ></textarea> --}}
                                            </div>

                                            <div class="col-md-4">
                                                <div class="input-group-btn h-100">
                                                    <button class="btn btn-danger skill-btn-rem w-100 h-100" type="button"><i class="fa fa-trash"></i> Remove</button>
                                                </div>
                                            </div>

                                        </div>


                                    </div>
                                        <button type="submit" class="btn btn-primary  mt-5">New Skill Submit</button>
                                    </form>

                                </section>

                            </div>


                            {{-- Update CV --}}
                            <form action="{{route('candidate.profile.update','cv')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <h4 class="my-3">Optional Resume`</h4>
                                <input type="file" name="resume_name" id="resume_name" required>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#modelId">
                                  View  <i class="fa fa-eye"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog" role="document" style="max-width: 70rem !important;">
                                        <div class="modal-content">
                                            <iframe src="{{asset('uploads/'.$resumes[0]->resume_name)}}" width="100%" height="580" frameborder="0"></iframe>
                                           {{-- <embed src="{{$resumes[0]->path}}" type=""> --}}
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Update CV</button>
                            </form>
                        </div>

                    </div>

                </div>
            </div>







        </div>
    </div>
</div>
@endsection

@section('jsblock')
<script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

<script>
    // Replace the <textarea id="editor1"> with a CKEditor 4
   // instance, using default configuration.


    CKEDITOR.replace( 'job_responsibility' );
    CKEDITOR.replace( 'additional_highschool' );
    CKEDITOR.replace( 'additional_college' );

    // var getUrl = window.location;
    // var baseUrl = getUrl.pathname;
    // var hostName = getUrl.host;
    // console.log(">>" + baseUrl);
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



</script>
@endsection
