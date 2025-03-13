<?php

namespace Database\Seeders;

use App\Models\Driver;
use Illuminate\Database\Seeder;

class DriverSeeder extends Seeder
{
    public function run()
    {
        $drivers = [
            ['driver_name' => 'Max Verstappen', 'driver_profile_picture' => '', 'driver_Status' => 1],
            ['driver_name' => 'Sergio Perez', 'driver_profile_picture' => '', 'driver_Status' => 1],
            ['driver_name' => 'Lewis Hamilton', 'driver_profile_picture' => '', 'driver_Status' => 1],
            ['driver_name' => 'George Russell', 'driver_profile_picture' => '', 'driver_Status' => 1],
            ['driver_name' => 'Charles Leclerc', 'driver_profile_picture' => '', 'driver_Status' => 1],
            ['driver_name' => 'Carlos Sainz', 'driver_profile_picture' => '', 'driver_Status' => 1],
            ['driver_name' => 'Lando Norris', 'driver_profile_picture' => '', 'driver_Status' => 1],
            ['driver_name' => 'Oscar Piastri', 'driver_profile_picture' => '', 'driver_Status' => 1],
            ['driver_name' => 'Fernando Alonso', 'driver_profile_picture' => '', 'driver_Status' => 1],
            ['driver_name' => 'Lance Stroll', 'driver_profile_picture' => '', 'driver_Status' => 1],
        ];

        foreach ($drivers as $driver) {
            Driver::create($driver);
        }
    }
}
