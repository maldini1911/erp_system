@extends('Admin.system.app')
@push('css')
    <style>
        .show-manage-client tr th:first-child{background:#f1f1f1}
    </style>
@endpush
@section('system')
    <div class="show-manage-client">
        <div class="container">
            <!-- Start Show Admin -->
            <div class="card">
                <div class="card-body">

                    <a href="{{url('admin/google/coustmer/campaign')}}" class="btn btn-primary"><i class="fas fa-edit"></i> All {{trans('admin.coustmer-campaign')}}</a>
                    <a href="{{url('admin/google/coustmer/campaign/'.$row->id.'/edit')}}" class="btn btn-success"><i class="fas fa-edit"></i>  {{trans('admin.edit')}}</a>
                    <hr>
                    <!-- Start -->
                    <div class="row">
                        <!-- Start Show All Data -->
                        <div class="col-lg-8">
                            <table class="table table-bordered table-show-client">
                            <tr>
                                <th>ID</th>
                                <th>{{$row->id}}</th>
                            </tr>

                            @if(Auth::user()->role == 'admin')
                            <tr>
                                <th> Added By </th>
                                <th> {{$row->user['name'] ? $row->user['name'] : 'Null'}} </th>
                            </tr>
                            @endif
                            
                            <tr>
                                <th>{{trans('admin.client-name')}}</th>
                                <th>{{$row->client_name ? $row->client_name : 'Null'}}</th>
                            </tr>

                            <tr>
                                <th>{{trans('admin.campaign-type')}}</th>
                                <th>{{$row->campaign_type ? $row->campaign_type : 'Null'}}</th>
                            </tr>

                            <tr>
                                <th>{{trans('admin.started')}}</th>
                                <th>{{$row->started ? $row->started : 'Null'}}</th>
                            </tr>

                            <tr>
                                <th>{{trans('admin.ended')}}</th>
                                <th>{{$row->ended ? $row->ended : 'Null'}}</th>
                            </tr>

                            <tr>
                                <th>{{trans('admin.full-budget')}}</th>
                                <th>{{$row->full_budget ? $row->full_budget : 'Null'}}</th>
                            </tr>

                            <tr>
                                <th>{{trans('admin.custom-budget')}}</th>
                                <th>{{$row->custom_budget ? $row->custom_budget : 'Null'}}</th>
                            </tr>

                            <tr>
                                <th>{{trans('admin.impression')}}</th>
                                <th>{{$row->impression ? $row->impression : 'Null'}}</th>
                            </tr>

                            <tr>
                                <th>{{trans('admin.clicks')}}</th>
                                <th>{{$row->clicks ? $row->clicks : 'Null'}}</th>
                            </tr>

                            <tr>
                                <th>{{trans('admin.ctr')}}</th>
                                <th>{{$row->ctr ? $row->ctr : 'Null'}}</th>
                            </tr>

                            <tr>
                                <th>{{trans('admin.roi')}}</th>
                                <th>{{$row->roi ? $row->roi : 'Null'}}</th>
                            </tr>


                            <tr>
                                <th>{{trans('admin.campaign-notes')}}</th>
                                <th>{{$row->campaign_notes ? $row->campaign_notes : 'Null'}}</th>
                            </tr>

                        </table>
                        </div>
                        <!-- End Show All Data -->

                    </div>
                    <!-- End Row -->
                </div>
            </div>
            <!-- End Show Admin -->





        </div>
    </div>
@endsection
