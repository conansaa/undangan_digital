<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventTypeRef extends Model
{
    use HasFactory;

    protected $table = 'event_type_ref';

    protected $fillable = [
        'nama',
    ];

    // Relasi dengan tabel EventDetails
    public function events()
    {
        return $this->hasMany(EventDetails::class, 'event_type_id');
    }

    // Relasi dengan tabel EventReports
    public function eventReports()
    {
        return $this->hasMany(EventReports::class, 'event_type_id');
    }
}
