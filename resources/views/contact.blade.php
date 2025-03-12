@extends('layouts.app') <!-- Extend the main layout -->

@section('content') <!-- Start the content section -->
<div class="min-h-screen bg-gray-100 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">
                Contact Us
            </h1>
            <p class="text-xl text-gray-600">
                Have questions or feedback? Get in touch with us!
            </p>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden p-8 max-w-2xl mx-auto">
            @if (session()->has('message'))
                <div class="bg-green-500 text-white p-4 rounded-lg mb-6">
                    {{ session()->get('message') }}
                </div>
            @endif

            <form id="contactForm" action="{{ route('contact.send') }}" method="POST">
                @csrf
                <div class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-900">Name</label>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-gray-900 focus:border-f1-red focus:ring focus:ring-f1-red focus:ring-opacity-50"
                            required
                        >
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-900">Email</label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-gray-900 focus:border-f1-red focus:ring focus:ring-f1-red focus:ring-opacity-50"
                            required
                        >
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-900">Message</label>
                        <textarea
                            name="message"
                            id="message"
                            rows="5"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-gray-900 focus:border-f1-red focus:ring focus:ring-f1-red focus:ring-opacity-50"
                            required
                        ></textarea>
                    </div>

                    <div>
                        <button
                            type="submit"
                            class="w-full bg-f1-red text-white py-3 px-6 rounded-md hover:bg-f1-dark-red transition duration-300"
                        >
                            Send Message
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection <!-- End the content section -->

@section('scripts') <!-- Optional: Add scripts section if needed -->
<script>
    document.getElementById('contactForm').addEventListener('submit', function (e) {
        e.preventDefault(); // Prevent the form from submitting normally
        alert('Thank you for your message! We will get back to you soon.'); // Show an alert
        this.submit(); // Submit the form after the alert
    });
</script>
@endsection
