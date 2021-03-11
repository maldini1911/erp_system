<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from codervent.com/rukada/color-admin/index3.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Nov 2019 15:04:09 GMT -->
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>@yield('title')</title>

    <!-- FontAswome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
    <!--favicon-->
    <link rel="icon" href="{{url('/')}}/Admin/assets/images/favicon.ico" type="image/x-icon">
    <!-- simplebar CSS-->
    <link href="{{url('/')}}/Admin/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
    <!-- Bootstrap core CSS-->
    <link href="{{url('/')}}/Admin/assets/css/bootstrap.min.css" rel="stylesheet"/>
    <!-- animate CSS-->
    <link href="{{url('/')}}/Admin/assets/css/animate.css" rel="stylesheet" type="text/css"/>
    <!-- Icons CSS-->
    <link href="{{url('/')}}/Admin/assets/css/icons.css" rel="stylesheet" type="text/css"/>
    <!-- Sidebar CSS-->
    <link href="{{url('/')}}/Admin/assets/css/sidebar-menu.css" rel="stylesheet"/>
    <!-- Custom Style-->
    <link href="{{url('/')}}/Admin/assets/css/app-style.css" rel="stylesheet"/>
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{url('/')}}/Admin/assets/css/jquery.datetimepicker.min.css">

    <!-- System Style-->
    <link href="{{url('/')}}/Admin/assets/css/system-style.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    @stack('css')
</head>

<body class="bg-dark">
@include('sweet::alert')
<!-- Start wrapper-->
<div id="wrapper">

    <div class="show-clients" style="margin-top: 100px">
        <div class="container">

            <div class="card">
                <div class="card-body">
                    <h4 class="text-center">{{$row->project_name}}</h4>
                    <hr>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <ul class="list-unstyled">
                                        <li> {{trans('admin.name')}} : <span style="color:blue">{{$row->programming_request->client['name']}}</span></li>
                                        <hr>
                                        <li> {{trans('admin.start-resgister')}} : <span style="color:blue">{{$row->start_resgister}}</span></li>
                                        <hr>
                                        <li> {{trans('admin.start-project')}} : <span style="color:blue">{{$row->date_start}}</span></li>
                                        <hr>
                                        <li> {{trans('admin.date-line')}} : <span style="color:blue">{{$row->date_line}}</span></li>
                                        <hr>
                                        <li> {{trans('admin.project-url-demo')}} : <span style="color:blue">{{$row->project_url_demo}}</span></li>
                                        <hr>
                                    <li> {{trans('admin.project-url-domin')}} : <span style="color:blue">{{$row->project_url_domin}}</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 text-center">
                                <div class="card">
                                    <div class="card-header text-uppercase">The success Rate</div>
                                    <div class="card-body">
                                        <div class="progress" style="height: 265px;background: #f1f1f1">
                                            <div class="progress-bar" role="progressbar" style="width: {{$row->project_level}}%;font-size: 50px;font-weight: bolder;color:red" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100">
                                                {{$row->project_level}}%</div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>



    <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->

    <!--Start footer-->
    <footer class="footer bg-dark border-light-3">
        <div class="container">
            <div class="text-center text-white">
                Copyright © 2020 Dmweg
            </div>
        </div>
    </footer>
    <!--End footer-->

</div><!--End wrapper-->

<!-- Bootstrap core JavaScript-->
<script src="{{url('/')}}/Admin/assets/js/jquery.min.js"></script>
<script src="{{url('/')}}/Admin/assets/js/popper.min.js"></script>
<script src="{{url('/')}}/Admin/assets/js/bootstrap.min.js"></script>
<!-- Date Pickes Js -->
<script src="{{url('/')}}/Admin/assets/js/jquery.datetimepicker.full.min.js"></script>
<!-- simplebar js -->
<script src="{{url('/')}}/Admin/assets/plugins/simplebar/js/simplebar.js"></script>
<!-- waves effect js -->
<script src="{{url('/')}}/Admin/assets/js/waves.js"></script>
<!-- sidebar-menu js -->
<script src="{{url('/')}}/Admin/assets/js/sidebar-menu.js"></script>
<!-- Custom scripts -->
<script src="{{url('/')}}/Admin/assets/js/app-script.js"></script>
<!-- Chart js -->
<script src="{{url('/')}}/Admin/assets/plugins/Chart.js/Chart.min.js"></script>
<!--Peity Chart -->
<script src="{{url('/')}}/Admin/assets/plugins/peity/jquery.peity.min.js"></script>
<!-- Index js -->

<!--Data Tables js-->
<script src="{{url('/')}}/Admin/assets/plugins/bootstrap-datatable/js/jquery.dataTables.min.js"></script>
<script src="{{url('/')}}/Admin/assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js"></script>
<script src="{{url('/')}}/Admin/assets/plugins/bootstrap-datatable/js/dataTables.buttons.min.js"></script>
<script src="{{url('/')}}/Admin/assets/plugins/bootstrap-datatable/js/buttons.bootstrap4.min.js"></script>
<script src="{{url('/')}}/Admin/assets/plugins/bootstrap-datatable/js/jszip.min.js"></script>
<script src="{{url('/')}}/Admin/assets/plugins/bootstrap-datatable/js/pdfmake.min.js"></script>
<script src="{{url('/')}}/Admin/assets/plugins/bootstrap-datatable/js/vfs_fonts.js"></script>
<script src="{{url('/')}}/Admin/assets/plugins/bootstrap-datatable/js/buttons.html5.min.js"></script>
<script src="{{url('/')}}/Admin/assets/plugins/bootstrap-datatable/js/buttons.print.min.js"></script>
<script src="{{url('/')}}/Admin/assets/plugins/bootstrap-datatable/js/buttons.colVis.min.js"></script>

<script>
    $(document).ready(function() {

        //Default data table
        $('#default-datatable').DataTable({
            "bPaginate":false,
            responsive: true
        });


        var table = $('#example').DataTable( {
            lengthChange: false,
            buttons: [ 'copy', 'excel', 'pdf', 'print' ]
        } );

        table.buttons().container()
            .appendTo( '#example_wrapper .col-md-6:eq(0)' );

    } );

</script>

@stack('js')

<script src="{{url('/')}}/Admin/assets/js/script.js"></script>
</body>

<!-- Mirrored from codervent.com/rukada/color-admin/index3.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Nov 2019 15:04:10 GMT -->
</html>
