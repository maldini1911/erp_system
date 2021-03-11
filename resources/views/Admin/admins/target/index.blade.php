@extends('Admin.system.app')
@section('title', trans('admin.target'))
@section('system')
<div class="row text-center">
        <div class="col-lg-12">
            <div class="card">
            <div class="card-header">
            <i class="fa fa-table"></i> Data {{trans('admin.target')}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table id="example" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>{{trans('admin.target')}}</th>
                            <th>Target Success</th>
                            <th>User</th>
                            <th>{{trans('admin.month')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(Auth::user()->role == 'admin')
                                @foreach($targets as $target)
                                    <tr>
                                        <td>{{$target->target}}</td>
                                        <td>{{$target->target_success}}</td>
                                        <td>{{$target->user['name']}}</td>
                                        <td>{{$target->month}}</td>
                                    </tr>
                                @endforeach
                         @endif
                    </tbody>
            </table>

             {{$targets->links()}}
            </div>
            </div>
            </div>
        </div>
</div>
<!-- End Row-->
@endsection
