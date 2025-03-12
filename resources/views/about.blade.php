@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">
                About This Project
            </h1>
            <p class="text-xl text-gray-600">
                Learn more about the purpose and creators of this Formula 1 blog.
            </p>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden p-8">
            <div class="space-y-8">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">
                        Project Purpose
                    </h2>
                    <p class="text-gray-600 leading-relaxed">
                        This project is dedicated to providing fans of Formula 1 with the latest news, historical insights, and detailed information about the teams, drivers, and races. Our goal is to create a comprehensive resource for F1 enthusiasts to stay informed and engaged with the sport.
                    </p>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">
                        The Team
                    </h2>
                    <p class="text-gray-600 leading-relaxed">
                        Our team is made up of passionate F1 fans and developers who have come together to create this platform. We are committed to delivering high-quality content and a seamless user experience.
                    </p>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">
                        Contact Us
                    </h2>
                    <p class="text-gray-600 leading-relaxed">
                        If you have any questions, suggestions, or feedback, feel free to reach out to us at <a href="mailto:info@f1blog.com" class="text-f1-red hover:underline">info@f1blog.com</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
