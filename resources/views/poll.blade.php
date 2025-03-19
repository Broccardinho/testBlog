@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-100 py-12">
        <div class="w-full max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Drivers Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach($drivers as $driver)
                    <div class="carousel-item p-4">
                        <!-- Driver Card -->
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden relative"
                             style="border: 2px solid {{ $driver['team_color'] }}; box-shadow: 0 0 15px {{ $driver['team_color'] }};">
                            <!-- Driver Photo -->
                            <div class="h-64 overflow-hidden relative">
                                <img
                                    src="{{ asset('images/drivers_fullbody/' . $driver['image']) }}"
                                    alt="{{ $driver['name'] }}"
                                    class="w-full h-full object-cover object-top"
                                    style="clip-path: polygon(0 0, 100% 0, 100% 80%, 0 100%);"
                                    onerror="this.onerror=null; this.src='{{ asset('css/images/drivers_fullbody/default_driver_fullbody.jpg') }}'"
                                >
                                <!-- Colored Triangle Section -->
                                <div class="absolute bottom-0 left-0 w-full h-20"
                                     style="background-color: {{ $driver['team_color'] }}; clip-path: polygon(0 100%, 100% 80%, 100% 100%);">
                                </div>
                            </div>

                            <!-- Name Card -->
                            <div class="p-4 border-t-4" style="border-color: {{ $driver['team_color'] }};">
                                <h2 class="text-2xl font-bold text-gray-900">
                                    {{ $driver['name'] }}
                                </h2>
                                <p class="text-sm text-gray-600">
                                    {{ $driver['team'] }}
                                </p>
                            </div>

                            <!-- Vote Button -->
                            <div class="p-4">
                                <button
                                    class="w-full bg-red-600 text-white px-4 py-2 rounded-full hover:bg-red-700 transition duration-300 vote-button"
                                    data-driver-name="{{ $driver['name'] }}"
                                >
                                    Vote for {{ $driver['name'] }}
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            // Handle Vote Button Clicks
            document.querySelectorAll('.vote-button').forEach(button => {
                button.addEventListener('click', () => {
                    const driverName = button.getAttribute('data-driver-name');
                    if (driverName) {
                        alert(`You voted for ${driverName}!`);
                        // You can replace this with an AJAX request to submit the vote.
                    } else {
                        alert('Error: Driver name not found.');
                    }
                });
            });
        </script>
    @endpush
@endsection
