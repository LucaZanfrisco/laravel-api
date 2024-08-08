<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">
        <div id="nav">
            @auth
                <div class="header" id="topHeader">
                    <div class="fw-bold">
                        Ciao {{ Auth::user()->name }}
                    </div>
                    <div class="dropdown">
                        <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <i class="fa-solid fa-bars"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">{{ __('DashBoard') }}</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ url('Profile') }}">{{ __('Profile') }}</a></li>

                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>

                        </ul>
                    </div>
                </div>
            @endauth
            <div class="p-3" id="bottomHeader">
                <nav>
                    <ul class="list-unstyled d-flex gap-4 align-items-center">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/') }}">{{ __('Home') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link"
                                    style="{{ Route::current()->getName() === 'admin.dashboard' ? 'color: red; text-decoration: underline' : '' }}"
                                    href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"
                                    style="{{ Route::current()->getName() === 'admin.project.index' ? 'color: red; text-decoration: underline' : '' }}"
                                    href="{{ route('admin.project.index') }}">{{ __('Progetti') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"
                                    style="{{ Route::current()->getName() === 'admin.types.index' ? 'color: red; text-decoration: underline' : '' }}"
                                    href="{{ route('admin.types.index') }}">{{ __('Tipologie') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"
                                    style="{{ Route::current()->getName() === 'admin.technologies.index' ? 'color: red; text-decoration: underline' : '' }}"
                                    href="{{ route('admin.technologies.index') }}">{{ __('Tecnologie') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"
                                    style="{{ Route::current()->getName() === 'admin.leads.index' ? 'color: red; text-decoration: underline' : '' }}"
                                    href="{{ route('admin.leads.index') }}">{{ __('Contatti') }}</a>
                            </li>
                        @endguest
                    </ul>
                </nav>
            </div>
        </div>
        <main>
            @yield('content')
        </main>
    </div>
</body>

</html>
