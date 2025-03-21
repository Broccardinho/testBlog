<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'teams';

    protected $fillable = ['team_name', 'driver_id'];

    public function drivers()
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }
}
