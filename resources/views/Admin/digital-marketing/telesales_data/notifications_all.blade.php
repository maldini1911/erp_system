@extends('Admin.system.app')

@section('system')
    <div class="profile-admin">
        <!-- Start Header -->
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <i class="fa fa-bell-o text-red" style="color:#ff0000;font-weight:bolder;"></i>  All Notifiactions
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header -->


        <!-- Start Show All Notification Not Read -->
        <div class="row text-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">All Notifations Not Read For You</h5>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Client Name</th>
                                    <th>Message Notification</th>
                                    <th>Meeting Time</th>
                                    <th> Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(Auth::user()->unreadNotifications()->get() as $notify)
                                    {{$notify->markAsRead()}}
                                    <tr>
                                        <th>{{$notify->data['client']}}</th>
                                        <th>{{$notify->data['message']}}</th>
                                        <th>{{$notify->data['meeting']}}</th>
                                        <th>
                                            <a href="{{url('admin/notifcations/clients/delete/'.$notify->data['id_client'])}}" class="btn btn-danger">{{trans('delete')}}</a>
                                        </th>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Show All Notification Not Rea -->

        <!-- Start Show Data profile -->
        <div class="row text-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">All Notifations Readed For You</h5>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Client Name</th>
                                    <th>Message Notification</th>
                                     <th>Meeting Time</th>
                                    <th> Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(Auth::user()->notifications()->orderBy('created_at', 'desc')->get() as $notify)
                                    <tr>
                                        <th>{{$notify->data['client']}}</th>
                                        <th>{{$notify->data['message']}}</th>
                                        <th>{{$notify->data['meeting']}}</th>
                                        <th>
                                            <a href="{{url('admin/notifcations/clients/delete/'.$notify->data['id_client'])}}" class="btn btn-danger">{{trans('delete')}}</a>
                                        </th>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Show Data Profile -->
    </div>
@endsection
