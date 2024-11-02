<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EventDetails;

class Theme extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'max_images'];

    public function events()
    {
        return $this->hasMany(EventDetails::class, 'event_id');
    }
}
