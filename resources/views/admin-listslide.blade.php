@extends('layouts.admin-master')
@section('admin-content')
<div class="app-content content container-fluid">
        <div class="content-wrapper">
          <div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-1">
              <h2 class="content-header-title">Quản lý slide</h2>
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
              <div class="breadcrumb-wrapper col-xs-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/admin">Trang chủ</a>
                  </li>
                  <li class="breadcrumb-item active">Danh sách slide
                  </li>
                </ol>
              </div>
            </div>
          </div>
          <div class="content-body"><!-- Description -->
              <section id="description" class="card">
                  <div class="card-header">
                      <h4 class="card-title" style="float:left">Danh sách slide</h4>
                      <button class="btn btn-success" onclick="window.location = '/admin/slide/add'" style="float:right;color:white">Thêm</button>
                  </div>
                  <div class="card-body collapse in">
                      <div class="card-block">
                        <div class="table-responsive">
                          <table class="table mb-0">
                              <table id="dbtable" class="table table-striped table-bordered" style="width:100%">
                                  <tr>
                                      <th>STT</th>
                                      <th>Tên Hình</th> 
                                      <th>Hình Ảnh</th>
                                      <th>Ngày Tạo</th> 
                                      <th>Sửa</th> 
                                      <th>Xóa</th>
                                  </tr> 
                              </thead>
                              <tbody>
                                <?php $i = 1; ?>
                                @foreach ($data as $item)
                                <tr>
                                  <th scope="row">{{$i}}</th>
                                    <td>{{$item->imager_name}}</td>
                                    <td><img style="width: 500px;" src="{{ asset('img/'.$item->imager_name) }}"/></td>
                                    <td>{{$item->created_at}}</td>
                                    <td><button onclick="window.location = '/admin/slide/edit/{{$item->id}}'" class="btn btn-warning">Sửa</button></td>
                                    <td><button onclick="deleteSlide({{$item->id}});" class="btn btn-danger">Xóa</button></td>
                                </tr>
                                <?php $i++; ?>
                                @endforeach
                              </tbody>
                          </table>
                      </div>
                      </div>
                  </div>
              </section>
  <!--/ Description -->
  <!-- CSS Classes -->
  
  <!--/ HTML Markup -->
          </div>
        </div>
      </div>
      <script> 
          function deleteSlide(id){
            var txt;
            if (confirm("Bạn muốn delete của slide hình này")) {
              window.location = '/admin/slide/delete/'+id;
            }
          }
      </script>
      <!-- ////////////////////////////////////////////////////////////////////////////-->
@endsection