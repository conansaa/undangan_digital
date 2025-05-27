{{-- <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Tamu & Ucapan</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #4F81BD; color: white; }
    </style>
</head>
<body>
    <!-- Informasi Acara -->
    <p><strong>Pemilik Acara:</strong> {{ $eventDetails->eventOwner->user->name }}</p>
    <p><strong>Nama Acara:</strong> {{ $eventDetails->event_name }}</p>
    <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($eventDetails->event_date)->locale('id')->translatedFormat('d F Y') }}</p>
    <p><strong>Waktu:</strong> {{ \Carbon\Carbon::parse($eventDetails->event_time)->format('H:i') }}</p>
    
    <h2>Data Tamu</h2>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>No Telepon</th>
                <th>Konfirmasi</th>
                <th>Jumlah Tamu</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rsvpData as $rsvp)
                <tr>
                    <td>{{ $rsvp->name }}</td>
                    <td>{{ $rsvp->phone_number }}</td>
                    <td>{{ $rsvp->confirmation == 'Hadir' ? 'Hadir' : 'Tidak Hadir' }}</td>
                    <td>{{ $rsvp->total_guest }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2 style="margin-top: 20px;">Data Ucapan</h2>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Ucapan</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($commentData as $comment)
                <tr>
                    <td>{{ $comment->rsvp->name }}</td>
                    <td>{{ $comment->comment }}</td>
                    <td>{{ $comment->created_at->format('d M Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html> --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Tamu dan Ucapan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .brand-title { color: maroon; font-weight: bold; font-size: 24px; }
        .document-title { font-weight: bold; font-size: 20px; }
        .section-title { font-weight: bold; font-size: 16px; }
        body {
            font-family: Arial, sans-serif;
            color: #000;
            font-size: 12px;
            margin: 0;
            padding: 0;
            width: 100%;
        }
        .content {
            width: 100%;
            max-width: 100%;
            margin: 0 auto;
        }
        .text-maroon {
            color: #7d5357; /* Merah maroon */
            font-weight: bold;
        }
        /* .table-bordered th, .table-bordered td {
            border: none;
        }
        .table-header {
            width: 100%;
            margin-bottom: 20px;
        } */
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table td, .table th {
            border: none;
            padding: 5px;
            text-align: left;
        }
        .m1 {
            margin-left: 100px;
        }
        .acara {
            margin-top: 20px;
        }
        .tamu {
            margin-top: 50px;
        }
        .footer {
            margin-top: 25px;
        }
        .thick {
            border-color: black;
            border-top-style: solid;
            border-top-width: thick;
        }
        .medium {
            border-color: black;
            border-bottom-style: solid;
            border-bottom-width: medium;
        }
    </style>
</head>
<body class="container-fluid mt-4">
    <div class="content">
        <table class="table w-150">
            <tr>
                <td style="width: 50%"><span class="text-maroon fw-bold fs-4">DiikatJanji</span></td>
                <td style="width: 20%"></td>
                <td style="width: 5%"></td>
                <th class="fs-4" style="width: 25%">Data Tamu dan Ucapan</th>
            </tr>
        </table>
        <hr>

        <!-- Informasi Acara -->
        <table class="table w-100 acara">
            <tr>
                <th style="width: 55%;">Diterbitkan oleh DiikatJanji</th>
                <th style="width: 15%;">Untuk</th>
                <td style="width: 5%;"></td>
                <td style="width: 25%;"></td>
            </tr>
            <tr>
                <td style="width: 55%;"></td>
                <td style="width: 15%;">Pemilik Acara</td>
                <td style="width: 5%;">:</td>
                <th style="width: 25%;">{{ $eventDetails->eventOwner->user->name }}</th>
            </tr>
            <tr>
                <td style="width: 55%;"></td>
                <td style="width: 15%;">Nama Acara</td>
                <td style="width: 5%;">:</td>
                <th style="width: 25%;">{{ $eventDetails->event_name }}</th>
            </tr>
            <tr>
                <td style="width: 55%;"></td>
                <td style="width: 15%;">Tanggal</td>
                <td style="width: 5%;">:</td>
                <th style="width: 25%;">{{ \Carbon\Carbon::parse($eventDetails->event_date)->locale('id')->translatedFormat('d F Y') }}</th>
            </tr>
            <tr>
                <td style="width: 55%;"></td>
                <td style="width: 15%;">Waktu</td>
                <td style="width: 5%;">:</td>
                <th style="width: 25%;">{{ \Carbon\Carbon::parse($eventDetails->event_time)->format('H:i') }}</th>
            </tr>
        </table>
    </div>

    <table class="table table-bordered tamu">
        <thead class="thick medium">
            <tr>
                <th>Nama Tamu</th>
                <th>Konfirmasi</th>
                <th>Jumlah Tamu</th>
                <th>Ucapan</th>
                <th>Tanggal Ucapan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rsvpData as $rsvp)
                <tr>
                    <td>{{ $rsvp->name }}</td>
                    <td>{{ $rsvp->confirmation == 'Hadir' ? 'Hadir' : 'Tidak Hadir' }}</td>
                    <td>{{ $rsvp->total_guest }}</td>
                    <td>
                        @if ($rsvp->comments->isNotEmpty())
                            <ul class="list-unstyled">
                                @foreach ($rsvp->comments as $comment)
                                    <li>{{ $comment->comment }}</li>
                                @endforeach
                            </ul>
                        @else
                            <span class="text-muted">Belum ada ucapan</span>
                        @endif
                    </td>
                    <td>
                        @if ($rsvp->comments->isNotEmpty())
                            @foreach ($rsvp->comments as $comment)
                                <div>{{ $comment->created_at->format('d M Y H:i') }} WIB</div>
                            @endforeach
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <table class="table w-100 footer">
        <tr>
            <td><small>Data ini sah dan diproses oleh komputer.</small></td>
            <td><small>Terakhir diupdate: {{ \Carbon\Carbon::now()->setTimezone('Asia/Jakarta')->locale('id')->translatedFormat('d F Y H:i') }}</small></td>
        </tr>
        <tr>
            <td><small>Silakan hubungi <span class="text-maroon fw-bold">customer service DiikatJanji</span> apabila kamu membutuhkan bantuan.</small></td>
            <td></td>
        </tr>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
