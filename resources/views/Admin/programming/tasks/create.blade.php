@extends('Admin.system.app')
@push('css')


    <style>
        .show-clients
        {
            background: #eee;
            cursor: pointer;
        }
        .show-clients li{border-bottom: 1px solid #111;}
    </style>
@endpush
@section('system')
<div class="create-admin">
    <a href="{{url('admin/programming/tasks/'.$project_id.'/'.$user_id)}}" class="btn btn-success"> All {{trans('admin.tasks')}}</a>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title text-dark">{{trans('admin.create')}}</div>
                    <hr>

                    <form action="{{url('admin/programming/tasks/store')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <input type="hidden" value="{{$project_id}}" name="project_id">
                        <input type="hidden" value="{{$user_id}}" name="programmer_id">
                        <!-- Start row -->
                        <div class="row">

                            <!-- Start -->
                            <div class="form-group col-lg-6">
                                <label for="input-1">{{trans('admin.task-name')}}</label>
                                @php $input = 'task_name' @endphp

                                <textarea rows="10" class="form-control @error($input) is-invalid @enderror" id="input-1"  name="{{$input}}"> </textarea>
                                @error($input)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- End -->

                            <!-- Start -->
                            <div class="form-group col-lg-6">
                                <label for="input-1">{{trans('admin.task-dateline')}}</label>
                                @php $input = 'task_dateline' @endphp

                                <input type="date" class="form-control @error($input) is-invalid @enderror" id="input-1" placeholder="{{trans('admin.project-price')}}" name="{{$input}}">
                                @error($input)
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- End -->



                        </div>
                        <!-- End Row -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary shadow-primary px-5"><i class="icon-lock"></i> {{trans('admin.create')}}</button>
                        </div>
                        </form>



                </div>
            </div>
        </div>
    </div>
</div>


@endsection
