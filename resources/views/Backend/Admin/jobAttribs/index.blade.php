@extends('Backend.Admin.layouts.auth')
@section('title',$pt['label'])

@section('content')

<div class="container">
    {{-- <div class="page-title">
        <h3>Tables</h3>
    </div> --}}
    <div class="row">
        <div class="col-md-12 col-lg-12">
               <div class="card">
                    <div class="card-body border-bottom">
                        <h5><?php echo $pt['icon']?>  {{$pt['label']}}
                            <a class="btn btn-tsk float-right mb-2" href="#" data-toggle="modal" data-target="#create_model"><i class="fa fa-plus"></i> Add {{$pt['label']}}</a>
                            {{-- {{$type }}
                            {{ $pt['icon'] }}
                            {{$attributes}} --}}



                        </h5>
                    </div>
                    <div class="card-body  p-0">
                        <table class="table table-sm table-borderless  mb-0">
                            <thead class="bg-tsk-o-1">
                            <tr>
                                <th>Sl</th>
                                @if(in_array($type,['functional_area']))
                                <th>Image</th>
                                @endif
                                <th>Name</th>
                                <th>Status </th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($attributes as $key=>$attribute)
                                <tr>
                                    <td>{{$key+$attributes->firstItem()}}</td>
                                    @if(in_array($type,['functional_area']))
                                        <td>
                                        <img src="{{asset('assets/backend/image/attr/'.$attribute->image)}}" style="width: 80px">
                                        </td>
                                    @endif
                                    <td>{{$attribute->name}}</td>
                                    <td><span class="badge {{$attribute->status?'badge-success':'badge-danger'}}">{{$attribute->status?'Active':'Inactive'}}</span></td>
                                    <td class="text-right">
                                        <a class="btn btn-sm btn-tsk edit_btn"
                                        data-name="{{$attribute->name}}"
                                        data-status="{{$attribute->status}}"
                                        data-url="{{route('admin.jobAttrib.update',[$type,$attribute->id])}}"
                                        data-toggle="modal"
                                        data-target="#edit_model"><i class="fa fa-edit"></i> Edit</a>
                                        <a href="#" class="btn btn-sm btn-danger" onclick="confirm('Are you sure delete this data?')?$('#delete_{{$attribute->id}}').submit():false"><i class="fa fa-trash"></i> Delete</a>
                                        <form method="post" action="{{route('admin.jobAttrib.delete',[$type,$attribute->id])}}" id="delete_{{$attribute->id}}">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-danger">No data found !</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <div class="d-flex">
                            <div class="mx-auto">
                                {{$attributes->links()}}
                            </div>
                        </div>

                    </div>

                </div>
        </div>
    </div>

</div>



            <!-- Button trigger modal -->
            {{-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
            Launch
            </button> --}}

            <!-- Modal -->
            <div class="modal fade" id="create_model" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Create New {{$pt['label']}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('admin.jobAttrib.store',$type)}}" method="post" enctype="multipart/form-data">
                                        @csrf

                                        @if($type == 'proffessional_group')
                                        <div class="form-row">
                                                <select class="form-control form-control-lg col-md-12" name="functional_area_id" required>
                                                    <option value="">Select Role</option>
                                                    @foreach ($functionalArea as $role)
                                                    <option value="{{ $role->id}}"


                                                    {{ (\App\Model\Proffesional_membership::latest()->first('functional_area_id')->functional_area_id)==$role->id ?'selected':'' }}


                                                    > {{ $role->name}} </option>
                                                    @endforeach
                                                </select>
                                        </div>
                                        @endif

                                        @if(in_array($type,['functional_area']))
                                        <div class="form-row">
                                            <label><strong>Image</strong> </label>
                                            <input type="file" class="form-control form-control-lg col-md-12" name="image">
                                        </div>
                                        @endif
                                        <div class="form-row">
                                            <label><strong>Name</strong> </label>
                                            <input class="form-control form-control-lg col-md-12" name="name">
                                        </div>
                                        <div class="form-row">
                                            <label><strong>Status</strong> </label>
                                            <input data-toggle="toggle" checked data-height="40px" data-on="Active" data-off="Inactive" data-onstyle="success" data-offstyle="danger" data-width="100%" type="checkbox" name="status">

                                        </div>
                                        <div class="form-row">

                                            <div class="col-md-12">
                                                <hr/>
                                                <button type="submit" class="btn btn-block btn-tsk mt-2"><i class="fa fa-save"></i> Save</button>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                        {{-- <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save</button>
                        </div> --}}
                    </div>
                </div>
            </div>

             <div class="modal fade" id="edit_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit {{$pt['label']}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" id="edit_form" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                @if(in_array($type,['functional_area']))
                                    <div class="form-row">
                                        <label><strong>Image</strong> </label>
                                        <input type="file" class="form-control form-control-lg col-md-12" name="image">
                                    </div>
                                    @endif
                                <div class="form-row">
                                    <label><strong>Name</strong> </label>
                                    <input class="form-control form-control-lg col-md-12" name="name" id="name">
                                </div>
                                <div class="form-row">
                                    <label><strong>Status</strong> </label>
                                    <input data-toggle="toggle" id="status" checked data-height="40px"  data-on="Active" data-off="Inactive" data-onstyle="success" data-offstyle="danger" data-width="100%" type="checkbox" name="status">

                                </div>
                                <div class="form-row">

                                    <div class="col-md-12">
                                        <hr/>
                                        <button type="submit" class="btn btn-lg btn-block btn-tsk mt-2"><i class="fa fa-save"></i> Update</button>
                                    </div>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>








    @endsection

@section('jsblock')
<script>


    $(document).ready(function(){

        $(document).on('click','.edit_btn', function(){
            $('#edit_form').attr('action',$(this).data('url'));
            $('#id').val($(this).data('id'));
            $('#name').val($(this).data('name'));
            $('#status').bootstrapToggle($(this).data('status')?'on':'off')
        });

        $('#exampleModal').on('show.bs.modal', event => {
        var button = $(event.relatedTarget);
        var modal = $(this);
        // Use above variables to manipulate the DOM

        });

    });

</script>
@endsection
