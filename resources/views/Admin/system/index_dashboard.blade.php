@extends('Admin.system.app')

@section('system')


@if(Auth::user()->role == 'admin')
    <!-- ======================================= -->
    <h4 class="alert alert-primary" style="padding: 20px"> States Admin</h4>
    <div class="row mt-3">
        <div class="col-12 col-lg-6 col-xl-4">
            <div class="card gradient-bloody">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white"> {{trans('admin.all-users')}} </p>
                            <h4 class="text-white line-height-5"> {{$all_users}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-users text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-4">
            <div class="card gradient-bloody">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white"> {{trans('admin.admins')}} </p>
                            <h4 class="text-white line-height-5"> {{$admins}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-users text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-12 col-lg-6 col-xl-4">
            <div class="card gradient-blooker">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">{{trans('admin.users-hr')}}</p>
                            <h4 class="text-white line-height-5"> {{$hr_users}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-users text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-4">
            <div class="card gradient-scooter">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">{{trans('admin.users-sales')}}</p>
                            <h4 class="text-white line-height-5">{{$sales_users}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-users text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-12 col-lg-6 col-xl-4">
            <div class="card gradient-ohhappiness">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">{{trans('admin.users-marketing')}}</p>
                            <h4 class="text-white line-height-5">{{$marketing_users}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-users text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-4">
            <div class="card gradient-ohhappiness">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">{{trans('admin.users-programming')}}</p>
                            <h4 class="text-white line-height-5">{{$programming_users}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-users text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--End Row-->
    <hr>
    <!-- ================= HR ===================== -->
    <h4 class="alert alert-primary" style="padding: 20px"> States HR</h4>
    <!--Start Dashboard Content-->
    <h4 class="alert alert-primary" style="width: 300px;padding: 10px">State Manage Client </h4>
    <div class="row mt-3">


        <div class="col-12 col-lg-6 col-xl-4">
            <div class="card gradient-blooker">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Total Manage Marketing</p>
                            <h4 class="text-white line-height-5">{{$all_marketing_admin}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-users text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-4">
            <div class="card gradient-scooter">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Total Manage Programming</p>
                            <h4 class="text-white line-height-5">{{$all_programming_admin}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-users text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-12 col-lg-6 col-xl-4">
            <div class="card gradient-ohhappiness">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Total All</p>
                            <h4 class="text-white line-height-5">{{$all_programming_marketing_admin}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-users text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Row-->
    <h4 class="alert alert-primary" style="width: 300px;padding: 10px">State Order Requests </h4>
    <div class="row mt-3">

        <div class="col-12 col-lg-6 col-xl-4">
            <div class="card gradient-bloody">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Total Manage Clients </p>
                            <h4 class="text-white line-height-5"> {{$all_manage_clients_admin}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-users text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-12 col-lg-6 col-xl-4">
            <div class="card gradient-bloody">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Total Requests Marketing </p>
                            <h4 class="text-white line-height-5"> {{$requests_marketing_admin}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-users text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-4">
            <div class="card gradient-blooker">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Total Requests Programming</p>
                            <h4 class="text-white line-height-5">{{$requests_programming_admin}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-users text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--End Row-->
    <hr>
    <!-- ================= Sales ================== -->
    <h4 class="alert alert-primary" style="padding: 20px"> States Sales</h4>
    <!--Start Dashboard Content-->
    <h4 class="alert alert-primary" style="width: 300px;padding: 10px"> State Clients </h4>
    <div class="row mt-3">
        <div class="col-12 col-lg-6 col-xl-3">
            <div class="card gradient-bloody">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Total Clients </p>
                            <h4 class="text-white line-height-5"> {{$clients}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-users text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-3">
            <div class="card gradient-blooker">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Clients Done</p>
                            <h4 class="text-white line-height-5">{{$clients_done}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-users text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-3">
            <div class="card gradient-scooter">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Clients Active </p>
                            <h4 class="text-white line-height-5">{{$clients_active}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-users text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-3">
            <div class="card gradient-ohhappiness">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Not interested</p>
                            <h4 class="text-white line-height-5">{{$clients_unactive}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-users text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ==== Projects ===== -->
    <h4 class="alert alert-primary" style="width: 300px;padding: 10px"> State Projects </h4>
    <div class="row mt-3">
        <div class="col-12 col-lg-6 col-xl-4">
            <div class="card gradient-bloody">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Total {{trans('admin.projects')}} </p>
                            <h4 class="text-white line-height-5"> {{$projects}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fas fa-project-diagram text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-4">
            <div class="card gradient-blooker">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Total Projects Waiting</p>
                            <h4 class="text-white line-height-5">{{$projects_waiting}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-hand-paper text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-4">
            <div class="card gradient-scooter">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Total Projects Pending </p>
                            <h4 class="text-white line-height-5">{{$projects_pending}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-spinner text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-4">
            <div class="card gradient-ohhappiness">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Total Projects Cancel</p>
                            <h4 class="text-white line-height-5">{{$projects_cancel}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-ban text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-4">
            <div class="card gradient-ohhappiness">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Total Projects Delay</p>
                            <h4 class="text-white line-height-5">{{$projects_delay}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-stop-circle text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-4">
            <div class="card gradient-ohhappiness">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Total Projects Finish</p>
                            <h4 class="text-white line-height-5">{{$projects_finish}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-pie-chart text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Row-->
    <hr>
    <!-- ================ Marketing =============== -->
    <h4 class="alert alert-primary" style="padding: 20px;width: 100%"> States Marketing</h4>
    <!--Start Dashboard Content-->
    <div class="row mt-3">

        <div class="col-12 col-lg-6 col-xl-4">
            <div class="card gradient-scooter">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white"> Total {{trans('admin.requests_marketing')}}</p>
                            <h4 class="text-white line-height-5">{{$order_marketing_admin}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-users text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-4">
            <div class="card gradient-bloody">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Facebook {{trans('admin.coustmer-campaign')}} </p>
                            <h4 class="text-white line-height-5"> {{$facebook_coustmer_admin}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-facebook text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-4">
            <div class="card gradient-blooker">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Facebook {{trans('admin.our-campaign')}}</p>
                            <h4 class="text-white line-height-5"> {{$facebook_our_admin}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-facebook text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-4">
            <div class="card gradient-ohhappiness">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Google {{trans('admin.coustmer-campaign')}}</p>
                            <h4 class="text-white line-height-5">{{$google_coustmer_admin}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-pie-chart text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-4">
            <div class="card gradient-ohhappiness">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Google {{trans('admin.our-campaign')}}</p>
                            <h4 class="text-white line-height-5">{{$google_our_admin}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-pie-chart text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-4">
            <div class="card gradient-ohhappiness">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">TeleSales Data</p>
                            <h4 class="text-white line-height-5">{{$telesales_marketing_admin}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-pie-chart text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--End Row-->
    <hr>
    <!-- ================ Programming =============== -->
    <h4 class="alert alert-primary" style="padding: 20px;width: 100%"> States Programming</h4>
    <div class="row mt-3">

        <div class="col-12 col-lg-6 col-xl-4">
            <div class="card gradient-scooter">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white"> Total {{trans('admin.requests_programming')}}</p>
                            <h4 class="text-white line-height-5">{{$order_programming_admin}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-pie-chart text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-4">
            <div class="card gradient-bloody">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Total {{trans('admin.projects')}} </p>
                            <h4 class="text-white line-height-5"> {{$projects_all_programming_admin}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-pie-chart text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-4">
            <div class="card gradient-blooker">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Projects Waiting</p>
                            <h4 class="text-white line-height-5"> {{$projects_waiting_programming_admin}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-pie-chart text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-4">
            <div class="card gradient-ohhappiness">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Projects Pending</p>
                            <h4 class="text-white line-height-5">{{$projects_pending_programming_admin}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-pie-chart text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-4">
            <div class="card gradient-ohhappiness">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Projects Cancel</p>
                            <h4 class="text-white line-height-5">{{$projects_cancel_programming_admin}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-pie-chart text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-4">
            <div class="card gradient-ohhappiness">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Projects Finish</p>
                            <h4 class="text-white line-height-5">{{$projects_finish_programming_admin}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-pie-chart text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--End Row-->
    <!--Start Dashboard Content-->

@endif

<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
@if(Auth::user()->role == 'hr')
    <h4 class="alert alert-primary" style="padding: 20px"> States HR</h4>
    <!--Start Dashboard Content-->
    <h4 class="alert alert-primary" style="width: 300px;padding: 10px">State Manage Client </h4>
    <div class="row mt-3">
        <div class="col-12 col-lg-6 col-xl-3">
            <div class="card gradient-bloody">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Total Manage Clients </p>
                            <h4 class="text-white line-height-5"> {{$all_manage_clients}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-users text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-12 col-lg-6 col-xl-3">
            <div class="card gradient-blooker">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Total Manage Marketing</p>
                            <h4 class="text-white line-height-5">{{$all_marketing}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-users text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-3">
            <div class="card gradient-scooter">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Total Manage Programming</p>
                            <h4 class="text-white line-height-5">{{$all_programming}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-users text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-12 col-lg-6 col-xl-3">
            <div class="card gradient-ohhappiness">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Total All</p>
                            <h4 class="text-white line-height-5">{{$all_programming_marketing}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-users text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--End Row-->
    <h4 class="alert alert-primary" style="width: 300px;padding: 10px">State Order Requests </h4>
    <div class="row mt-3">
        <div class="col-12 col-lg-6 col-xl-6">
            <div class="card gradient-bloody">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Total Requests Marketing </p>
                            <h4 class="text-white line-height-5"> {{$requests_marketing}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-users text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-6">
            <div class="card gradient-blooker">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Total Requests Programming</p>
                            <h4 class="text-white line-height-5">{{$requests_programming}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-users text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--End Row-->
    @endif

<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
@if(Auth::user()->role == 'sales')
    <h4 class="alert alert-primary" style="padding: 20px"> States Sales</h4>
    <!--Start Dashboard Content-->
    <!-- ========= Commissions & Target ======= -->
    <h4 class="alert alert-primary" style="width: 400px;padding: 10px"> State Commissions & Target </h4>
    <div class="row mt-3">
        <div class="col-12 col-lg-6 col-xl-3">
            <div class="card gradient-bloody">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white"> {{trans('admin.commissions')}} </p>
                            <h4 class="text-white line-height-5"> {{$commissions}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-dollar-sign text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-3">
            <div class="card gradient-blooker">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Target Required</p>
                            <h4 class="text-white line-height-5">{{$target_now}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fas fa-search-dollar text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-3">
            <div class="card gradient-scooter">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Target Successful </p>
                            <h4 class="text-white line-height-5">{{$target_success}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fas fa-funnel-dollar text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-3">
            <div class="card gradient-ohhappiness">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Target Status </p>
                            <h4 class="text-white line-height-5">{{$target_status}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fas fa-dolly text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ======== Clients ========= -->
    <h4 class="alert alert-primary" style="width: 300px;padding: 10px"> State Clients </h4>
    <div class="row mt-3">
        <div class="col-12 col-lg-6 col-xl-3">
            <div class="card gradient-bloody">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Total Clients </p>
                            <h4 class="text-white line-height-5"> {{$clients}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-users text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-3">
            <div class="card gradient-blooker">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Clients Done</p>
                            <h4 class="text-white line-height-5">{{$clients_done}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-users text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-3">
            <div class="card gradient-scooter">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Clients Active </p>
                            <h4 class="text-white line-height-5">{{$clients_active}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-users text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-3">
            <div class="card gradient-ohhappiness">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Not interested</p>
                            <h4 class="text-white line-height-5">{{$clients_unactive}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-users text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ==== Projects ===== -->
    <h4 class="alert alert-primary" style="width: 300px;padding: 10px"> State Projects </h4>
    <div class="row mt-3">
        <div class="col-12 col-lg-6 col-xl-4">
            <div class="card gradient-bloody">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Total {{trans('admin.projects')}} </p>
                            <h4 class="text-white line-height-5"> {{$projects}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fas fa-project-diagram text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-4">
            <div class="card gradient-blooker">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Total Projects Waiting</p>
                            <h4 class="text-white line-height-5">{{$projects_waiting}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-hand-paper text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-4">
            <div class="card gradient-scooter">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Total Projects Pending </p>
                            <h4 class="text-white line-height-5">{{$projects_pending}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-spinner text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-4">
            <div class="card gradient-ohhappiness">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Total Projects Cancel</p>
                            <h4 class="text-white line-height-5">{{$projects_cancel}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-ban text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-4">
            <div class="card gradient-ohhappiness">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Total Projects Delay</p>
                            <h4 class="text-white line-height-5">{{$projects_delay}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-stop-circle text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-4">
            <div class="card gradient-ohhappiness">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Total Projects Finish</p>
                            <h4 class="text-white line-height-5">{{$projects_finish}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fa fa-pie-chart text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h4 class="alert alert-primary" style="width: 300px;padding: 10px"> State TeleSales Data </h4>
    <div class="row mt-3">
        <div class="col-12 col-lg-6 col-xl-4">
            <div class="card gradient-bloody">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Total TeleSasles Data </p>
                            <h4 class="text-white line-height-5"> {{$telesales_data}}</h4>
                        </div>
                        <div class="w-circle-icon rounded-circle border border-white">
                            <i class="fas fa-users text-white"></i></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--End Row-->
    <hr>
    <!-- Start Charts -->
    <div class="row">
        <div class="col-12 col-lg-6">
                <div class="card bg-transparent shadow-none border border-light-3">
                <div class="card-header bg-transparent text-white border-light-3">
                    StatesProjects Select Packeges
                    <div class="card-body">
                        <input type="hidden" value="{{url('admin/dashboard/chart/sales/packege')}}" id="url-chart-sales-packegs">
                        <canvas id="dashboard3-chart-1"></canvas>
                    </div>
                </div>
            </div>
        </div><!--End Row-->

        <div class="col-12 col-lg-6">
            <div class="card bg-transparent shadow-none border border-light-3">
            <div class="card-header bg-transparent text-white border-light-3">
                StatesProjects Select Categories
                <div class="card-body">
                    <input type="hidden" value="{{url('admin/dashboard/chart/sales/cateogry')}}" id="url-chart-sales-category">
                    <canvas id="dashboard3-chart-2"></canvas>
                </div>
            </div>
        </div>
    </div><!--End Row-->
    </div>
    <hr>
@endif

<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
@if(Auth::user()->role == 'marketing')
    <h4 class="alert alert-primary" style="padding: 20px;width: 100%"> States Marketing</h4>
    <!--Start Dashboard Content-->
    <div class="row mt-3">

        <div class="col-12 col-lg-6 col-xl-4">
            <div class="card gradient-scooter">
            <div class="card-body">
                <div class="media align-items-center">
                <div class="media-body">
                <p class="text-white"> Total {{trans('admin.requests_marketing')}}</p>
                <h4 class="text-white line-height-5">{{$order_marketing}}</h4>
                </div>
                <div class="w-circle-icon rounded-circle border border-white">
              <i class="fa fa-users text-white"></i></div>
            </div>
            </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-4">
            <div class="card gradient-bloody">
            <div class="card-body">
                <div class="media align-items-center">
                <div class="media-body">
                <p class="text-white">Facebook {{trans('admin.coustmer-campaign')}} </p>
                <h4 class="text-white line-height-5"> {{$facebook_coustmer}}</h4>
                </div>
                <div class="w-circle-icon rounded-circle border border-white">
                <i class="fa fa-facebook text-white"></i></div>
            </div>
            </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-4">
            <div class="card gradient-blooker">
            <div class="card-body">
                <div class="media align-items-center">
                <div class="media-body">
                <p class="text-white">Facebook {{trans('admin.our-campaign')}}</p>
                <h4 class="text-white line-height-5"> {{$facebook_our}}</h4>
                </div>
                <div class="w-circle-icon rounded-circle border border-white">
                <i class="fa fa-facebook text-white"></i></div>
            </div>
            </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-4">
            <div class="card gradient-ohhappiness">
            <div class="card-body">
                <div class="media align-items-center">
                <div class="media-body">
                <p class="text-white">Google {{trans('admin.coustmer-campaign')}}</p>
                <h4 class="text-white line-height-5">{{$google_coustmer}}</h4>
                </div>
                <div class="w-circle-icon rounded-circle border border-white">
                <i class="fa fa-pie-chart text-white"></i></div>
            </div>
            </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-4">
            <div class="card gradient-ohhappiness">
            <div class="card-body">
                <div class="media align-items-center">
                <div class="media-body">
                <p class="text-white">Google {{trans('admin.our-campaign')}}</p>
                <h4 class="text-white line-height-5">{{$google_our}}</h4>
                </div>
                <div class="w-circle-icon rounded-circle border border-white">
                <i class="fa fa-pie-chart text-white"></i></div>
            </div>
            </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-4">
        <div class="card gradient-ohhappiness">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="media-body">
                        <p class="text-white">TeleSales Data</p>
                        <h4 class="text-white line-height-5">{{$telesales_marketing}}</h4>
                    </div>
                    <div class="w-circle-icon rounded-circle border border-white">
                        <i class="fa fa-pie-chart text-white"></i></div>
                </div>
            </div>
        </div>
    </div>
    </div><!--End Row-->
<hr>
@endif






@push('js')
<script src="{{url('/')}}/Admin/assets/js/index3.js"></script>
@endpush
@endsection
