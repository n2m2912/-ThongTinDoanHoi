@extends('layouts.master')
@section('content')
<div class="container"> 
<div class="row">
    <div class="col-sm-8">
        <div class="row mb-1">
            <h3>{{$data['type'][0]->type_name}}</h3>
        </div>
        @foreach ($data['news'] as $item)
            <div class="row">
                <div class="col-md-4">                    
                    <a href="/detail/{{$item->id}}" style="text-decoration: none"><img src="{{ isset($item->file_name) ? asset('files/images/'.$item->file_name) : asset('files/images/no-image.jpg') }}" class="img-responsive" style="width:100%" alt="Image"></a>
                </div>
                <div class="col-md-8">            
                    <h4><a href="/detail/{{$item->id}}" style="text-decoration: none">{{$item->new_title}}</a></h4>
                    <p>{!! str_limit($item->content, $limit = 200, $end = '...') !!}</p>
                </div>
            </div><hr>
        @endforeach
        {{ $data['news']->links() }}
    </div>
    @include('layouts.right-menu')
  </div>
</div><br><br>
@endsection