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

    // Relasi dengan tabel EventDetails
    public function event()
    {
        return $this->belongsTo(EventDetails::class, 'event_id');
    }

    // Relasi dengan tabel Comment
    public function comments()
    {
        return $this->hasMany(Comments::class, 'rsvp_id');
    }
}
