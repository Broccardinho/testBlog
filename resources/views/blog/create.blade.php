<!-- resources/views/blog/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="w-4/5 mx-auto">
        <div class="py-12 text-center border-b-2 border-f1-red">
            <h1 class="text-6xl font-racing text-f1-red mb-4">
                Create Post
            </h1>
            <p class="font-teko text-xl text-f1-black">
                Share your racing insights with the community
            </p>
        </div>
    </div>

    @if ($errors->any())
        <div class="w-4/5 mx-auto mt-8">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="w-1/5 mb-4 text-gray-50 bg-red-700 rounded-2xl py-4 text-center font-teko">
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="w-4/5 mx-auto pt-16 bg-white rounded-lg shadow-2xl p-10 mt-12">
        <form action="/blog" method="POST" enctype="multipart/form-data">
            @csrf

            <input
                type="text"
                name="title"
                placeholder="Title..."
                class="bg-transparent block border-b-2 w-full h-16 text-4xl outline-none text-f1-black font-racing focus:border-f1-red mb-8"
                required
            >

            <textarea
                name="description"
                placeholder="Description..."
                class="bg-transparent block border-b-2 w-full h-40 text-xl outline-none text-f1-black font-teko focus:border-f1-red mb-8 resize-none"
                required
            ></textarea>

            <div class="pt-10">
                <label class="w-44 flex flex-col items-center px-2 py-3 bg-track-gray rounded-lg shadow-lg tracking-wide uppercase border border-f1-red cursor-pointer hover:bg-f1-red hover:text-white transition-colors">
                    <span class="mt-2 text-base leading-normal font-teko">
                        Select a file
                    </span>
                    <input
                        type="file"
                        name="image"
                        class="hidden"
                        required
                    >
                </label>
            </div>

            <button
                type="submit"
                class="uppercase mt-10 bg-f1-red text-white text-lg font-racing py-3 px-6 rounded-3xl hover:bg-red-800 transition-colors"
            >
                Submit Post
            </button>
        </form>
    </div>
@endsection
