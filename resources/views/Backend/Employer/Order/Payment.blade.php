@extends('Backend.Employer.layouts.auth')

@section('title',"Payment")
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">

            {{-- <iframe src="" title="pesapal"> --}}
                {!! $iframe  !!}
                @empty($record)

                @endempty

        </div>
    </div>
</div>

@endsection

{{-- @section('jsblock')
    <script src="{{asset('backend/assets/vendor/chartsjs/Chart.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/dashboard-charts.js')}}"></script>
@endsection --}}

