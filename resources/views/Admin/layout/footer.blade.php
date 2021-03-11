
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
