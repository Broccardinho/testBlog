@extends('layouts.app')

@section('content')
    <div class="w-4/5 m-auto text-left">
        <div class="py-15">
            <h1 class="text-6xl">
                Update Post
            </h1>
        </div>
    </div>

    @if ($errors->any())
        <div class="w-4/5 m-auto">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="w-1/5 mb-4 text-gray-50 bg-red-700 rounded-2xl py-4">
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="w-4/5 m-auto pt-20">
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
                class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none">

            <textarea
                name="description"
                placeholder="Description..."
                class="py-20 bg-transparent block border-b-2 w-full h-60 text-xl outline-none">{{ $post->description }}</textarea>

            <!-- Image Upload Field -->
            <div class="my-10">
                <label class="block text-xl font-bold mb-4">
                    Update Image (Optional)
                </label>
                <div class="flex items-center space-x-4">
                    <!-- File Input -->
                    <label class="flex flex-col items-center px-4 py-2 bg-blue-500 text-white rounded-lg shadow-lg tracking-wide uppercase border border-blue-500 cursor-pointer hover:bg-blue-600 hover:border-blue-600 transition-colors">
                        <span class="text-base leading-normal">Choose File</span>
                        <input
                            type="file"
                            name="image"
                            class="hidden">
                    </label>
                    <!-- Display File Name -->
                    <span id="file-name" class="text-lg text-gray-700">No file chosen</span>
                </div>
            </div>

            <!-- Display Current Image -->
            @if ($post->image_path)
                <div class="my-10">
                    <label class="block text-xl font-bold mb-4">
                        Current Image
                    </label>
                    <img
                        src="{{ asset('images/' . $post->image_path) }}"
                        alt="{{ $post->title }}"
                        class="w-1/2 rounded-lg shadow-lg">
                </div>

                <!-- Delete Current Image Checkbox -->
                <div class="my-10">
                    <label class="flex items-center space-x-2">
                        <input
                            type="checkbox"
                            name="delete_image"
                            class="form-checkbox h-5 w-5 text-blue-600 rounded">
                        <span class="text-lg text-gray-700">Delete Current Image</span>
                    </label>
                </div>
            @endif

            <button
                type="submit"
                class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl hover:bg-blue-600 transition-colors">
                Submit Post
            </button>
        </form>
    </div>

    <!-- JavaScript to Display File Name -->
    <script>
        document.querySelector('input[name="image"]').addEventListener('change', function (e) {
            const fileName = e.target.files[0] ? e.target.files[0].name : 'No file chosen';
            document.getElementById('file-name').textContent = fileName;
        });
    </script>

@endsection
