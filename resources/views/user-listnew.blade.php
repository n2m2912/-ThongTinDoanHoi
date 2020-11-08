@extends('layouts.user-master')
@section('admin-content')
<div class="app-content content container-fluid">
        <div class="content-wrapper">
          <div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-1">
              <h2 class="content-header-title">Quản lý tin</h2>
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
              <div class="breadcrumb-wrapper col-xs-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/user">Trang chủ</a>
                  </li>
                  <li class="breadcrumb-item active">Danh sách tin
                  </li>
                </ol>
              </div>
            </div>
          </div>
          <div class="content-body"><!-- Description -->
              <section id="description" class="card">
                  <div class="card-header">
                      <h4 class="card-title" style="float:left">Danh sách tin</h4>
                      <button class="btn btn-success" onclick="window.location = '/user/news/add'" style="float:right;color:white">Thêm</button>
                  </div>
                  <div class="card-body collapse in">
                      <div class="card-block">
                        <div class="table-responsive">
                          <table id="dbtable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tiêu đề</th>
                                    <th>Nội dung</th>
                                    <th>Tác giả</th>
                                    <th>Lượt xem</th>
                                    <th>Loại</th>
                                    <th>Duyệt</th>
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
                                    <td>{{$item->new_title}}</td>
                                    <td>{{ str_limit($item->content, $limit = 150, $end = '...') }}</td>
                                    <td>{{$item->full_name}}</td>
                                    <td>{{$item->viewed}}</td>
                                    <td>{{$item->type_name}}</td>
                                    @if ($item->censored == 0)
                                        <td>Chưa duyệt</td>
                                    @else
                                        <td>Đã duyệt</td>
                                    @endif
                                    <td>{{$item->created_at}}</td>
                                    <td><button onclick="window.location = '/user/news/edit/{{$item->id}}'" class="btn btn-warning">Sửa</button></td>
                                    <td><button onclick="deleteNew({{$item->id}});" class="btn btn-danger">Xóa</button></td>
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
          function deleteNew(id){
            var txt;
            if (confirm("Bạn muốn xóa tin này")) {
              window.location = '/user/news/delete/'+id;
            }
          }
      </script>
      <!-- ////////////////////////////////////////////////////////////////////////////-->
@endsection