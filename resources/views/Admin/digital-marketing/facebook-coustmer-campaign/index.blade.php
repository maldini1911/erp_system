@extends('Admin.system.app')
@section('title', trans('admin.clients'))
@section('system')
    <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{url('admin/facebook/coustmer/campaign/create')}}" class="btn btn-md btn-success float-left">Create</a>
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
                                    <th>{{trans('admin.campaign-type')}}</th>
                                    <th>{{trans('admin.started')}}</th>
                                    <th>{{trans('admin.full-budget')}}</th>
                                    <th>{{trans('admin.custom-budget')}}</th>
                                    <th>Customer Cost</th>
                                    <th>User</th>
                                    <th> Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(auth()->user()->role == 'admin')
                                    @foreach($rows as $row)
                                    <tr>
                                        <th>{{$row->id}}</th>
                                        <th>
                                        {{ $row->order_request_marketing->client['name'] }}
                                        </th>
                                        <th>
                                            {{ $row->order_request_marketing->client['phone'] }}
                                        </th>
                                        <th>{{$row->campaign_type ? $row->campaign_type : 'Null'}}</th>
                                        <th>{{$row->started ? $row->started : 'Null'}}</th>
                                        <th>{{$row->full_budget ? $row->full_budget : 'Null'}}</th>
                                        <th>{{$row->full_budget ? $row->custom_budget : 'Null'}}</th>
                                        <th> {{$row->user['name']}}</th>
                                        <th>
                                            <a href="{{url('admin/facebook/coustmer/campaign/'.$row->id)}}" class="btn btn-info btn-sm">{{trans('admin.show')}}</a>
                                            <a href="{{url('admin/facebook/coustmer/campaign/'.$row->id.'/edit')}}" class="btn btn-success btn-sm">{{trans('admin.edit')}}</a>
                                            <a href="{{url('admin/facebook/coustmer/campaign/delete/'.$row->id)}}" class="btn btn-danger btn-sm">{{trans('admin.delete')}}</a>
                                        </th>
                                    </tr>
                                    @endforeach
                                @endif

                                @if(Auth::user()->role == 'marketing')
                                    @foreach($rows->where('user_id', Auth::user()->id) as $row)
                                    <tr>
                                        <th>{{$row->id}}</th>
                                        <th>
                                            {{ $row->order_request_marketing->client['name'] }}
                                        </th>
                                        <th>
                                            {{ $row->order_request_marketing->client['phone'] }}
                                        </th>
                                        <th>{{$row->campaign_type ? $row->campaign_type : 'Null'}}</th>
                                        <th>{{$row->started ? $row->started : 'Null'}}</th>
                                        <th>{{$row->full_budget ? $row->full_budget : 'Null'}}</th>
                                        <th>{{$row->custom_budget ? $row->custom_budget : 'Null'}}</th>
                                        <th>{{ ceil($row->custom_budget / $row->messages_quantity) }} EGP </th>
                                        <th> {{$row->user['name']}}</th>
                                        <th>
                                            <a href="{{url('admin/facebook/coustmer/campaign/'.$row->id)}}" class="btn btn-info btn-sm">{{trans('admin.show')}}</a>
                                            @if($row->messages_quantity != null Or $row->reached != null Or $row->engagement != null Or $row->comments != null
                                            Or $row->likes != null or $row->total_clicks != null Or $row->page_likes != null)
                                            @else
                                            <a href="{{url('admin/facebook/coustmer/campaign/'.$row->id.'/edit')}}" class="btn btn-success btn-sm">{{trans('admin.edit')}}</a>
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
