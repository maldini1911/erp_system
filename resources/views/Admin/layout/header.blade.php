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
