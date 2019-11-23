@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="row-fluid">
    <video id="video" controls preload="metadata" class="col">
        <source src="/asset/upload/2019/mib/mib.mp4" type="video/mp4">
        <track label="Español" kind="subtitles" srclang="es" src="/asset/upload/2019/mib/mib-es.vtt" default>
        <track label="English" kind="subtitles" srclang="en" src="captions/vtt/sintel-en.vtt">
    </video>
</div>
</div>
@endsection
