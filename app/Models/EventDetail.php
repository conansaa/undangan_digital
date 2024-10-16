<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_name',
        'day',
        'date',
        'time',
        'venue'
    ];

    protected $casts = [
        'date' => 'datetime', // Pastikan ini ada
    ];
}
