@extends('Admin.system.app')
@section('title', trans('admin.admins'))
@section('system')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{url('admin/admins/bounses/create/'.$user_id)}}" class="btn btn-primary"> {{trans('admin.create')}} {{trans('admin.bounse')}}</a>
                    <a href="{{url('admin/admins/discount/create/'.$user_id)}}" class="btn btn-danger"> {{trans('admin.create')}} {{trans('admin.discount')}}</a>
                    <hr>
                   <div class="text-center">
                       <i class="fa fa-table"></i> Data {{trans('admin.bounse')}} & {{trans('admin.discount')}}
                   </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-center">
                        <table id="example" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>{{trans('admin.name')}}</th>
                                <th>{{trans('admin.bounse')}}</th>
                                <th>{{trans('admin.discount')}}</th>
                                <th>{{trans('admin.month')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(Auth::user()->role == 'admin')
                                @foreach($rows as $row)
                                    <tr>
                                        <th>{{$row->user['name']}}</th>
                                        <th>{{$row->bounse ? $row->bounse : 'No Bounse'}}</th>
                                        <th>{{$row->discount ? $row->discount : 'No Discount'}}</th>
                                        <th>{{$row->month}}</th>
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
    </div>
    <!-- End Row-->
@endsection
