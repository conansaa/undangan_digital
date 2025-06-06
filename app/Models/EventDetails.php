<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventDetails extends Model
{
  use HasFactory;

  protected $table = 'event_details';

  protected $fillable = [
    'event_owner_id',
    'event_name',
    'event_type_id',
    'event_date',
    'event_time',
    'theme_id',
  ];

  // Relasi dengan tabel User
  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function eventOwner()
  {
    return $this->belongsTo(EventOwnerNew::class, 'event_owner_id');
  }

  public function eventCards()
  {
    return $this->hasMany(EventCards::class, 'event_id');
  }

  // Relasi dengan tabel EventTypeRef
  public function eventType()
  {
    return $this->belongsTo(EventTypeRef::class, 'event_type_id');
  }

  public function eventReports()
  {
    return $this->belongsToMany(
      EventReports::class,
      'event_report_details',  // Nama tabel perantara
      'event_id',       // Foreign key di tabel perantara untuk tabel ini
      'event_report_id'        // Foreign key di tabel perantara untuk tabel terkait
    );
  }

  // Relasi dengan tabel EventReportDetails
  public function reportDetails()
  {
    return $this->hasMany(EventReportDetails::class, 'event_id');
  }

  // Relasi dengan tabel Timeline
  public function timeline()
  {
    return $this->hasMany(Timelines::class, 'event_id');
  }

  public function figures()
  {
    return $this->hasMany(Figures::class, 'event_id');
  }

  public function rsvps()
  {
    return $this->hasMany(Rsvp::class, 'event_id');
  }

  public function comments()
  {
    return $this->hasManyThrough(Comments::class, Rsvp::class, 'event_detail_id', 'rsvp_id', 'id', 'id');
  }


  public function themes()
  {
    return $this->belongsTo(Theme::class, 'theme_id');
  }

  public function gifts()
  {
    return $this->hasMany(Gifts::class, 'event_id');
  }

  public function galleries()
  {
    return $this->hasMany(Gallery::class, 'event_id');
  }

  public function mediaAssets()
  {
    return $this->hasMany(MediaAssets::class, 'event_id');
  }

  public function payment()
  {
      return $this->hasOne(Payments::class, 'event_id', 'id');
  }

}
