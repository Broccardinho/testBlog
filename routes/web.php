<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;

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

// Teams (Updated with Driver Data)
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
            'color' => '#FFFFFF'
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
