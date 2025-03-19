<?php

use App\Http\Controllers\TeamsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ContactController; // Add this line

Route::get('/', [PagesController::class, 'index']);
Route::resource('/blog', PostsController::class);

Auth::routes();
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Calendar
Route::get('/calendar', function () {
    return view('calendar');
})->name('calendar');

// History
Route::get('/history', function () {
    return view('history');
})->name('history');

// Teams
Route::get('/teams', function () {
    $teams = [
        [
            'name' => 'Alpine',
            'drivers' => ['Pierre Gasly', 'Jack Doohan'],
            'color' => '#0090FF'
        ],
        [
            'name' => 'Aston Martin',
            'drivers' => ['Lance Stroll', 'Fernando Alonso'],
            'color' => '#006F62'
        ],
        [
            'name' => 'Ferrari',
            'drivers' => ['Charles Leclerc', 'Lewis Hamilton'],
            'color' => '#DC0000'
        ],
        [
            'name' => 'Haas',
            'drivers' => ['Esteban Ocon', 'Oliver Bearman'],
            'color' => '#1E1E1E'
        ],
        [
            'name' => 'Kick Sauber',
            'drivers' => ['Nico Hulkenberg', 'Gabriel Bortoleto'],
            'color' => '#9B0000'
        ],
        [
            'name' => 'McLaren',
            'drivers' => ['Lando Norris', 'Oscar Piastri'],
            'color' => '#FF8700'
        ],
        [
            'name' => 'Mercedes',
            'drivers' => ['George Russell', 'Andrea Kimi Antonelli'],
            'color' => '#00D2BE'
        ],
        [
            'name' => 'Racing Bulls',
            'drivers' => ['Isack Hadjar', 'Yuki Tsunoda'],
            'color' => '#469BFF'
        ],
        [
            'name' => 'Red Bull Racing',
            'drivers' => ['Max Verstappen', 'Liam Lawson'],
            'color' => '#0600EF'
        ],
        [
            'name' => 'Williams',
            'drivers' => ['Alexander Albon', 'Carlos Sainz'],
            'color' => '#005AFF'
        ]
    ];

    $driverImageMap = [
        'Carlos Sainz' => 'carlos_sainz.jpg'
    ];
    return view('teams', [
        'teams' => $teams,
        'driverImageMap' => $driverImageMap
    ]);
})->name('teams');
// About
Route::get('/about', function () {
    return view('about');
})->name('about');

// Contact Routes (Updated)
Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// poll
Route::get('/poll', function () {
    $teams = [
        [
            'name' => 'Alpine',
            'drivers' => ['Pierre Gasly', 'Jack Doohan'],
            'color' => '#0090FF'
        ],
        [
            'name' => 'Aston Martin',
            'drivers' => ['Lance Stroll', 'Fernando Alonso'],
            'color' => '#006F62'
        ],
        [
            'name' => 'Ferrari',
            'drivers' => ['Charles Leclerc', 'Lewis Hamilton'],
            'color' => '#DC0000'
        ],
        [
            'name' => 'Haas',
            'drivers' => ['Esteban Ocon', 'Oliver Bearman'],
            'color' => '#1E1E1E'
        ],
        [
            'name' => 'Kick Sauber',
            'drivers' => ['Nico Hulkenberg', 'Gabriel Bortoleto'],
            'color' => '#9B0000'
        ],
        [
            'name' => 'McLaren',
            'drivers' => ['Lando Norris', 'Oscar Piastri'],
            'color' => '#FF8700'
        ],
        [
            'name' => 'Mercedes',
            'drivers' => ['George Russell', 'Andrea Kimi Antonelli'],
            'color' => '#00D2BE'
        ],
        [
            'name' => 'Racing Bulls',
            'drivers' => ['Isack Hadjar', 'Yuki Tsunoda'],
            'color' => '#469BFF'
        ],
        [
            'name' => 'Red Bull Racing',
            'drivers' => ['Max Verstappen', 'Liam Lawson'],
            'color' => '#0600EF'
        ],
        [
            'name' => 'Williams',
            'drivers' => ['Alexander Albon', 'Carlos Sainz'],
            'color' => '#005AFF'
        ]
    ];

    $driverImageMap = [
        'Pierre Gasly' => 'pierre_gasly_fullbody.jpg',
        'Jack Doohan' => 'jack_doohan_fullbody.jpg',
        'Lance Stroll' => 'lance_stroll_fullbody.jpg',
        'Fernando Alonso' => 'fernando_alonso_fullbody.jpg',
        'Charles Leclerc' => 'charles_leclerc_fullbody.jpg',
        'Lewis Hamilton' => 'lewis_hamilton_fullbody.jpg',
        'Esteban Ocon' => 'esteban_ocon_fullbody.jpg',
        'Oliver Bearman' => 'oliver_bearman_fullbody.jpg',
        'Nico Hulkenberg' => 'nico_hulkenberg_fullbody.jpg',
        'Gabriel Bortoleto' => 'gabriel_bortoleto_fullbody.jpg',
        'Lando Norris' => 'lando_norris_fullbody.jpg',
        'Oscar Piastri' => 'oscar_piastri_fullbody.jpg',
        'George Russell' => 'george_russell_fullbody.jpg',
        'Andrea Kimi Antonelli' => 'andrea_kimi_antonelli_fullbody.jpg',
        'Isack Hadjar' => 'isack_hadjar_fullbody.jpg',
        'Yuki Tsunoda' => 'yuki_tsunoda_fullbody.jpg',
        'Max Verstappen' => 'max_verstappen_fullbody.jpg',
        'Liam Lawson' => 'liam_lawson_fullbody.jpg',
        'Alexander Albon' => 'alexander_albon_fullbody.jpg',
        'Carlos Sainz' => 'carlos_sainz_fullbody.jpg'
    ];

    $drivers = [];
    foreach ($teams as $team) {
        foreach ($team['drivers'] as $driver) {
            $drivers[] = [
                'name' => $driver,
                'team' => $team['name'],
                'team_color' => $team['color'],
                'image' => $driverImageMap[$driver] ?? 'default_driver_fullbody.jpg'
            ];
        }
    }

    return view('poll', compact('drivers'));
})->name('poll');

use App\Http\Controllers\VoteController;

Route::post('/vote', [VoteController::class, 'store'])->name('vote.store');
