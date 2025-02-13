<?php

namespace App\Exports;

use App\Models\Rsvp;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class GuestExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return $this->data;
    }

    public function headings(): array
    {
        return ['Nama', 'No Telepon', 'Konfirmasi', 'Jumlah Tamu'];
    }

    public function map($rsvp): array
    {
        return [
            $rsvp->name,
            $rsvp->phone_number,
            $rsvp->confirmation == 'Hadir' ? 'Hadir' : 'Tidak Hadir',
            $rsvp->total_guest
        ];
    }
}
