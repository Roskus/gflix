@extends('layouts.app')

@section('content')
<main class="container-fluid">
    <header>
        <h1>{{ __('Profile') }}</h1>
    </header>

    <div class="card">
        <div class="card-body">
        <form method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $user->id }}">
        <div class="row">
            <div class="col">
                <label for="name">{{ __('Name') }}</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}" required class="form-control">
            </div>
            <div class="col">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}" required class="form-control">
            </div>
        </div><!--./row-->
        <div class="row">
            <div class="col">
                <label for="password">{{ __('Password') }}</label>
                <input type="password" name="password" id="password" value="" class="form-control">
            </div>
            <div class="col">
                <label for="password_confirm">{{ __('Confirm password') }}</label>
                <input type="password" name="password_confirm" id="password_confirm" value="" class="form-control">
            </div>
        </div><!--./row-->
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-primary mt-2">{{ __('Save') }}</button>
            </div>
        </div>
        </form>
        </div>
    </div><!--./card-->
</main>
@endsection
