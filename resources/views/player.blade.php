@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="row-fluid">
    @php
        $video = $content->videos->first();
    @endphp
    <video id="video" controls preload="metadata" class="col">
        <source src="{{ asset('storage/'.$video->path.'/'.$video->src) }}" type="video/mp4">
        <track label="Español" kind="subtitles" srclang="es" src="{{ asset('storage/'.$video->path.'/'.$video->slug) }}.vtt" default>
        <track label="English" kind="subtitles" srclang="en" src="{{ asset('storage/'.$video->path.'/'.$video->slug) }}_en.vtt">
    </video>
    <section class="container-fluid">
        <div class="row">
            <div class="col-2">
                @isset($content->cover)
                <img src="{{ asset('storage/'.$video->path.'/'.$content->cover) }}" alt="{{ $content->name }}" class="img-fluid">
                @endisset
            </div>
            <div class="col-10">
                <h1>{{ $content->name }}</h1>
                <p>{{ $content->description }}</p>
            </div>
        </div>
    </section>
</div>
</div>
@endsection
