@extends('Admin.system.app')

@section('system')
<div class="create-admin">
    <a href="{{url('admin/projects/programmers/'.$row->project_id)}}" class="btn btn-success"> All {{trans('admin.programmers')}}</a>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title text-dark">{{trans('admin.edit')}}</div>
                    <hr>
                    <form action="{{url('admin/projects/programmers/update/'.$row->id)}}" method="POST">

                        {{csrf_field()}}

                        {{method_field('PUT')}}

                        <!-- Start row -->
                            <div class="row">
                                <!-- Start -->
                                <div class="form-group col-lg-6">
                                    <label for="input-1">{{trans('admin.programmers')}}</label>
                                    @php $input = 'user_id' @endphp
                                    <select class="form-control" id="multiple-select" name="{{$input}}">
                                        @foreach($programers as $programere)
                                            <option value="{{$row->user_id}}"></option>
                                            <option value="{{$programere->id}}">{{$programere->name}}</option>
                                        @endforeach
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

                        <!-- End Row -->
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-dark shadow-dark px-5"><i class="icon-lock"></i> {{trans('admin.edit')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
