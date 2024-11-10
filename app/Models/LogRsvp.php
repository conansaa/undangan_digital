<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogRsvp extends Model
{
    protected $table = 'log_rsvp';

    protected $fillable = [
        'rsvp_id',
        'event_id',
        'name',
        'phone_number',
        'confirmation',
        'total_guest',
        'action'
    ];

    public function event()
    {
        return $this->belongsTo(EventDetails::class, 'event_id');
    }
    public function rsvp()
    {
        return $this->belongsTo(Rsvp::class, 'rsvp_id');
    }

}

