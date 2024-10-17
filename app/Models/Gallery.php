<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'gallery';

    protected $fillable = [
        'event_id',
        'section_id',
        'photo',
        'description',
    ];

    // Relasi dengan tabel EventDetail
    public function event()
    {
        return $this->belongsTo(EventDetails::class, 'event_id');
    }

    // Relasi dengan tabel RefSection
    public function section()
    {
        return $this->belongsTo(SectionRef::class, 'section_id');
    }
}
