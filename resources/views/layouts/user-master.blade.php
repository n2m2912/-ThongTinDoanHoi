<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
@include('layouts.admin-head')
<body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">
        <!-- navbar-fixed-top-->
        @include('layouts.user-head-menu')
        <!-- ////////////////////////////////////////////////////////////////////////////-->
        <!-- main menu-->
        @include('layouts.user-left-menu')
        <!-- / main menu-->
        @yield('admin-content')
        @include('layouts.admin-footer')
      </body>
</html>