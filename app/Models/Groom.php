<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groom extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'parent_name',
        'photo',
        'social_media',
    ];
}