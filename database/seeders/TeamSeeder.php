<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    public function run()
    {
        $teams = [
            ['team_name' => 'Red Bull Racing', 'driver_id' => 1],
            ['team_name' => 'Mercedes', 'driver_id' => 3],
            ['team_name' => 'Ferrari', 'driver_id' => 5],
            ['team_name' => 'McLaren', 'driver_id' => 7],
            ['team_name' => 'Aston Martin', 'driver_id' => 9],
        ];

        foreach ($teams as $team) {
            Team::create($team);
        }
    }
}
