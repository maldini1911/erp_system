@extends('Admin.system.app')
@section('title', trans('admin.clients'))
@section('system')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{url('admin/programming/tasks/create/'.$project_id.'/'.$user_id)}}" class="btn btn-success">  {{trans('admin.create')}}</a>
                    <p class="text-center"> <i class="fas fa-user-cog"></i> {{trans('admin.requests_programming')}}</p>
                </div>
                <div class="card-body text-center">
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>{{trans('admin.project-name')}}</th>
                                <th>{{trans('admin.task-name')}}</th>
                                <th>Data Line</th>
                                <th>Complate Task </th>
                                <th>Check Teaster</th>
                                <th> Action Status</th>
                                <th> Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @if(auth()->user()->role == 'admin' Or auth()->user()->role == 'programming')
                                @foreach($rows as $row)
                                    <tr>
                                        <th> {{$row->id}}</th>
                                        <th>{{$row->project['project_name']}}</th>
                                        <th>{{$row->task_name}}</th>
                                        <th>{{$row->task_dateline}}</th>
                                        <th>{{$row->status_task}}</th>
                                        <th>{{$row->status_check_tester}}</th>
                                        <th>

                                            @if($row->status_task == 'no')
                                                @if($row->user_id == Auth::user()->id Or $row->project['user_id'] == Auth::user()->id OR auth()->user()->role == 'admin')
                                                    <a href="{{url('admin/complate/task/programmer/'.$row->id)}}" class="btn btn-success btn-sm"> Complate Task </a>
                                                @endif
                                            @endif

                                            @if($row->status_check_tester == 'no' OR $row->status_check_tester == 'refusal')
                                                @if($row->project['teaster_id'] == Auth::user()->id OR auth()->user()->role == 'admin' Or $row->project['user_id'] == Auth::user()->id)
                                                    <a href="{{url('admin/complate/task/teaster/'.$row->id)}}" class="btn btn-success btn-sm"> Complate Teaster </a>
                                                    <a href="{{url('admin/refusal/task/teaster/'.$row->id)}}" class="btn btn-danger btn-sm"> Refusal Teaster </a>
                                                @endif

                                             @else
                                                <span style="color:red">Not Action Teaster</span>
                                            @endif
                                        </th>

                                        <th>
                                            @if(auth()->user()->role == 'admin' Or $row->project['user_id'] == Auth::user()->id)
                                                <a href="{{url('admin/projects/tasks/edit/'.$row->id)}}" class="btn btn-success btn-sm">  {{trans('admin.edit')}} </a>
                                            @endif

                                            @if(auth()->user()->role == 'admin')
                                                <a href="{{url('admin/projects/tasks/delete/'.$row->id)}}" class="btn btn-danger btn-sm"> {{trans('admin.delete')}} </a>
                                            @endif
                                        </th>
                                    </tr>
                                @endforeach
                            @endif

                            </tbody>
                        </table>


                        {{$rows->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Row-->
@endsection
