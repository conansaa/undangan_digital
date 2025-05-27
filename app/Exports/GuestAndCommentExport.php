<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Exportable;

class GuestAndCommentExport implements WithMultipleSheets 
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    protected $rsvpData;
    protected $commentData;

    public function __construct($rsvpData, $commentData)
    {
        $this->rsvpData = $rsvpData;
        $this->commentData = $commentData;
    }

    public function sheets(): array
    {
        return [
            new GuestSheet($this->rsvpData),  // Sheet 1: Data Tamu
            new CommentSheet($this->commentData), // Sheet 2: Data Ucapan
        ];
    }
}
