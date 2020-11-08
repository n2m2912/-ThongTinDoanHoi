<div class="container"> 
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>
    
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          @for ($i = 0; $i < count($data['Slide']); $i++)
              @if ($i == 0)
                <div class="item active">
                  <img src="{{ asset('img/'.$data['Slide'][$i]->imager_name) }}">
                  <div class="carousel-caption">
                  </div>      
                </div> 
              @else
                <div class="item">
                  <img src="{{ asset('img/'.$data['Slide'][$i]->imager_name) }}">
                  <div class="carousel-caption">
                  </div>      
                </div> 
              @endif
          @endfor
          {{-- @foreach($data['Slide'] as $item)
            <div class="item">
            <img src="{{ asset('img/'.$item->imager_name) }}">
              <div class="carousel-caption">
              </div>      
            </div> 
          @endforeach --}}
        </div> 
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
    </div>
</div><br>