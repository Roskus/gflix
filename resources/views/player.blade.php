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
</div>
</div>
@endsection
