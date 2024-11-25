<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenderRef extends Model
{
    use HasFactory;

    protected $table = 'gender_ref';

    protected $fillable = [
        'name',
    ];

    // Relasi dengan tabel EventOwnerDetail
    public function eventOwnerDetails()
    {
        return $this->hasMany(EventOwnerDetails::class, 'gender_id');
    }

    public function figures()
    {
        return $this->hasMany(Figures::class, 'gender_id');
    }
}
