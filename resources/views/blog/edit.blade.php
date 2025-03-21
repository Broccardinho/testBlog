@extends('layouts.app')

@section('content')
    <div class="w-4/5 mx-auto">
        {{-- Centered Title Section --}}
        <div class="py-12 text-center border-b-2 border-f1-red">
            <h1 class="text-6xl font-racing text-f1-red mb-4">
                Update Post
            </h1>
            <p class="font-teko text-xl text-f1-black">
                Revise your racing insights and share with the community
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

    {{-- Form Container --}}
    <div class="w-4/5 mx-auto pt-16 bg-white rounded-lg shadow-2xl p-10 mt-12">
        <form
            action="/blog/{{ $post->slug }}"
            method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input
                type="text"
                name="title"
                value="{{ $post->title }}"
                class="bg-transparent block border-b-2 w-full h-16 text-4xl outline-none text-f1-black font-racing focus:border-f1-red mb-8"
                placeholder="Title...">

            <textarea
                name="description"
                placeholder="Description..."
                class="bg-transparent block border-b-2 w-full h-40 text-xl outline-none text-f1-black font-teko focus:border-f1-red mb-8 resize-none">{{ $post->description }}</textarea>

            {{-- Image Upload Field --}}
            <div class="my-10">
                <label class="block text-xl font-bold mb-4 font-teko text-f1-black">
                    Update Image (Optional)
                </label>
                <div class="flex items-center space-x-4">
                    {{-- File Input --}}
                    <label class="flex flex-col items-center px-4 py-2 bg-f1-red text-white rounded-lg shadow-lg tracking-wide uppercase border border-f1-red cursor-pointer hover:bg-red-800 hover:border-red-800 transition-colors">
                        <span class="text-base leading-normal font-teko">Choose File</span>
                        <input
                            type="file"
                            name="image"
                            class="hidden">
                    </label>
                    {{-- Display File Name --}}
                    <span id="file-name" class="text-lg text-f1-black font-teko">No file chosen</span>
                </div>
            </div>

            {{-- Display Current Image --}}
            @if ($post->image_path)
                <div class="my-10">
                    <label class="block text-xl font-bold mb-4 font-teko text-f1-black">
                        Current Image
                    </label>
                    <img
                        src="{{ asset('images/' . $post->image_path) }}"
                        alt="{{ $post->title }}"
                        class="w-1/2 rounded-lg shadow-lg border-2 border-f1-red">
                </div>

                {{-- Delete Current Image Checkbox --}}
                <div class="my-10">
                    <label class="flex items-center space-x-2">
                        <input
                            type="checkbox"
                            name="delete_image"
                            class="form-checkbox h-5 w-5 text-f1-red rounded focus:ring-f1-red">
                        <span class="text-lg text-f1-black font-teko">Delete Current Image</span>
                    </label>
                </div>
            @endif

            {{-- Submit Button --}}
            <button
                type="submit"
                class="uppercase mt-10 bg-f1-red text-white text-lg font-racing py-3 px-6 rounded-3xl hover:bg-red-800 transition-colors">
                Submit Post
            </button>
        </form>
    </div>

    {{-- JavaScript to Display File Name --}}
    <script>
        document.querySelector('input[name="image"]').addEventListener('change', function (e) {
            const fileName = e.target.files[0] ? e.target.files[0].name : 'No file chosen';
            document.getElementById('file-name').textContent = fileName;
        });
    </script>
@endsection
