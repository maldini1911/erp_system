@extends('Admin.system.app')
@section('title', trans('admin.clients'))
@section('system')
<!-- Start Datatable -->
<div class="row text-center">
    <div class="col-lg-12">
        <div class="card">
        <div class="card-header">
        <a href="{{url('admin/programming/projects/create')}}" class="btn btn-md btn-success float-left">{{trans('admin.create')}}</a>
        <i class="fa fa-table"></i> Data Projects
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>{{trans('admin.project-name')}}</th>
                            <th>{{trans('admin.client-name')}}</th>
                            <th>{{trans('admin.project-type')}}</th>
                            <th>{{trans('admin.count-programmers')}}</th>
                            <th>{{trans('admin.programmers')}}</th>
                            <th>Leader Project</th>
                            <th>{{trans('admin.status')}}</th>
                            <th>Preview Project</th>
                            <th> Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(Auth::user()->role == 'admin')
                            @foreach($rows as $row)
                                <td>{{$row->id}}</td>
                                <td>{{$row->project_name}}</td>
                                <td>{{App\Models\ProgrammingRequest::where('id', $row->client_id)->count() > 0 ? $row->programming_request->client['name'] : 'Null'}}</td>
                                <td>{{$row->project_type}}</td>
                                <td>{{$row->count_programmers}}</td>
                                <td>
                                    <a href="{{url('admin/projects/programmers/'.$row->id)}}" class="btn btn-primary btn-sm"> {{trans('admin.show')}}</a>
                                </td>
                                <td>{{$row->user['name']}}</td>
                                <td>{{$row->project_status}}</td>
                                <td>
                                    <a href="{{url('programming/projects/preview/'.$row->id)}}" class="btn btn-primary btn-sm"> preview </a>
                                </td>
                                <td>
                                    <a href="{{url('admin/programming/projects/'.$row->id)}}" class="btn btn-primary btn-sm"> {{trans('admin.show')}}</a>
                                    <a href="{{url('admin/programming/projects/'.$row->id.'/edit')}}" class="btn btn-success btn-sm"> {{trans('admin.edit')}}</a>
                                    <a href="{{url('programming/projects/delete/'.$row->id)}}" class="btn btn-danger btn-sm"> {{trans('admin.delete')}}</a>
                                </td>
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
