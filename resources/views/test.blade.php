@foreach($data as $item)
            <div class="item">
            <img src="{{ asset('img/'.$item->imager_name) }}">
              <div class="carousel-caption">
              </div>      
            </div> 
          @endforeach