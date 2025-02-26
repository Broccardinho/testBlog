@extends('layouts.app')

@section('content')
    <div class="text-center py-20 space-y-12 bg-gray-100">
        <div class="space-y-8">
        <span class="uppercase text-sm text-gray-400 tracking-widest">
            2025 Season
        </span>
            <h2 class="text-4xl font-bold text-gray-800">
                2025 F1 Calendar
            </h2>
        </div>

        <div class="w-4/5 mx-auto overflow-x-auto shadow-lg rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-red-600 text-white">
                <tr>
                    <th class="px-6 py-4 text-left text-sm font-medium uppercase">Round</th>
                    <th class="px-6 py-4 text-left text-sm font-medium uppercase">Dates</th>
                    <th class="px-6 py-4 text-left text-sm font-medium uppercase">Grand Prix</th>
                    <th class="px-6 py-4 text-left text-sm font-medium uppercase">Circuit</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach([
                    ['March 14–16', 'Australia', 'Melbourne'],
                    ['March 21–23', 'China', 'Shanghai'],
                    ['April 4–6', 'Japan', 'Suzuka'],
                    ['April 11–13', 'Bahrain', 'Sakhir'],
                    ['April 18–20', 'Saudi Arabia', 'Jeddah'],
                    ['May 2–4', 'Miami', 'Miami'],
                    ['May 16–18', 'Emilia-Romagna', 'Imola'],
                    ['May 23–25', 'Monaco', 'Monte-Carlo'],
                    ['May 30–June 1', 'Spain', 'Barcelona'],
                    ['June 13–15', 'Canada', 'Montreal'],
                    ['June 27–29', 'Austria', 'Spielberg'],
                    ['July 4–6', 'Great Britain', 'Silverstone'],
                    ['July 25–27', 'Belgium', 'Spa-Francorchamps'],
                    ['August 1–3', 'Hungary', 'Budapest'],
                    ['August 29–31', 'Netherlands', 'Zandvoort'],
                    ['September 5–7', 'Italy', 'Monza'],
                    ['September 19–21', 'Azerbaijan', 'Baku'],
                    ['October 3–5', 'Singapore', 'Singapore'],
                    ['October 17–19', 'United States', 'Austin'],
                    ['October 24–26', 'Mexico', 'Mexico City'],
                    ['November 7–9', 'Brazil', 'São Paulo'],
                    ['November 20–22', 'Las Vegas', 'Las Vegas'],
                    ['November 28–30', 'Qatar', 'Losail'],
                    ['December 5–7', 'Abu Dhabi', 'Yas Marina']
                ] as $index => $race)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 text-gray-900 font-medium">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $race[0] }}</td>
                        <td class="px-6 py-4 text-gray-900 font-medium">{{ $race[1] }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $race[2] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
