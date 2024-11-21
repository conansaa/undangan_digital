<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventOwnerNew extends Model
{
    use HasFactory;

    protected $table = 'event_owner';

    protected $fillable = [
        'event_id',
        'user_id',
    ];

    public function event()
    {
        return $this->hasMany(EventDetails::class, 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function figures()
    {
        return $this->hasMany(Figures::class, 'event_owner_id');
    }
}
