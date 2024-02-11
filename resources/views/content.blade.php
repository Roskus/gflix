@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row-fluid">
            @include('player')
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
                        <h1 class="text-white">{{ $content->name }}</h1>
                        @isset($video->name)<h2 class="text-white">{{ $video->name }}</h2>@endisset
                        @isset($video->description)
                            <p>{{ $video->description }}</p>
                        @else
                            <p>{{ $content->description }}</p>
                        @endisset
                    </div>
                </div>
            </section>
        </div>
        @if($content->type == 'series')
        <div class="row-fluid">
            <table>
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
        </div>
        @endif
    </div>
@endsection