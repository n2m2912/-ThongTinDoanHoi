@extends('layouts.admin-master')
@section('admin-content')
<div class="app-content content container-fluid">
        <div class="content-wrapper">
          <div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-1">
              <h2 class="content-header-title">Quản lý quyền</h2>
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
              <div class="breadcrumb-wrapper col-xs-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/admin">Trang chủ</a>
                  </li>
                  <li class="breadcrumb-item active">Danh sách quyền
                  </li>
                </ol>
              </div>
            </div>
          </div>
          <div class="content-body"><!-- Description -->
              <section id="description" class="card">
                  <div class="card-header">
                      <h4 class="card-title" style="float:left">Danh sách quyền</h4>
                      <button class="btn btn-success" onclick="window.location = '/admin/roles/add'" style="float:right;color:white">Thêm</button>
                  </div>
                  <div class="card-body collapse in">
                      <div class="card-block">
                        <div class="table-responsive">
                          <table id="dbtable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên Quyền</th>
                                    <th>Ngày tạo</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($data as $item)
                                <tr>
                                    <th scope="row">{{$i}}</th>
                                    <td>{{$item->role_name}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td><button onclick="window.location = '/admin/roles/edit/{{$item->id}}'" class="btn btn-warning">Sửa</button></td>
                                    <td><button onclick="deleteRole({{$item->id}});" class="btn btn-danger">Xóa</button></td>
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
          function deleteRole(id){
            var txt;
            if (confirm("Bạn muốn xóa quyền này")) {
              window.location = '/admin/roles/delete/'+id;
            }
          }
      </script>
      <!-- ////////////////////////////////////////////////////////////////////////////-->
@endsection