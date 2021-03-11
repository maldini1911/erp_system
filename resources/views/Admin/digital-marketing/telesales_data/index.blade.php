@extends('Admin.system.app')
@section('title', trans('admin.clients'))
@section('system')
    <!-- Start Datatable -->
    <div class="row text-center">
        <div class="col-lg-12">
            <div class="card">
            <div class="card-header">
            @if(Auth::user()->role == 'marketing')
            <div class="row">
                <div class='col-lg-12' style="padding: 120px">
                    <form action="{{url('admin/telesales/excel')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="file" class="form-control" name="telesales_data">
                        <br>
                        <button type="submit" class="btn btn-success"> Bulck Upload </button>
                        <a href="" class="btn btn-info"> Download Thuminal </a>
                        <hr>
                    </form>
                </div>
            </div>
            @endif

            @if(Auth::user()->role == 'admin')
                <div class="row">
                    <div class='col-lg-5' style="background: #f1f1f1;padding: 120px">
                        <form action="{{url('admin/telesales/excel')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="file" class="form-control" name="telesales_data">
                            <br>
                            <button type="submit" class="btn btn-success"> Bulck Upload </button>
                            <a href="" class="btn btn-info"> Download Thuminal </a>
                            <hr>
                        </form>
                    </div>
                </div>
            @endif

           @if(Auth::user()->role == 'admin')
             <hr>
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
                                <th>Markter</th>
                                <th>Campiagn ID</th>
                                <th>Campiagn Type</th>
                                <th style="width:100px"> Action</th>
                            </tr>
                        </thead>
                        <tbody>

                                @foreach($rows as $row)
                                    <tr role="row" class="odd">
                                        <td>{{$row->id}}</td>
                                        <td>{{$row->client_id ? $row->client['name'] : 'Null'}}</td>
                                        <td>{{$row->client_id ? $row->client['phone'] : 'Null'}}</td>
                                        <td>{{$row->user_id ? $row->user['name'] : 'Null'}}</td>
                                        <td>
                                            @if($row->campaign_type == 'facebook-our')
                                                <a href="{{url('admin/facebook/our/campaign/'.$row->campaign_id)}}" class="btn btn-sm btn-primary">{{$row->campaign_id}}</a>
                                            @elseif($row->campaign_type == 'google-our')
                                                <a href="{{url('admin/google/our/campaign/'.$row->campaign_id)}}" class="btn btn-sm btn-primary">{{$row->campaign_id}}</a>
                                            @else
                                                Not Found Campaign
                                            @endif
                                        </td>

                                        <td>
                                            @if($row->campaign_type == 'facebook-our')
                                                <a href="{{url('admin/facebook/our/campaign/'.$row->campaign_id)}}" class="btn btn-sm btn-primary">{{trans('admin.show')}} Campaign</a>
                                            @elseif($row->campaign_type == 'google-our')
                                                <a href="{{url('admin/google/our/campaign/'.$row->campaign_id)}}" class="btn btn-sm btn-primary">{{$row->campaign_id}}</a>
                                            @else
                                                Not Found Campaign
                                            @endif
                                        </td>
                                        <td>
                                            @if($row->campaign_type == 'facebook-customer')
                                                <a href="{{url('admin/facebook/coustmer/campaign/'.$row->campaign_id)}}" class="btn btn-sm btn-primary">{{trans('admin.show')}} Campaign</a>
                                            @elseif($row->campaign_type == 'facebook-our')
                                                <a href="{{url('admin/facebook/our/campaign/'.$row->campaign_id)}}" class="btn btn-sm btn-primary">{{trans('admin.show')}} Campaign</a>
                                            @elseif($row->campaign_type == 'google-customer')
                                                <a href="{{url('admin/google/coustmer/campaign/'.$row->campaign_id)}}" class="btn btn-sm btn-primary">{{trans('admin.show')}} Campaign</a>
                                            @elseif($row->campaign_type == 'google-our')
                                                <a href="{{url('admin/google/our/campaign/'.$row->campaign_id)}}" class="btn btn-sm btn-primary">{{trans('admin.show')}} Campaign</a>
                                            @endif

                                        </td>
                                        <td>
                                            <a href="{{url('admin/campaign/telesales/delete/'.$row->id)}}" class="btn btn-sm btn-danger">{{trans('admin.delete')}}</a>
                                        </td>
                                    </tr>
                                @endforeach

                        </tbody>
                    </table>
                    {{$rows->links()}}
            </div>
            </div>
            </div>
            @endif
        </div>
    </div><!-- End Row-->
    <!-- End Datatable -->
@endsection
