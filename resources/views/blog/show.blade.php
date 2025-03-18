@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <div class="w-full h-96 overflow-hidden relative">
        <img
            src="{{ asset('images/' . $post->image_path) }}"
            alt="{{ $post->title }}"
            class="w-full h-full object-cover"
        >
        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <h1 class="text-5xl font-bold text-white text-center">
                {{ $post->title }}
            </h1>
        </div>
    </div>

    <!-- Post Content -->
    <div class="w-4/5 mx-auto py-12">
        <!-- Author and Date -->
        <div class="text-center mb-12">
            <span class="text-gray-500">
                By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>,
                Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
            </span>
        </div>

        <!-- Description -->
        <div class="prose max-w-3xl mx-auto">
            <p class="text-xl text-gray-700 leading-relaxed">
                {{ $post->description }}
            </p>
        </div>

        <!-- Buttons -->
        <div class="mt-12 text-center">
            <a
                href="/blog"
                class="bg-red-600 text-white px-6 py-3 rounded-full hover:bg-red-700 transition duration-300"
            >
                Back to Blog
            </a>

            @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
                <div class="mt-6 space-x-4">
                    <a
                        href="/blog/{{ $post->slug }}/edit"
                        class="bg-red-600 text-white px-6 py-3 rounded-full hover:bg-red-700 transition duration-300"
                    >
                        Edit Post
                    </a>
                    <form
                        action="/blog/{{ $post->slug }}"
                        method="POST"
                        class="inline"
                    >
                        @csrf
                        @method('delete')
                        <button
                            type="submit"
                            class="bg-red-600 text-white px-6 py-3 rounded-full hover:bg-red-700 transition duration-300"
                        >
                            Delete Post
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </div>

    <!-- Related Posts Section -->
    @if (isset($relatedPosts) && $relatedPosts->isNotEmpty())
        <div class="w-4/5 mx-auto py-12 border-t border-gray-200">
            <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">
                Related Posts
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($relatedPosts as $relatedPost)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 border-2 border-gray-200">
                        <!-- Title (Header) -->
                        <div class="p-6 bg-gradient-to-r from-red-600 to-red-800">
                            <h2 class="text-2xl font-bold text-white">
                                {{ $relatedPost->title }}
                            </h2>
                            <span class="text-sm text-gray-200">
                                By <span class="font-bold">{{ $relatedPost->user->name }}</span>,
                                Created on {{ date('jS M Y', strtotime($relatedPost->updated_at)) }}
                            </span>
                        </div>

                        <!-- Image (Body) -->
                        <div class="w-full h-48 overflow-hidden">
                            <img
                                src="{{ asset('images/' . $relatedPost->image_path) }}"
                                alt="{{ $relatedPost->title }}"
                                class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-300"
                            >
                        </div>

                        <!-- Description (Footer) -->
                        <div class="p-6">
                            <p class="text-lg text-gray-700 leading-relaxed">
                                {{ Str::limit($relatedPost->description, 100) }} <!-- Limit description to 100 characters -->
                            </p>

                            <!-- Button -->
                            <div class="mt-6 text-center">
                                <a
                                    href="/blog/{{ $relatedPost->slug }}"
                                    class="bg-red-600 text-white px-6 py-2 rounded-full hover:bg-red-700 transition duration-300"
                                >
                                    Keep Reading
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
@endsection
