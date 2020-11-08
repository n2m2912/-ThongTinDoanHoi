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
                  <li class="breadcrumb-item"><a href="/admin/roles">Danh sách quyền</a>
                  </li>
                  <li class="breadcrumb-item active">Thêm quyền
                  </li>
                </ol>
              </div>
            </div>
          </div>
          <div class="row match-height">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="basic-layout-form-center">Thêm mới quyền</h4>
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
                    <form class="form" method="POST" action="{{route('addRole')}}">
                      {{ csrf_field() }}
                      <div class="row">
                        <div class="col-md-6 offset-md-3">
                          <div class="form-body collapse in">
                            <div class="form-group">
                              <label for="eventInput1">Tên quyền</label>
                              <input type="text" id="eventInput1" class="form-control" name="role" value="{{old('role')}}">
                              @if ($errors->has('role'))
                                <div class = "alert alert-danger">
                                    {{$errors->first('role')}}
                                </div>
                              @endif
                            </div>   
                          </div>
                        </div>
                      </div>
                       
                      <div class="form-actions center">
                        <button type="button" onclick="window.location='/admin/roles'" class="btn btn-warning mr-1">
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
      <!-- ////////////////////////////////////////////////////////////////////////////-->
@endsection