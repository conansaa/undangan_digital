<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Figures extends Model
{
    use HasFactory;

    protected $table = 'figures';

    protected $fillable = [
        'fullname',
        'name',
        'fathers_name',
        'mothers_name',
        'ordinal_child_number',
        'photo',
        'social_media',
        'gender_id',
        'event_id',
    ];

    public function event()
    {
        return $this->belongsTo(EventDetails::class, 'event_id');
    }

    public function gender()
    {
        return $this->belongsTo(GenderRef::class, 'gender_id');
    }
}
