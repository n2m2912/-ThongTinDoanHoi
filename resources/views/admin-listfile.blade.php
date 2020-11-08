@extends('layouts.admin-master')
@section('admin-content')
<div class="app-content content container-fluid">
        <div class="content-wrapper">
          <div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-1">
              <h2 class="content-header-title">Quản lý tập tin</h2>
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
              <div class="breadcrumb-wrapper col-xs-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/admin">Trang chủ</a>
                  </li>
                  <li class="breadcrumb-item active">Danh sách tập tin
                  </li>
                </ol>
              </div>
            </div>
          </div>
          <div class="content-body"><!-- Description -->
              <section id="description" class="card">
                  <div class="card-header">
                      <h4 class="card-title" style="float:left">Danh sách tập tin</h4>
                      <button class="btn btn-success" onclick="window.location = '/admin/files/add'" style="float:right;color:white">Thêm</button>
                  </div>
                  <div class="card-body collapse in">
                      <div class="card-block">
                        <div class="table-responsive">
                          <table id="dbtable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên file</th>
                                    <th>Hình</th>
                                    <th>Loại file</th>
                                    <th>Đường dẫn</th>
                                    <th>Người upload</th>
                                    <th>Thư viện</th>
                                    <th>Tin tức</th>
                                    <th>Ngày tạo</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($data['file'] as $item)
                                <tr>
                                    <th scope="row">{{$i}}</th>
                                    <td>{{$item->file_name}}</td>
                                    @if($item->file_path == '/images')
                                    <td><img src="/files/{{$item->file_path}}/{{$item->file_name}}" alt="" width="300px"></td>
                                    @else
                                    <td></td>
                                    @endif
                                    <td>{{$item->file_type}}</td>
                                    <td>{{$item->file_path}}</td>
                                    <td>{{$item->full_name}}</td>
                                    <?php $i1 = count($data['library']) ?>
                                    @foreach ($data['library'] as $item1)
                                      @if($item->library == $item1->id)
                                        <td>{{$item1->library_title}}</td>
                                        @break
                                      @endif
                                      <?php $i1-- ?>
                                    @endforeach
                                    @if($i1 == 0)
                                      <td></td>
                                    @endif
                                    <?php $i1 = count($data['new']) ?>
                                    @foreach ($data['new'] as $item2)
                                      @if($item->new == $item2->id)
                                        <td>{{$item2->new_title}}</td>
                                        @break
                                      @endif
                                      <?php $i1-- ?>
                                    @endforeach
                                    @if($i1 == 0)
                                      <td></td>
                                    @endif
                                    <td>{{$item->created_at}}</td>
                                    <td><button onclick="window.location = '/admin/files/edit/{{$item->id}}'" class="btn btn-warning">Sửa</button></td>
                                    <td><button onclick="deleteFile({{$item->id}});" class="btn btn-danger">Xóa</button></td>
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
          function deleteFile(id){
            var txt;
            if (confirm("Bạn muốn xóa file này")) {
              window.location = '/admin/files/delete/'+id;
            }
          }
      </script>
      <!-- ////////////////////////////////////////////////////////////////////////////-->
@endsection