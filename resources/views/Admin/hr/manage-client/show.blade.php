@extends('Admin.system.app')
@push('css')
<style>
    .show-manage-client tr th:first-child{background:#f1f1f1;width: 100px}
    .show-manage-client tr th:last-child{text-align: center}
</style>
@endpush
@section('system')
    <div class="show-manage-client">
        <div class="container">
            <!-- Start Show Admin -->
            <div class="card">
                <div class="card-body">

                    <a href="{{url('admin/manage/clients')}}" class="btn btn-primary"><i class="fas fa-edit"></i> All {{trans('admin.manage-client')}}</a>
                    <hr>
                    <div class="small"></div>
                    <table class="table table-bordered col-12 table-show-client">
                        <tr>
                            <th>ID</th>
                            <th>{{$row->id}}</th>
                        </tr>

                        <tr>
                            <th>{{trans('admin.client-name')}}</th>
                            <th>{{$row->name ? $row->name : 'Null'}}</th>
                        </tr>

                        <tr>
                            <th>{{trans('admin.mobile')}}</th>
                            <th>{{$row->phone ? $row->phone : 'Null'}}</th>
                        </tr>

                        <tr>
                            <th>Phone2</th>
                            <th>{{$row->phone2  ? $row->phone2 : 'Null'}}</th>
                        </tr>

                        <tr>
                            <th>{{trans('admin.landline')}}</th>
                            <th>{{$row->landline ? $row->landline : 'Null'}}</th>
                        </tr>

                        <tr>
                            <th>{{trans('admin.email')}}</th>
                            <th>{{$row->email ? $row->email : 'Null'}}</th>
                        </tr>

                        <tr>
                            <th>{{trans('admin.country')}}</th>
                            <th>{{$row->country['country_name'] ? $row->country['country_name'] : 'Null'}}</th>
                        </tr>

                        <tr>
                            <th>{{trans('admin.position')}}</th>
                            <th>{{$row->position ? $row->position : 'null'}}</th>
                        </tr>

                    </table>
                    <div style="height:50px;"></div>
                </div>
            </div>
            <!-- End Show Admin -->





        </div>
    </div>
@endsection
