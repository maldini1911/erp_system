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
    <a href="{{url('admin/programming/tasks/'.$row->project_id.'/'.$row->programmer_id)}}" class="btn btn-success"> All {{trans('admin.tasks')}}</a>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title text-dark">{{trans('admin.create')}}</div>
                    <hr>

                    <form action="{{url('admin/projects/tasks/update/'.$row->id)}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <input type="hidden" value="{{$row->project_id}}" name="project_id">
                        <input type="hidden" value="{{$row->programmer_id}}" name="programmer_id">
                        <!-- Start row -->
                        <div class="row">

                            <!-- Start -->
                            <div class="form-group col-lg-6">
                                <label for="input-1">{{trans('admin.task-name')}}</label>
                                @php $input = 'task_name' @endphp

                                <textarea rows="10" class="form-control @error($input) is-invalid @enderror" id="input-1"  name="{{$input}}">
                                {{$row->task_name}}
                                </textarea>
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

                                <input type="date" class="form-control @error($input) is-invalid @enderror" id="input-1" value="{{$row->task_dateline}}" name="{{$input}}">
                                @error($input)
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- End -->

                            <!-- Start -->
                            <div class="form-group col-lg-6">
                                <label for="input-1"> Status Task </label>
                                @php $input = 'status_task' @endphp
                                <select name="{{$input}}" class="form-control">
                                    <option value="{{$row->status_task}}"> </option>
                                    <option value="no">{{trans('admin.no')}} </option>
                                    <option value="yes">{{trans('admin.yes')}} </option>
                                </select>
                                @error($input)
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- End -->

                            <!-- Start -->
                            <div class="form-group col-lg-6">
                                <label for="input-1"> Check Task By Taster </label>
                                @php $input = 'status_check_tester' @endphp
                                <select name="{{$input}}" class="form-control">
                                    <option value="{{$row->status_check_tester}}"> </option>
                                    <option value="no">{{trans('admin.no')}} </option>
                                    <option value="yes">{{trans('admin.yes')}} </option>
                                    <option value="'refusal">{{trans('admin.refusal')}} </option>
                                </select>
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
                            <button type="submit" class="btn btn-primary shadow-primary px-5"><i class="icon-lock"></i> {{trans('admin.edit')}}</button>
                        </div>
                        </form>



                </div>
            </div>
        </div>
    </div>
</div>


@endsection
