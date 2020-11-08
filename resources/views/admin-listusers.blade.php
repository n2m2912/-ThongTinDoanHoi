@extends('layouts.admin-master')
@section('admin-content')
<div class="app-content content container-fluid">
        <div class="content-wrapper">
          <div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-1">
              <h2 class="content-header-title">Quản lý người dùng</h2>
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
              <div class="breadcrumb-wrapper col-xs-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/admin">Trang chủ</a>
                  </li>
                  <li class="breadcrumb-item active">Danh sách người dùng
                  </li>
                </ol>
              </div>
            </div>
          </div>
          <div class="content-body"><!-- Description -->
              <section id="description" class="card">
                  <div class="card-header">
                      <h4 class="card-title" style="float:left">Danh sách người dùng</h4>
                      <button class="btn btn-success" onclick="window.location = '/admin/users/add'" style="float:right;color:white">Thêm</button>
                  </div>
                  <div class="card-body collapse in">
                      <div class="card-block">
                        <div class="table-responsive">
                            <table id="dbtable" class="table table-striped table-bordered" style="width:100%">
                              <thead>
                                  <tr>
                                      <th>STT</th>
                                      <th>Tên</th>
                                      <th>Tên đăng nhập</th>
                                      <th>Email</th>
                                      <th>SĐT</th>
                                      <th>Quyền</th>
                                      <th>Ngày đăng kí</th>
                                      <th>Sửa</th>
                                      <th>Reset password</th>
                                      <th>Xóa</th>
                                  </tr> 
                              </thead>
                              <tbody>
                                <?php $i = 1; ?>
                                @foreach ($data as $item)
                                <tr>
                                  <th scope="row">{{$i}}</th>
                                    <td>{{$item->full_name}}</td>
                                    <td>{{$item->username}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td>{{$item->role_name}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td><button onclick="window.location = '/admin/users/edit/{{$item->id}}'" class="btn btn-warning">Sửa</button></td>
                                    <td><button onclick="reset({{$item->id}});" class="btn btn-danger">Reset</button></td>
                                    <td><button onclick="deleteUser({{$item->id}});" class="btn btn-danger">Xóa</button></td>
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
          function reset(id){
            var txt;
            if (confirm("Bạn muốn reset password của tài khoản này")) {
              window.location = '/admin/users/reset/'+id;
            }
          }
          function deleteUser(id){
            var txt;
            if (confirm("Bạn muốn delete của tài khoản này")) {
              window.location = '/admin/users/delete/'+id;
            }
          }
      </script>
      <!-- ////////////////////////////////////////////////////////////////////////////-->
@endsection