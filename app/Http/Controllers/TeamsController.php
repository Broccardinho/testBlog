<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    public function showTeams()
    {
        // Changed 'driver' to 'drivers' to match the view's expected relationship name
        $teams = Team::with('drivers')->get();
        return view('teams', compact('teams'));
    }
}
