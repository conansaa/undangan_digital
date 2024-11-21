<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionRef extends Model
{
    use HasFactory;

    protected $table = 'section_ref';

    protected $fillable = [
        'name',
    ];

    // Relasi dengan tabel Gallery
    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'section_id');
    }

    public function themes()
    {
        return $this->belongsToMany(Theme::class, 'theme_section');
    }
}
