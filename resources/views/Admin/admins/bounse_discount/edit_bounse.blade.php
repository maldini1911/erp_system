@extends('Admin.system.app')

@section('system')
<div class="create-bounse-discount">
<a href="{{url('admin/admins/bounses/discounts/'.$user_id)}}" class="btn btn-sm btn-info">{{trans('admin.show')}}</a>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title text-dark">{{trans('admin.edit')}}</div>
                    <hr>
                    <form action="{{url('admin/admins/bounses/update/'.$row->id)}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <input type="hidden" value="{{$user_id}}" name="user_id">
                        <div class="form-group row">
                            <label for="input-21" class="col-sm-2 col-form-label">{{trans('admin.bounse')}} </label>
                            <div class="col-sm-10">
                                @php $input = "bounse" @endphp
                                <input t class="form-control @error($input) is-invalid @enderror" id="input-21" value="{{$row->bounse}}" name="{{$input}}">
                                @error($input)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="input-22" class="col-sm-2 col-form-label">{{trans('admin.reason_bounse')}}</label>
                            <div class="col-sm-10">
                                @php $input = "reason_bounse" @endphp
                                <textarea type="text" rows="4" class="form-control @error($input) is-invalid @enderror" id="input-22" name="{{$input}}">
                                    {{$row->reason_bounse}}
                                </textarea>
                                @error($input)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="input-21" class="col-sm-2 col-form-label">{{trans('admin.bounse')}} </label>
                            <div class="col-sm-10">
                                @php $input = "month" @endphp
                                <input type="date" class="form-control @error($input) is-invalid @enderror" id="input-21" name="{{$input}}">
                                @error($input)
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="input-21" class="col-sm-2 col-form-label">{{trans('admin.amount')}} </label>
                            <div class="col-sm-10">
                                @php $input = "amount" @endphp
                                <input type="number" class="form-control @error($input) is-invalid @enderror" id="input-21" placeholder="Enter Your Amount" name="{{$input}}">
                                @error($input)
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        </div>
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
