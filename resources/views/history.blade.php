@extends('layouts.app')

@section('content')
    <div class="text-center py-20 space-y-12 bg-gray-100">
        <div class="space-y-8">
        <span class="uppercase text-sm text-gray-400 tracking-widest">
            Legacy
        </span>
            <h2 class="text-4xl font-bold text-gray-800">
                History of Formula 1
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                A journey through the most significant moments in Formula 1's storied past
            </p>
        </div>

        <div class="w-4/5 mx-auto space-y-12">
            <div class="relative pl-8 border-l-4 border-red-600 space-y-12">
                @foreach([
                    ['1950', 'First World Championship', 'The inaugural Formula 1 World Championship season begins with Giuseppe Farina winning the first title'],
                    ['1958', 'Constructors\' Championship Introduced', 'First Constructors\' Championship awarded to Vanwall'],
                    ['1968', 'Sponsorship Revolution', 'Lotus introduces sponsorship liveries with Imperial Tobacco\'s Gold Leaf'],
                    ['1978', 'Ground Effect Era', 'Lotus 79 pioneers ground effect aerodynamics'],
                    ['1981', 'Carbon Fiber Chassis', 'McLaren introduces first carbon fiber composite chassis'],
                    ['1994', 'Safety Revolution', 'Major safety improvements implemented after Ayrton Senna\'s tragic accident'],
                    ['2005', 'V10 Era Ends', 'Last season using 3.0L V10 engines before V8 transition'],
                    ['2009', 'Hybrid Era Begins', 'KERS (Kinetic Energy Recovery System) introduced'],
                    ['2014', 'Turbo Hybrid Power Units', '1.6L V6 turbo hybrid engines become mandatory'],
                    ['2022', 'Technical Revolution', 'Major aerodynamic regulations overhaul to improve racing']
                ] as $event)
                    <div class="relative space-y-4">
                        <div class="absolute w-4 h-4 bg-red-600 rounded-full -left-[calc(0.5rem+2px)] top-2"></div>
                        <div class="space-y-2">
                            <h3 class="text-2xl font-bold text-gray-800">{{ $event[0] }}</h3>
                            <h4 class="text-xl font-semibold text-red-600">{{ $event[1] }}</h4>
                            <p class="text-gray-600 leading-relaxed">{{ $event[2] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
