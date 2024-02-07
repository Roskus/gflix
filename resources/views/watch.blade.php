@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row-fluid">
            @include('player')
        </div>
        <div class="row-fluid">
            @isset($video->name)<h2 class="text-white">{{ $video->name }}</h2>@endisset
            @isset($video->description)
                <p>{{ $video->description }}</p>
            @else
                <p>{{ $video->content->description }}</p>
            @endisset
        </div>
    </div>
@endsection
