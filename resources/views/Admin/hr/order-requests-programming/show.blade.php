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

                    <a href="{{url('admin/marketing/order/requests')}}" class="btn btn-primary"><i class="fas fa-edit"></i> All {{trans('admin.requests_marketing')}}</a>
                    
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
                                <th>{{$row->manage_client->client['name'] ? $row->manage_client->client['name'] : 'Null'}}</th>
                            </tr>

                            <tr>
                                <th>{{trans('admin.mobile')}}</th>
                                <th>{{$row->manage_client->client['phone'] ? $row->manage_client->client['phone'] : 'Null'}}</th>
                            </tr>

                            <tr>
                                <th>Phone2</th>
                                <th>{{$row->manage_client->client['phone2'] ? $row->manage_client->client['phone2'] : 'Null'}}</th>
                            </tr>

                            <tr>
                                <th>{{trans('admin.landline')}}</th>
                                <th>{{$row->manage_client->client['landline'] ? $row->manage_client->client['landline'] : 'Null'}}</th>
                            </tr>
                  

                            <tr>
                                <th>{{trans('admin.email')}}</th>
                                <th>{{$row->manage_client->client['email'] ? $row->manage_client->client['email'] : 'Null'}}</th>
                            </tr>
                            
                            <tr>
                                <th>{{trans('admin.link-page')}}</th>
                                <th>{{$row['link_page'] ? $row['link_page'] : 'Null'}}</th>
                            </tr>

                            <tr>
                                <th>{{trans('admin.name-page')}}</th>
                                <th>{{$row['name_page'] ? $row['name_page'] : 'Null'}}</th>
                            </tr>

                            <tr>
                                <th>{{trans('admin.status')}}</th>
                                <th>{{$row['status'] ? $row['status'] : 'Not Select'}}</th>
                            </tr>

                        </table>
                        </div>
                        <!-- End Show All Data -->

                        <!-- Start Image Screen shoot -->
                        <div class="col-lg-4 text-center">
                             <label>{{trans('admin.notes')}}</label>
                            <hr>
                            <div class="card">
                                @foreach($notes as $note)
                                <div class="card-body">
                                    {{$note->note}}
                                </div>
                                @endforeach
                                </div>
                                {{$notes->links()}}
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
