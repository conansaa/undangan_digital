<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gifts extends Model
{
    use HasFactory;

    protected $table = 'gifts';

    protected $fillable = [
        'event_id',
        'name',
        'category',
        'notes',
    ];

    const CATEGORIES = [
        'Uang' => 'Uang',
        'Barang' => 'Barang',
    ];
    
    // Optionally, create a method to get all categories
    public static function getCategories()
    {
        return self::CATEGORIES;
    }

    // Relasi dengan tabel EventDetails
    public function event()
    {
        return $this->belongsTo(EventDetails::class, 'event_id');
    }
}
