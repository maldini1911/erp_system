@extends('Admin.system.app')

@section('system')
    <div class="show-admins">
        <div class="container">
            <!-- Start Show Admin -->
            <div class="card">
                <div class="card-body">

                    <a href="{{url('admin/admins')}}" class="btn btn-primary"><i class="fas fa-edit"></i> All Admins</a>

                    <div class="row">
                        <!-- Start Show Data -->
                        <div class="col-lg-8">
                            <table class="table table-bordered table-show-client">
                                <tr>
                                    <td class="tb">Name</td>
                                    <td>{{$user->name ? $user->name : "Not Found Data"}}</td>
                                </tr>

                                <tr>
                                    <td class="tb">Email Address</td>
                                    <td>{{$user->email ? $user->email : "Not Found Data"}}</td>
                                </tr>

                                <tr>
                                    <td class="tb">Mobile</td>
                                    <td>{{$user->mobile ? $user->mobile : "Not Found Data" }}</td>
                                </tr>

                                <tr>
                                    <td class="tb">Address</td>
                                    <td>{{$user->address ? $user->address : "Not Found Data"}}</td>
                                </tr>

                                <tr>
                                    <td class="tb">Date Start Work</td>
                                    <td>{{$user->date_start ? $user->date_start : "Not Found Data"}}</td>
                                </tr>

                                <tr>
                                    <td class="tb">Number cart</td>
                                    <td>{{$user->number_cart ? $user->number_cart : "Not Found Data"}}</td>
                                </tr>
                                <tr>
                                    <td class="tb">Salary</td>
                                    <td>{{$user->salary ? $user->salary : "Not Found Data" }}</td>
                                </tr>


                            </table>
                        </div>
                        <!-- End Show Data -->

                        <!-- Start Show Image Profile -->
                        @if($user->image != null)
                        <div class="col-lg-4 text-center">
                            <img src="{{url('/')}}/uploads/admins/profile/{{$user->image}}" width="100%">
                        </div>
                        @endif
                        <!-- End show Image Profile -->
                        </div>
                    <!-- End Row -->

                </div>
            </div>
            <!-- End Show Admin -->


        </div>
    </div>
@endsection
