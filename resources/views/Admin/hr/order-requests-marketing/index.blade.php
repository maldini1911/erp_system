@extends('Admin.system.app')
@section('title', trans('admin.clients'))
@section('system')
    <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                       <p class="text-center"> <i class="fas fa-user-cog"></i> {{trans('admin.customer-campaign')}}</p>
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
                                    @if(auth()->user()->role == 'admin')
                                    <th>User</th>
                                    @endif
                                    <th> Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(auth()->user()->role == 'admin')
                                    @foreach($rows as $row)
                                        <tr>
                                            <th> {{$row->id}}</th>
                                            <th> {{App\Models\Client::where('id', [$row->client_id])->count() > 0  ? $row->client['name'] : 'Null'}} </th>
                                            <th>{{App\Models\Client::where('id', [$row->client_id])->count() > 0  ? $row->client['phone'] : 'Null'}} </th>
                                            <th> {{$row->hr['name']}}</th>
                                            <th> {{$row->status != null ? $row->status : 'Not Selected'}}</th>
                                            @if(auth()->user()->role == 'admin')
                                            <th> {{$row->hr['name']}}</th>
                                            @endif
                                            <th>
                                                <a href="{{url('admin/requests/marketing/'.$row->id)}}" class="btn btn-info"> {{trans('admin.show')}}</a>
                                                <a href="{{url('admin/requests/marketing/'.$row->id.'/edit')}}" class="btn btn-success"> {{trans('admin.edit')}}</a>
                                                <a href="{{url('admin/requests/marketing/delete/'.$row->id)}}" class="btn btn-danger"> {{trans('admin.delete')}}</a>
                                            </th>
                                        </tr>
                                    @endforeach
                                @endif

                                @if(Auth::user()->role == 'hr')
                                    @foreach($rows->where('hr_id', Auth::user()->id) as $row)
                                        <tr>
                                            <th> {{$row->id}}</th>
                                            <th> {{$row->manage_client->client['name']}}</th>
                                            <th> {{$row->manage_client->client['phone']}}</th>
                                            <th> {{$row->hr['name']}}</th>
                                            <th> {{$row->status != null ? $row->status : 'Not Selected'}}</th>
                                            <th>
                                                <a href="{{url('admin/requests/marketing/'.$row->id)}}" class="btn btn-info"> {{trans('admin.show')}}</a>
                                                <a href="{{url('admin/requests/marketing/'.$row->id.'/edit')}}" class="btn btn-success"> {{trans('admin.edit')}}</a>
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
