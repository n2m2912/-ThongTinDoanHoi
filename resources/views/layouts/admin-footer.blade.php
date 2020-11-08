<footer class="footer footer-static navbar-fixed-bottom footer-light navbar-border">
    <p class="clearfix text-muted text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block">Copyright  &copy; 2017 <a href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank" class="text-bold-800 grey darken-2">PIXINVENT </a>, All rights reserved. </span><span class="float-md-right d-xs-block d-md-inline-block">Hand-crafted & Made with <i class="icon-heart5 pink"></i> Man Nguyen</span></p>
  </footer>

  <!-- BEGIN VENDOR JS-->
  <script src="{{ asset('app-assets/js/core/libraries/jquery.min.js')}}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/vendors/js/ui/tether.min.js')}}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/js/core/libraries/bootstrap.min.js')}}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js')}}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/vendors/js/ui/unison.min.js')}}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/vendors/js/ui/blockUI.min.js')}}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/vendors/js/ui/jquery.matchHeight-min.js')}}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/vendors/js/ui/screenfull.min.js')}}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/vendors/js/extensions/pace.min.js')}}" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script type="text/javascript" src="{{ asset('app-assets/vendors/js/ui/prism.min.js')}}"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN ROBUST JS-->
  <script src="{{ asset('app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/js/core/app.js')}}" type="text/javascript"></script>
  <!-- END ROBUST JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <!-- END PAGE LEVEL JS-->
  {{-- BEGIN DataTable --}}
  <script type="text/javascript" src="{{ asset('DataTables/datatables.min.js')}}"></script>
  <script>
  $(document).ready(function() {
      $('#dbtable').DataTable();
  });
  </script>
  <script>
    $(document).ready(function(){
        $("#message1").fadeOut(4000);
    });
    </script>
  {{-- END DataTable --}}