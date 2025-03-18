@extends('layouts.app')

@section('content')
    <div class="w-4/5 m-auto text-center">
        <div class="py-15 border-b border-gray-200">
            <h1 class="text-6xl">
                Blog Posts
            </h1>
        </div>
    </div>

    <!-- Success Message Pop-Up -->
    @if (session()->has('message'))
        <div class="w-4/5 m-auto mt-10 pl-2">
            <p class="w-2/6 mb-4 text-gray-50 bg-green-500 rounded-2xl py-4 text-center">
                {{ session()->get('message') }}
            </p>
        </div>
    @endif

    @if (Auth::check())
        <div class="pt-15 w-4/5 m-auto">
            <a
                href="/blog/create"
                class="bg-red-600 uppercase text-white text-xs font-extrabold py-3 px-5 rounded-3xl hover:bg-red-700 transition duration-300">
                Create post
            </a>
        </div>
    @endif

    <!-- Blog Posts Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 w-4/5 mx-auto py-20">
        @foreach ($posts as $post)
            <!-- Blog Post Card -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 border-2 border-gray-200">
                <!-- Title (Header) -->
                <div class="p-6 bg-gradient-to-r from-red-600 to-red-800">
                    <h2 class="text-2xl font-bold text-white">
                        {{ $post->title }}
                    </h2>
                    <span class="text-sm text-gray-200">
                        By <span class="font-bold">{{ $post->user->name }}</span>,
                        Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
                    </span>
                </div>

                <!-- Image (Body) -->
                <div class="w-full h-64 overflow-hidden">
                    <img
                        src="{{ asset('images/' . $post->image_path) }}"
                        alt="{{ $post->title }}"
                        class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-300"
                    >
                </div>

                <!-- Description (Footer) -->
                <div class="p-6">
                    <p class="text-lg text-gray-700 leading-relaxed">
                        {{ Str::limit($post->description, 150) }} <!-- Limit description to 150 characters -->
                    </p>

                    <!-- Buttons -->
                    <div class="mt-6 flex justify-between items-center">
                        <a
                            href="/blog/{{ $post->slug }}"
                            class="bg-red-600 text-white px-6 py-2 rounded-full hover:bg-red-700 transition duration-300"
                        >
                            Keep Reading
                        </a>

                        @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
                            <div class="flex space-x-4">
                                <a
                                    href="/blog/{{ $post->slug }}/edit"
                                    class="bg-red-600 text-white px-4 py-2 rounded-full hover:bg-red-700 transition duration-300"
                                >
                                    Edit
                                </a>
                                <form action="/blog/{{ $post->slug }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button
                                        type="submit"
                                        class="bg-red-600 text-white px-4 py-2 rounded-full hover:bg-red-700 transition duration-300"
                                    >
                                        Delete
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- CTA Section -->
    <div class="w-4/5 m-auto text-center mt-20 py-12 border-t border-gray-200">
        <h2 class="text-4xl font-bold text-gray-800 mb-6">
            Want to Learn More About This Project?
        </h2>
        <p class="text-xl text-gray-600 mb-8">
            Discover the story behind this Formula 1 blog and the team that made it possible.
        </p>
        <a
            href="{{ route('about') }}"
            class="bg-red-600 uppercase text-white text-lg font-extrabold py-3 px-8 rounded-3xl hover:bg-red-700 transition duration-300"
        >
            About Us
        </a>
    </div>
@endsection
