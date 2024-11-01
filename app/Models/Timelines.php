<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timelines extends Model
{
    use HasFactory;

    protected $table = 'timelines';

    protected $fillable = [
        'event_id',
        'title',
        'date',
        'description',
        'photo',
    ];

    // Relasi dengan tabel EventDetail
    public function event()
    {
        return $this->belongsTo(EventDetails::class, 'event_id');
    }

    public function getImagePathAttribute()
    {
        if ($this->photo) return 'storage/' . $this->photo;
        else return null;
    }
}
