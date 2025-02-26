@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-100 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">
                    2025 Formula 1 Teams
                </h1>
                <p class="text-xl text-gray-600">
                    Driver lineups and team information
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($teams as $team)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300"
                         style="border-bottom: 4px solid {{ $team['color'] }};">
                        <div class="p-8">
                            <div class="text-center mb-6">
                                <h2 class="text-2xl font-bold text-gray-900 mb-2">
                                    {{ $team['name'] }}
                                </h2>
                                <div class="h-1 w-16 bg-gray-200 mx-auto rounded-full"></div>
                            </div>

                            <div class="space-y-6">
                                @foreach($team['drivers'] as $driver)
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-shrink-0">
                                            @php
                                                // Convert name to filename format
                                                $baseName = strtolower(str_replace(' ', '_', $driver));
                                                $imageFile = $driverImageMap[$driver] ?? $baseName . '.jpg';
                                            @endphp
                                            <img
                                                src="{{ asset('images/drivers/' . $imageFile) }}"
                                                alt="{{ $driver }}"
                                                class="h-16 w-16 rounded-full object-cover border-2 border-gray-200 hover:scale-105 transition-transform"
                                                onerror="this.onerror=null; this.src='{{ asset('images/drivers/default_driver.jpg') }}'"
                                            >
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-lg font-medium text-gray-900">
                                                {{ $driver }}
                                            </p>
                                            <p class="text-sm text-gray-500">
                                                {{ $loop->iteration === 1 ? 'Lead Driver' : 'Second Driver' }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
