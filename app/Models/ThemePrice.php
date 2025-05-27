<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ThemePrice extends Model
{
    use HasFactory;

    protected $fillable = ['theme_id', 'price'];

    public function theme()
    {
        return $this->belongsTo(Theme::class, 'theme_id');
    }
}
