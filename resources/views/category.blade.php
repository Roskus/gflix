@extends('layouts.app')

@section('content')
    <div class="row mt-4">
    @foreach($contents as $content)
        <div class="col-2">
            <div class="card">
                @isset($content->cover)
                    <a href="{{ url($content->url) }}" class="">
                        <img src="{{ asset('storage/'.$content->type.'/'.$content->year.'/'.$content->cover) }}" alt="{{ $content->name }}" class="card-img-top img-fluid">
                    </a>
                @endisset
                <div class="card-body">
                    <h2 class="card-title">
                        <a href="{{ url($content->url) }}" class="">{{ $content->name }}</a>
                    </h2>
                    <p class="card-text">{{ $content->description }}</p>
                </div>
                <div class="card-footer">
                    {{ $content->year }}
                </div>
            </div>
        </div>
    @endforeach
    </div>
@endsection
