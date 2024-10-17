<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventDetails extends Model
{
    use HasFactory;

    protected $table = 'event_details';

    protected $fillable = [
        'user_id',
        'event_name',
        'event_type_id',
        'event_date',
        'event_time',
        'location',
        'quota',
    ];

    // Relasi dengan tabel User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan tabel EventTypeRef
    public function eventType()
    {
        return $this->belongsTo(EventTypeRef::class, 'event_type_id');
    }

    // Relasi dengan tabel EventReportDetails
    public function reportDetails()
    {
        return $this->hasMany(EventReportDetails::class, 'event_id');
    }

    // Relasi dengan tabel Timeline
    public function timeline()
    {
        return $this->hasMany(Timelines::class, 'event_id');
    }
}
