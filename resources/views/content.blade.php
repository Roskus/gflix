@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row-fluid">
        <div class="col">
            @include('player')
        </div>
    </div>
    <div class="row-fluid">
        <section class="container-fluid">
            <div class="row">
                <div class="col-2">
                    @isset($content->cover)
                        <img src="{{ asset('storage/'.$content->type.'/'.$content->year.'/'.$content->cover) }}" alt="{{ $content->name }}" class="img-fluid">
                    @endisset
                </div>
                <div class="col-10">
                    <h1 class="text-white mb-2">{{ $content->name }}</h1>
                    @isset($video->name)
                        <h2 class="text-white">{{ $video->name }}</h2>
                    @endisset
                    <p class="text-white-50">{{ $content->year }}</p>
                    <p class="text-white-50">{{ $video->description ?? $content->description }}</p>
                </div>
            </div>
        </section>
    </div>
    @if($content->type == 'series')
    <div class="container mt-5 pt-5">
        <h3 class="mt-4">{{ __('Episodes') }}</h3>

        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach($content->videos as $episode)
            <div class="col">
                <div class="card h-100">
                    @isset($episode->poster)
                    <img src="{{ asset("storage/$episode->poster") }}" alt="{{ $episode->name }}" class="img-fluid">
                    @endisset
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ url("watch/$episode->id") }}">{{ $episode->name }}</a>
                        </h5>
                        @isset($episode->description)
                        <p class="card-text">{{ $episode->description }}</p>
                        @endisset
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">{{ $episode->duration }} min</small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection
