<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'rsvp_id',
        'comment',
    ];

    // Relasi dengan tabel RSVP
    public function rsvp()
    {
        return $this->belongsTo(Rsvp::class, 'rsvp_id');
    }
}
