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
        <a href="{{url('admin/google/coustmer/campaign')}}" class="btn btn-success"> All {{trans('admin.coustmer-campaign')}}</a>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title text-dark">{{trans('admin.create')}}</div>
                        <hr>
                        <form action="{{url('admin/google/coustmer/campaign/'.$row->id)}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="input-21">{{trans('admin.client-name')}}</label>
                                        @php $input = "client_id" @endphp
                                        <input type="hidden" class="form-control @error($input) is-invalid @enderror" id="client" value="{{$row[$input]}}"name="{{$input}}">
                                        @error($input)
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                        <input type="text" class="form-control" id="filter-clients-marketing" url-data="{{url('admin/filter/clients/marketing')}}">
                                        <ul class="list-unstyled show-clients text-center"></ul>

                                    </div>
                                </div>

                                <!-- Start -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="input-21">{{trans('admin.campaign-type')}}</label>
                                        @php $input = "campaign_type" @endphp
                                        <select name="{{$input}}" class="form-control">
                                            <option value="{{$row[$input]}}"></option>
                                            <option value="google-ads">{{trans('admin.google-ads')}}</option>
                                            <option value="youtube">{{trans('admin.youtube')}}</option>
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
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="input-21">{{trans('admin.started')}}</label>
                                        @php $input = "started" @endphp
                                        <input type="date" class="form-control @error($input) is-invalid @enderror" id="input-21" value="{{$row[$input]}}" name="{{$input}}">
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
                                        <label for="input-21">{{trans('admin.ended')}}</label>
                                        @php $input = "ended" @endphp
                                        <input type="date" class="form-control @error($input) is-invalid @enderror" id="input-21" value="{{$row[$input]}}" name="{{$input}}">
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
                                        <label for="input-21">{{trans('admin.full-budget')}}</label>
                                        @php $input = "full_budget" @endphp
                                        <input type="number" class="form-control @error($input) is-invalid @enderror" id="input-21" value="{{$row[$input]}}" name="{{$input}}">
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
                                        <label for="input-21">{{trans('admin.custom-budget')}}</label>
                                        @php $input = "custom_budget" @endphp
                                        <input type="number" class="form-control @error($input) is-invalid @enderror" id="input-21" value="{{$row[$input]}}" name="{{$input}}">
                                        @error($input)
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- End -->

                                <!-- Start Results -->

                                <!-- Start -->
                                <div class="col-lg-12">
                                    <h4  style="padding: 10px;width:200px"> Results</h4>
                                </div>
                                <!-- Start -->
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="input-21">{{trans('admin.impression')}}</label>
                                        @php $input = "impression" @endphp
                                        <input type="number" class="form-control @error($input) is-invalid @enderror" id="input-21" value="{{$row[$input]}}" name="{{$input}}">
                                        @error($input)
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- End -->

                                <!-- Start -->
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="input-21">{{trans('admin.clicks')}}</label>
                                        @php $input = "clicks" @endphp
                                        <input type="number" class="form-control @error($input) is-invalid @enderror" id="input-21" value="{{$row[$input]}}" name="{{$input}}">
                                        @error($input)
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- End -->


                                <!-- Start -->
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="input-21">{{trans('admin.ctr')}}</label>
                                        @php $input = "ctr" @endphp
                                        <input type="number" class="form-control @error($input) is-invalid @enderror" id="input-21" value="{{$row[$input]}}" name="{{$input}}">
                                        @error($input)
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- End -->


                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="input-21">{{trans('admin.roi')}}</label>
                                        @php $input = "roi" @endphp
                                        <input type="number" class="form-control @error($input) is-invalid @enderror" id="input-21" value="{{$row[$input]}}" name="{{$input}}">
                                        @error($input)
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- End -->


                                <!-- Start -->
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="input-21">{{trans('admin.campaign-notes')}}</label>
                                        @php $input = "campaign_notes" @endphp
                                        <textarea rows="3" class="form-control @error($input) is-invalid @enderror" id="input-21" value="{{$row[$input]}}" name="{{$input}}">
                                            {{$row[$input]}}
                                        </textarea>
                                        @error($input)
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- End -->
                                <!-- End Results -->
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
