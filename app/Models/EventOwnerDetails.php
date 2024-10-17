<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventOwnerDetails extends Model
{
    use HasFactory;

    protected $table = 'event_owner_details';

    protected $fillable = [
        'owner_name',
        'parents_name',
        'owner_photo',
        'social_media',
        'gender_id',
    ];

    // Relasi dengan tabel GenderRef
    public function gender()
    {
        return $this->belongsTo(GenderRef::class, 'gender_id');
    }
}
