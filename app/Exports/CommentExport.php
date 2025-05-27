<?php

namespace App\Exports;

use App\Models\Comments;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CommentExport implements FromCollection, WithHeadings,  WithMapping, WithStyles, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function title(): string
    {
        return 'Data Ucapan';
    }

    public function collection()
    {
        return $this->data;
    }

    public function headings(): array
    {
        return ['Nama Tamu', 'Ucapan', 'Tanggal Dibuat'];
    }

    public function map($comment): array
    {
        return [
            $comment->rsvp->name,
            $comment->comment,
            $comment->created_at->format('d M Y H:i')
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Format Heading (Baris ke-1)
        $sheet->getStyle('A1:C1')->applyFromArray([
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
        ]);

        // Auto-size tiap kolom (A sampai C)
        foreach (range('A', 'C') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        return [];
    }
}
