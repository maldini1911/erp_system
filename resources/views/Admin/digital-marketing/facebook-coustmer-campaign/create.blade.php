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
        <a href="{{url('admin/facebook/coustmer/campaign')}}" class="btn btn-success"> All {{trans('admin.coustmer-campaign')}}</a>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title text-dark">{{trans('admin.create')}}</div>
                        <hr>
                        <form action="{{url('admin/facebook/coustmer/campaign')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="input-21">{{trans('admin.client-name')}}</label>
                                        @php $input = "client_id" @endphp
                                        <input type="hidden" class="form-control @error($input) is-invalid @enderror" id="client" name="{{$input}}">
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
                                            <option value="engagement">{{trans('admin.engagement')}}</option>
                                            <option value="messages">{{trans('admin.messages')}}</option>
                                            <option value="likes">{{trans('admin.likes')}}</option>
                                            <option value="lead-generation">{{trans('admin.lead-generation')}}</option>
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
                                        <input type="date" class="form-control @error($input) is-invalid @enderror" id="input-21" placeholder="{{trans('admin.client-email')}}" name="{{$input}}">
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
                                        <input type="date" class="form-control @error($input) is-invalid @enderror" id="input-21"  name="{{$input}}">
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
                                        <input type="number" class="form-control @error($input) is-invalid @enderror" id="input-21" placeholder="{{trans('admin.full-budget')}}" name="{{$input}}">
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
                                        <input type="number" class="form-control @error($input) is-invalid @enderror" id="input-21" placeholder="{{trans('admin.custom-budget')}}" name="{{$input}}">
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
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="input-21">{{trans('admin.messages-quantity')}}</label>
                                        @php $input = "messages_quantity" @endphp
                                        <input type="number" class="form-control @error($input) is-invalid @enderror" id="input-21" placeholder="{{trans('admin.messages-quantity')}}" name="{{$input}}">
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
                                        <label for="input-21">{{trans('admin.reached')}}</label>
                                        @php $input = "reached" @endphp
                                        <input type="number" class="form-control @error($input) is-invalid @enderror" id="input-21" placeholder="{{trans('admin.reached')}}" name="{{$input}}">
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
                                        <label for="input-21">{{trans('admin.engagement')}}</label>
                                        @php $input = "engagement" @endphp
                                        <input type="number" class="form-control @error($input) is-invalid @enderror" id="input-21" placeholder="{{trans('admin.engagement')}}" name="{{$input}}">
                                        @error($input)
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- End -->


                                <div class="col-lg-4">
                                     <div class="form-group">
                                        <label for="input-21">{{trans('admin.comments')}}</label>
                                        @php $input = "comments" @endphp
                                        <input type="number" class="form-control @error($input) is-invalid @enderror" id="input-21" placeholder="{{trans('admin.comments')}}" name="{{$input}}">
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
                                        <label for="input-21">{{trans('admin.likes')}}</label>
                                        @php $input = "likes" @endphp
                                        <input type="number" class="form-control @error($input) is-invalid @enderror" id="input-21" placeholder="{{trans('admin.likes')}}" name="{{$input}}">
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
                                        <label for="input-21">{{trans('admin.total-clicks')}}</label>
                                        @php $input = "total_clicks" @endphp
                                        <input type="number" class="form-control @error($input) is-invalid @enderror" id="input-21" placeholder="{{trans('admin.total-clicks')}}" name="{{$input}}">
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
                                        <label for="input-21">{{trans('admin.page-likes')}}</label>
                                        @php $input = "page_likes" @endphp
                                        <input type="number" class="form-control @error($input) is-invalid @enderror" id="input-21" placeholder="{{trans('admin.page-likes')}}" name="{{$input}}">
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
                                        <label for="input-21">{{trans('admin.upload-screenshot')}}</label>
                                        @php $input = "upload_screenshot" @endphp
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="inputGroupFile01" name="{{$input}}">
                                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                            </div>
                                        </div>
                                        @error($input)
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                <!-- End -->

                                <!-- Start -->
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="input-21">{{trans('admin.campaign-notes')}}</label>
                                        @php $input = "campaign_notes" @endphp
                                        <textarea rows="3" class="form-control @error($input) is-invalid @enderror" id="input-21" placeholder="{{trans('admin.client-note')}}" name="{{$input}}">
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
