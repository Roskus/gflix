@extends('layouts.app')

@section('content')
<div id="carousel" class="carousel carousel-dark slide" data-bs-ride="carousel">
    @if(!empty($latest_contents))
      <div class="carousel-indicators">
          @php $i = 0; @endphp
          @foreach($latest_contents as $content)
          <button type="button" data-bs-target="#carousel" data-bs-slide-to="{{ $i }}"
                  @if($i == 0)class="active" aria-current="true" @endif aria-label="{{ $content->name }}">
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
                <img src="/asset/upload/{{ $content->wallpaper }}" class="d-block bd-placeholder-img w-100" alt="{{ $content->name }}">
                <div class="container">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>
                            <a href="{{ $content->url }}" class="text-white text-decoration-none">{{ $content->name }}</a>
                        </h1>
                        <p class="text-white">{{ $content->description }}</p>
                    </div>
                </div>
          </div>
          @endforeach
      @endif
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon slider-arrow" aria-hidden="true"></span>
      <span class="visually-hidden"> {{ __('Previous') }}</span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#carousel"  data-bs-slide="next">
      <span class="carousel-control-next-icon slider-arrow" aria-hidden="true"></span>
      <span class="visually-hidden">{{ __('Next') }}</span>
    </button>
</div>
@endsection
