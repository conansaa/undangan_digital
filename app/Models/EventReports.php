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
        return $this->belongsTo(EventDetails::class, 'id'); 
    }

    // Relasi dengan tabel EventReportDetails
    public function reportDetails()
    {
        return $this->hasMany(EventReportDetails::class, 'event_report_id');
    }
}
