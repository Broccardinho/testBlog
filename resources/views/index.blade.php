@extends('layouts.app')

@section('content')
    <div class="background-image grid grid-cols-1 m-auto" style="background-image: url('{{ asset('images/F1LaravelBackground.jpeg') }}'); background-size: cover; background-position: center;">        <div class="flex text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">
                <h1 class="sm:text-white text-5xl uppercase font-bold text-shadow-md pb-14">
                    Welcome to the Unofficial F1 Blog
                </h1>
                <a
                    href="/blog"
                    class="text-center bg-red-600 text-white py-2 px-4 font-bold text-xl uppercase hover:bg-red-700 transition duration-300">
                    Explore Posts
                </a>
            </div>
        </div>
    </div>

    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
        <div>
            <img src="{{ asset('images/F1CloseUp.jpg') }}" width="700" alt="F1 Car">
        </div>

        <div class="m-auto sm:m-auto text-left w-4/5 block">
            <h2 class="text-3xl font-extrabold text-gray-600">
                The Thrill of Formula 1
            </h2>

            <p class="py-8 text-gray-500 text-s">
                Formula 1 is the pinnacle of motorsport, where cutting-edge technology meets human skill. From the roar of the engines to the strategic pit stops, every moment is a blend of speed, precision, and excitement.
            </p>

            <p class="font-extrabold text-gray-600 text-s pb-9">
                Stay updated with the latest news, race results, and behind-the-scenes stories from the world of F1.
            </p>

            <a
                href="/blog"
                class="uppercase bg-red-600 text-white text-s font-extrabold py-3 px-8 rounded-3xl hover:bg-red-700 transition duration-300">
                View Posts
            </a>
        </div>
    </div>

    <div class="text-center p-15 bg-black text-white">
        <h2 class="text-2xl pb-5 text-l">
            Did You Know?
        </h2>

        <span class="font-extrabold block text-4xl py-1">
            F1 cars can go from 0 to 100 mph in under 2 seconds!
        </span>
        <span class="font-extrabold block text-4xl py-1">
            The average F1 driver loses 4 kg of weight during a race.
        </span>
        <span class="font-extrabold block text-4xl py-1">
            F1 teams spend over $100 million annually on R&D.
        </span>
        <span class="font-extrabold block text-4xl py-1">
            The fastest pit stop in history was 1.82 seconds!
        </span>
    </div>

    <div class="text-center py-15">
        <span class="uppercase text-s text-gray-400">
            Blog
        </span>

        <h2 class="text-4xl font-bold py-10">
            Recent Posts
        </h2>

        <p class="m-auto w-4/5 text-gray-500">
            Catch up on the latest news, race reviews, and exclusive interviews from the world of Formula 1.
        </p>
    </div>

    <div class="sm:grid grid-cols-2 w-4/5 m-auto">
        <div class="flex bg-red-600 text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block">
                <span class="uppercase text-xs">
                    Featured Story
                </span>

                <h3 class="text-xl font-bold py-10">
                    Inside the Garage: A Day with Mercedes-AMG Petronas
                </h3>

                <a
                    href="/blog/featured-story"
                    class="uppercase bg-transparent border-2 border-gray-100 text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl hover:bg-white hover:text-red-600 transition duration-300">
                    Read More
                </a>
            </div>
        </div>
        <div>
            <img src="{{ asset('images/F1Garage.jpg') }}" alt="F1 Garage">
        </div>
    </div>
@endsection
