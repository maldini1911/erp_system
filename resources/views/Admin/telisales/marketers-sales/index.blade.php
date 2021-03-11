@extends('Admin.system.app')
@section('title', trans('admin.clients'))
@section('system')
    <!-- Start Datatable -->
    <div class="row text-center">
        <div class="col-lg-12">
            <div class="card">
            <div class="card-header">
            <a href="{{url('admin/clients/create')}}" class="btn btn-md btn-success float-left">Create</a>
            <i class="fa fa-table"></i> Data Clients
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Country</th>
                                <th>Response</th>
                                <th>Status</th>
                                <th> Marketer </th>
                                <th> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(Auth::user()->role == 'admin')
                                @foreach($clients as $data_val)
                                    <tr role="row" class="odd">
                                        <td>{{$data_val->id}}</td>
                                        <td class="sorting_1">{{$data_val->name ? $data_val->name : 'Null'}}</td>

                                        <td>{{$data_val->phone ? $data_val->phone  : 'Null'}}</td>
                                        <td>
                                            @if($data_val->country_id != null)
                                            {{$data_val->country['country_name']}}
                                            @else
                                            Null
                                            @endif
                                        </td>

                                        <td><?php if($data_val->source ==1){echo 'Guide Book'; }elseif($data_val->source==2){echo 'Marketing';}elseif($data_val->source==3){echo 'Personal';}elseif($data_val->source==4){echo 'Other';}else{echo "Not Select";} ?></td>
                                        <td><?php if($data_val->response ==1){echo 'Active'; }elseif($data_val->response==2){echo 'Not Intersted';}elseif($data_val->response==3){echo 'Done';}else{echo "Not Select";} ?></td>
                                        <td> {{$data_val->from_user_id ? $data_val->user['name'] : 'Null'}}</td>
                                        <td>
                                            <a href="{{url('admin/clients/'.$data_val->id)}}" class="btn btn-sm btn-primary">{{trans('admin.show')}}</a>
                                            <a href="{{url('admin/clients/'.$data_val->id.'/edit')}}" class="btn btn-sm btn-success">{{trans('admin.edit')}}</a>
                                            <a href="{{url('admin/clients/delete/'.$data_val->id)}}" class="btn btn-sm btn-danger">{{trans('admin.delete')}}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif


                            @if(Auth::user()->role == 'sales')
                                @foreach($clients->where('user_id', Auth::user()->id) as $data_val)
                                    <tr role="row" class="odd">
                                        <td>{{$data_val->id}}</td>
                                        <td class="sorting_1">{{$data_val->name ? $data_val->name : 'Null'}}</td>

                                        <td>{{$data_val->phone ? $data_val->phone  : 'Null'}}</td>
                                        <td>
                                            @if($data_val->country_id != null)
                                            {{$data_val->country['country_name']}}
                                            @else
                                            Null
                                            @endif
                                        </td>


                                        <td><?php if($data_val->source ==1){echo 'Guide Book'; }elseif($data_val->source==2){echo 'Marketing';}elseif($data_val->source==3){echo 'Personal';}elseif($data_val->source==4){echo 'Other';}else{echo "Not Select";} ?></td>
                                        <<td><?php if($data_val->response ==1){echo 'Active'; }elseif($data_val->response==2){echo 'Not Intersted';}elseif($data_val->response==3){echo 'Done';}else{echo "Not Select";} ?></td>
                                        <td>
                                            <a href="{{url('admin/clients/'.$data_val->id)}}" class="btn btn-sm btn-primary">{{trans('admin.show')}}</a>
                                            <a href="{{url('admin/clients/'.$data_val->id.'/edit')}}" class="btn btn-sm btn-success">{{trans('admin.edit')}}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    {{$clients->links()}}
            </div>
            </div>
            </div>
        </div>
    </div><!-- End Row-->
    <!-- End Datatable -->
@endsection
