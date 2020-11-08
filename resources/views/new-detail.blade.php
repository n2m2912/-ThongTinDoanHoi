@extends('layouts.master')
@section('content')
<div class="container"> 
<div class="row">
    <div class="col-sm-8">
      <div class="row">
          <div class="panel">
              <div class="panel-heading"><h4 class="text-hutech">{{$data['new'][0]->new_title}}</h4></div>
              <p style="padding-left:15px">{{$data['new'][0]->created_at}}</p>
              <p style="float:right">Số lượt xem: {{$data['view']}}</p>
              <div id="fb-root"></div>
              <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2&appId=1108834972597234&autoLogAppEvents=1"></script>
              <div class="fb-like" data-href="http://localhost:8000/detail/{{$data['new'][0]->id}}" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
              <hr>
              <div class="panel-body">
              @if (isset($data['image'][0]->file_name) )
                <div class="row" style="margin-bottom:20px"><img src="{{ asset('files/images/'.$data['image'][0]->file_name) }}" width="100%"></div> 
              @endif 
                <div class="row"></div>
                 {!!$data['new'][0]->content!!}
              </div>
              <div class="panel-footer text-hutech">{{$data['author'][0]->full_name}}</div>
          </div>
      </div>
      <div class="row">
          <div id="fb-root"></div>
          <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2"></script>
          <div class="fb-comments" data-href="http://localhost:8000/detail/ {{$data['new'][0]->id}}" data-numposts="5"></div>
      </div>
    </div>
    @include('layouts.right-menu')
  </div>
</div><br><br>
@endsection