@extends('Admin.system.app')
@section('title', trans('admin.tasks'))
@section('system')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <p class="text-center"> <i class="fas fa-user-cog"></i> {{trans('admin.tasks')}}</p>
                </div>
                <div class="card-body text-center">
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>{{trans('admin.project-name')}}</th>
                                <th>Team Leader</th>
                                @if(auth()->user()->role == 'admin')
                                    <th>Programmer Name</th>
                                @endif

                                <th>{{trans('admin.tasks')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(auth()->user()->role == 'admin')
                                @foreach($rows as $row)
                                    <tr>
                                        <th> {{$row->id}}</th>
                                        <th>{{$row->project['project_name']}}</th>
                                        <th>{{$row->project->user['name']}}</th>
                                        <th>{{$row->user['name']}}</th>
                                        <th>
                                            <a href="{{url('admin/programming/tasks/'.$row->project['id'].'/'.$row->user['id'])}}" class="btn btn-info btn-sm"> {{trans('admin.tasks')}}</a>
                                        </th>
                                    </tr>
                                @endforeach
                            @endif

                            @if(auth()->user()->role == 'programming')
                                @foreach($rows->where('user_id', Auth::user()->id) as $row)
                                    <tr>
                                        <th> {{$row->id}}</th>
                                        <th>{{$row->project['project_name']}}</th>
                                        <th>{{$row->project->user['name']}}</th>
                                        <th>
                                            <a href="{{url('admin/programming/tasks/'.$row->project['id'].'/'.$row->user['id'])}}" class="btn btn-info btn-sm"> {{trans('admin.tasks')}}</a>
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
