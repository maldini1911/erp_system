@extends('Admin.system.app')
@section('title', trans('admin.clients'))
@section('system')
    <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                       <p class="text-center"> <i class="fas fa-user-cog"></i> {{trans('admin.manage-client')}}</p>
                    </div>
                    <div class="card-body text-center">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>{{trans('admin.name')}}</th>
                                    <th>{{trans('admin.mobile')}}</th>
                                    <th>Position</th>
                                    <th>Sales User </th>
                                    <th style="width:50px"> Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(Auth::user()->role == 'admin')
                                    @foreach($rows as $row)
                                        <tr>
                                            <th>{{$row->id}}</th>
                                            <th>{{$row->name ? $row->name : 'null'}}</th>
                                            <th>{{$row->phone ? $row->phone : 'Null'}}</th>
                                            <th>{{$row->position ? $row->position : 'Null'}}</th>
                                            <th>{{$row->user['name'] ? $row->user['name'] : 'Null'}}</th>
                                            <th>
                                                <a href="{{url('admin/manage/clients/create/'.$row->id)}}" class="btn btn-md btn-success">Create Order Request</a>
                                                <a href="{{url('admin/manage/clients/'.$row->id)}}" class="btn btn-danger">{{trans('admin.show')}}</a>
                                            </th>
                                        </tr>
                                    @endforeach
                                @endif

                                @if(Auth::user()->role == 'marketing')
                                    @foreach($rows->where('user_id', Auth::user()->id) as $row)
                                        <tr>
                                            <th>{{$row->id}}</th>
                                            <th>{{$row->name ? $row->name : 'null'}}</th>
                                            <th>{{$row->phone ? $row->phone : 'Null'}}</th>
                                            <th>{{$row->position ? $row->position : 'Null'}}</th>
                                            <th>{{$row->user['name'] ? $row->user['name'] : 'Null'}}</th>
                                            <th>
                                                <a href="{{url('admin/manage/clients/create/'.$row->id)}}" class="btn btn-md btn-success">Create Order Request </a>
                                                <a href="{{url('admin/manage/clients/'.$row->id)}}" class="btn btn-danger">{{trans('admin.show')}}</a>
                                            </th>
                                        </tr>
                                    @endforeach
                                @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Row-->
@endsection
