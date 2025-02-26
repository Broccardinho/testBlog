@extends('layouts.app')

@section('content')
    <div class="background-image grid grid-cols-1 m-auto" style="background-image: url('{{ asset('images/F1LaravelBackground.jpeg') }}'); background-size: cover; background-position: center;">
        <div class="flex text-gray-100 pt-20 pb-20"> <!-- Increased vertical padding -->
            <div class="m-auto pt-10 pb-20 sm:m-auto w-4/5 block text-center space-y-8"> <!-- Added space-y-8 for vertical spacing -->
                <h1 class="sm:text-white text-5xl uppercase font-bold text-shadow-md pb-10">
                    Welcome to the Unofficial F1 Blog
                </h1>
                <a
                    href="/blog"
                    class="inline-block text-center bg-red-600 text-white py-3 px-8 font-bold text-xl uppercase hover:bg-red-700 transition duration-300 rounded-lg">
                    Explore Posts
                </a>
            </div>
        </div>
    </div>

    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-20 border-b border-gray-200"> <!-- Increased py-15 to py-20 -->
        <div class="mb-12 sm:mb-0"> <!-- Added bottom margin on mobile -->
            <img src="{{ asset('images/F1CloseUp.jpg') }}" width="700" alt="F1 Car" class="rounded-lg shadow-xl">
        </div>

        <div class="m-auto sm:m-auto text-left w-4/5 block space-y-8"> <!-- Added space-y-8 -->
            <h2 class="text-4xl font-extrabold text-gray-600"> <!-- Increased text size -->
                The Thrill of Formula 1
            </h2>

            <div class="space-y-6"> <!-- Added space-y-6 between paragraphs -->
                <p class="text-gray-500 text-lg leading-relaxed"> <!-- Increased text size and added line height -->
                    Formula 1 is the pinnacle of motorsport, where cutting-edge technology meets human skill. From the roar of the engines to the strategic pit stops, every moment is a blend of speed, precision, and excitement.
                </p>

                <p class="font-extrabold text-gray-600 text-lg">
                    Stay updated with the latest news, race results, and behind-the-scenes stories from the world of F1.
                </p>
            </div>

            <a
                href="/blog"
                class="inline-block uppercase bg-red-600 text-white text-lg font-extrabold py-4 px-10 rounded-3xl hover:bg-red-700 transition duration-300">
                View Posts
            </a>
        </div>
    </div>

    <div class="text-center p-20 bg-black text-white space-y-12"> <!-- Changed p-15 to p-20 and added space-y-12 -->
        <h2 class="text-3xl pb-5 font-bold"> <!-- Increased text size -->
            Did You Know?
        </h2>

        <div class="space-y-3 max-w-4xl mx-auto"> <!-- Added space-y-8 and container constraint -->
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
    </div>

    <!-- Updated Section 1: F1 Legends -->
    <div class="text-center py-20 space-y-8 bg-gray-100"> <!-- Added background color -->
        <span class="uppercase text-sm text-gray-400 tracking-widest"> <!-- Added tracking-widest -->
            F1 Legends
        </span>

        <h2 class="text-4xl font-bold text-gray-800">
            Celebrating the Greatest Drivers
        </h2>

        <p class="m-auto w-4/5 text-gray-600 text-lg max-w-2xl"> <!-- Added max-w-2xl -->
            From Ayrton Senna's raw speed to Michael Schumacher's record-breaking dominance, Formula 1 has been shaped by legendary drivers. Explore their stories, rivalries, and unforgettable moments that defined the sport.
        </p>

        <a
            href="/blog"
            class="inline-block uppercase bg-red-600 text-white text-lg font-extrabold py-3 px-8 rounded-3xl hover:bg-red-700 transition duration-300">
            Learn More
        </a>
    </div>

    <!-- Updated Section 2: F1 Technology -->
    <div class="text-center py-20 space-y-8 bg-white"> <!-- Added background color -->
        <span class="uppercase text-sm text-gray-400 tracking-widest"> <!-- Added tracking-widest -->
            Innovation
        </span>

        <h2 class="text-4xl font-bold text-gray-800">
            The Technology Behind F1
        </h2>

        <p class="m-auto w-4/5 text-gray-600 text-lg max-w-2xl"> <!-- Added max-w-2xl -->
            Discover how F1 teams push the boundaries of engineering with hybrid power units, advanced aerodynamics, and cutting-edge materials. Learn how innovations on the track influence the cars we drive every day.
        </p>

        <a
            href="/blog"
            class="inline-block uppercase bg-red-600 text-white text-lg font-extrabold py-3 px-8 rounded-3xl hover:bg-red-700 transition duration-300">
            Explore Technology
        </a>
    </div>

    <!-- Updated Section 3: F1 Calendar -->
    <div class="text-center py-20 space-y-8 bg-gray-100"> <!-- Added background color -->
        <span class="uppercase text-sm text-gray-400 tracking-widest"> <!-- Added tracking-widest -->
            Upcoming Races
        </span>

        <h2 class="text-4xl font-bold text-gray-800">
            2023 F1 Calendar
        </h2>

        <p class="m-auto w-4/5 text-gray-600 text-lg max-w-2xl"> <!-- Added max-w-2xl -->
            Don't miss a single race! Check out the full calendar for the 2023 season, including circuit details, race times, and key events. Mark your calendar and join us for the ultimate motorsport experience.
        </p>

        <a
            href="/blog"
            class="inline-block uppercase bg-red-600 text-white text-lg font-extrabold py-3 px-8 rounded-3xl hover:bg-red-700 transition duration-300">
            View Calendar
        </a>
    </div>

    <div class="sm:grid grid-cols-2 w-4/5 m-auto gap-12 py-20"> <!-- Added gap-12 and py-20 -->
        <div class="flex bg-red-600 text-gray-100 pt-10 rounded-lg overflow-hidden mb-12 sm:mb-0"> <!-- Added rounded-lg and mb-12 -->
            <div class="m-auto pt-8 pb-20 sm:m-auto w-4/5 block space-y-8"> <!-- Increased padding and added space-y-8 -->
                <span class="text-2xl font-bold">
                    Driver of the Day
                </span>

                <h3 class="uppercase text-sm tracking-widest"> <!-- Increased text size -->
                    This is your chance to tell us who you think is the rightful Driver of the Day.
                    Cast your vote now!
                </h3>

                <a
                    href="/blog/featured-story"
                    class="inline-block uppercase bg-transparent border-2 border-gray-100 text-gray-100 text-sm font-extrabold py-3 px-8 rounded-3xl hover:bg-white hover:text-red-600 transition duration-300">
                    Driver Of The Day Poll
                </a>
            </div>
        </div>
        <div>
            <img src="{{ asset('images/DoTD.jpg') }}" alt="DoTD Vote" class="rounded-lg shadow-xl">
        </div>
    </div>
@endsection
