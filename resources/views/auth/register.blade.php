@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
        <div class="flex">
            <div class="w-full">
                <section class="flex flex-col break-words bg-gray-900 sm:border-1 sm:rounded-2xl sm:shadow-2xl overflow-hidden">

                    <!-- Header with Gradient -->
                    <header class="font-semibold bg-gradient-to-b from-red-600 to-gray-900 text-white py-6 px-6 sm:py-8 sm:px-10">
                        <h1 class="text-2xl font-bold">{{ __('Create an Account') }}</h1>
                        <p class="text-sm opacity-90 mt-1">{{ __('Join us today') }}</p>
                    </header>

                    <!-- Rest of the form remains the same -->
                    <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8 py-8" method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name Field -->
                        <div class="flex flex-wrap">
                            <label for="name" class="block text-gray-300 text-sm font-medium mb-2">
                                {{ __('Name') }}
                            </label>

                            <input id="name" type="text"
                                   class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-700 focus:border-red-500 focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 text-gray-100 placeholder-gray-400 transition duration-200"
                                   name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                   placeholder="John Doe">

                            @error('name')
                            <p class="text-red-400 text-xs italic mt-2 pl-1">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <!-- Email Field -->
                        <div class="flex flex-wrap">
                            <label for="email" class="block text-gray-300 text-sm font-medium mb-2">
                                {{ __('Email Address') }}
                            </label>

                            <input id="email" type="email"
                                   class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-700 focus:border-red-500 focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 text-gray-100 placeholder-gray-400 transition duration-200"
                                   name="email" value="{{ old('email') }}" required autocomplete="email"
                                   placeholder="john@example.com">

                            @error('email')
                            <p class="text-red-400 text-xs italic mt-2 pl-1">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <!-- Password Field -->
                        <div class="flex flex-wrap">
                            <label for="password" class="block text-gray-300 text-sm font-medium mb-2">
                                {{ __('Password') }}
                            </label>

                            <input id="password" type="password"
                                   class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-700 focus:border-red-500 focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 text-gray-100 placeholder-gray-400 transition duration-200"
                                   name="password" required autocomplete="new-password"
                                   placeholder="••••••••">

                            @error('password')
                            <p class="text-red-400 text-xs italic mt-2 pl-1">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <!-- Confirm Password Field -->
                        <div class="flex flex-wrap">
                            <label for="password-confirm" class="block text-gray-300 text-sm font-medium mb-2">
                                {{ __('Confirm Password') }}
                            </label>

                            <input id="password-confirm" type="password"
                                   class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-700 focus:border-red-500 focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 text-gray-100 placeholder-gray-400 transition duration-200"
                                   name="password_confirmation" required autocomplete="new-password"
                                   placeholder="••••••••">
                        </div>

                        <!-- Submit Button -->
                        <div class="flex flex-wrap">
                            <button type="submit"
                                    class="w-full bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold py-3 px-4 rounded-lg transition-all duration-300 transform hover:shadow-lg">
                                {{ __('Register →') }}
                            </button>
                        </div>

                        <!-- Login Link -->
                        <div class="flex flex-wrap">
                            <p class="w-full text-center text-gray-400 mt-6 sm:mt-8">
                                {{ __('Already have an account?') }}
                                <a class="text-red-500 hover:text-red-400 font-semibold underline transition duration-200"
                                   href="{{ route('login') }}">
                                    {{ __('Login') }}
                                </a>
                            </p>
                        </div>
                    </form>

                </section>
            </div>
        </div>
    </main>
@endsection
