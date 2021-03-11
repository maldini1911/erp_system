@extends('Admin.system.app')

@section('system')
    <div class="create-admin">
        <a href="{{url('admin/google/our/campaign')}}" class="btn btn-success"> All {{trans('admin.our-campaign')}}</a>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title text-dark">{{trans('admin.create')}}</div>
                        <hr>
                        <form action="{{url('admin/google/our/campaign/'.$row->id)}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <div class="row">
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
                                        <label for="input-21">{{trans('admin.full-budget')}}</label>
                                        @php $input = "full_budget" @endphp
                                        <input type="number" class="form-control @error($input) is-invalid @enderror" id="input-21" value="{{$row[$input]}} name="{{$input}}">
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
                                        <input type="date" class="form-control @error($input) is-invalid @enderror" id="input-21" value="{{$row[$input]}} name="{{$input}}">
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
                                        <input type="date" class="form-control @error($input) is-invalid @enderror" id="input-21"  value="{{$row[$input]}} name="{{$input}}">
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
                                        <input type="number" class="form-control @error($input) is-invalid @enderror" id="input-21" value="{{$row[$input]}} name="{{$input}}">
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
                                        <input type="number" class="form-control @error($input) is-invalid @enderror" id="input-21" value="{{$row[$input]}} name="{{$input}}">
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
                                        <input type="number" class="form-control @error($input) is-invalid @enderror" id="input-21" value="{{$row[$input]}} name="{{$input}}">
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
                                        <input type="number" class="form-control @error($input) is-invalid @enderror" id="input-21" value="{{$row[$input]}} name="{{$input}}">
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
                                        <textarea rows="3" class="form-control @error($input) is-invalid @enderror" id="input-21" value="{{$row[$input]}} name="{{$input}}">
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
                                        <button type="submit" class="btn btn-dark shadow-dark px-5"><i class="icon-lock"></i> {{trans('admin.create')}}</button>
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
