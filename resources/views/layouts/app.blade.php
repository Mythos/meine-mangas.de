<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @hasSection('title')
        <title>
            @yield('title') - {{ config('app.name', 'Laravel') }}
        </title>
    @else
        <title>
            {{ config('app.name', 'Laravel') }}
        </title>
    @endif

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @livewireStyles
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-dark bg-dark navbar-expand-md fixed-top shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @auth
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ __('Administration') }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('pages.index') }}">
                                            {{ __('Pages') }}
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img class="rounded-circle" width="20px" src="{{ auth()->user()->avatar_navbar }}" alt="{{ auth()->user()->email }}">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="{{ route('profile') }}">{{ __('Profile') }}</a></li>
                                    <li><a class="dropdown-item" href="{{ route('change-password') }}">{{ __('Change password') }}</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                </div>
            </div>
        </nav>
        <main class="pb-4" style="padding-top: 70px; background-color: #F0F0F0; min-height: 90vh;">
            <div class="container">
                @hasSection('breadcrumbs')
                    <nav aria-label="breadcrumb">
                        @yield('breadcrumbs')
                    </nav>
                @endif
                @yield('content')
            </div>
        </main>
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 border-top">
            <ul class="nav col-md-4 justify-content-start list-unstyled d-flex">
                @livewire('layout.footer-left')
            </ul>
            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                @livewire('layout.footer-right')
            </ul>
        </footer>
    </div>
    @livewireScripts
    <x-livewire-alert::scripts />
    @stack('scripts')
</body>

</html>