@extends('layouts.admin-master')
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
                  <li class="breadcrumb-item"><a href="/admin">Trang chủ</a>
                  </li>
                  <li class="breadcrumb-item"><a href="/admin/news">Danh sách tin</a>
                  </li>
                  <li class="breadcrumb-item active">Sửa tin
                  </li>
                </ol>
              </div>
            </div>
          </div>
          <div class="row match-height">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="basic-layout-form-center">Sửa tin</h4>
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
                    <form class="form" method="POST" action="{{route('editNew')}}" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <div class="row">
                        <div class="col-md-6 offset-md-3">
                          <div class="form-body collapse in">
                            @foreach ($data['new'] as $item)
                            <input type="hidden" name="id" value="{{$item->id}}">
                            <input type="hidden" name="image_id" value="{{$item->image_id}}">
                            <div class="form-group">
                              <label for="eventInput1">Tiêu đề</label>
                              <input type="text" id="eventInput1" class="form-control" name="newtitle" value="{{$item->new_title}}">
                              @if ($errors->has('newtitle'))
                                <div class = "alert alert-danger">
                                    {{$errors->first('newtitle')}}
                                </div>
                              @endif
                            </div>
        
                            <div class="form-group">
                              <label for="eventInput2">Nội dung</label>
                              <textarea id="eventInput2" class="ckeditor" id="editor" name="content">{{$item->content}}</textarea>
                              <script>
                                CKEDITOR.replace('editor');
                              </script>
                              @if ($errors->has('content'))
                                <div class = "alert alert-danger">
                                    {{$errors->first('content')}}
                                </div>
                              @endif
                            </div>
                            
                            <div class="form-group">
                              <label for="projectinput7">Loại tin</label>
                              <select id="projectinput7" name="type" class="form-control btn btn-outline-info btn-min-width dropdown-toggle">
                                @foreach ($data['type'] as $item1)
                                  @if ($item1->id == $item->type)
                                    <option value="{{$item1->id}}" selected>{{$item1->type_name}}</option>
                                  @else
                                    <option value="{{$item1->id}}">{{$item1->type_name}}</option>
                                    @endif
                                @endforeach
                              </select>
                            </div>

                            <div class="form-group">
                                <label for="projectinput7">Duyệt tin</label>
                                <select id="projectinput7" name="censored" class="form-control btn btn-outline-info btn-min-width dropdown-toggle">
                                @if($item->censored == 0)
                                  <option value="0" selected>không duyệt</option>
                                  <option value="1" >duyệt</option>
                                @else
                                  <option value="0" >không duyệt</option>
                                  <option value="1" selected>duyệt</option>
                                @endif
                                </select>
                              </div>

                            <div class="form-group">
                              <label for="eventInput1">Ảnh bìa</label>
                              <input type="file" id="eventInput1" onchange="readURL(this);" class="form-control" name="upFile" >
                              <div class="row">
                                <div class="col-md-6">
                                    <label>Hình hiện tại</label>
                                    <img src="{{asset('/files'.$item->file_path.'/'.$item->file_name)}}" width="100%">
                                </div>
                                <div class="col-md-6" id="image">
                                  <label>Hình mới</label>
                                </div>
                              </div>
                              @if ($errors->has('upFile'))
                                <div class = "alert alert-danger">
                                    {{$errors->first('upFile')}}
                                </div>
                              @endif
                            </div>
                            @endforeach
                          </div>
                        </div>
                      </div>
                       
                      <div class="form-actions center">
                        <button type="button" onclick="window.location='/admin/news'" class="btn btn-warning mr-1">
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
          
          var elem = document.createElement("img");
          var reader = new FileReader();

          reader.onload = function (e) {
            elem.setAttribute("src",e.target.result);
          };
          reader.readAsDataURL(input.files[0]);
          elem.setAttribute("width", "100%");
          document.getElementById("image").appendChild(elem);
        }
      }
      </script>
      <!-- ////////////////////////////////////////////////////////////////////////////-->
@endsection