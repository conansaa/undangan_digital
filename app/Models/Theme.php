<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EventDetails;

class Theme extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'max_images',
        'tag',
        'theme_category_id',
        'color',
        'preview_url',
        'preview_image',
        'package_id',
    ];

    public function event()
    {
        return $this->belongsTo(EventDetails::class, 'event_id');
    }

    public function getTagsAttribute($value)
    {
        return explode(',', $value);
    }

    public function setTagsAttribute($value)
    {
        $this->attributes['tag'] = implode(',', $value);
    }

    public function category()
    {
        return $this->belongsTo(ThemeCategory::class, 'theme_category_id');
    }

    public function sections()
    {
        return $this->belongsToMany(SectionRef::class, 'theme_section');
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

}
