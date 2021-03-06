@extends('Backend.Candidate.layouts.auth')

@section('title',"Order")
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

              @if(Session::has('message'))
              <div class="alert alert-success text-center" role="alert">
                  <strong>Alert! &nbsp;</strong>{{Session::get('message')}}
              </div>
             @endif

    <div class="row">
        @if ($tokens)
            @foreach ($tokens as $token)
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Credit Creation</div>
                    <div class="card-body d-flex">
                        <div class="details">

                            <h5 class="card-title">Job Listing ({{$token['product_name']}})</h5>
                            <p>KSh {{number_format($token['price'],2,'.',',')}} </p>
                            <p>Exclusive VAT</p>
                        </div>
                        <div class="forma ml-auto">
                            <form accept-charset="utf-8" action="{{ route('candidate.add.cart',7) }}" method="POST">
                                @csrf
                                <input type="hidden" name="package" value="{{$token['package'] }}">
                                <input type="hidden" name="prodid" value="{{$token['id'] }}">
                                <input type="hidden" name="days" value="{{$token['days']}}">
                                <input type="hidden" name="product_name" value="{{$token['product_name']}}">
                                <input type="hidden" name="price" value="{{$token['price']}}">
                                {{-- <div class="form-group">
                                    <label for="Amount">Amount</label> --}}
                                    <input type="hidden" name="quantity" placeholder="Token" class="form-control" min=1 required value="{{$token['quantity']}}">
                                {{-- </div> --}}
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Order">
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        @else

        @endif

    </div>
</div>

@endsection

{{-- @section('jsblock')
    <script src="{{asset('backend/assets/vendor/chartsjs/Chart.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/dashboard-charts.js')}}"></script>
@endsection --}}

