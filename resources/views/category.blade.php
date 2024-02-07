@extends('layouts.app')

@section('content')
    <div class="row mt-4">
    @foreach($contents as $content)
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <a href="{{ url($content->url) }}" class="">
                        <h2>{{ $content->name }}</h2>
                    </a>
                </div>
            </div>
        </div>
    @endforeach
    </div>
@endsection
