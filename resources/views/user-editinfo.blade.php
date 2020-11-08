@extends('layouts.user-master')
@section('admin-content')
<div class="app-content content container-fluid">
        <div class="content-wrapper">
          <div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-1">
              <h2 class="content-header-title">Thông tin người dùng</h2>
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
              <div class="breadcrumb-wrapper col-xs-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/user">Trang chủ</a>
                  </li>
                  <li class="breadcrumb-item active">Thông tin người dùng
                  </li>
                </ol>
              </div>
            </div>
          </div>
          <div class="row match-height">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="basic-layout-form-center">Thông tin người dùng</h4>
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
                    <form class="form" method="POST" action="{{route('usereditInfo')}}">
                      {{ csrf_field() }}
                      <div class="row">
                        <div class="col-md-6 offset-md-3">
                          <div class="form-body collapse in">
                            @foreach ($data as $item)
                          <input type="hidden" name="id" value="{{$item->id}}">
                              <div class="form-group">
                                <label for="eventInput1">Tên người dùng</label>
                                <input type="text" id="eventInput1" class="form-control"  name="fullname" value="{{$item->full_name}}">
                                @if ($errors->has('fullname'))
                                  <div class = "alert alert-danger">
                                      {{$errors->first('fullname')}}
                                  </div>
                                @endif
                              </div>
          
                              <div class="form-group">
                                <label for="eventInput2">Tài khoản</label>
                                <input type="text" id="eventInput2" class="form-control"  name="username" value="{{$item->username}}" readonly>
                                @if ($errors->has('username'))
                                  <div class = "alert alert-danger">
                                      {{$errors->first('username')}}
                                  </div>
                                @endif
                              </div>
  
                              <div class="form-group">
                                <label for="eventInput3">Mật khẩu</label>
                                <input type="password" onkeyup="validate()" id="eventInput3" class="form-control"  name="password">
                                @if (count($errors) == 0 && $errors->has('password'))
                                  <div class = "alert alert-danger">
                                      {{$errors->first('password')}}
                                  </div>
                                @endif
                              </div>
  
                              <div class="form-group">
                                <label for="eventInput4">Nhập lại mật khẩu</label>
                                <input type="password" onkeyup="validate()" id="eventInput4" class="form-control"  name="password2">
                                <small class="text-danger" id="passNoti"></small>
                              </div>
                              
                              <div class="form-group">
                                <label for="eventInput5">Email</label>
                                <input type="email" id="eventInput5" class="form-control"  name="email" value="{{$item->email}}">
                                @if ($errors->has('email'))
                                  <div class = "alert alert-danger">
                                      {{$errors->first('email')}}
                                  </div>
                                @endif
                              </div>
          
                              <div class="form-group">
                                <label for="eventInput6">Số điện thoại</label>
                                <input type="tel" id="eventInput6" class="form-control" name="phone"  value="{{$item->phone}}">
                                @if ($errors->has('phone'))
                                  <div class = "alert alert-danger">
                                      {{$errors->first('phone')}}
                                  </div>
                                @endif
                              </div>
                            @endforeach
                          </div>
                          
                      @if(\Session::has('message1'))
                      <div class="alert alert-success text-center" id='message1'>
                          {{ \Session::get('message1') }}
                      </div>
                      @endif
                        </div>
                        
                      </div>
                      <div class="form-actions center">
                        <button type="button" onclick="window.location='/user'" class="btn btn-warning mr-1">
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
      function validate(){
        var pass1 = document.getElementById('eventInput3').value;
        var pass2 = document.getElementById('eventInput4').value;
        if(pass1 != pass2 && pass2 != ''){
          document.getElementById('eventInput4').focus;
          document.getElementById('passNoti').innerHTML = 'Mật khẩu không khớp';
          document.getElementById('btnSave').disabled = true;
        } else {
          document.getElementById('passNoti').innerHTML = '';
          document.getElementById('btnSave').disabled = false;
        }
      }
      </script>
      <!-- ////////////////////////////////////////////////////////////////////////////-->
@endsection