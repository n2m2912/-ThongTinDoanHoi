@extends('layouts.master')
@section('content')
<div class="container">    
        <div class="row">
          <div class="col-sm-8">
            <div class="row">
                <div class="panel">
                    <div class="panel-heading h4">Video</div>
                    <div class="row">
                        @foreach ($data as $item)
                            <div class="col-md-3" style="margin-bottom:10px">
                                <a href="{{asset('/files/'.$item->file_path.'/'.$item->file_name)}}"><img src="{{asset('/img/assignments-7.png')}}" width="100%" height="100px"></a>
                                <a href="{{asset('/files/'.$item->file_path.'/'.$item->file_name)}}">{{$item->file_name}}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
          </div>
          @include('layouts.right-menu')
        </div>
        
</div>
@endsection