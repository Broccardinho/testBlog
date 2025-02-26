@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <div class="background-image grid grid-cols-1 m-auto" style="background-image: url('{{ asset('images/F1LaravelBackground.jpeg') }}');">
        <div class="flex text-gray-100 pt-16 pb-16">
            <div class="m-auto pt-10 pb-10 sm:m-auto w-4/5 block text-center space-y-6">
                <h1 class="sm:text-white text-4xl uppercase font-bold text-shadow-md pb-6">
                    Welcome to the Unofficial F1 Blog
                </h1>
                <a href="/blog" class="inline-block bg-red-600 text-white py-2 px-6 font-bold text-lg uppercase hover:bg-red-700 transition duration-300 rounded-lg">
                    Explore Posts
                </a>
            </div>
        </div>
    </div>

    <!-- Thrill of F1 Section -->
    <div class="sm:grid grid-cols-2 gap-16 w-4/5 mx-auto py-16 border-b border-gray-200">
        <div class="mb-8 sm:mb-0">
            <img src="{{ asset('images/F1CloseUp.jpg') }}" alt="F1 Car" class="rounded-lg shadow-xl">
        </div>
        <div class="m-auto sm:m-auto text-left w-4/5 block space-y-6">
            <h2 class="text-3xl font-extrabold text-gray-600">
                The Thrill of Formula 1
            </h2>
            <div class="space-y-4">
                <p class="text-gray-500 text-base leading-relaxed">
                    Formula 1 is the pinnacle of motorsport, where cutting-edge technology meets human skill...
                </p>
                <p class="font-extrabold text-gray-600 text-base">
                    Stay updated with the latest news, race results, and behind-the-scenes stories...
                </p>
            </div>
            <a href="/blog" class="inline-block bg-red-600 text-white text-base font-extrabold py-3 px-8 rounded-3xl hover:bg-red-700 transition duration-300">
                View Posts
            </a>
        </div>
    </div>

    <!-- Did You Know Section -->
    <div class="text-center p-20 bg-black text-white">
        <div class="space-y-12 max-w-6xl mx-auto">
            <h2 class="text-4xl font-bold uppercase tracking-wider">
                Did You Know?
            </h2>

            <div class="grid gap-12 md:grid-cols-2 lg:grid-cols-4">
                <!-- Fact 1 -->
                <div class="space-y-4">
                    <div class="text-red-600 font-bold text-6xl">2s</div>
                    <p class="text-2xl font-semibold">
                        0-100 mph acceleration
                    </p>
                </div>

                <!-- Fact 2 -->
                <div class="space-y-4">
                    <div class="text-red-600 font-bold text-6xl">4kg</div>
                    <p class="text-2xl font-semibold">
                        Average weight loss per race
                    </p>
                </div>

                <!-- Fact 3 -->
                <div class="space-y-4">
                    <div class="text-red-600 font-bold text-6xl">$100M+</div>
                    <p class="text-2xl font-semibold">
                        Annual R&D per team
                    </p>
                </div>

                <!-- Fact 4 -->
                <div class="space-y-4">
                    <div class="text-red-600 font-bold text-6xl">1.82s</div>
                    <p class="text-2xl font-semibold">
                        Fastest pit stop record
                    </p>
                </div>
            </div>
            <p class="text-gray-400 text-sm pt-8">
                Sources: FIA Technical Regulations 2023, Mercedes-AMG Petronas Reports
            </p>
        </div>
    </div>

    <!-- Content Sections with Consistent Spacing -->
    <div class="grid grid-cols-1 divide-y divide-gray-200">
        <!-- Historical Legacy Section -->
        <div class="text-center py-20 space-y-8 bg-gray-100">
    <span class="uppercase text-sm text-gray-400 tracking-widest">
        F1 Heritage
    </span>

            <h2 class="text-4xl font-bold text-gray-800">
                Motorsport History Unveiled
            </h2>

            <p class="m-auto w-4/5 text-gray-600 text-lg max-w-2xl">
                From iconic rivalries to groundbreaking innovations, explore seven decades of Formula 1's evolution.
                Relive legendary moments that shaped the sport we know today.
            </p>

            <a href="{{ route('history') }}"
               class="inline-block uppercase bg-red-600 text-white text-lg font-extrabold py-3 px-8 rounded-3xl hover:bg-red-700 transition duration-300">
                Explore History
            </a>
        </div>

        <!-- Teams Section -->
        <div class="text-center py-16 bg-white">
            <div class="space-y-6 w-4/5 mx-auto">
                <span class="uppercase text-sm text-gray-400 tracking-widest">
                    Constructors
                </span>
                <h2 class="text-4xl font-bold text-gray-800">
                    2025 Teams
                </h2>
                <p class="text-gray-600 text-lg">
                    Meet the teams competing in this year's championship
                </p>
                <a href="{{ route('teams') }}"
                   class="inline-block bg-red-600 text-white px-8 py-3 rounded-3xl hover:bg-red-700 transition duration-300">
                    View Teams
                </a>
            </div>
        </div>

        <!-- Calendar Section -->
        <div class="text-center py-16 bg-gray-100">
            <div class="space-y-6 w-4/5 mx-auto">
                <span class="uppercase text-sm text-gray-400 tracking-widest">
                    Schedule
                </span>
                <h2 class="text-4xl font-bold text-gray-800">
                    2025 Calendar
                </h2>
                <p class="text-gray-600 text-lg">
                    Never miss a race with our interactive calendar
                </p>
                <a href="{{ route('calendar') }}"
                   class="inline-block bg-red-600 text-white px-8 py-3 rounded-3xl hover:bg-red-700 transition duration-300">
                    View Calendar
                </a>
            </div>
        </div>
    </div>

    <!-- Modified Driver of the Day Section -->
    <div class="sm:grid grid-cols-2 w-4/5 m-auto gap-12 py-20">
        <div class="flex bg-red-600 text-gray-100 pt-10 rounded-lg overflow-hidden mb-12 sm:mb-0">
            <div class="m-auto pt-8 pb-20 sm:m-auto w-4/5 block space-y-8">
                <span class="text-2xl font-bold">
                    Driver of the Day
                </span>

                <h3 class="uppercase text-sm tracking-widest">
                    This is your chance to tell us who you think is the rightful Driver of the Day.
                </h3>

                <!-- Non-clickable button -->
                <span class="inline-block uppercase bg-transparent border-2 border-gray-100 text-gray-100 text-sm font-extrabold py-3 px-8 rounded-3xl cursor-not-allowed">
                    Vote Now (Coming Soon)
                </span>
            </div>
        </div>
        <div>
            <img src="{{ asset('images/DoTD.jpg') }}" alt="Driver of the Day" class="rounded-lg shadow-xl">
        </div>
    </div>
@endsection
