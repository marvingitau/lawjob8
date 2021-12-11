   <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Employer - @yield('title')</title>



        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
        <link href="{{ asset('backend/assets/vendor/fontawesome/css/fontawesome.min.css')}}" rel="stylesheet">
        <link href="{{ asset('backend/assets/vendor/fontawesome/css/solid.min.css')}}" rel="stylesheet">
        <link href="{{ asset('backend/assets/vendor/fontawesome/css/brands.min.css')}}" rel="stylesheet">
        <link href="{{ asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{ asset('backend/assets/css/master.css')}}" rel="stylesheet">
        <link href="{{ asset('backend/assets/vendor/chartsjs/Chart.min.css')}}" rel="stylesheet">
        <link href="{{ asset('backend/assets/vendor/flagiconcss/css/flag-icon.min.css')}}" rel="stylesheet">
        <link href="{{ asset('backend/assets/vendor/datatables/datatables.min.css')}}" rel="stylesheet">
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

        <!-- Styles -->
        {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    </head>
