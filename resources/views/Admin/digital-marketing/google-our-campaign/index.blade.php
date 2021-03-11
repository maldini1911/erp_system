@extends('Admin.system.app')
@section('title', trans('admin.clients'))
@section('system')
    <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{url('admin/google/our/campaign/create')}}" class="btn btn-md btn-success float-left">Create</a>
                       <p class="text-center"> <i class="fas fa-user-cog"></i> {{trans('admin.customer-campaign')}}</p>
                    </div>
                    <div class="card-body text-center">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>{{trans('campaign-type')}}</th>
                                    <th>{{trans('started')}}</th>
                                    <th>{{trans('ended')}}</th>
                                    <th>{{trans('full-budget')}}</th>
                                    <th>User</th>
                                    <th> Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(auth()->user()->role == 'admin')
                                    @foreach($rows as $row)

                                    <tr>
                                        <th>{{$row->id}}</th>
                                        <th>{{$row->campaign_type ? $row->campaign_type : 'Null'}}</th>
                                        <th>{{$row->started ? $row->started : 'Null'}}</th>
                                        <th>{{$row->ended ? $row->ended : 'Null'}}</th>
                                        <th>{{$row->full_budget ? $row->full_budget : 'Null'}}</th>
                                        <th>{{$row->user['name'] ? $row->user['name'] : 'Null'}}</th>
                                        <th>
                                            <a href="{{url('admin/google/our/campaign/'.$row->id)}}" class="btn btn-info btn-sm">{{trans('admin.show')}}</a>
                                            <a href="{{url('admin/google/our/campaign/'.$row->id.'/edit')}}" class="btn btn-success btn-sm">{{trans('admin.edit')}}</a>
                                            <a href="{{url('admin/google/our/campaign/delete/'.$row->id)}}" class="btn btn-danger btn-sm">{{trans('admin.delete')}}</a>
                                        </th>
                                    </tr>
                                    @endforeach
                                @endif

                                @if(auth()->user()->role == 'marketing')
                                    @foreach($rows->where('user_id', Auth::user()->id) as $row)

                                    <tr>
                                        <th>{{$row->id}}</th>
                                        <th>{{$row->campaign_type ? $row->campaign_type : 'Null'}}</th>
                                        <th>{{$row->started ? $row->started : 'Null'}}</th>
                                        <th>{{$row->ended ? $row->ended : 'Null'}}</th>
                                        <th>{{$row->full_budget ? $row->full_budget : 'Null'}}</th>
                                        <th>{{$row->user['name'] ? $row->user['name'] : 'Null'}}</th>
                                        <th>
                                            <a href="{{url('admin/google/our/campaign/'.$row->id)}}" class="btn btn-info btn-sm">{{trans('admin.show')}}</a>
                                            @if($row->impression != null OR $row->clicks != null Or $row->ctr != null Or $row->roi != null)
                                            @else
                                            <a href="{{url('admin/google/our/campaign/'.$row->id.'/edit')}}" class="btn btn-success btn-sm">{{trans('admin.edit')}}</a>
                                            @endif
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
