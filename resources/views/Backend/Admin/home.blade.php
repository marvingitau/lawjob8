@extends('Backend.Admin.layouts.auth')

@section('title','Dashboard')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 page-header">
                <div class="page-pretitle">Overview</div>
                <h2 class="page-title">Dashboard</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                    <div id="adminStat" style="height: 300px;"></div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="icon-big text-center">
                                    <i class="olive fas fa-home"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <a href="{{url('/')}}">
                                <div class="detail">
                                    <p class="detail-subtitle">Home</p>
                                    <span class="number">Page</span>
                                </div>
                            </a>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <i class="fas fa-calendar"></i> For this Week
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
                                    <i class="teal fas fa-shopping-cart"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="detail">
                                    <p class="detail-subtitle">Orders</p>
                                    <span class="number">{{ $orders }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <i class="fas fa-calendar"></i> For this Week
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
                                    <i class="olive fas fa-money-bill-alt"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="detail">
                                    <p class="detail-subtitle">Employer</p>
                                    <span class="number">{{ $employers }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <i class="fas fa-calendar"></i> For this Month
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
                                    <i class="orange fas fa-envelope"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="detail">
                                    <p class="detail-subtitle">Support</p>
                                    <span class="number">24/7</span>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <i class="fas fa-envelope-open-text"></i> For this week
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>

    </div>

@endsection

@section('jsblock')
    <script src="{{asset('backend/assets/vendor/chartsjs/Chart.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/dashboard-charts.js')}}"></script>
    {{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script> --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script>
    $(document).ready(function () {
        var months = <?php echo json_encode(array_values(month_arr()))?>;
        new Morris.Line({

            element: 'adminStat',

            data: <?php echo $total_chart?>,

            xkey: 'month',

            ykeys: ['jobPosted','candidate','orders','jobApplied','employers'],

            labels: ['JOB POSTED','CANDIDATES','ORDERS','JOB APPLIED','EMPLOYERS'],

            xLabelFormat: function(x) { // <--- x.getMonth() returns valid index
                var month = months[x.getMonth()];
                return month;
            },
            dateFormat: function(x) {
                var month = months[new Date(x).getMonth()];
                return month;
            },
        });

    });

    </script>
@endsection

