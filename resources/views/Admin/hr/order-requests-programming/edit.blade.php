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
        <a href="{{url('admin/requests/programming')}}" class="btn btn-success"> All {{trans('admin.manage-client')}}</a>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title text-dark">{{trans('admin.create')}}</div>
                        <hr>
                        <form action="{{url('admin/requests/programming/'.$row->id)}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('PUT')}}

                            <input type="hidden" value="{{$row->client_id}}" name="client_id">

                            <div class="row">
                                <!-- Start -->
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="input-21"> <i class="fa fa-whatsapp"> </i> {{trans('admin.client-whatsapp')}}</label>
                                        @php $input = "client_whatsapp" @endphp
                                        <input type="text" class="form-control @error($input) is-invalid @enderror" id="input-21" value="{{$row->client_whatsapp}}" name="{{$input}}">
                                        @error($input)
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- End -->

                                <!-- Start -->
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="input-21">{{trans('admin.client-website')}}</label>
                                        @php $input = "client_website" @endphp
                                        <input type="text" class="form-control @error($input) is-invalid @enderror" id="input-21" value="{{$row->client_website}}" name="{{$input}}">
                                        @error($input)
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- End -->

                                <!-- Start -->
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="input-21">{{trans('admin.client-career')}}</label>
                                        @php $input = "client_career" @endphp
                                        <input type="text" class="form-control @error($input) is-invalid @enderror" id="input-21" value="{{$row->client_career}}" name="{{$input}}">
                                        @error($input)
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- End -->

                                <!-- Start -->
                                <div class="col-lg-6">
                                    <hr>
                                    <div class="form-group">
                                        <label for="input-21">{{trans('admin.notes')}}</label>
                                        @php $input = "note" @endphp
                                        <textarea rows="4" class="form-control @error($input) is-invalid @enderror" id="input-21" name="{{$input}}"> </textarea>
                                        @error($input)
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- End -->

                            </div>
                            <!-- End Row -->


                            <!-- End Row -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-dark shadow-dark px-5"><i class="icon-lock"></i> {{trans('admin.edit')}}</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
