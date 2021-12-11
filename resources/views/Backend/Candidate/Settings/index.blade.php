@extends('Backend.Candidate.layouts.auth')

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

    <form action="{{ route('candidate.change.password')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="first_name" class="form-control-label">Old Password</label>
            <input type="text"
                class="form-control" name="old" id="first_name" placeholder="Old password">

        </div>

        <div class="form-group">
            <label for="last_name" class="form-control-label">New Password</label>
            <input type="text"
                class="form-control" name="password" password_confirm>

        </div>

        <div class="form-group">
            <label for="phone" class="form-control-label">New Password(confirm)</label>
                <input type="text"
                 class="form-control" name="password_confirm" required>

        </div>


        <div class="form-group text-right">
            <button class="btn btn-success" type="submit"><i class="fas fa-check"></i> Save</button>
        </div>
    </form>

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
