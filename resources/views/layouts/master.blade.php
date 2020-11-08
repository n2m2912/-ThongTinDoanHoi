<!DOCTYPE html>
<html lang="en">
@include('layouts.header')
<body>
<button onclick="topFunction()" id="myBtn" class="btn scroll-top" title="Go to top"><img src="{{ asset('img/go-to-top.png') }}" alt="" /></button>
<div class="container">  
    <a href="https://www.hutech.edu.vn/"><img src="{{ asset('img/banner_doanthanhnien.jpg') }}" alt="banner_doanthanhnien" style="width: 100%"></a>
    <div class="text-block hidden-xs hidden-md" style="position: absolute;top: 0px;right: 120px;color: black">
      <form action="{{route('search')}}" method="POST">
          {{ csrf_field() }}
        <input type="text" style="border: none" name="search" id="search" placeholder="search" >
        <input type="submit" style="border: none;background-color:#3980BA;color:white" value="Tìm">
      </form>
    </div>
</div>
<div class="container">
  <nav class="navbar navbar-blue">
    <div class="navbar-header">
        <a href="#" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" style="text-decoration: none">
            <i class="fas fa-bars"></i> DANH MỤC                   
        </a>
      </div>
      <div class="collapse navbar-collapse " id="myNavbar">
        <ul class="nav navbar-nav">
          <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle" data-target="/" href="/" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" >
              <i class="fas fa-home"></i>
            </a>
            <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                <li><a class="text-center" href="https://hutech.edu.vn">Trang chủ Hutech</a></li>
                <li><a class="text-center" href="/">Trang chủ Đoàn - Hội</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a  class="nav-link dropdown-toggle" data-target="/" href="/" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" >GIỚI THIỆU</a>
            <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
              <li class="dropdown-submenu"><a class="text-center" href="#">Đoàn Thanh Niên</a>
                <ul class="dropdown-menu ">
                  <li><a class="text-center" href="/news-type/4">Lịch sử hình thành</a></li>
                  <li><a class="text-center" href="#">Liên hệ</a></li>
                </ul>
              </li>
              <li class="dropdown-submenu"><a class="text-center" href="#">Hội sinh viên</a>
                <ul class="dropdown-menu">
                  <li><a class="text-center" href="/detail/5">Lịch sử hình thành</a></li>
                  <li><a class="text-center" href="#">Liên hệ</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-target="/" href="/" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" >TIN TỨC</a>
            <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                <li><a class="text-center" href="/news-type/1">Thông báo</a></li>
                <li><a class="text-center" href="/news-type/2">Nhịp sống Đoàn - Hội</a></li>
                <li><a class="text-center" href="/news-type/3">Gương sáng sinh viên</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-target="/" href="/" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true">VĂN BẢN</a>
            <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                <li><a class="text-center" href="/library/file">Mẫu đăng ký</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-target="/" href="/" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true">THƯ VIỆN</a>
            <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                <li><a class="text-center" href="/library/image">Thư viện hình ảnh</a></li>
                <li><a class="text-center" href="/library/video">Thư viện Video</a></li>
            </ul>
          </li>
          <li><a  href="/news-type/3">SỐNG ĐẸP</a></li>
        </ul>
      </div>
  </nav>
</div>
@yield('content')
@include('layouts.footer')
</body>
</html>
