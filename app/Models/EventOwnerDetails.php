<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventOwnerDetails extends Model
{
    use HasFactory;

    protected $table = 'event_owner_details';

    protected $fillable = [
        'owner_fullname',
        'owner_name',
        'fathers_name',
        'mothers_name',
        'ordinal_child_number',
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
