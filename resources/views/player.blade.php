@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="row-fluid">
    <video id="video" controls preload="metadata" class="col">
        <source src="{{ asset('storage/'.$video->path.'/'.$video->src) }}" type="video/mp4">
        <track label="Español" kind="subtitles" srclang="es" src="{{ asset('storage/'.$video->path.'/'.$video->slug) }}.vtt" default>
        <track label="English" kind="subtitles" srclang="en" src="{{ asset('storage/'.$video->path.'/'.$video->slug) }}_en.vtt">
    </video>
    <section class="container-fluid">
        <div class="row">
            <div class="col-2">
                @isset($video->content->cover)
                <img src="{{ asset('storage/'.$video->path.'/'.$video->content->cover) }}" alt="{{ $video->content->name }}" class="img-fluid">
                @endisset
            </div>
            <div class="col-10">
                <h1 class="text-white">{{ $video->content->name }}</h1>
                <p>{{ $video->content->description }}</p>
            </div>
        </div>
    </section>

</div>
</div>
@endsection
