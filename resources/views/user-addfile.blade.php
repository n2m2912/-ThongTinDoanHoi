@extends('layouts.user-master')
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
                  <li class="breadcrumb-item"><a href="/user">Trang chủ</a>
                  </li>
                  <li class="breadcrumb-item"><a href="/user/files">Danh sách tập tin</a>
                  </li>
                  <li class="breadcrumb-item active">Thêm tập tin
                  </li>
                </ol>
              </div>
            </div>
          </div>
          <div class="row match-height">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="basic-layout-form-center">Thêm tập tin</h4>
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
                    <form class="form" method="POST" action="{{route('useraddFile')}}" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <div class="row">
                        <div class="col-md-6 offset-md-3">
                          <div class="form-body collapse in">
                            <div class="form-group">
                              <label for="eventInput1">Upload file</label>
                              <input type="file" id="eventInput1" onchange="readURL(this);" class="form-control" name="upFile" >
                              <div class="row" style="margin-top:10px">
                                <div class="col-md-6" id="image">
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
                                @foreach ($data['library'] as $item)
                                  <option value="{{$item->id}}">{{$item->library_title}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                       
                      <div class="form-actions center">
                        <button type="button" onclick="window.location = '/user/files'" class="btn btn-warning mr-1">
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