<?php

namespace App\Imports;

use App\Models\Rsvp;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GuestImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    protected $eventDetailsIds;

    public function __construct($eventDetailsIds)
    {
        $this->eventDetailsIds = $eventDetailsIds;
    }

    public function model(array $row)
    {
        return new RSVP([
            'event_id' => $this->eventDetailsIds, // Pastikan user_id selalu sesuai dengan user yang login
            'name' => $row['name'],
            'phone_number' => $row['phone'],
        ]);
    }
}
