<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThemeSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'theme_id',
        'section_id',
        'max_images',
    ];

    
}
