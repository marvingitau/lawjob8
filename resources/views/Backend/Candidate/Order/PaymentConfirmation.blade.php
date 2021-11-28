@extends('Backend.Candidate.layouts.auth')

@section('title',"Payment")
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
           {{-- {!! $payments !!} --}}
           @if(!empty($payments))

                    {{-- @csrf --}}
                    @if( $payments->amount >= 1)
                    <a name="" id="" class="btn btn-primary" href="{{ route('payment.confirmation',["pesapal_transaction_tracking_id"=>$payments->trackingid,"pesapal_merchant_reference"=>$payments->transactionid,"pesapal_notification_type"=>"CONFIRMED"]
                )}}" role="button">Payment Confirmation</a>
                    {{-- <button type="submit" class="btn btn-primary">Approve Payment</button> --}}
                    @else
                    <div class="alert alert-warning" role="alert">
                        <strong>warning</strong> Amount not sufficient
                    </div>
                    @endif


                @endif
        </div>

        {{-- <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Credit Creation</div>
                <div class="card-body d-flex">
                    <div class="details">

                        <h5 class="card-title">Job Listing (30 DAYS)</h5>
                        <p>KSh 10,000 </p>
                        <p>Including VAT</p>
                    </div>
                    <div class="forma ml-auto">
                        <form accept-charset="utf-8" action="{{ route('add.cart',30) }}" method="POST">
                            <input type="hidden" name="package" value="standard">
                            <div class="form-group">
                                <label for="Amount">Amount</label>
                                <input type="number" name="Amount" placeholder="Amount" class="form-control" min=0 required>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div> --}}
    </div>
</div>

@endsection

@section('jsblock')
    {{-- <script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script> --}}
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

