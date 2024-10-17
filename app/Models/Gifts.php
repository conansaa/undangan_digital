<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gifts extends Model
{
    use HasFactory;

    protected $table = 'gifts';

    protected $fillable = [
        'event_id',
        'name',
        'account_number',
        'notes',
    ];

    // Relasi dengan tabel EventDetails
    public function event()
    {
        return $this->belongsTo(EventDetails::class, 'event_id');
    }
}
