@extends('Admin.system.app')

@section('system')
<div class="profile-admin">
    <!-- Start Header -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                     Bounses & Discounds
                </div>
            </div>
        </div>
    </div>
    <!-- End Header -->

    <!-- Start Show Data profile -->
    <div class="row">
        <!-- Start Show Bounses -->
        <div class="col-12 col-lg-6 col-xs-12">
            <div class="card">
                <h4 class="alert alert-primary text-center" style="padding:10px 0"> Bounses</h4>
                <div class="card-body text-center" style="overflow-y: scroll;height: 500px">
                    @foreach($rows->where('bounse', '!=', null) as $row)
                    <div class="card" style="padding:20px">
                        <h4> {{$row->bounse}}</h4>
                        <hr>
                        <p style='font-weight:bolder'> {{$row->reason_bounse}}</p>
                        <hr>
                        <span>{{$row->created_at}} </span>
                        <hr>
                        <div style='display:flex' class="text-center">
                            <a href="{{url('admin/admins/bounses/edit/'.$row->id)}}" class="btn btn-success" style="margin:auto;"> {{trans('admin.edit')}} </a>
                            <a href="{{url('admin/admins/bounses/discount/delete/'.$row->id)}}" class="btn btn-danger" style="margin:auto;"> {{trans('admin.delete')}} </a>
                        </div>
                    </div>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- End Show Bounses -->

        <!-- Start Show Bounses -->
        <div class="col-12 col-lg-6 col-xs-12">
            <div class="card">
                <h4 class="alert alert-primary text-center" style="padding:10px 0"> Discounds</h4>
                <div class="card-body text-center" style="overflow-y: scroll;height: 500px">
                    @foreach($rows->where('discount', '!=', null) as $row)
                    <div class="card" style="padding:20px">
                        <h4> {{$row->discount}}</h4>
                        <hr>
                        <p style='font-weight:bolder'> {{$row->reason_discount}}</p>
                        <hr>
                        <span>{{$row->created_at}} </span>
                        <hr>
                        <div style='display:flex' class="text-center">
                            <a href="{{url('admin/admins/discount/edit/'.$row->id)}}" class="btn btn-success" style="margin:auto;"> {{trans('admin.edit')}} </a>
                            <a href="{{url('admin/admins/bounses/discount/delete/'.$row->id)}}" class="btn btn-danger" style="margin:auto;"> {{trans('admin.delete')}} </a>
                        </div>
                    </div>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- End Show Bounses -->
    </div>
    <!-- End Show Data Profile -->
</div>
@endsection
