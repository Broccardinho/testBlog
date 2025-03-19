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
                                    data-driver-team-color="{{ $driver['team_color'] }}"
                                    data-driver-image="{{ asset('images/drivers_fullbody/' . $driver['image']) }}"
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

    <!-- Overlay and Modal -->
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm hidden z-50"></div>
    <div id="selectedDriverModal" class="fixed inset-0 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden relative flex flex-col"
             style="height: 500px; width: 350px;">
            <!-- X Button -->
            <button id="closeModalButton" class="absolute top-2 right-2 text-2xl font-bold hover:opacity-75 transition-opacity"
                    style="color: inherit;">&times;</button>

            <!-- Driver Photo -->
            <div class="h-64 overflow-hidden relative flex-shrink-0">
                <img
                    id="modalDriverImage"
                    src=""
                    alt="Selected Driver"
                    class="w-full h-full object-cover object-top"
                    style="clip-path: polygon(0 0, 100% 0, 100% 80%, 0 100%);"
                >
                <!-- Colored Triangle Section -->
                <div id="modalTriangle" class="absolute bottom-0 left-0 w-full h-20"
                     style="clip-path: polygon(0 100%, 100% 80%, 100% 100%);">
                </div>
            </div>

            <!-- Name Card -->
            <div id="modalNameCard" class="p-4 border-t-4 flex-grow">
                <h2 id="modalDriverName" class="text-2xl font-bold text-gray-900"></h2>
                <p id="modalDriverTeam" class="text-sm text-gray-600"></p>
            </div>

            <!-- Confirmation Message -->
            <div class="p-4 flex-shrink-0 text-center">
                <p class="text-lg font-bold text-green-600">Your Driver of the Day!</p>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const overlay = document.getElementById('overlay');
                const modal = document.getElementById('selectedDriverModal');
                const closeModalButton = document.getElementById('closeModalButton');
                const modalDriverImage = document.getElementById('modalDriverImage');
                const modalDriverName = document.getElementById('modalDriverName');
                const modalDriverTeam = document.getElementById('modalDriverTeam');
                const modalTriangle = document.getElementById('modalTriangle');
                const modalNameCard = document.getElementById('modalNameCard');

                // Function to close the modal
                const closeModal = () => {
                    overlay.classList.add('hidden');
                    modal.classList.add('hidden');
                };

                // Event listener for vote buttons
                document.querySelectorAll('.vote-button').forEach(button => {
                    button.addEventListener('click', async () => {
                        const driverName = button.getAttribute('data-driver-name');
                        const teamColor = button.getAttribute('data-driver-team-color');
                        const driverImage = button.getAttribute('data-driver-image');

                        if (!driverName) {
                            alert('Error: Driver name not found.');
                            return;
                        }

                        try {
                            // Show the overlay and modal
                            overlay.classList.remove('hidden');
                            modal.classList.remove('hidden');

                            // Update the modal content
                            modalDriverImage.src = driverImage;
                            modalDriverName.textContent = driverName;
                            modalDriverTeam.textContent = button.closest('.carousel-item').querySelector('p').textContent;

                            // Set team colors
                            const modalCard = modal.querySelector('div');
                            modalCard.style.border = `4px solid ${teamColor}`;
                            modalTriangle.style.backgroundColor = teamColor;
                            modalNameCard.style.borderColor = teamColor;
                            closeModalButton.style.color = teamColor;

                            // Submit the vote via AJAX
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

                            if (!data.success) {
                                alert('Error: ' + data.message);
                            }
                        } catch (error) {
                            console.error('Fetch error:', error);
                            alert('An error occurred. Check the console for details.');
                        }
                    });
                });

                // Close the modal when clicking outside
                overlay.addEventListener('click', closeModal);

                // Close the modal when clicking the X button
                closeModalButton.addEventListener('click', closeModal);
            });
        </script>
    @endpush
@endsection
