@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="col">
                @include('player')
            </div>
        </div>
        <div class="row-fluid">
            <section class="container-fluid">
                <div class="row">
                    <div class="col-2">
                        @isset($content->cover)
                            <img src="{{ asset('storage/'.$content->type.'/'.$content->year.'/'.$content->cover) }}" alt="{{ $content->name }}" class="img-fluid">
                        @endisset
                    </div>
                    <div class="col-10">
                        <h1 class="text-white mb-2">{{ $content->name }}</h1>
                        @isset($video->name)
                            <h2 class="text-white">{{ $video->name }}</h2>
                        @endisset
                        <p class="text-white-50">{{ $content->year }}</p>
                        <p class="text-white-50">{{ $video->description ?? $content->description }}</p>
                    </div>
                </div>
            </section>
        </div>
        @if($content->type == 'series')
        <div class="row-fluid">
            <section class="container-fluid">
            <table class="table table-dark table-striped mt-4">
            <thead>
            <tr>
                <th>{{ __('Episodes') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($content->videos as $vid)
            <tr>
                <td>
                    <a href="{{ url("watch/$vid->id") }}">{{ $vid->name }}</a>
                </td>
            </tr>
            @endforeach
            </tbody>
            </table>
            </section>
        </div>
        @endif
    </div>
@endsection
