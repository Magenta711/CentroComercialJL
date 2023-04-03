<header class="masthead" id="header">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          @php
              $i = 0;
          @endphp
          @foreach ($sliders as $item)
            @if ($item->enddate == null || $item->enddate > now())
              <li data-target="#carouselExampleIndicators" data-slide-to="{{$i++}}" class="{{$item->active == 1 ? 'active' : ''}}"></li>
            @endif
          @endforeach
        </ol>
        <div class="carousel-inner">
          @foreach ($sliders as $item)
            @if ($item->enddate == null || $item->enddate > now())
              <div class="carousel-item {{$item->active == 1 ? 'active' : ''}}">
                <img class="d-block w-100" src="{{$item->file->url.$item->file->name}}" alt="{{$item->file}}">
                <!-- <div class="carousel-caption">
                    <h3>Start</h3>
                    <p>¡Único centro comercial en Barbosa!</p>
                </div> -->
              </div>
            @endif
          @endforeach
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
</header>
