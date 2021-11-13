@extends('Backend.Employer.layouts.auth')

@section('title',"Settings")
@section('content')

<div class="container">
    <div class="page-title">
        <h3>Settings</h3>
    </div>
    @if(Session::has('message'))
    <div class="alert alert-success text-center" role="alert">
        <strong>Alert! &nbsp;</strong>{{Session::get('message')}}
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
    <div class="box box-primary">
        <div class="box-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="system-tab" data-toggle="tab" href="#hr" role="tab" aria-controls="hr" aria-selected="false">Personal Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">Company Profile</a>
                </li>


                {{-- <li class="nav-item">
                    <a class="nav-link" id="email-tab" data-toggle="tab" href="#email" role="tab" aria-controls="email" aria-selected="false">Email</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="appearance-tab" data-toggle="tab" href="#appearance" role="tab" aria-controls="appearance" aria-selected="false">Appearance</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="attributions-tab" data-toggle="tab" href="#attributions" role="tab" aria-controls="attributions" aria-selected="false">Attributions</a>
                </li> --}}
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active show" id="hr" role="tabpanel" aria-labelledby="general-tab">
                    <div class="col-md-6">
                        <form action="{{ route('hr.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="first_name" class="form-control-label">First Name</label>
                                <input type="text"
                                    class="form-control" name="first_name" id="first_name">

                            </div>

                            <div class="form-group">
                                <label for="last_name" class="form-control-label">Last Name</label>
                                <input type="text"
                                    class="form-control" name="last_name" id="last_name">

                            </div>

                            <div class="form-group">
                                <label for="phone" class="form-control-label">Phone</label>
                                <div class="d-flex">
                                    <input type="text" class="form-control w-25" name="code" id="code" value="+254" disabled>
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="e.g 712345678" max="9">
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="POBox" class="form-control-label">P.O box</label>
                                <input type="text"
                                    class="form-control" name="POBox" id="POBox">

                            </div>

                            <div class="form-group">
                                <label for="employer_hr_name" class="form-control-label">HR Name</label>
                                <input type="text" name="employer_hr_name" class="form-control" id="employer_hr_name">
                            </div>
                            <div class="form-group">
                                <label for="employer_hr_email" class="form-control-label">HR Email Address</label>

                                <input type="text"
                                    class="form-control" name="employer_hr_email" id="employer_hr_email">

                            </div>


                            <div class="form-group text-right">
                                <button class="btn btn-success" type="submit"><i class="fas fa-check"></i> Save</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade active" id="general" role="tabpanel" aria-labelledby="general-tab">
                    <div class="col-md-6">
                        <form action="{{ route('profile.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="site-title" class="form-control-label">Company Name</label>
                                <input type="text" name="company_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="site-description" class="form-control-label">Physical Address</label>

                                <input type="text"
                                    class="form-control" name="location" id="">

                            </div>
                            <div class="form-group">
                                <label for="site-description" class="form-control-label">Website (optional)</label>

                                <input type="text" class="form-control" name="website" id="">

                            </div>
                            <div class="form-group">
                                <label for="site-description" class="form-control-label">Postal Address</label>

                                <input type="text" class="form-control" name="postal_address" id="">

                            </div>
                            <div class="form-group">
                            <label for="">Company Description</label>
                            <textarea class="form-control" name="company_description" id="" rows="3"></textarea>
                            </div>


                            <div class="form-group text-right">
                                <button class="btn btn-success" type="submit"><i class="fas fa-check"></i> Save</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('jsblock')
<script>
    @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
            toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
            }
    @endif
    @if(Session::has('danger'))
            toastr.danger("{{ Session::get('success') }}");
            toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
            }
    @endif



</script>
@endsection
