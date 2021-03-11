@extends('Admin.system.app')

@section('system')
    <div class="show-admins">
        <div class="container">
            <!-- Start Show Admin -->
            <div class="card">
                <div class="card-body">

                <a href="{{url('admin/admins')}}" class="btn btn-primary"><i class="fas fa-edit"></i> All Admins</a>
                <hr>
                <h4 class="alert alert-primary" style="padding:10px">Add New file </h4>
                <div class="row">
                    <div class='col-lg-6'>
                        <form action="{{url('admin/admins/attachments/admin')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="attachments-user">
                                <div class="form-group attchment">
                                    <label for="input-24">File Type</label>
                                    <input type="text" class="form-control" name="file_type[]">
                                    <label for="input-24">File</label>
                                    <input type="file" class="form-control" name="file[]">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-dark shadow-dark px-5"><i class="icon-lock"></i> {{trans('admin.add')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <hr>
                <div class="row">
                    @foreach($rows as $row)
                    <div class="col-lg-4 pt-5 text-center">
                        <div class="card">
                            <div class="float-card">
                                <img class="rounded" src="{{url('/')}}/uploads/admins/attachments/{{$row->file}}" alt="Card image cap">
                            </div>
                            <div class="card-body float-card-content">
                                <h5 class="card-title text-primary text-center">{{$row->file_type}}</h5>
                                <hr>
                                <!-- Start Delete -->
                                <a href="{{url('admin/admins/attachments/delete/'.$row->id)}}" class="btn btn-danger"> {{trans("admin.delete")}}</a>
                                <!-- End Delete -->

                               <!-- Trigger the modal with a button -->
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal{{$row->id}}">{{trans('admin.edit')}}</button>

                                <!-- Modal -->
                                <div id="myModal{{$row->id}}" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">

                                    <div class="modal-body">
                                        <!-- Start Attachments -->
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <h4 class="alert alert-primary text-center" style="padding:10px 0"> Add Attachments </h4>
                                                    <form action="{{url('admin/admins/attachments/edit/'.$row->id)}}" method="POST" enctype="multipart/form-data">
                                                        {{csrf_field()}}
                                                        {{method_field('PUT')}}
                                                        <div class="attachments-user">
                                                            <div class="form-group attchment">
                                                                <label for="input-24">File Type</label>
                                                                <input type="text" class="form-control" name="file_type" value="{{$row->file_type}}">
                                                                <hr>
                                                                <label for="input-24">File</label>
                                                                <input type="file" class="form-control" name="file">
                                                                <input type="hidden" class="form-control" name="user_id" value="{{$row->user_id}}">
                                                                <hr>
                                                                <button type="submit" class="btn btn-dark shadow-dark px-5"><i class="icon-lock"></i> {{trans('admin.edit')}}</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Attachments -->
                                    </div>
                                    <div class="modal-footer">
                
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                    </div>

                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                </div>
            </div>
            <!-- End Show Admin -->



        </div>
    </div>
@endsection
