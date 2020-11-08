@extends('layouts.master')
@section('content')
@include('layouts.carousel')
  <div class="container">    
    <div class="row">
      <div class="col-sm-8">
        <div class="row">
            <div class="panel">
                <div class="panel-heading h4">Thông báo</div>
                <div class="row">
                  <div class="col-sm-8">
                      <div class="panel-body"><a href="{{url('/detail/'.$data['ThongBao'][0]->id)}}"><img src="{{ asset('files/images/'.$data['ThongBao'][0]->file_name) }}" class="img-responsive" style="width:100%" alt="Image"></a></div>
                      <div class="panel-footer"><a href="/detail/{{$data['ThongBao'][0]->id}}">{{$data['ThongBao'][0]->new_title}}</a></div>
                  </div>
                  <div class="col-sm-4">
                    <div class="row">
                      @foreach ($data['ThongBao'] as $item)
                        @if ($item->id == $data['ThongBao'][0]->id)
                            @continue
                        @endif
                        <div class="row"><a href="/detail/{{$item->id}}">{{$item->new_title}}</a></div>
                      @endforeach
                    </div>
                    <div class="row">
                        <a style="float:right" href="/news-type/1">Xem tất cả</a>
                    </div>
                  </div>
                </div>
              </div>
        </div>
        <div class="row">
            <div class="panel">
                <div class="panel-heading h4">Nhịp sống đoàn hội</div>
                <div class="row">
                  <div class="col-sm-8">
                      <div class="panel-body"><a href="/detail/{{$data['NhipSong'][0]->id}}"><img src="{{ asset('files/images/'.$data['NhipSong'][0]->file_name) }}" class="img-responsive" style="width:100%" alt="Image"></a></div>
                      <div class="panel-footer"><a href="/detail/{{$data['NhipSong'][0]->id}}">{{$data['NhipSong'][0]->new_title}}</a></div>
                  </div>
                  <div class="col-sm-4">
                      <div class="row">
                        
                        @foreach ($data['NhipSong'] as $item)
                          @if ($item->id == $data['NhipSong'][0]->id)
                              @continue
                          @endif
                          <div class="row"><a href="/detail/{{$item->id}}">{{$item->new_title}}</a></div>
                        @endforeach
                      </div>
                      <div class="row">
                          <a style="float:right" href="/news-type/2">Xem tất cả</a>
                      </div>
                  </div>
                </div>
              </div>
        </div>
      </div>
      @include('layouts.right-menu')
    </div>
    {{-- @include('layouts.sponsor') --}}
  </div><br><br>
@endsection
