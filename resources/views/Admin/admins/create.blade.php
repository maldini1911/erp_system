@extends('Admin.system.app')

@section('system')
<div class="create-admin">
    <a href="{{route('admins.index')}}" class="btn btn-success"> All {{trans('admin.admins')}}</a>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title text-dark">{{trans('admin.create')}}</div>
                    <hr>
                    <form action="{{route('admins.store')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label for="input-21" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                @php $input = "name" @endphp
                                <input type="text" class="form-control @error($input) is-invalid @enderror" id="input-21" placeholder="Enter Your Name" name="{{$input}}">
                                @error($input)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="input-22" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                @php $input = "email" @endphp
                                <input type="text" class="form-control @error($input) is-invalid @enderror" id="input-22" placeholder="Enter Your Email Address" name="email">
                                @error($input)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            @php $input = "mobile" @endphp
                            <label for="input-23" class="col-sm-2 col-form-label">Mobile</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error($input) is-invalid @enderror" id="input-23" placeholder="Enter Your Mobile Number" name="mobile">
                                @error($input)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="input-24" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                @php $input = "password" @endphp
                                <input type="password" class="form-control @error($input) is-invalid @enderror" id="input-24" placeholder="Enter Password" name="{{$input}}">
                                @error($input)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <!-- Start Roles -->
                        <div class="form-group row">
                            <label for="input-24" class="col-sm-2 col-form-label">Permissions</label>
                            <div class="col-sm-10">
                                <select name="role" class="form-control">
                                    <option value="admin">Admin</option>
                                    <option value="programming">Programming</option>
                                    <option value="marketing">Marketing</option>
                                    <option value="sales">Sales</option>
                                    <option value="hr">HR</option>
                                </select>
                                <div class="error">{{$errors->first('role')}}</div>
                            </div>
                        </div>
                        <!-- End Roles -->

                        <!-- Start Address -->
                        <div class="form-group row">
                            @php $input = "address" @endphp
                            <label for="input-23" class="col-sm-2 col-form-label">{{trans('admin.address')}}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error($input) is-invalid @enderror" id="input-23" placeholder="Enter Your {{trans('admin.address')}}" name="{{$input}}">
                                @error($input)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- End Address -->

                        <!-- Start Date Start Work  -->
                        <div class="form-group row">
                            @php $input = "date_start" @endphp
                            <label for="input-23" class="col-sm-2 col-form-label">{{trans('admin.date_start')}}</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control @error($input) is-invalid @enderror" id="input-23" placeholder="Enter Your {{trans('admin.date_start')}}" name="{{$input}}">
                                @error($input)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- End  Date Start Work -->

                        <!-- Start Number Cart  -->
                        <div class="form-group row">
                            @php $input = "number_cart" @endphp
                            <label for="input-23" class="col-sm-2 col-form-label">{{trans('admin.number_cart')}}</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control @error($input) is-invalid @enderror" id="input-23" placeholder="Enter Your {{trans('admin.number_cart')}}" name="{{$input}}">
                                @error($input)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- End  Number Cart -->

                        <!-- Start Salary  -->
                        <div class="form-group row">
                            @php $input = "salary" @endphp
                            <label for="input-23" class="col-sm-2 col-form-label">{{trans('admin.salary')}}</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control @error($input) is-invalid @enderror" id="input-23" placeholder="Enter Your {{trans('admin.salary')}}" name="{{$input}}">
                                @error($input)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- End  Salary -->

                        <div class="form-group row">
                            <label for="input-24" class="col-sm-2 col-form-label">{{trans('admin.image_profile')}}</label>
                            <div class="col-sm-10">
                                @php $input = "image" @endphp
                                <input type="file" class="form-control @error($input) is-invalid @enderror" id="input-24" name="{{$input}}">
                                @error($input)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- End Row -->
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-dark shadow-dark px-5"><i class="icon-lock"></i> {{trans('admin.create')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
