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
        <a href="{{url('admin/requests/marketing')}}" class="btn btn-success"> All {{trans('admin.requests_marketing')}}</a>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title text-dark">{{trans('admin.create')}}</div>
                        <hr>
                        <form action="{{url('admin/requests/marketing/'.$row->id)}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            {{method_field('PUT')}}

                            <input type="hidden" name="client_id" value="{{$row->client_id}}">

                            <div class="row">
                                <!-- Start -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="input-21"> <i class="fa fa-whatsapp"> </i> {{trans('admin.client-whatsapp')}}</label>
                                        @php $input = "client_whatsapp" @endphp
                                        <input type="text" class="form-control @error($input) is-invalid @enderror" id="input-21" placeholder="{{trans('admin.client-whatsapp')}}" name="{{$input}}">
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
                                    <div class="form-group">
                                        <label for="input-21">{{trans('admin.client-website')}}</label>
                                        @php $input = "client_website" @endphp
                                        <input type="text" class="form-control @error($input) is-invalid @enderror" id="input-21" placeholder="{{trans('admin.client-website')}}" name="{{$input}}">
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
                                    <div class="form-group">
                                        <label for="input-21">{{trans('admin.client-youtube-channel')}}</label>
                                        @php $input = "client_youtube_channel" @endphp
                                        <input type="text" class="form-control @error($input) is-invalid @enderror" id="input-21" placeholder="{{trans('admin.client-youtube-channel')}}" name="{{$input}}">
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
                                    <div class="form-group">
                                        <label for="input-21">{{trans('admin.client-career')}}</label>
                                        @php $input = "client_career" @endphp
                                        <input type="text" class="form-control @error($input) is-invalid @enderror" id="input-21" placeholder="{{trans('admin.client-career')}}" name="{{$input}}">
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
                                        <div class="form-group">
                                            <label for="input-21">{{trans('admin.file-images-download')}}</label>
                                            @php $input = "file_download" @endphp
                                            <input type="file" class="form-control @error($input) is-invalid @enderror" id="input-21" name="{{$input}}">
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
                                        <div class="form-group">
                                            <label for="input-21">{{trans('admin.client-facebook-page')}}</label>
                                            @php $input = "link_page" @endphp
                                            <input type="text" class="form-control @error($input) is-invalid @enderror" id="input-21" placeholder="{{trans('admin.client-facebook-page')}}" name="{{$input}}">
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
                                            <label for="input-21">{{trans('admin.name-page')}}</label>
                                            @php $input = "name_page" @endphp
                                            <input type="text" class="form-control @error($input) is-invalid @enderror" id="input-21" placeholder="{{trans('admin.name-page')}}" name="{{$input}}">
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
                                            <label for="input-21">{{trans('admin.platform')}}</label>
                                            @php $input = "platform" @endphp
                                            <select name="{{$input}}" class='form-control'>
                                                <option value="facebook">Facebook </option>
                                                <option value="goolge"> Google </option>
                                            </select>
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
                                            <label for="input-21">Marketer Name</label>
                                            @php $input = "user_position_id" @endphp
                                            <input type="hidden" class="form-control @error($input) is-invalid @enderror" id="client" name="{{$input}}" value="{{$row->marketing_id}}">
                                            @error($input)
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                            <input type="text" class="form-control" id="filter-users" url-data="{{url('admin/filter/users')}}">
                                            <ul class="list-unstyled show-clients text-center"></ul>
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
