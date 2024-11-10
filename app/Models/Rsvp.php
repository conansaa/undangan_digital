<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rsvp extends Model
{
    use HasFactory;

    protected $table = 'rsvp';

    protected $fillable = [
        'event_id',
        'name',
        'phone_number',
        'confirmation',
        'total_guest',
    ];

    public function event()
    {
        return $this->belongsTo(EventDetails::class, 'event_id');
    }

    public function comments()
    {
        return $this->hasMany(Comments::class, 'rsvp_id');
    }

    public function log_rsvp()
    {
        return $this->hasMany(LogRsvp::class, 'rsvp_id');
    }

    public function saveLog($action, $createdBy = null)
    {
        $this->log_rsvp()->create([
            'rsvp_id' => $this->id,
            'event_id' => $this->event_id,
            'name' => $this->name,
            'phone_number' => $this->phone_number,
            'confirmation' => $this->confirmation,
            'total_guest' => $this->total_guest,
            'action' => $action,
        ]);
    }
}
