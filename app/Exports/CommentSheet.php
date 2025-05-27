<?php

namespace App\Exports;

use App\Models\Comment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CommentSheet implements FromCollection, WithHeadings, WithStyles, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $commentData;

    public function __construct($commentData)
    {
        $this->commentData = $commentData;
    }

    public function title(): string
    {
        return 'Data Ucapan';
    }

    public function collection()
    {
        return $this->commentData->map(function ($comment) {
            return [
                'Nama' => $comment->rsvp->name,
                'Ucapan' => $comment->comment,
                'Tanggal' => $comment->created_at->format('d M Y H:i'),
            ];
        });
    }

    public function headings(): array
    {
        return ['Nama', 'Ucapan', 'Tanggal Dibuat'];
    }

    public function styles(Worksheet $sheet)
    {
        // Auto-size tiap kolom
        foreach (range('A', 'C') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        // Styling Heading
        $sheet->getStyle('A1:C1')->applyFromArray([
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
    }
}
