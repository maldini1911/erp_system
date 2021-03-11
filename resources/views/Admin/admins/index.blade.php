@extends('Admin.system.app')
@section('title', trans('admin.admins'))
@section('system')
<div class="row text-center">
        <div class="col-lg-12">
            <div class="card">
            <div class="card-header">
            <a href="{{route('admins.create')}}" class="btn btn-md btn-success float-left">{{trans('admin.create')}}</a>
            <i class="fa fa-table"></i> Data {{trans('admin.admins')}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table id="example" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>{{trans('admin.name')}}</th>
                            <th>{{trans('admin.email')}}</th>
                            <th>{{trans('admin.mobile')}}</th>
                            <th>Bounse & Discount</th>
                            <th>{{trans('admin.attachments')}}</th>
                            <th>ِ{{trans('admin.permission')}}</th>
                            <th> {{trans('admin.action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(Auth::user()->role == 'admin')
                                @foreach($admins as $admin)
                                <tr role="row" class="odd">
                                    <th> {{$admin->name}} </th>
                                    <th> {{$admin->email}} </th>
                                    <th> {{$admin->mobile}} </th>
                                    <th>
                                    <a href="{{url('admin/admins/bounses/discounts/all/'.$admin->id)}}" class="btn btn-sm btn-info">{{trans('admin.show')}}</a>
                                    </th>
                                    <th>
                                    <a href="{{url('admin/admins/attachments/show/'.$admin->id)}}" class="btn btn-sm btn-info">{{trans('admin.show')}}</a>
                                    </th>
                                    <th> {{$admin->role}} </th>
                                    <th>
                                        <a href="{{url('admin/admins/'.$admin->id)}}" class="btn btn-sm btn-info">{{trans('admin.show')}}</a>
                                        <a href="{{url('admin/admins/'.$admin->id.'/edit')}}" class="btn btn-sm btn-success">{{trans('admin.edit')}}</a>
                                        <a href="{{url('admin/admins/delete/'.$admin->id)}}" class="btn btn-sm btn-danger">{{trans('admin.delete')}}</a>
                                    </th>
                                </tr>
                            @endforeach
                         @endif
                    </tbody>
            </table>

             {{$admins->links()}}
            </div>
            </div>
            </div>
        </div>
</div>
<!-- End Row-->
@endsection
