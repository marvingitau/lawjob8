@extends('Backend.Admin.layouts.auth')
@section('title',"Candidates")

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 page-header">
                <div class="page-pretitle">Candidates Profile List</div>
            </div>
        </div>
        <table class="table table-bordered" id="empList" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @if($candidates)
                    @foreach ($candidates as $candidate)
                    <tr>
                        <td>{{$candidate->fname }}</td>
                        <td>{{$candidate->lname }}</td>
                        <td>{{$candidate->phone}}</td>
                        <td>{{$candidate->gender}}</td>
                        <td>{{$candidate->dob }}</td>

                        <td>
                            <a style="padding: 0.4rem;" name="delete" id="" class="btn btn-danger" href="{{ route('delete.candidate',$candidate->user_id)}}" role="button" onclick="return confirm('Are you sure?')" >Delete <i class="fa fa-trash" aria-hidden="true"></i></a>
                            <a style="padding: 0.4rem;" name="delete" id="" class="btn btn-primary" href="{{ route('view.candidate',$candidate->user_id)}}" role="button" >View <i class="fa fa-eye" aria-hidden="true"></i></a>
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
