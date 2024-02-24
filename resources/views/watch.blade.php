@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                @include('player', ['nextChapterUrl' => $nextChapterUrl])
            </div>
        </div>
        <div class="row mt-3 mb-3">
            <div class="col">
                @isset($video->name)
                <h2 class="text-white mb-2">{{ $video->name }}</h2>
               @endisset
                <p class="text-white-50">{{ $video->description ?? $video->content->description }}</p>
            </div>
        </div>
    </div>
@endsection
