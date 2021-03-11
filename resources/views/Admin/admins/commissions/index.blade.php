@extends('Admin.system.app')
@section('title', trans('admin.commissions'))
@section('system')
<div class="row text-center">
        <div class="col-lg-12">
            <div class="card">
            <div class="card-header">
            <i class="fa fa-table"></i> Data {{trans('admin.commissions')}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table id="example" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>{{trans('admin.commission')}}</th>
                            <th>{{trans('admin.client-name')}}</th>
                            <th>User</th>
                            <th>{{trans('admin.month')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(Auth::user()->role == 'admin')
                                @foreach($commissions as $commission)
                                    <td>{{$commission->commission}}</td>
                                    <td>{{$commission->client['name']}}</td>
                                    <td>{{$commission->user['name']}}</td>
                                    <td>{{$commission->month}}</td>
                                @endforeach
                         @endif
                    </tbody>
            </table>

             {{$commissions->links()}}
            </div>
            </div>
            </div>
        </div>
</div>
<!-- End Row-->
@endsection
