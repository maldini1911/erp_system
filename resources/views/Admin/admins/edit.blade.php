@extends('Admin.system.app')

@section('system')
<div class="edit-admin">
    <a href="{{route('admins.index')}}" class="btn btn-success"> All {{trans('admin.admins')}}</a>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title text-dark">{{trans('admin.edit')}}</div>
                    <hr>
                    <form action="{{url('admin/admins/'. $row->id)}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                                <div class="form-group row">
                                    <label for="input-21" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        @php $input = "name" @endphp
                                        <input type="text" class="form-control @error($input) is-invalid @enderror" id="input-21" value="{{$row->name}}" name="{{$input}}">
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
                                        <input type="text" class="form-control @error($input) is-invalid @enderror" id="input-22" value="{{$row->email}}" name="email">
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
                                        <input type="text" class="form-control @error($input) is-invalid @enderror" id="input-23" value="{{$row->mobile}}" name="{{$input}}">
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
                                        <input type="password" class="form-control @error($input) is-invalid @enderror" id="input-24" name="{{$input}}">
                                        @error($input)
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <!-- Start Address -->
                                <div class="form-group row">
                                    @php $input = "address" @endphp
                                    <label for="input-23" class="col-sm-2 col-form-label">{{trans('admin.address')}}</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error($input) is-invalid @enderror" id="input-23" value="{{$row->address}}" name="{{$input}}">
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
                                    <input type="date" class="form-control @error($input) is-invalid @enderror" id="input-23" value="{{$row->date_start}}" name="{{$input}}">
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
                                        <input type="number" class="form-control @error($input) is-invalid @enderror" id="input-23" value="{{$row->number_cart}}" name="{{$input}}">
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
                                        <input type="number" class="form-control @error($input) is-invalid @enderror" id="input-23" value="{{$row->salary}}" name="{{$input}}">
                                        @error($input)
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- End  Salary -->

                                <!-- Start Roles -->
                                <div class="form-group row">
                                    <label for="input-24" class="col-sm-2 col-form-label">Permissions</label>
                                    <div class="col-sm-10">
                                        <select name="role" class="form-control">
                                            <option value="{{$row->role}}" selected> </option>
                                            <option value="admin">admin</option>
                                            <option value="programming">Programming</option>
                                            <option value="marketing">marketing</option>
                                            <option value="sales">sales</option>
                                            <option value="hr">HR</option>
                                        </select>
                                        <div class="error">{{$errors->first('role')}}</div>
                                    </div>
                                </div>
                                <!-- End Roles -->

                                <!-- Start Image Profile -->
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

                                <div class="form-group row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-dark shadow-dark px-5"><i class="icon-lock"></i> {{trans('admin.edit')}}</button>
                                </div>
                            </div>
                    </form>
                    <hr>

                    <!-- Start Attachments -->
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <h4 class="alert alert-primary text-center" style="padding:10px 0"> Add Attachments </h4>
                                <form action="{{url('admin/admins/attachments/admin')}}" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="attachments-user">
                                        <div class="form-group attchment">
                                            <label for="input-24">File Type</label>
                                            <input type="text" class="form-control" name="file_type[]">
                                            <label for="input-24">File</label>
                                            <input type="file" class="form-control" name="file[]">
                                            <input type="hidden" class="form-control" name="user_id" value="{{$row->id}}">
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-dark shadow-dark px-5"><i class="icon-lock"></i> {{trans('admin.add')}}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <!-- End Attachments -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
