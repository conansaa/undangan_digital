<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = ['name', 'price', 'description'];

    public function themes()
    {
        return $this->hasMany(Theme::class);
    }
}
