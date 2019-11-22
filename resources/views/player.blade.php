@extends('layouts.app')

@section('content')

<video id="video" controls preload="metadata">
    <source src="asset/upload/2019/mib/mib.mkv" type="video/mp4">
    <track label="Español" kind="subtitles" srclang="es" src="asset/upload/2019/mib/mib-es.vtt" default>
    <track label="English" kind="subtitles" srclang="en" src="captions/vtt/sintel-en.vtt">
</video>

@endsection
