<?php

namespace App\Exports;

use App\Models\Rsvp;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class GuestExport implements FromCollection, WithHeadings, WithMapping, WithStyles
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

    public function styles(Worksheet $sheet)
    {
        return [
            // Format Heading (Baris ke-1)
            1 => [
                'font' => [
                    'bold' => true, // Tebal
                    'color' => ['rgb' => 'FFFFFF'], // Warna teks putih
                ],
                'fill' => [
                    'fillType' => 'solid',
                    'startColor' => ['rgb' => '4F81BD'], // Warna latar belakang biru
                ],
                'alignment' => [
                    'horizontal' => 'center', // Posisi teks di tengah
                ],
            ],
        ];
    }
}
