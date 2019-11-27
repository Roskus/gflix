@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row-fluid justify-content-center">
        <div class="bd-example">
          <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              @if(!empty($latest_contents))
                  @foreach($latest_contents as $content)
                  <div class="carousel-item  @if($loop->first) active @endif">
                        <img src="/asset/upload/{{ $content->cover_file }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h1>
                                <a href="/watch/{{ $content->id }}">{{ $content->name }}</a>
                            </h1>
                            <p>StarWars</p>
                        </div>
                  </div>
                  @endforeach
              @endif

            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
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
