@extends('Backend.Admin.layouts.auth')
@section('title',"Employers")

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
{{-- Create Token --}}
        <div class="row">
            <div class="col-md-12 page-header">
                <div class="page-pretitle">Create Token</div>
            </div>
        </div>

        <div class="form-div my-3">

            <form action="{{route('create.token')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="pckage">Package</label>
                          <select class="form-control" name="package" id="pckage">
                              <?php
                              $packages= App\Models\Admin\JobAttributs::getAttr('package');
                              ?>
                              @if ($packages)
                                  @foreach ($packages as $item)
                                  <option value="{{ $item->id}}">{{ $item->name}}</option>
                                  @endforeach
                              @else
                              <option></option>
                              @endif

                          </select>
                        </div>

                        <div class="form-group my-1">
                            <label for="dys">Days</label>
                            <input type="number"
                              class="form-control" name="days" id="dys" aria-describedby="helpId" placeholder="" min="1">
                        </div>
                        <div class="form-check my-3">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="user" id="" value="candidate">
                              Candidate
                            </label>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="pname">Product Name</label>
                          <input type="text"
                            class="form-control" name="product_name" id="pname" aria-describedby="helpId" placeholder="">

                        </div>

                        <div class="form-group my-1">
                            <label for="prce">Price</label>
                            <input type="number"
                              class="form-control" name="price" id="prce" aria-describedby="helpId" placeholder="" min="1">
                        </div>



                    </div>



                </div>
                <button type="submit" class="btn btn-primary my-2 w-100">Submit</button>
            </form>
        </div>


        <div class="row">
            <div class="col-md-12 page-header">
                <div class="page-pretitle">Token List</div>
            </div>
        </div>
        <table class="table table-bordered" id="tokenList" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Package</th>
                    <th>Days</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>User</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Package</th>
                    <th>Days</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>User</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @if($allTokens)
                    @foreach ($allTokens as $allToken)
                    <tr>
                        <td><?php echo !is_null(App\Models\Admin\JobAttributs::where('id',$allToken->package))?App\Models\Admin\JobAttributs::where('id',$allToken->package)->select('name')->first()->name:''?></td>
                        <td>{{is_null($allToken['days'])?'':$allToken['days'] }}</td>
                        <td><?php echo is_null($allToken['product_name'])?'':$allToken['product_name']?></td>
                        <td>{{is_null($allToken['price'])?'':$allToken['price']}}</td>
                        <td>{{is_null($allToken['user'])?'':$allToken['user']}}</td>

                        <td>
                            <a name="delete" id="" class="btn btn-danger" href="{{ route('delete.token',$allToken->id)}}" role="button">Delete <i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    @endforeach
                @else

                @endif
            </tbody>
        </table>
    </div>
@endsection

@section('jsblock')
<script>

</script>
@endsection
