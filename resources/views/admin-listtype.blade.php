@extends('layouts.admin-master')
@section('admin-content')
<div class="app-content content container-fluid">
        <div class="content-wrapper">
          <div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-1">
              <h2 class="content-header-title">Quản lý thể loại</h2>
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
              <div class="breadcrumb-wrapper col-xs-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/admin">Trang chủ</a>
                  </li>
                  <li class="breadcrumb-item active">Danh sách thể loại
                  </li>
                </ol>
              </div>
            </div>
          </div>
          <div class="content-body"><!-- Description -->
              <section id="description" class="card">
                  <div class="card-header">
                      <h4 class="card-title" style="float:left">Danh sách thể loại</h4>
                      <button class="btn btn-success" onclick="window.location = '/admin/type/add'" style="float:right;color:white">Thêm</button>
                  </div>
                  <div class="card-body collapse in">
                      <div class="card-block">
                        <div class="table-responsive">
                            <table id="dbtable" class="table table-striped table-bordered" style="width:100%">
                              <thead>
                                  <tr>
                                      <th>STT</th>
                                      <th>Tên Thể Loại</th> 
                                      <th>Ngày Tạo</th>
                                      <th>Ngày Cập Nhật</th> 
                                      <th>Sửa</th> 
                                      <th>Xóa</th>
                                  </tr> 
                              </thead>
                              <tbody>
                                <?php $i = 1; ?>
                                @foreach ($data as $item)
                                <tr>
                                  <th scope="row">{{$i}}</th>
                                    <td>{{$item->type_name}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->updated_at}}</td>
                                    <td><button onclick="window.location = '/admin/type/edit/{{$item->id}}'" class="btn btn-warning">Sửa</button></td>
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
            if (confirm("Bạn muốn delete loại này")) {
              window.location = '/admin/type/delete/'+id;
            }
          }
      </script>
      <!-- ////////////////////////////////////////////////////////////////////////////-->
@endsection