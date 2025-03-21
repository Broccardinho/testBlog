<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'drivers';

    protected $fillable = ['driver_name', 'driver_profile_picture', 'driver_Status'];

    public function teams()
    {
        return $this->hasMany(Team::class);
    }
}
