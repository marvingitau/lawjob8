@extends('Backend.Employer.layouts.auth')

@section('title',"Job Post")
@section('content')

<div class="container">
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
    <form action="{{ route('job.post') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label for="">Title</label>
                <input type="text"
                    class="form-control rounded-0" name="title" id="" value="{{ old('title') }}" aria-describedby="helpId" placeholder="Title">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label for="">Job Type</label>
                <select class="form-control rounded-0" name="job_type" id="job_type">
                    @if($jobAttrib)
                    @foreach ($jobAttrib as $attrib)
                         <option value="{{ $attrib['id'] }}"> {{ $attrib['name'] }}</option>
                    @endforeach

                    @endif
                </select>
                </div>
            </div>
              <div class="col-md-6">
                <div class="form-group">
                <label for="">Location</label>
                <select class="form-control rounded-0" name="city" id="location">
                    @if($jobAttribCity)
                    @foreach ($jobAttribCity as $attribLocal)
                         <option value="{{ $attribLocal['id'] }}"> {{ $attribLocal['name'] }}</option>
                    @endforeach

                    @endif
                </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label for="">Country</label>
                <select class="form-control rounded-0" name="country" id="country">
                    @if($jobAttribCountry)
                    @foreach ($jobAttribCountry as $attribCount)
                         <option value="{{ $attribCount['id'] }}"> {{ $attribCount['name'] }}</option>
                    @endforeach

                    @endif
                </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label for="">Choose Credit</label>
                <select class="form-control rounded-0" name="credit" id="country">
                    @if($creditList)
                    @foreach ($creditList as $credit)
                         <option value="{{\App\Models\Admin\JobAttributs::where('id',$credit['package'])->first()->id}}"> {{ \App\Models\Admin\JobAttributs::where('id',$credit['package'])->first()->name }} ({{ $credit['quantity'] }})</option>
                    @endforeach

                    @endif
                </select>
                </div>
            </div>
            {{-- jobAttribSalary --}}
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Set Salary</label>
                    <input type="number"
                class="form-control rounded-0" name="monthly_salary" id="" value="{{ old('monthly_salary') }}" aria-describedby="helpId" placeholder="Salary" min="0">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                <label for="">Choose Job Category</label>
                <select class="form-control rounded-0" name="job_category" id="country">
                    @if($jobCategory)
                    @foreach ($jobCategory as $cat)
                        <option value="{{ $cat['id'] }}"> {{ $cat['name'] }}
                        </option>
                    @endforeach

                    @endif
                </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                <label for="">Choose Icon</label>
                <select class="form-control rounded-0" name="icon" id="country">

                         <option value="conversation">conversation</option>
                         <option value="money">money</option>
                         <option value="mortarboard">mortarboard</option>
                         <option value="worker">worker</option>
                         <option value="businessman">businessman</option>
                         <option value="coding">coding</option>
                         <option value="balance">balance</option>

                </select>
                </div>
            </div>

            <div class="col-md-12">
                <h4>Job Summary</h4>
                <textarea name="job_summary" id="job_summary" rows="10" cols="80"></textarea>
            </div>
            <div class="col-md-12">
                <h4>Job Description</h4>
                <textarea name="job_description" id="job_description" rows="10" cols="80"></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-secondary rounded-0 my-2"> <i class="fas fa-upload mr-2"></i> JOB POST</button>
    </form>

</div>
@endsection

@section('jsblock')
    <script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
     <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace( 'job_summary' );
        CKEDITOR.replace( 'job_description' );

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
