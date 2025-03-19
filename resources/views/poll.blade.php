@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-100 py-12">
        <div class="w-full max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Drivers Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach($drivers as $driver)
                    <div class="carousel-item p-4">
                        <!-- Driver Card -->
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden relative flex flex-col"
                             style="border: 2px solid {{ $driver['team_color'] }}; height: 400px;">
                            <!-- Driver Photo -->
                            <div class="h-48 overflow-hidden relative flex-shrink-0">
                                <img
                                    src="{{ asset('images/drivers_fullbody/' . $driver['image']) }}"
                                    alt="{{ $driver['name'] }}"
                                    class="w-full h-full object-cover object-top"
                                    style="clip-path: polygon(0 0, 100% 0, 100% 80%, 0 100%);"
                                    onerror="this.onerror=null; this.src='{{ asset('css/images/drivers_fullbody/default_driver_fullbody.jpg') }}'"
                                >
                                <!-- Colored Triangle Section -->
                                <div class="absolute bottom-0 left-0 w-full h-16"
                                     style="background-color: {{ $driver['team_color'] }}; clip-path: polygon(0 100%, 100% 80%, 100% 100%);">
                                </div>
                            </div>

                            <!-- Name Card -->
                            <div class="p-4 border-t-4 flex-grow" style="border-color: {{ $driver['team_color'] }};">
                                <h2 class="text-2xl font-bold text-gray-900">
                                    {{ $driver['name'] }}
                                </h2>
                                <p class="text-sm text-gray-600">
                                    {{ $driver['team'] }}
                                </p>
                            </div>

                            <!-- Vote Button -->
                            <div class="p-4 flex-shrink-0">
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
            document.querySelectorAll('.vote-button').forEach(button => {
                button.addEventListener('click', async () => {
                    const driverName = button.getAttribute('data-driver-name');
                    if (!driverName) {
                        alert('Error: Driver name not found.');
                        return;
                    }

                    try {
                        const response = await fetch('{{ route('vote.store') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            body: JSON.stringify({ driver_name: driverName }),
                        });

                        const data = await response.json();
                        console.log('Response:', data);

                        if (data.success) {
                            alert('Vote submitted!');
                        } else {
                            alert('Error: ' + data.message);
                        }
                    } catch (error) {
                        console.error('Fetch error:', error);
                        alert('An error occurred. Check the console for details.');
                    }
                });
            });
        </script>
    @endpush
@endsection
