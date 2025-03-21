@extends('layouts.app')

@section('content')
    <!-- Main Container -->
    <div class="min-h-screen bg-black py-12">
        <!-- White Box with Red Border -->
        <div class="w-11/12 md:w-4/5 mx-auto bg-white rounded-lg shadow-2xl border-2 border-red-600 overflow-hidden">
            <!-- Image and Title Section -->
            <div class="flex flex-col md:flex-row border-b-2 border-red-600"> <!-- Red border between sections -->
                <!-- Image on the Left -->
                <div class="w-full md:w-1/2 h-96 overflow-hidden border-r-2 border-red-600"> <!-- Red border around image -->
                    <img
                        src="{{ asset('images/' . $post->image_path) }}"
                        alt="{{ $post->title }}"
                        class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-300"
                    >
                </div>

                <!-- Title and Author on the Right -->
                <div class="w-full md:w-1/2 p-8 flex flex-col justify-center bg-gray-50">
                    <h1 class="text-4xl font-bold text-gray-900 mb-4">
                        {{ $post->title }}
                    </h1>
                    <span class="text-lg text-gray-600">
                        By <span class="font-bold">{{ $post->user->name }}</span>,
                        Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
                    </span>
                </div>
            </div>

            <!-- Description Section -->
            <div class="p-8 bg-white border-b-2 border-red-600"> <!-- Red border between sections -->
                <p class="text-xl text-gray-800 leading-relaxed">
                    {{ $post->description }}
                </p>
            </div>

            <!-- Buttons -->
            <div class="p-8 bg-gray-50 text-center">
                <a
                    href="/blog"
                    class="bg-red-600 text-white px-8 py-3 rounded-full hover:bg-red-700 transition duration-300 inline-block"
                >
                    Back to Blog
                </a>

                @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
                    <div class="mt-6 space-x-4">
                        <a
                            href="/blog/{{ $post->slug }}/edit"
                            class="bg-red-600 text-white px-8 py-3 rounded-full hover:bg-red-700 transition duration-300 inline-block"
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
                                class="bg-red-600 text-white px-8 py-3 rounded-full hover:bg-red-700 transition duration-300"
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
            <div class="w-11/12 md:w-4/5 mx-auto py-12 mt-12">
                <h2 class="text-3xl font-bold text-white mb-8 text-center">
                    Related Posts
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($relatedPosts as $relatedPost)
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 border-2 border-red-600">
                            <!-- Image (Header) -->
                            <div class="w-full h-48 overflow-hidden border-b-2 border-red-600"> <!-- Red border around image -->
                                <img
                                    src="{{ asset('images/' . $relatedPost->image_path) }}"
                                    alt="{{ $relatedPost->title }}"
                                    class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-300"
                                >
                            </div>

                            <!-- Title and Description (Body) -->
                            <div class="p-6">
                                <h2 class="text-2xl font-bold text-gray-900 mb-2">
                                    {{ $relatedPost->title }}
                                </h2>
                                <span class="text-sm text-gray-600">
                                    By <span class="font-bold">{{ $relatedPost->user->name }}</span>,
                                    Created on {{ date('jS M Y', strtotime($relatedPost->updated_at)) }}
                                </span>
                                <p class="text-lg text-gray-700 leading-relaxed mt-4">
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
    </div>
@endsection
