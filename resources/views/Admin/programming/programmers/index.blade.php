@extends('Admin.system.app')
@section('title', trans('admin.clients'))
@section('system')
<!-- Start Datatable -->
<div class="row text-center">
    <div class="col-lg-12">
        <div class="card">
        <div class="card-header">
        <a href="{{url('admin/projects/programmers/create/'.$project_id)}}" class="btn btn-md btn-success float-left">{{trans('admin.create')}}</a>
        <i class="fa fa-table"></i> Data Projects
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>{{trans('admin.project-name')}}</th>
                            <th>Programmer</th>
                            <th style="width:50px"> Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(Auth::user()->role == 'admin' OR $row->project['user_id'] == Auth::user()->id)
                            @foreach($rows as $row)
                                <tr>
                                    <td>{{$row->id}}</td>
                                    <td>{{$row->project['project_name']}}</td>
                                    <td>{{$row->user['name']}}</td>
                                    <td>
                                        <a href="{{url('admin/projects/programmers/edit/'.$row->id)}}" class="btn btn-success btn-sm"> {{trans('admin.edit')}}</a>
                                        <a href="{{url('admin/projects/programmers/delete/'.$row->id)}}" class="btn btn-danger btn-sm"> {{trans('admin.delete')}}</a>
                                    </td>
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
<!-- End Datatable -->
@endsection
