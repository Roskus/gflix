<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@isset($title){{ $title }} | @endisset{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('asset/css/gflix.css') }}">
</head>
<body>
<div id="app">
    <header data-bs-theme="dark">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top shadow-sm p-0">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('asset/img/gflix_logo.png')}}" alt="{{ config('app.name', 'Gflix') }}" height="40">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarCollapse"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a href="{{ url('/movies') }}" class="nav-link">{{ __('Movies') }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/series') }}" class="nav-link">{{ __('Series') }}</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <div class="ms-auto">
                        <ul class="navbar-nav">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                                <li class="nav-item">
                                    <a class="nav-link btn btn-primary btn-xs" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div>
                                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('profile') }}">{{ __('Profile') }}</a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        </li>
                                    </ul>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>
    <footer class="mt-3">
        <div class="text-center">
            <small class="">{{ env('APP_NAME') }} | Ver. {{ config('app.version') }}</small>
        </div>
    </footer>
</div><!--./div-->

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script>
    const myCarouselElement = document.querySelector('#carousel')
    if(carousel) {
        const carousel = new bootstrap.Carousel(myCarouselElement, {
            interval: 2400,
            touch: false
        });
    }

    document.addEventListener('click', function(e) {
        const link = e.target.closest('a[href^="/"]');
        if (link && !link.hasAttribute('target') && link.hostname === window.location.hostname) {
            e.preventDefault();
            document.body.style.animation = 'fadeOut 0.3s ease-out forwards';
            setTimeout(() => {
                window.location.href = link.href;
            }, 300);
        }
    });
</script>
</body>
</html>
