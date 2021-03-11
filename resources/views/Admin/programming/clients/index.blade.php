@extends('Admin.system.app')
@section('title', trans('admin.clients'))
@section('system')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <p class="text-center"> <i class="fas fa-user-cog"></i> {{trans('admin.requests_programming')}}</p>
                </div>
                <div class="card-body text-center">
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>{{trans('admin.client-name')}}</th>
                                <th>{{trans('admin.mobile')}}</th>
                                <th>HR</th>
                                <th>{{trans('admin.status')}}</th>
                                <th> Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(auth()->user()->role == 'admin')
                                @foreach($rows as $row)
                                    <tr>
                                        <th> {{$row->id}}</th>
                                        <th> {{App\Models\Client::where('id', '=', $row->client_id)->count() > 0 ? $row->client['name'] : 'Null'}} </th>
                                        <th> {{App\Models\Client::where('id', '=', $row->client_id)->count() > 0 ? $row->client['phone'] : 'Null'}} </th>
                                        <th> {{$row->hr['name']}}</th>
                                        <th> {{$row->status != null ? $row->status : 'Not Selected'}}</th>
                                        <th>
                                            <a href="{{url('admin/programming/clients/'.$row->id)}}" class="btn btn-info"> {{trans('admin.show')}}</a>
                                        </tr>
                                @endforeach
                            @endif

                            @if(Auth::user()->role == 'programming')
                                @foreach($rows->where('hr_id', Auth::user()->id) as $row)
                                    <tr>
                                        <th> {{$row->id}}</th>
                                        <th> {{$row->manage_client->client['name']}}</th>
                                        <th> {{$row->manage_client->client['phone']}}</th>
                                        <th> {{$row->hr['name']}}</th>
                                        <th> {{$row->status != null ? $row->status : 'Not Selected'}}</th>
                                        <th>
                                            <a href="{{url('admin/programming/clients/'.$row->id)}}" class="btn btn-info"> {{trans('admin.show')}}</a>
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
