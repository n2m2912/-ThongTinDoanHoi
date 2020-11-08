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
                  <li class="breadcrumb-item"><a href="/admin/files">Danh sách tập tin</a>
                  </li>
                  <li class="breadcrumb-item active">Sửa tập tin
                  </li>
                </ol>
              </div>
            </div>
          </div>
          <div class="row match-height">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="basic-layout-form-center">Sửa tập tin</h4>
                  <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                      <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-body collapse in">
                  <div class="card-block">
                    <form class="form" method="POST" action="{{route('editFile')}}" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <div class="row">
                        <div class="col-md-6 offset-md-3">
                          <div class="form-body collapse in">
                            @foreach ($data['file'] as $item)
                            <input type="hidden" name="id" value="{{$item->id}}">
                            <div class="form-group">
                              <label for="eventInput1">Tên hình</label>
                              <input type="text" id="eventInput1" class="form-control" name="filename" value="{{$item->file_name}}" readonly>
                              @if ($errors->has('filename'))
                                <div class = "alert alert-danger">
                                    {{$errors->first('filename')}}
                                </div>
                              @endif
                            </div>
                            <div class="form-group">
                                <label for="eventInput1">File</label>
                                <input type="file" id="upFile" onchange="readURL(this);" class="form-control" name="upFile" >
                                <div class="row">
                                  <div class="col-md-6">
                                      <label>File hiện tại</label>
                                      {{$item->file_name}}
                                  </div>
                                  <div class="col-md-6" id="file">
                                    <label>File mới</label>
                                  </div>
                                </div>
                                @if ($errors->has('upFile'))
                                  <div class = "alert alert-danger">
                                      {{$errors->first('upFile')}}
                                  </div>
                                @endif
                              </div>
                            <div class="form-group">
                              <label for="projectinput7">Thư viện</label>
                              <select id="projectinput7" name="library" class="form-control btn btn-outline-info btn-min-width dropdown-toggle">
                                @foreach ($data['library'] as $item1)
                                  <option value="{{$item1->id}}" <?php if($item1->id == $item->library) echo "selected"?>>{{$item1->library_title}}</option>
                                @endforeach
                              </select>
                            </div>
                            @endforeach
                          </div>
                        </div>
                      </div>
                       
                      <div class="form-actions center">
                        <button type="button" onclick="window.location='/admin/files'" class="btn btn-warning mr-1">
                          <i class="icon-cross2"></i> Hủy
                        </button>
                        <button type="submit" class="btn btn-primary" id="btnSave">
                          <i class="icon-check2"></i> Lưu
                        </button>
                      </div>

                    </form>	
        
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script>
      function readURL(input) {
        if (input.files && input.files[0]) {
          var fileInput = document.getElementById('upFile');
          var fileName = fileInput.value.split(/(\\|\/)/g).pop();
          document.getElementById("file").innerHTML = "File mới "+fileName;
        }
      }
      </script>
      <!-- ////////////////////////////////////////////////////////////////////////////-->
@endsection