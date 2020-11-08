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
                  <li class="breadcrumb-item"><a href="/admin/slide">Danh sách slide</a>
                  </li>
                  <li class="breadcrumb-item active">Sửa slide
                  </li>
                </ol>
              </div>
            </div>
          </div>
          <div class="row match-height">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="basic-layout-form-center">Sửa Slide</h4>
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
                    <form class="form" method="POST" action="{{route('editSlide')}}" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <div class="row">
                        <div class="col-md-6 offset-md-3">
                          <div class="form-body collapse in">
                            @foreach ($data as $item)
                            <input type="hidden" name="id" value="{{$item->id}}">
                            <div class="form-group">
                              <label for="eventInput1">Tên slide</label>
                              <input type="text" id="eventInput1" class="form-control" name="newtitle" value="{{$item->imager_name}}">
                              @if ($errors->has('newtitle'))
                                <div class = "alert alert-danger">
                                    {{$errors->first('newtitle')}}
                                </div>
                              @endif
                            </div>

                            <div class="form-group">
                              <label for="eventInput1">Slide</label>
                              <input type="file" id="eventInput1" onchange="readURL(this);" class="form-control" name="upFile" >
                              <div class="row">
                                <div class="col-md-6">
                                    <label>Hình hiện tại</label>
                                    <img src="{{asset('/img/'.$item->imager_name)}}" width="100%">
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
                        <button type="button" onclick="window.location='/admin/slide'" class="btn btn-warning mr-1">
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