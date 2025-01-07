<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventReports extends Model
{
    use HasFactory;

    protected $table = 'event_reports';

    protected $fillable = [
        'event_type_id',
        'month',
        'year',
        'counter',
        'progress_total',
        'finish_total',
    ];

    // Relasi dengan tabel RefEventType
    public function eventType()
    {
        return $this->belongsTo(EventTypeRef::class, 'event_type_id');
    }

    public function eventDetails()
    {
        return $this->belongsToMany(
            EventDetails::class,
            'event_report_details',  // Nama tabel perantara
            'event_report_id',       // Foreign key di tabel perantara untuk tabel ini
            'event_id'        // Foreign key di tabel perantara untuk tabel terkait
        );
    }

    // Relasi dengan tabel EventReportDetails
    public function reportDetails()
    {
        return $this->hasMany(EventReportDetails::class, 'event_report_id');
    }
}
