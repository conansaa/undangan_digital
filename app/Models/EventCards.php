<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventCards extends Model
{
    use HasFactory;

    protected $table = 'event_cards';

    protected $fillable = [
        'event_id',
        'event_name',
        'event_date',
        'event_time',
        'location',
        'full_location',
        'quota',
    ];

    public function event()
    {
        return $this->belongsTo(EventDetails::class, 'event_id');
    }
}
