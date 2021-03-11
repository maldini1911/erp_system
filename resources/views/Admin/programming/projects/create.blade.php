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
    <a href="{{url('admin/programming/projects')}}" class="btn btn-success"> All {{trans('admin.projects')}}</a>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title text-dark">{{trans('admin.create')}}</div>
                    <hr>

                    <form action="{{url('admin/programming/projects/')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <!-- Start row -->
                        <div class="row">

                            <!-- Start -->
                            <div class="form-group col-lg-6">
                                <label for="input-1">{{trans('admin.project-name')}}</label>
                                @php $input = 'project_name' @endphp

                                <input type="text" class="form-control @error($input) is-invalid @enderror" id="input-1" placeholder="{{trans('admin.project-name')}}" name="{{$input}}">
                                @error($input)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- End -->

                            <!-- Start -->
                            <div class="form-group col-lg-6">
                                <label for="input-21">Search By Client Phone</label>
                                @php $input = "client_id" @endphp
                                <input type="hidden" class="form-control @error($input) is-invalid @enderror" id="client" name="client_id">
                                @error($input)
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                                <input type="text" class="form-control" id="filter-clients-programming" url-data="{{url('admin/filter/clients/programming')}}">
                                <ul class="list-unstyled show-clients text-center"></ul>
                            </div>
                            <!-- End -->

                            <!-- Start -->
                            <div class="form-group col-lg-6">
                                <label for="input-1">{{trans('admin.project-type')}}</label>
                                @php $input = 'project_type' @endphp
                                <select name="{{$input}}" class="form-control">
                                    <option value="frontend">FrontEnd </option>
                                    <option value="backend">BackEnd</option>
                                    <option value="website">Full Website</option>
                                    <option value="cms">CMS(wordpress,joomla,etc)</option>
                                    <option value="other">other</option>
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
                                <label for="input-1">{{trans('admin.project-price')}}</label>
                                @php $input = 'project_price' @endphp

                                <input type="number" class="form-control @error($input) is-invalid @enderror" id="input-1" placeholder="{{trans('admin.project-price')}}" name="{{$input}}">
                                @error($input)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- End -->


                             <!-- Start -->
                             <div class="form-group col-lg-6">
                                <label for="input-1">{{trans('admin.amount-paid')}}</label>
                                @php $input = 'amount_paid' @endphp

                                <input type="number" class="form-control @error($input) is-invalid @enderror" id="input-1" placeholder="{{trans('admin.amount-paid')}}" name="{{$input}}">
                                @error($input)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- End -->


                            <!-- Start -->
                            <div class="form-group col-lg-6">
                                <label for="input-1">{{trans('admin.remaining-amount')}}</label>
                                @php $input = 'remaining_amount' @endphp

                                <input type="number" class="form-control @error($input) is-invalid @enderror" id="input-1" placeholder="{{trans('admin.remaining-amount')}}" name="{{$input}}">
                                @error($input)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- End -->

                            <!-- Start -->
                            <div class="form-group col-lg-6">
                                <label for="input-1">{{trans('admin.start-resgister')}}</label>
                                @php $input = 'start_resgister' @endphp

                                <input type="date" class="form-control @error($input) is-invalid @enderror" id="input-1" placeholder="{{trans('admin.start-resgister')}}" name="{{$input}}">
                                @error($input)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- End -->

                            <!-- Start -->
                            <div class="form-group col-lg-6">
                                <label for="input-1">{{trans('admin.finish-resgister')}}</label>
                                @php $input = 'finish_resgister' @endphp

                                <input type="date" class="form-control @error($input) is-invalid @enderror" id="input-1" placeholder="{{trans('admin.finish-resgister')}}" name="{{$input}}">
                                @error($input)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- End -->

                            <!-- Start -->
                            <div class="form-group col-lg-6">
                                <label for="input-1">{{trans('admin.date-start')}}</label>
                                @php $input = 'date_start' @endphp

                                <input type="date" class="form-control @error($input) is-invalid @enderror" id="input-1" placeholder="{{trans('admin.date-start')}}" name="{{$input}}">
                                @error($input)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- End -->

                            <!-- Start -->
                            <div class="form-group col-lg-6">
                                <label for="input-1">{{trans('admin.date-line')}}</label>
                                @php $input = 'date_line' @endphp

                                <input type="date" class="form-control @error($input) is-invalid @enderror" id="input-1" placeholder="{{trans('admin.date-line')}}" name="{{$input}}">
                                @error($input)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- End -->

                             <!-- Start -->
                             <div class="form-group col-lg-6">
                                <label for="input-1">{{trans('admin.project-level')}}</label>
                                @php $input = 'project_level' @endphp

                                <input type="number" class="form-control @error($input) is-invalid @enderror" id="input-1" placeholder="{{trans('admin.project-level')}}" name="{{$input}}">
                                @error($input)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- End -->


                            <!-- Start -->
                            <div class="form-group col-lg-6">
                                <label for="input-1">{{trans('admin.project-status')}}</label>
                                @php $input = 'project_status' @endphp
                                <select name="{{$input}}" class="form-control">
                                    <option value="waiting">{{trans('admin.waiting')}} </option>
                                    <option value="pending">{{trans('admin.pending')}}</option>
                                    <option value="finish">{{trans('admin.finish')}}</option>
                                    <option value="cancel">{{trans('admin.cancel')}}</option>
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
                                <label for="input-1">{{trans('admin.project-url-demo')}}</label>
                                @php $input = 'project_url_demo' @endphp

                                <input type="text" class="form-control @error($input) is-invalid @enderror" id="input-1" placeholder="{{trans('admin.project-url-demo')}}" name="{{$input}}">
                                @error($input)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- End -->


                            <!-- Start -->
                            <div class="form-group col-lg-6">
                                <label for="input-1">{{trans('admin.project-url-domin')}}</label>
                                @php $input = 'project_url_domin' @endphp

                                <input type="text" class="form-control @error($input) is-invalid @enderror" id="input-1" placeholder="{{trans('admin.project-url-domin')}}" name="{{$input}}">
                                @error($input)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- End -->

                            <!-- Start -->
                            <div class="form-group col-lg-6">
                                <label for="input-1">{{trans('admin.project-ftp')}}</label>
                                @php $input = 'project_ftp' @endphp

                                <input type="text" class="form-control @error($input) is-invalid @enderror" id="input-1" placeholder="{{trans('admin.project-ftp')}}" name="{{$input}}">
                                @error($input)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- End -->


                            <!-- Start -->
                            <div class="form-group col-lg-6">
                                <label for="input-1">{{trans('admin.project-upload')}}</label>
                                @php $input = 'project_upload' @endphp

                                <input type="file" class="form-control @error($input) is-invalid @enderror" id="input-1" name="{{$input}}">
                                @error($input)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- End -->


                            <!-- Start -->
                            <div class="form-group col-lg-6">
                                <label for="input-1">{{trans('admin.count-programmers')}}</label>
                                @php $input = 'count_programmers' @endphp

                                <input type="number" class="form-control @error($input) is-invalid @enderror" id="input-1" placeholder="{{trans('admin.count-programmers')}}" name="{{$input}}">
                                @error($input)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- End -->


                          <!-- Start -->
                          <div class="form-group col-lg-6">
                            <label for="input-1">{{trans('admin.programmers')}}</label>
                            @php $input = 'programmers[]' @endphp
                            <select multiple="multiple" class="form-control" id="multiple-select" name="{{$input}}">
                                @foreach($programers as $programere)
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
