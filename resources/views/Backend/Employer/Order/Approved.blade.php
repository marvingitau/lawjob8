@extends('Backend.Employer.layouts.auth')

@section('title',"Approved")
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">Approved Orders</div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tokens</th>
                                    <th>Grand Total</th>
                                    <th>Package</th>
                                    <th>Expires On</th>
                                    <th>Created At</th>
                                    <th>Tracking ID</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($res)
                                    @foreach ($res as $r)
                                        <tr>
                                            <th scope="row">{{ $r->id}}</th>
                                            <td>{{ $r->quantity}}</td>
                                            <td>{{ $r->grand_total }} </td>
                                            <td>{{ $r->package }}</td>
                                            <td>{{ $r->expiry_date }}</td>
                                            <td>{{ $r->created_at }}</td>
                                            <td>{{ $r->trackingid }}</td>
                                            <td>
                                                <a name="" id="" class="btn btn-primary w-100 my-1" href="#" role="button"><i class="fas fa-eye"></i> </a>
                                                <a name="" id="" class="btn btn-danger w-100 my-1" href="#" role="button"><i class="fas fa-trash"></i> </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('jsblock')
    <script src="{{asset('backend/assets/vendor/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/initiate-datatables.js')}}"></script>
    <script>
        $(document).ready(function(){
             $('.table').DataTable();
        });
    </script>
@endsection

