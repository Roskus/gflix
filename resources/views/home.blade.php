@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">
    <div class="row-fluid justify-content-center">
        <div class="bd-example">
          <div id="carousel" class="carousel carousel-dark slide" data-ride="carousel">
            @if(!empty($latest_contents))
                  <div class="carousel-indicators">
                      @php $i = 0; @endphp
                      @foreach($latest_contents as $content)
                      <button type="button" data-bs-target="#carousel" data-bs-slide-to="{{ $i }}"
                              @if($i == 0)class="active"@endif aria-current="true" aria-label="{{ $content->name }}">
                      </button>
                          @php
                              $i++;
                          @endphp
                      @endforeach
                  </div>
            @endif

            <div class="carousel-inner">
              @if(!empty($latest_contents))
                  @foreach($latest_contents as $content)
                  <div class="carousel-item  @if($loop->first) active @endif">
                        <img src="/asset/upload/{{ $content->wallpaper }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h1>
                                <a href="{{ $content->url }}" class="text-white">{{ $content->name }}</a>
                            </h1>
                            <p>{{ $content->description }}</p>
                        </div>
                  </div>
                  @endforeach
              @endif
            </div>
            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>

        <div class="col-md-10">
        </div>
    </div>
</div>
@endsection
