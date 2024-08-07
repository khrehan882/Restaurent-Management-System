<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'guest', 'date', 'time',
    ];

    // Define any relationships or additional logic for the Reservation model here
}
