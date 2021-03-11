@extends('Admin.system.app')

@section('system')
<div class="profile-admin">
    <!-- Start Header -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <i class="fas fa-user"> </i> My Profile
                </div>
            </div>
        </div>
    </div>
    <!-- End Header -->

    <!-- Start Show Data profile -->
    <div class="row">
        <div class="col-lg-4 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="card profile-card-1">
                        <img src="{{url('/')}}/Admin/assets/images/gallery/7.jpg" class="background" alt="profile-image">
                        @if($row->image != null)
                        <img src="{{url('/')}}/uploads/admins/profile/{{$row->image}}" alt="profile-image" class="profile">
                        @else
                        <h4 class="text-center"> Not Found Image</h4>
                        @endif
                        <div class="card-content">
                            <h2 class="text-white">{{$row->name}}<small>{{$row->email}}</small></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Start Edit Profile -->
        <div class="col-lg-8 col-xl-8">
            <div class="card">
                <div class="card-body">
                    <div class="card profile-card-1">
                    <form action="{{url('admin/admins/profile/edit/'. $row->id)}}" method="POST" enctype="multipart/form-data">
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
                                    <hr>
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
                                    <hr>
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
                                    <hr>

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

                                    <hr>
                                    <div class="col-sm-2">
                                        <button type="submit" class="btn btn-dark">  {{trans('admin.edit')}}</button>
                                    </div>
                          
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Edit Profile -->

    </div>
    <!-- End Show Data Profile -->
</div>
@endsection