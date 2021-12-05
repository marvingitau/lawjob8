@extends('Backend.Admin.layouts.auth')
@section('title',"Employers")

@section('content')
    <div class="container">
        @if(Session::has('warning'))
        <div class="alert alert-warning text-center" role="alert">
            <strong>Alert! &nbsp;</strong>{{Session::get('warning')}}
        </div>
        @endif
        <div class="row">
            <div class="col-md-12 page-header">
                <div class="page-pretitle">Employer List</div>
            </div>
        </div>
        <table class="table table-bordered" id="empList" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Company</th>
                    <th>City</th>
                    <th>Phone</th>
                    <th>Hr</th>
                    <th>HR Phone</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Company</th>
                    <th>City</th>
                    <th>Phone</th>
                    <th>Hr</th>
                    <th>HR Phone</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @if($employerData)
                    @foreach ($employerData as $employerDatum)
                    <tr>
                        <td>{{$employerDatum->name }}</td>
                        <td>{{is_null($employerDatum->profile)?'':$employerDatum->profile->company_name }}</td>
                        <td>{{is_null($employerDatum->profile)?'':$employerDatum->profile->location }}</td>
                        <td>{{is_null($employerDatum->userData)?'':$employerDatum->userData->phone}}</td>
                        <td>{{is_null($employerDatum->userData)?'':$employerDatum->userData->employer_hr_name }}</td>
                        <td>{{is_null($employerDatum->userData)?'':$employerDatum->userData->employer_hr_email }}</td>
                        <td>
                            <button type="button" name="" id="" class="{{ $employerDatum->approved?'btn btn-primary':'btn btn-warning' }}">{{ $employerDatum->approved?'Approved':'Pending' }}</button>
                        </td>
                        <td>
                            <a style="padding: 0.4rem;"name="delete" id="" class="btn btn-danger my-1" href="{{ route('delete.employer',$employerDatum->id)}}" role="button" onclick="return confirm('Are you sure?')" >Delete <i class="fa fa-trash" aria-hidden="true"></i></a>
                            <a style="padding: 0.4rem;"name="view" id="" class="btn btn-primary my-1" href="{{ route('view.employer',$employerDatum->id)}}" role="button">View <i class="fa fa-eye" aria-hidden="true"></i></a>
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
