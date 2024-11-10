<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThemeCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function themes()
    {
        return $this->hasMany(Theme::class, 'theme_category_id');
    }
}
