@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row mt-4">
    @foreach($contents as $content)
        <div class="col-2 mb-4">
            <div class="card h-100 shadow-sm" data-bs-theme="dark">
                @isset($content->cover)
                    <a href="{{ url($content->url) }}" class="">
                        <img src="{{ asset('storage/'.$content->type.'/'.$content->year.'/'.$content->cover) }}" alt="{{ $content->name }}" class="card-img-top img-fluid">
                    </a>
                @endisset
                <div class="card-body d-flex flex-column">
                    <h2 class="card-title h4">
                        <a href="{{ url($content->url) }}" class="text-decoration-none text-white">{{ $content->name }}</a>
                    </h2>
                    <p class="card-text text-truncate">{{ $content->description }}</p>
                </div>
                <div class="card-footer text-muted">
                    <div class="row">
                        <div class="col">{{ $content->year }}</div>
                        @isset($content->category)
                        <div class="col text-end">
                            <a href="#" class="text-decoration-none">{{ $content->category->name }}</a>
                        </div>
                        @endisset
                    </div>

                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>
@endsection
