@extends('Backend.Admin.layouts.auth')
@section('title',"Employers")

@section('content')
    <div class="container">
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
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @if($employerData)
                    @foreach ($employerData as $employerDatum)
                    <tr>
                        <td>{{$employerDatum->name }}</td>
                        <td>{{is_null($employerDatum->profile)?'':$employerDatum->profile->company_name }}</td>
                        <td>{{is_null($employerDatum->profile->location)?'':$employerDatum->profile->location }}</td>
                        <td>{{is_null($employerDatum->userData->phone)?'':$employerDatum->userData->phone}}</td>
                        <td>{{is_null($employerDatum->userData->employer_hr_name)?'':$employerDatum->userData->employer_hr_name }}</td>
                        <td>{{is_null($employerDatum->userData->employer_hr_email)?'':$employerDatum->userData->employer_hr_email }}</td>
                        <td>
                            <a name="delete" id="" class="btn btn-danger" href="{{ route('delete.employer',$employerDatum->id)}}" role="button">Delete <i class="fa fa-trash" aria-hidden="true"></i></a>
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
