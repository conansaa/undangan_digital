<?php

namespace App\Imports;

use App\Models\Rsvp;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class GuestImport implements ToModel, WithHeadingRow, WithStartRow
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

    public function startRow(): int
    {
        return 3; // Mulai dari baris ke-3, sehingga baris 1 & 2 dilewati
    }

    public function model(array $row)
    {
        // Skip jika semua kolom kosong
        if (collect($row)->filter()->isEmpty()) {
            return null;
        }
        
        // Cek apakah phone ada dan tidak kosong
        if (isset($row['phone']) && !empty($row['phone'])) {
            $phone = $row['phone'];

            // Cek apakah nomor sudah diawali "0"
            if (substr($phone, 0, 1) !== "0") {
                $phone = "0" . $phone; // Tambahkan "0" di depan jika belum ada
            }
        } else {
            $phone = null; // Jika kosong, simpan sebagai null
        }

        // dd($row);
        return new RSVP([
            'event_id' => $this->eventDetailsIds, // Pastikan user_id selalu sesuai dengan user yang login
            'name' => $row['name'],
            'phone_number' => $phone,
        ]);
    }
}
