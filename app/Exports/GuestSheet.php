<?php

namespace App\Exports;

use App\Models\Rsvp;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class GuestSheet implements FromCollection, WithHeadings, WithTitle, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $rsvpData;

    public function __construct($rsvpData)
    {
        $this->rsvpData = $rsvpData;
    }

    public function title(): string
    {
        return 'Data Tamu';
    }

    public function collection()
    {
        return $this->rsvpData->map(function ($rsvp) {
            return [
                'Nama' => $rsvp->name,
                'No Telepon' => $rsvp->phone_number,
                'Konfirmasi' => $rsvp->confirmation == 'Hadir' ? 'Hadir' : 'Tidak Hadir',
                'Jumlah Tamu' => $rsvp->total_guest,
            ];
        });
    }

    public function headings(): array
    {
        return ['Nama', 'No Telepon', 'Konfirmasi', 'Jumlah Tamu'];
    }

    public function styles(Worksheet $sheet)
    {
        // Auto-size tiap kolom
        foreach (range('A', 'D') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        // Styling Heading
        $sheet->getStyle('A1:D1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => 'solid',
                'startColor' => ['rgb' => '4F81BD'],
            ],
            'alignment' => [
                'horizontal' => 'center',
            ],
        ]);

        // Dapatkan jumlah baris (total data + heading)
        $totalRows = count($this->rsvpData) + 1; // +1 karena ada heading di baris 1

        // Atur warna latar belakang untuk "Hadir" dan "Tidak Hadir"
        for ($row = 2; $row <= $totalRows; $row++) {
            $cell = 'C' . $row; // Kolom konfirmasi ada di C

            $status = $sheet->getCell($cell)->getValue();
            if ($status == 'Hadir') {
                // Warna hijau untuk Hadir
                $sheet->getStyle($cell)->applyFromArray([
                    'fill' => [
                        'fillType' => 'solid',
                        'startColor' => ['rgb' => 'C6EFCE'],
                    ],
                    'font' => ['bold' => true],
                ]);
            } elseif ($status == 'Tidak Hadir') {
                // Warna merah untuk Tidak Hadir
                $sheet->getStyle($cell)->applyFromArray([
                    'fill' => [
                        'fillType' => 'solid',
                        'startColor' => ['rgb' => 'FFC7CE'],
                    ],
                    'font' => ['bold' => true],
                ]);
            }
        }
    }
}
