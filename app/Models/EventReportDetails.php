<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventReportDetails extends Model
{
    use HasFactory;

    protected $table = 'event_report_details';

    protected $fillable = [
        'event_id',
        'event_report_id',
    ];

    // Relasi dengan tabel EventDetail
    public function event()
    {
        return $this->belongsTo(EventDetails::class, 'event_id');
    }

    // Relasi dengan tabel EventReport
    public function eventReport()
    {
        return $this->belongsTo(EventReports::class, 'event_report_id');
    }
}
