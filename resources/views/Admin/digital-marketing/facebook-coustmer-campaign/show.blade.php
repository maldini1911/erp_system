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

                    <a href="{{url('admin/facebook/coustmer/campaign')}}" class="btn btn-primary"><i class="fas fa-edit"></i> All {{trans('admin.manage-client')}}</a>
                    <a href="{{url('admin/facebook/coustmer/campaign/'.$row->id.'/edit')}}" class="btn btn-success"><i class="fas fa-edit"></i> {{trans('admin.edit')}}</a>
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
                                <th>{{trans('admin.messages-quantity')}}</th>
                                <th>{{$row->messages_quantity ? $row->messages_quantity : 'Null'}}</th>
                            </tr>

                            <tr>
                                <th>{{trans('admin.reached')}}</th>
                                <th>{{$row->reached ? $row->reached : 'Null'}}</th>
                            </tr>

                            <tr>
                                <th>{{trans('admin.engagement')}}</th>
                                <th>{{$row->engagement ? $row->engagement : 'Null'}}</th>
                            </tr>

                            <tr>
                                <th>{{trans('admin.comments')}}</th>
                                <th>{{$row->comments ? $row->comments : 'Null'}}</th>
                            </tr>

                            <tr>
                                <th>{{trans('admin.likes')}}</th>
                                <th>{{$row->likes ? $row->likes : 'Null'}}</th>
                            </tr>

                            <tr>
                                <th>{{trans('admin.total-clicks')}}</th>
                                <th>{{$row->total_clicks ? $row->total_clicks : 'Null'}}</th>
                            </tr>

                            <tr>
                                <th>{{trans('admin.page-likes')}}</th>
                                <th>{{$row->page_likes ? $row->page_likes : 'Null'}}</th>
                            </tr>

                            <tr>
                                <th>{{trans('admin.campaign-notes')}}</th>
                                <th>{{$row->campaign_notes ? $row->campaign_notes : 'Null'}}</th>
                            </tr>

                        </table>
                        </div>
                        <!-- End Show All Data -->

                        <!-- Start Image Screen shoot -->
                        <div class="col-lg-4 text-center">
                             <label>{{trans('admin.upload-screenshot')}}</label>
                            <hr>
                            <img src="{{url('uploads/marketing/facebook/'.$row->upload_screenshot)}}" width="100%">
                        </div>
                        <!-- End Image Screen shoot -->
                    </div>
                    <!-- End Row -->
                </div>
            </div>
            <!-- End Show Admin -->





        </div>
    </div>
@endsection
