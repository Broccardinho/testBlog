<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Unofficial F1 Blog') }}</title>

    <!-- Google Fonts for F1 Theme -->
    <link href="https://fonts.googleapis.com/css2?family=Racing+Sans+One&family=Teko:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-f1-black text-gray-100 antialiased leading-none font-sans">
<div id="app">
    <!-- Header -->
    <header class="bg-f1-black py-6 border-b-4 border-f1-red">
        <div class="container mx-auto flex justify-between items-center px-6">
            <div>
                <a href="{{ url('/') }}" class="text-2xl font-racing text-f1-red no-underline hover:text-f1-white transition duration-300">
                    Unofficial F1 Blog
                </a>
            </div>
            <nav class="space-x-4 text-gray-300 text-sm sm:text-base">
                <a class="no-underline hover:text-f1-red transition duration-300" href="/">Home</a>
                <a class="no-underline hover:text-f1-red transition duration-300" href="/blog">Blog</a>
                @guest
                    <a class="no-underline hover:text-f1-red transition duration-300" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @if (Route::has('register'))
                        <a class="no-underline hover:text-f1-red transition duration-300" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                @else
                    <span class="text-f1-red">{{ Auth::user()->name }}</span>

                    <a href="{{ route('logout') }}"
                       class="no-underline hover:text-f1-red transition duration-300"
                       onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                @endguest
            </nav>
        </div>
    </header>

    <!-- Content Section -->
    <div>
        @yield('content')
    </div>

    <!-- Footer -->
    <div>
        @include('layouts.footer')
    </div>
</div>
</body>
</html>
