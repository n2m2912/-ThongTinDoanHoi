@extends('layouts.admin-master')
@section('admin-content')
<div class="app-content content container-fluid">
        <div class="content-wrapper">
          <div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-1">
              <h2 class="content-header-title">Trang chủ Quản Trị Viên</h2>
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
              <div class="breadcrumb-wrapper col-xs-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item active">Trang chủ
                  </li>
                </ol>
              </div>
            </div>
          </div>
          <div class="content-body"><!-- Description -->
              <section id="description" class="card">
                  <div class="card-header">
                      <h4 class="card-title">Thông báo</h4>
                  </div>
                  <div class="card-body collapse in">
                      <div class="card-block">
                          <div class="card-text">
                            {{-- {!!auth()->user()->role == 1 ? 'admin' : 'user' !!} --}}
                              <p>Hiện tại không có thông báo nào</p>
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
      <!-- ////////////////////////////////////////////////////////////////////////////-->
@endsection