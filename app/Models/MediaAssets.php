<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaAssets extends Model
{
    use HasFactory;

    protected $table = 'media_assets';

    protected $fillable = [
        'event_id',
        'photo',
        'link',
    ];

    public function event()
    {
        return $this->belongsTo(EventDetails::class, 'event_id');
    }
}
