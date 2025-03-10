<?php

namespace App\Exports;

use App\Models\Comments;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CommentExport implements FromCollection, WithHeadings,  WithMapping, WithStyles
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
        return ['Nama Tamu', 'Komentar', 'Tanggal Dibuat'];
    }

    public function map($comment): array
    {
        return [
            $comment->rsvp->name,
            $comment->comment,
            $comment->created_at->format('d-m-Y H:i')
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
