@extends('Backend.Candidate.layouts.auth')

@section('title',"Cart")
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
        <div class="col-lg-12">
              <div class="card">
                <div class="card-header">Cart Items</div>
                     @if(count($cart_data))
                    <div class="card-body">
                            {{-- <p class="card-title">Add class <code>.table</code> inside table element</p> --}}
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Package</th>
                                            <th>Quantity</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cart_data as $key=>$cart)
                                        <tr>
                                            <th scope="row">{{ $key}}</th>
                                            <td>{{ $cart['name'] }}</td>
                                            <td>{{ number_format($cart['price']) }}</td>
                                            <td>{{ $cart['attributes']['package'] }}</td>
                                            <td>
                                                 <div class="cart_quantity_button">
                                                    <a class="cart_quantity_up" href="{{url('/candidate/Cart/Update-quantity/'.$key.'/1')}}" style="font-size:1rem;"> + </a>
                                                    <input class="cart_quantity_input" type="text" name="quantity" value="{{$cart['quantity']}}"  disabled autocomplete="off" size="2">
                                                    @if($cart['quantity']>1)
                                                        <a class="cart_quantity_down" href="{{url('/candidate/Cart/Update-quantity/'.$key.'/-1')}}" style="font-size:1rem;"> - </a>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                 <a class="cart_quantity_delete" href="{{url('/candidate/Cart/Delete/'.$key)}}"><i class="fa fa-times text-danger"></i></a>
                                            </td>

                                        </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>

                               <section id="do_action">
                                    <h4 class="text-right">TOTAL</h4>
                                    <table class="table table-bordered table-condensed custom_carts ">
                                            <tr>

                                                    <tr>
                                                        <td> <b>Sub-Total</b></td>
                                                        <td>Ksh <b> {{ number_format($total_price)}}</b></td>
                                                    </tr>

                                                    <tr>
                                                        <td><b>VAT</b> </td>
                                                        <td>{{ env('VAT')}}%</td>
                                                    </tr>


                                                    <tr>
                                                        <td><b>Total</b></td>
                                                        <td>Ksh <b>{{ number_format($plus_vat)}}</b>  </td>
                                                    </tr>


                                            </tr>

                                    </table>

                                        <form action="{{route('candidate.checkout.cart')}}" method="post">
                                            @csrf
                                            @if(count($cart_data))
                                            @foreach ($cart_data as $key=>$cart)
                                            <input type="hidden" name="quantity[]" value="{{ $cart['quantity']}}">
                                            <input type="hidden" name="grand_total[]" value="{{ $cart['quantity'] *  $cart['price'] }}">
                                            <input type="hidden" name="package[]" value="{{ $cart['attributes']['package']}}">
                                            <input type="hidden" name="duration[]" value="{{ $key}}">


                                            @endforeach
                                            @if ($user_profile_exists>0)
                                                <button type="submit" class="btn btn-primary rounded-0">Buy T-okens</button>
                                            @else
                                                <button class="btn btn-primary rounded-0" disabled>Create Your Profile to Continue</button>
                                            @endif
                                            @endif
                                        </form>


                                    </section><!--/#do_action-->

                        </div>

                    @endif
            </div>
        </div>



    </div>
</div>

@endsection

{{-- @section('jsblock')
    <script src="{{asset('backend/assets/vendor/chartsjs/Chart.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/dashboard-charts.js')}}"></script>
@endsection --}}

